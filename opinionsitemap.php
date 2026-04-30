<?php 
require_once('admin/assets/func.php');
  $db = connect();
$news = mysqli_query($db, 'SELECT * FROM opinion order by id desc');

header("Content-Type: application/xml; charset=utf-8");
echo '<!--?xml version="1.0" encoding="UTF-8"?-->'.PHP_EOL; 
echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd" xmlns:image="http://www.google.com/schemas/sitemap-image/1.1">' . PHP_EOL;
while($rowNews = mysqli_fetch_array($news))
{
  echo '<url>'. PHP_EOL;
    echo '<loc>https://www.alnoortv.ma/opinion/'.cripter($rowNews['id'],264).'-'.replace($rowNews['titre']).'.html</loc>'. PHP_EOL;
    echo '<lastmod>'.date("Y-m-d").'</lastmod>'. PHP_EOL;
    echo '<priority>1.00</priority>'. PHP_EOL;
    echo '<image:image>'. PHP_EOL;
      echo '<image:loc>https://www.alnoortv.ma/assets/img/writers/'.GetTableByID($db,'writers','photo',$rowNews['id_writer']).'</image:loc>'. PHP_EOL;
      echo '<image:title>'.$rowNews['titre'].'</image:title>'. PHP_EOL;
    echo '</image:image>'. PHP_EOL;
  echo '</url>'. PHP_EOL;
}
echo '</urlset>'. PHP_EOL;
?> 