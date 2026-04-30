<?php 
require_once('../func.php');
$new_name = 'thumbs'.md5(rand()) . '.jpg';
echo $new_name;
$path = '../../../assets/img/infographics/' . $new_name;

generate_image_thumbnail($_FILES["5"]["tmp_name"], $path,542,551);


?>