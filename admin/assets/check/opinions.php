<?php
session_start();
require_once('../func.php');
$db = connect();

if($_POST['act']=='addWriter'){
    if((trim($_POST['nom'])=='')||($_POST['photo'] == '')){
        if(trim($_POST['nom'])==''){ echo " en "; }
        if($_POST['photo'] == ''){echo " ph ";}
    }else{
        mysqli_query($db, 'INSERT INTO `writers`(`id`,`id_pseudo`, `nom`, `photo`) VALUES (Null,"'.GetIdUser($db).'","'.$_POST['nom'].'","'.$_POST['photo'].'")');
      		echo " addWriter ";
    }
}elseif($_POST['act']=='modWriter'){
    if((trim($_POST['nom'])=='')||($_POST['photo'] == '')){
        if(trim($_POST['nom'])==''){ echo " en "; }
        if($_POST['photo'] == ''){echo " ph ";}
    }else{
        mysqli_query($db, 'UPDATE writers SET  nom="'.$_POST['nom'].'" , photo="'.$_POST['photo'].'" where id ='.$_POST['id']);
      		echo " modWriter ";
    }
}elseif($_POST['act']=='addOpinions'){
    if((trim($_POST['title'])=='')||($_POST['selectNom'] == '')||(trim($_POST['desc'])=='')){
        if(trim($_POST['title'])==''){ echo " et "; }
        if($_POST['selectNom'] == ''){echo " cl ";}
        if(trim($_POST['desc'])==''){ echo " ed "; }
    }else{
        mysqli_query($db, 'INSERT INTO `opinion`(`id`, `id_writer`, `id_pseudo`, `titre`, `description`, `date`) VALUES (NULL,"'.$_POST['selectNom'].'","'.GetIdUser($db).'","'.addslashes($_POST['title']).'","'.addslashes($_POST['desc']).'","'.gmdate("Y/m/j H:i:s", time() + 3600*(1+date("I"))).'")');
      		echo " addOpinions ";
    }
}elseif($_POST['act']=='modOpinions'){
    if((trim($_POST['title'])=='')||($_POST['selectNom'] == '')||(trim($_POST['desc'])=='')||(!validate_desarab($_POST['desc']))){
        if(trim($_POST['title'])==''){ echo " et "; }
        if($_POST['selectNom'] == ''){echo " cl ";}
        if(trim($_POST['desc'])==''){ echo " ed "; }elseif(!validate_desarab($_POST['desc'])){ echo " vd "; }
    }else{
        mysqli_query($db, 'UPDATE opinion SET  id_writer="'.$_POST['selectNom'].'" , titre="'.addslashes($_POST['title']).'", description="'.addslashes($_POST['desc']).'"  where id ='.$_POST['id']);
        echo " addOpinions ";
    }
}elseif($_POST['act']=='deleteOpinions'){
    $id = $_POST['id'];
    mysqli_query($db, 'DELETE FROM opinion WHERE id = "'.$id.'"');
}elseif($_POST['act']=='deleteWriter'){
    $id = $_POST['id'];
    mysqli_query($db, 'DELETE FROM writers WHERE id = "'.$id.'"');
}

?>