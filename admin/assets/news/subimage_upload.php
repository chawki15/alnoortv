<?php
function news_subimage_slug($title)
{
    $title = trim((string)$title);
    $title = preg_replace('/[^\p{L}\p{N}]+/u', '-', $title);
    $title = trim((string)$title, '-');
    $title = function_exists('mb_strtolower') ? mb_strtolower($title, 'UTF-8') : strtolower($title);
    return $title === '' ? 'news' : $title;
}

function news_subimage_source($tmpPath, $sourceType)
{
    switch ($sourceType) {
        case IMAGETYPE_GIF:
            return @imagecreatefromgif($tmpPath);
        case IMAGETYPE_JPEG:
            return @imagecreatefromjpeg($tmpPath);
        case IMAGETYPE_PNG:
            return @imagecreatefrompng($tmpPath);
        default:
            return false;
    }
}

function save_news_subimage($fieldName, $slot, $descriptionFieldName = null)
{
    if (!function_exists('imagewebp')) {
        exit;
    }

    if (!isset($_FILES[$fieldName]) || $_FILES[$fieldName]['name'] === '') {
        exit;
    }

    $file = $_FILES[$fieldName];
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

    list($widthOrig, $heightOrig, $sourceType) = $imageInfo;
    $sourceImage = news_subimage_source($file['tmp_name'], $sourceType);
    if (!$sourceImage) {
        exit;
    }

    $targetWidth = 800;
    $targetHeight = 450;
    $scale = min($targetWidth / max($widthOrig, 1), $targetHeight / max($heightOrig, 1));
    $resizedWidth = (int)round($widthOrig * $scale);
    $resizedHeight = (int)round($heightOrig * $scale);
    $dstX = (int)round(($targetWidth - $resizedWidth) / 2);
    $dstY = (int)round(($targetHeight - $resizedHeight) / 2);

    $canvas = imagecreatetruecolor($targetWidth, $targetHeight);
    if (!$canvas) {
        imagedestroy($sourceImage);
        exit;
    }

    $background = imagecolorallocate($canvas, 255, 255, 255);
    imagefill($canvas, 0, 0, $background);
    imagecopyresampled($canvas, $sourceImage, $dstX, $dstY, 0, 0, $resizedWidth, $resizedHeight, $widthOrig, $heightOrig);

    $description = $descriptionFieldName !== null ? trim((string)($_POST[$descriptionFieldName] ?? '')) : '';
    $slugSource = $description !== '' ? $description : ($_POST['titleNews'] ?? '');
    $baseName = news_subimage_slug($slugSource) . '-image-' . (int)$slot . '-' . time() . '-' . bin2hex(random_bytes(3));
    $dir = __DIR__ . '/../../../assets/img/news/';

    $newName = $baseName . '-800x450.webp';
    $ok = imagewebp($canvas, $dir . $newName, 82);

    imagedestroy($sourceImage);
    imagedestroy($canvas);

    if (!$ok) {
        exit;
    }

    echo $newName;
}
?>