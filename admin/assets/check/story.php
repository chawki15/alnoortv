<?php
session_start();
require_once('../func.php');
$pdo = connect_pdo();
$act = $_POST['act'] ?? '';

if ($act === 'addStory') {
    $title = trim($_POST['titleStory'] ?? '');
    $media = trim($_POST['storyMedia'] ?? '');
    $thumb = trim($_POST['storyThumb'] ?? '');

    if ($title === '' || $media === '' || $thumb === '') {
        if ($title === '') {
            echo ' et ';
        }
        if ($media === '') {
            echo ' media ';
        }
        if ($thumb === '') {
            echo ' thumb ';
        }
        exit;
    }

    $stmt = $pdo->prepare('INSERT INTO `stories`(`id`, `title`, `video`, `thumb`) VALUES (NULL,:title,:video,:thumb)');
    $stmt->execute([
        ':title' => $title,
        ':video' => $media,
        ':thumb' => $thumb
    ]);
    echo ' addStory ';
}
