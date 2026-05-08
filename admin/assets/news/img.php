<?php
if (!isset($_FILES["1"]) || $_FILES["1"]["name"] === '') {
    exit;
}

$file = $_FILES["1"];
if (!isset($file['error']) || $file['error'] !== UPLOAD_ERR_OK) {
    exit;
}

if ($file['size'] > 4.5 * 1024 * 1024) {
    exit;
}

$allowedTypes = [IMAGETYPE_JPEG, IMAGETYPE_PNG, IMAGETYPE_GIF];
$imageInfo = @getimagesize($file['tmp_name']);
if ($imageInfo === false || !in_array($imageInfo[2], $allowedTypes, true)) {
    exit;
}

function slugify_title($title)
{
    $title = trim((string)$title);
    $title = preg_replace('/[^\p{L}\p{N}]+/u', '-', $title);
    $title = trim($title, '-');
    $title = strtolower($title);
    if ($title === '') {
        $title = 'news-' . bin2hex(random_bytes(3));
    }
    return $title;
}

function create_webp_size($src, $sourceType, $targetW, $targetPath)
{
    switch ($sourceType) {
        case IMAGETYPE_GIF:
            $source = @imagecreatefromgif($src);
            break;
        case IMAGETYPE_JPEG:
            $source = @imagecreatefromjpeg($src);
            break;
        case IMAGETYPE_PNG:
            $source = @imagecreatefrompng($src);
            break;
        default:
            return false;
    }

    if (!$source) {
        return false;
    }

    $srcW = imagesx($source);
    $srcH = imagesy($source);
    $ratio = $srcW / max($srcH, 1);
    $targetH = (int)round($targetW / max($ratio, 0.00001));

    $canvas = imagecreatetruecolor($targetW, $targetH);
    imagecopyresampled($canvas, $source, 0, 0, 0, 0, $targetW, $targetH, $srcW, $srcH);

    $saved = false;
    if (function_exists('imagewebp')) {
        $saved = imagewebp($canvas, $targetPath, 82);
    } else {
        $targetPath = str_replace('.webp', '.jpg', $targetPath);
        $saved = imagejpeg($canvas, $targetPath, 82);
    }

    imagedestroy($source);
    imagedestroy($canvas);

    return $saved;
}

$title = $_POST['titleNews'] ?? '';
$slug = slugify_title($title);
$base = $slug . '-' . time();
$dir = '../../../assets/img/news/';

$generated = [];
$sizes = [300, 600, 1200];
foreach ($sizes as $size) {
    $name = $base . '-' . $size . '.webp';
    $path = $dir . $name;
    if (create_webp_size($file['tmp_name'], $imageInfo[2], $size, $path)) {
        if (!function_exists('imagewebp')) {
            $name = str_replace('.webp', '.jpg', $name);
        }
        $generated[$size] = $name;
    }
}

if (!isset($generated[1200])) {
    exit;
}

echo $generated[1200];
?>