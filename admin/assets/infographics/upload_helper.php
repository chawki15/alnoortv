<?php
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

function infographic_valid_upload($fileKey)
{
    if (!isset($_FILES[$fileKey]) || $_FILES[$fileKey]['name'] === '') {
        return false;
    }

    $file = $_FILES[$fileKey];
    if (!isset($file['error']) || $file['error'] !== UPLOAD_ERR_OK) {
        return false;
    }

    if ($file['size'] > 4.5 * 1024 * 1024) {
        return false;
    }

    $allowedTypes = [IMAGETYPE_JPEG, IMAGETYPE_PNG];
    $imageInfo = @getimagesize($file['tmp_name']);
    if ($imageInfo === false || !in_array($imageInfo[2], $allowedTypes, true)) {
        return false;
    }

    return [$file, $imageInfo];
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

function save_infographic_image($sourcePath, $sourceType, $targetPath, $targetW, $targetH)
{
    $source = infographic_source_image($sourcePath, $sourceType);
    if (!$source) {
        return false;
    }

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

function infographic_upload_dir()
{
    return dirname(__DIR__, 3) . '/assets/img/infographics/';
}

function infographic_unique_filename($baseName, $number = '')
{
    $suffix = $number === '' ? '' : '-' . $number;
    $fileName = $baseName . $suffix . '.jpg';
    $targetPath = infographic_upload_dir() . $fileName;

    if (file_exists($targetPath)) {
        $fileName = $baseName . $suffix . '-' . time() . '.jpg';
        $targetPath = infographic_upload_dir() . $fileName;
    }

    return [$fileName, $targetPath];
}

function handle_infographic_upload($fileKey, $number, $landscapeW, $landscapeH, $portraitW = null, $portraitH = null)
{
    $upload = infographic_valid_upload($fileKey);
    if (!$upload) {
        exit;
    }

    [$file, $imageInfo] = $upload;
    $uploadDir = infographic_upload_dir();
    if (!is_dir($uploadDir) && !mkdir($uploadDir, 0755, true)) {
        exit;
    }

    $targetW = $landscapeW;
    $targetH = $landscapeH;
    if ($portraitW !== null && $portraitH !== null && $imageInfo[0] < $imageInfo[1]) {
        $targetW = $portraitW;
        $targetH = $portraitH;
    }

    $baseName = infographic_filename_from_title($_POST['titleInfographic'] ?? '');
    if ($number !== '' && !empty($_POST['photoInfographic'])) {
        $mainName = pathinfo(basename((string)$_POST['photoInfographic']), PATHINFO_FILENAME);
        $baseName = infographic_filename_from_title($mainName);
    }

    [$fileName, $targetPath] = infographic_unique_filename($baseName, $number);

    if (!save_infographic_image($file['tmp_name'], $imageInfo[2], $targetPath, $targetW, $targetH)) {
        exit;
    }

    echo $fileName;
}
?>