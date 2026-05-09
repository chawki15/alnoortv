<?php
  session_start();
  require_once('../func.php');
  $pdo = connect_pdo();
  $act = $_POST['act'] ?? '';

  if($act=='addVideo'){
    if((($_POST['selectCategory'] ?? '') == '')||(trim($_POST['titleVideo'] ?? '')=='')||(trim($_POST['utlVideo'] ?? '')=='')||(($_POST['photo'] ?? '') == '')||(!valide_url($_POST['utlVideo'] ?? ''))){
        if(($_POST['selectCategory'] ?? '') == ''){echo " cl ";}
        if(trim($_POST['titleVideo'] ?? '')==''){ echo " et "; }
        if(trim($_POST['utlVideo'] ?? '')==''){ echo " eu "; }elseif(!valide_url($_POST['utlVideo'] ?? '')){ echo " vu "; }
        if(($_POST['photo'] ?? '') == ''){echo " ph ";}
    }else{
        $description = ($_POST['desc'] ?? '').'####';
        $dr= explode('#',$_POST['selectCategory']);
        $stmt = $pdo->prepare('INSERT INTO news(id,id_category,id_sousCategory,id_pseudo,auteur,titre,photo,description,description2,description3,description4,description5,urlVideo,SeoDescription,SeoKeywords,nVues,latestNews,mustajidaat,urgent,date) VALUES (NULL,:id_category,:id_sousCategory,:id_pseudo,"",:titre,:photo,:description,"","","","",:urlVideo,"","",:nVues,"","","",:date_now)');
        $stmt->execute([':id_category' => (int)$dr[0], ':id_sousCategory' => (int)($dr[1] ?? 0), ':id_pseudo' => (int)GetIdUser($pdo), ':titre' => $_POST['titleVideo'], ':photo' => $_POST['photo'], ':description' => $description, ':urlVideo' => $_POST['utlVideo'], ':nVues' => rand(89, 568), ':date_now' => gmdate("Y/m/j H:i:s", time() + 3600*(1+date("I")))]);
        echo " addVideo ";
    }
  }elseif($act=='modVideo'){
    if((($_POST['selectCategory'] ?? '') == '')||(trim($_POST['titleVideo'] ?? '')=='')||(trim($_POST['url'] ?? '')=='')||(($_POST['photo'] ?? '') == '')||(!valide_url($_POST['url'] ?? ''))||(!validate_numeric((string)($_POST['id'] ?? '')))){
      if(($_POST['selectCategory'] ?? '') == ''){echo " cl ";}
      if(trim($_POST['titleVideo'] ?? '')==''){ echo " et "; }
      if(trim($_POST['url'] ?? '')==''){ echo " eu "; }elseif(!valide_url($_POST['url'] ?? '')){ echo " vu "; }
      if(($_POST['photo'] ?? '') == ''){echo " ph ";}
      if(!validate_numeric((string)($_POST['id'] ?? ''))){ echo " id "; }
    }else{
        $description = ($_POST['desc'] ?? '').'####';
        $dr= explode('#',$_POST['selectCategory']);
        $url = $_POST["url"]; 

        $stmt = $pdo->prepare('UPDATE news SET id_category = :id_category, id_sousCategory = :id_sousCategory, titre = :titre, photo = :photo, description = :description, urlVideo = :urlVideo WHERE id = :id');
        $stmt->execute([':id_category' => (int)$dr[0], ':id_sousCategory' => (int)($dr[1] ?? 0), ':titre' => $_POST['titleVideo'], ':photo' => $_POST['photo'], ':description' => $description, ':urlVideo' => $url, ':id' => (int)$_POST['id']]);
        echo " modVideo ";
    }
  
  }elseif($act=='deleteVideo'){
    if(!validate_numeric((string)($_POST['id'] ?? ''))){ echo " id "; exit; }
    $stmt = $pdo->prepare('DELETE FROM news WHERE id = :id');
    $stmt->execute([':id' => (int)$_POST['id']]);
  }
?>