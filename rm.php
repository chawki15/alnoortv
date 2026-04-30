<?php
require_once('admin/assets/func.php');
$db = connect();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>


<ul>
<?php
   if($dossier = opendir('assets/img/news')){
     while ( false !== $fichier = readdir($dossier)) {
     	if ($fichier != '.' && $fichier != "..") {
         $res = mysqli_query($db,'SELECT id,photo,description,description2,description3,description4,description5 FROM news where  photo LIKE "%'.$fichier.'%" or description LIKE "%'.$fichier.'%" or description2 LIKE "%'.$fichier.'%" or description3 LIKE "%'.$fichier.'%" or description4 LIKE "%'.$fichier.'%" or description5 LIKE "%'.$fichier.'%"');
         $rowcount=mysqli_num_rows($res);
         if($rowcount>0){
         	echo $fichier.'hhh<br/>';
         }else{
            unlink('assets/img/news/'.$fichier);
         }
     	}
     }
   }


    if($dossier = opendir('assets/img/writers')){
      while ( false !== $fichier = readdir($dossier)) {
         if ($fichier != '.' && $fichier != "..") {
          $res = mysqli_query($db,'SELECT id,photo FROM writers where  photo LIKE "%'.$fichier.'%" ');
          $rowcount=mysqli_num_rows($res);
          if($rowcount>0){
             echo $fichier.'hhh<br/>';
          }else{
             unlink('assets/img/writers/'.$fichier);
          }
         }
      }
    }

    if($dossier = opendir('assets/img/slider')){
      while ( false !== $fichier = readdir($dossier)) {
         if ($fichier != '.' && $fichier != "..") {
          $res = mysqli_query($db,'SELECT id,photo FROM slider where  photo LIKE "%'.$fichier.'%" ');
          $rowcount=mysqli_num_rows($res);
          if($rowcount>0){
             echo $fichier.'hhh<br/>';
          }else{
             unlink('assets/img/slider/'.$fichier);
          }
         }
      }
    }

?>
</ul>
</body>
</html>