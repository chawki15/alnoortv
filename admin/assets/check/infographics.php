<?php
  session_start();
  require_once('../func.php');
  $pdo = connect_pdo();
  $act = $_POST['act'] ?? '';

  if($_POST['act']=='addInfographics'){
    if((trim($_POST['titleInfographic'])=='')||($_POST['photoInfographic'] == '')||($_POST['photoInfographic2'] == '')){
      if(trim($_POST['titleInfographic'])==''){ echo " en "; }
      if($_POST['photoInfographic'] == ''){echo " ph ";}
      if($_POST['photoInfographic2'] == ''){echo " ph2 ";}
    }else{
      $photos = $_POST['photoInfographic2'].'#'.$_POST['photoInfographic3'].'#'.$_POST['photoInfographic4'].'#'.$_POST['photoInfographic5'];
      $stmt = $pdo->prepare('INSERT INTO `caricature`(`id`, `id_pseudo`, `titre`, `photo`, `photos`, `nVues`, `date`) VALUES (Null,:id_pseudo,:titre,:photo,:photos,:nVues,:date)');
      $stmt->execute([
        ':id_pseudo' => GetIdUser($pdo),
        ':titre' => $_POST['titleInfographic'],
        ':photo' => $_POST['photoInfographic'],
        ':photos' => $photos,
        ':nVues' => rand(89, 568),
        ':date' => gmdate("Y/m/j H:i:s", time() + 3600*(1+date("I"))),
      ]);
       echo " addInfographic ";
    }
  }elseif($_POST['act']=='modInfographics'){
    if((trim($_POST['titleInfographic'])=='')||($_POST['photoInfographic'] == '')||($_POST['photoInfographic2'] == '')){
      if(trim($_POST['titleInfographic'])==''){ echo " en "; }
      if($_POST['photoInfographic'] == ''){echo " ph ";}
      if($_POST['photoInfographic2'] == ''){echo " ph2 ";}
    }else{
      $photos = $_POST['photoInfographic2'].'#'.$_POST['photoInfographic3'].'#'.$_POST['photoInfographic4'].'#'.$_POST['photoInfographic5'];
      $stmt = $pdo->prepare('UPDATE `caricature` SET `titre` = :titre, `photo` = :photo, `photos` = :photos, `nVues` = :nVues, `date` = :date WHERE `id` = :id');
      $stmt->execute([
        ':titre' => $_POST['titleInfographic'],
        ':photo' => $_POST['photoInfographic'],
        ':photos' => $photos,
        ':nVues' => rand(89, 568),
        ':date' => gmdate("Y/m/j H:i:s", time() + 3600*(1+date("I"))),
        ':id' => (int)$_POST['id']
      ]);
      echo " modInfographic ";
    }
  }elseif($_POST['act']=='deleteInfographics'){
    $id = $_POST['id'];
    $stmt = $pdo->prepare('DELETE FROM caricature WHERE id = :id');
    $stmt->execute([':id' => (int)$_POST['id']]);
  }
?>