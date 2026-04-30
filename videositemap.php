<?php 
require_once('admin/assets/func.php');
  $db = connect();
$news = mysqli_query($db, 'SELECT * FROM news where id_category in (select id from categories where id = "11") order by id desc');

header("Content-Type: application/xml; charset=utf-8");
echo '<!--?xml version="1.0" encoding="UTF-8"?-->'.PHP_EOL; 
echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:video="http://www.google.com/schemas/sitemap-video/1.1">' . PHP_EOL;
while($rowNews = mysqli_fetch_array($news))
{
  echo '<url>'. PHP_EOL;
    echo '<loc>https://www.alnoortv.ma/video/'.cripter($rowNews['id'],264).'-'.replace($rowNews['titre']).'.html</loc>'. PHP_EOL;
    echo '<video:video>'. PHP_EOL;
        echo '<video:thumbnail_loc>https://www.youtube.com/embed/'.str_replace('https://youtu.be/','',str_replace('https://www.youtube.com/watch?v=','',$rowNews['urlVideo'])).'</video:thumbnail_loc>'. PHP_EOL;
        echo '<video:title>'.$rowNews['titre'].'</video:title>'. PHP_EOL;
        echo '<video:description>'.$rowNews['titre'].'</video:description>'. PHP_EOL;
        echo '<video:player_loc>'.$rowNews['urlVideo'].'</video:player_loc>'. PHP_EOL;
        echo '<video:publication_date>'.date("Y-m-d").'</video:publication_date>'. PHP_EOL;
        echo '<video:live>no</video:live>'. PHP_EOL;
    echo '</video:video>'. PHP_EOL;
  echo '</url>'. PHP_EOL;
}
echo '</urlset>'. PHP_EOL;
?> 
