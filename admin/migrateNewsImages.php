<?php
include('req.php');

if (!loggedAdmin($pdo)) {
    header('Location: index.php');
    exit;
}

$limit = isset($_GET['limit']) ? max(0, (int)$_GET['limit']) : 0;
//$result = migrate_news_images_to_webp_sizes($pdo, $limit);

$result = update_news_photo_db_type_to_webp($pdo, $limit);




$_SESSION['news_migration_result'] = $result;
header('Location: afficherNews.php?migrated=1');
exit;
?>
