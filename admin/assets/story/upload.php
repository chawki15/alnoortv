<?php
require_once('../func.php');

function story_upload_file(array $file, string $kind): string
{
    if (($file['error'] ?? UPLOAD_ERR_NO_FILE) !== UPLOAD_ERR_OK) {
        http_response_code(400);
        return 'upload_error';
    }

    $allowed = $kind === 'thumb'
        ? ['image/jpeg' => 'jpg', 'image/png' => 'png', 'image/webp' => 'webp', 'image/gif' => 'gif']
        : ['video/mp4' => 'mp4', 'video/webm' => 'webm', 'video/ogg' => 'ogg'];

    $mimeType = mime_content_type($file['tmp_name']);
    if (!isset($allowed[$mimeType])) {
        http_response_code(415);
        return 'invalid_type';
    }

    $directory = '../../../assets/stories/';
    if (!is_dir($directory)) {
        mkdir($directory, 0755, true);
    }

    $extension = $allowed[$mimeType];
    $filename = 'story-' . $kind . '-' . date('YmdHis') . '-' . bin2hex(random_bytes(4)) . '.' . $extension;
    if (!move_uploaded_file($file['tmp_name'], $directory . $filename)) {
        http_response_code(500);
        return 'upload_error';
    }

    return $filename;
}

$kind = ($_POST['kind'] ?? '') === 'thumb' ? 'thumb' : 'media';
$field = $kind === 'thumb' ? 'thumbFile' : 'mediaFile';
echo story_upload_file($_FILES[$field] ?? [], $kind);
