<?php
  session_start();
  require_once('../func.php');
  $db = connect();

if($_POST['act']=='addCat'){
    if((trim($_POST['category'])=='')||(!validate_arab($_POST['category']))){
        if(trim($_POST['category'])==''){ echo " ec "; }elseif(!validate_arab($_POST['category'])){ echo " vc "; }
    }else{
        mysqli_query($db, 'INSERT INTO `categories` (`id`, `name`,`SeoDescription`,`SeoKeywords`) VALUES (NULL,"'.$_POST['category'].'","","")');
      		echo " addcat ";
    }
}elseif($_POST['act']=='modCat'){
    if((trim($_POST['category'])=='')||(!validate_arab($_POST['category']))){
        if(trim($_POST['category'])==''){ echo " ec "; }elseif(!validate_arab($_POST['category'])){ echo " vc "; }
    }else{
        mysqli_query($db, 'UPDATE categories SET  name="'.$_POST['category'].'" where id ='.$_POST['id']);
      		echo " modcat ";
    }
}
?>