<?php
  session_start();
  require_once('../func.php');
  $db = connect();

  if($_POST['act']=='addInfographics'){
    if((trim($_POST['titleInfographic'])=='')||($_POST['photoInfographic'] == '')||($_POST['photoInfographic2'] == '')){
      if(trim($_POST['titleInfographic'])==''){ echo " en "; }
      if($_POST['photoInfographic'] == ''){echo " ph ";}
      if($_POST['photoInfographic2'] == ''){echo " ph2 ";}
    }else{
      $photos = $_POST['photoInfographic2'].'#'.$_POST['photoInfographic3'].'#'.$_POST['photoInfographic4'].'#'.$_POST['photoInfographic5'];
      mysqli_query($db, 'INSERT INTO `caricature`(`id`, `id_pseudo`, `titre`, `photo`, `photos`, `nVues`, `date`) VALUES (Null,"'.GetIdUser($db).'","'.$_POST['titleInfographic'].'","'.$_POST['photoInfographic'].'","'.$photos.'","'.rand(89, 568).'","'.gmdate("Y/m/j H:i:s", time() + 3600*(1+date("I"))).'")');
      echo " addInfographic ";
    }
  }elseif($_POST['act']=='modInfographics'){
    if((trim($_POST['titleInfographic'])=='')||($_POST['photoInfographic'] == '')||($_POST['photoInfographic2'] == '')){
      if(trim($_POST['titleInfographic'])==''){ echo " en "; }
      if($_POST['photoInfographic'] == ''){echo " ph ";}
      if($_POST['photoInfographic2'] == ''){echo " ph2 ";}
    }else{
      $photos = $_POST['photoInfographic2'].'#'.$_POST['photoInfographic3'].'#'.$_POST['photoInfographic4'].'#'.$_POST['photoInfographic5'];
      mysqli_query($db, 'INSERT INTO `caricature`(`id`, `titre`, `photo`, `photos`, `nVues`, `date`) VALUES (Null,"'.$_POST['titleInfographic'].'","'.$_POST['photoInfographic'].'","'.$photos.'","'.rand(89, 568).'","'.gmdate("Y/m/j H:i:s", time() + 3600*(1+date("I"))).'")');
      echo " modInfographic ";
    }
  }elseif($_POST['act']=='deleteInfographics'){
    $id = $_POST['id'];
    mysqli_query($db, 'DELETE FROM caricature WHERE id = "'.$id.'"');
  }
?>