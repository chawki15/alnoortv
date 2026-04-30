<?php
session_start();
require_once('../func.php');
$db = connect();

if($_POST['act']=='addSousCat'){
    if((trim($_POST['sousCategory'])=='')||(!validate_arab($_POST['sousCategory']))||($_POST['selectCategory'] == '')){
        if(trim($_POST['sousCategory'])==''){ echo " ec "; }elseif(!validate_arab($_POST['sousCategory'])){ echo " vc "; }
        if($_POST['selectCategory'] == ''){echo " cl ";}
    }else{
        mysqli_query($db, 'INSERT INTO `sous_categories` (`id`, `id_category`, `name`,`SeoDescription`,`SeoKeywords`) VALUES (NULL,"'.$_POST['selectCategory'].'" ,"'.$_POST['sousCategory'].'","","")');
      		echo " addSouscat ";
    }
}elseif($_POST['act']=='modSousCat'){
    if((trim($_POST['sousCategory'])=='')||(!validate_arab($_POST['sousCategory']))||($_POST['selectCategory'] == '')){
        if(trim($_POST['sousCategory'])==''){ echo " ec "; }elseif(!validate_arab($_POST['sousCategory'])){ echo " vc "; }
        if($_POST['selectCategory'] == ''){echo " cl ";}
    }else{
        mysqli_query($db, 'UPDATE sous_categories SET  id_category="'.$_POST['selectCategory'].'" , name="'.$_POST['sousCategory'].'" where id ='.$_POST['id']);
      		echo " modSouscat ";
    }
}

?>