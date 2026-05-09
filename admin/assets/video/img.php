<?php
$targetWidth = 600;
$targetHeight = 300;
$allowedTypes = [
    'image/png' => IMAGETYPE_PNG,
    'image/jpg' => IMAGETYPE_JPEG,
    'image/jpeg' => IMAGETYPE_JPEG,
    'image/webp' => IMAGETYPE_WEBP,
];

function video_image_filename(string $videoTitle): string
{
    $baseName = trim($videoTitle);
    $baseName = function_exists('mb_strtolower') ? mb_strtolower($baseName, 'UTF-8') : strtolower($baseName);
    $baseName = preg_replace('/[^\p{L}\p{N}_-]+/u', '-', $baseName);
    $baseName = preg_replace('/-+/', '-', (string)$baseName);
    $baseName = trim((string)$baseName, '-_');

    if($baseName === ''){
        $baseName = 'video-' . date('YmdHis');
    }

    return $baseName . '-video.webp';
}

function unique_video_image_path(string $directory, string $filename): array
{
    $path = $directory . $filename;
    if(!file_exists($path)){
        return [$filename, $path];
    }

    $baseName = pathinfo($filename, PATHINFO_FILENAME);
    $counter = 1;
    do {
        $candidate = $baseName . '-' . $counter . '.webp';
        $path = $directory . $candidate;
        $counter++;
    } while(file_exists($path));

    return [$candidate, $path];
}

function create_video_source_image(string $tmpName, int $imageType)
{
    switch ($imageType) {
        case IMAGETYPE_JPEG:
            return imagecreatefromjpeg($tmpName);
        case IMAGETYPE_PNG:
            return imagecreatefrompng($tmpName);
        case IMAGETYPE_WEBP:
            return function_exists('imagecreatefromwebp') ? imagecreatefromwebp($tmpName) : false;
        default:
            return false;
    }
}

if(isset($_FILES['1']['type']) && ($_FILES['1']['name'] ?? '') !== ''){
    if(!function_exists('imagewebp')){
        http_response_code(500);
        echo 'webp_not_supported';
        exit;
    }

    $mimeType = $_FILES['1']['type'];
    if(!isset($allowedTypes[$mimeType])){
        http_response_code(415);
        echo 'invalid_type';
        exit;
    }

    $imageInfo = getimagesize($_FILES['1']['tmp_name']);
    if($imageInfo === false || !in_array($imageInfo[2], $allowedTypes, true)){
        http_response_code(415);
        echo 'invalid_image';
        exit;
    }

    $sourceGdImage = create_video_source_image($_FILES['1']['tmp_name'], $imageInfo[2]);
    if(!$sourceGdImage){
        http_response_code(415);
        echo 'invalid_image';
        exit;
    }

    $widthOrig = (int)$imageInfo[0];
    $heightOrig = (int)$imageInfo[1];
    $sourceRatio = $widthOrig / $heightOrig;
    $targetRatio = $targetWidth / $targetHeight;

    if($sourceRatio > $targetRatio){
        $cropHeight = $heightOrig;
        $cropWidth = (int)round($heightOrig * $targetRatio);
        $srcX = (int)round(($widthOrig - $cropWidth) / 2);
        $srcY = 0;
    }else{
        $cropWidth = $widthOrig;
        $cropHeight = (int)round($widthOrig / $targetRatio);
        $srcX = 0;
        $srcY = (int)round(($heightOrig - $cropHeight) / 2);
    }

    $resizedImage = imagecreatetruecolor($targetWidth, $targetHeight);
    $backgroundColor = imagecolorallocate($resizedImage, 255, 255, 255);
    imagefill($resizedImage, 0, 0, $backgroundColor);

    imagecopyresampled(
        $resizedImage,
        $sourceGdImage,
        0,
        0,
        $srcX,
        $srcY,
        $targetWidth,
        $targetHeight,
        $cropWidth,
        $cropHeight
    );

    $directory = '../../../assets/img/videos/';
    if(!is_dir($directory)){
        mkdir($directory, 0755, true);
    }

    [$newName, $path] = unique_video_image_path($directory, video_image_filename($_POST['titleVideo'] ?? ''));
    if(!imagewebp($resizedImage, $path, 90)){
        http_response_code(500);
        echo 'upload_error';
        imagedestroy($sourceGdImage);
        imagedestroy($resizedImage);
        exit;
    }

    imagedestroy($sourceGdImage);
    imagedestroy($resizedImage);
    echo $newName;
}
