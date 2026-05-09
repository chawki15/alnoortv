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

$allowedTypes = [IMAGETYPE_JPEG, IMAGETYPE_PNG];
$imageInfo = @getimagesize($file['tmp_name']);
if ($imageInfo === false || !in_array($imageInfo[2], $allowedTypes, true)) {
    exit;
}
function infographic_filename_from_title($title)
{
    $title = trim((string)$title);
    $title = preg_replace('~[\\\\/:*?"<>|]+~u', '-', $title);
    $title = preg_replace('/\s+/u', '-', $title);
    $title = preg_replace('/-+/u', '-', $title);
    $title = trim($title, " .\t\n\r\0\x0B-");

    if ($title === '') {
        $title = 'infographic';
    }

    if (function_exists('mb_substr')) {
        return mb_substr($title, 0, 180, 'UTF-8');
    }

    return substr($title, 0, 180);
}

function infographic_source_image($path, $type)
{
    switch ($type) {
        case IMAGETYPE_JPEG:
            return @imagecreatefromjpeg($path);
        case IMAGETYPE_PNG:
            return @imagecreatefrompng($path);
        default:
            return false;
    }
}

function save_infographic_cover($sourcePath, $sourceType, $targetPath)
{
    $source = infographic_source_image($sourcePath, $sourceType);
    if (!$source) {
        return false;
    }

    $targetW = 1200;
    $targetH = 675;
    $srcW = imagesx($source);
    $srcH = imagesy($source);

    if ($srcW <= 0 || $srcH <= 0) {
        imagedestroy($source);
        return false;
    }

    $targetRatio = $targetW / $targetH;
    $sourceRatio = $srcW / $srcH;

    if ($sourceRatio > $targetRatio) {
        $cropH = $srcH;
        $cropW = (int)round($srcH * $targetRatio);
        $srcX = (int)round(($srcW - $cropW) / 2);
        $srcY = 0;
    } else {
        $cropW = $srcW;
        $cropH = (int)round($srcW / $targetRatio);
        $srcX = 0;
        $srcY = (int)round(($srcH - $cropH) / 2);
    }

    $canvas = imagecreatetruecolor($targetW, $targetH);
    if (!$canvas) {
        imagedestroy($source);
        return false;
    }

    $white = imagecolorallocate($canvas, 255, 255, 255);
    imagefill($canvas, 0, 0, $white);
    imagecopyresampled($canvas, $source, 0, 0, $srcX, $srcY, $targetW, $targetH, $cropW, $cropH);
    $saved = imagejpeg($canvas, $targetPath, 85);

    imagedestroy($source);
    imagedestroy($canvas);

    return $saved;
}

$uploadDir = dirname(__DIR__, 3) . '/assets/img/infographics/';
if (!is_dir($uploadDir) && !mkdir($uploadDir, 0755, true)) {
    exit;
}

$baseName = infographic_filename_from_title($_POST['titleInfographic'] ?? '');
$fileName = $baseName . '.jpg';
$targetPath = $uploadDir . $fileName;

if (file_exists($targetPath)) {
    $fileName = $baseName . '-' . time() . '.jpg';
    $targetPath = $uploadDir . $fileName;
}

if (!save_infographic_cover($file['tmp_name'], $imageInfo[2], $targetPath)) {
    exit;
}

echo $fileName;
?>