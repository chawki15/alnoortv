<?php
  session_start();
  require_once('../func.php');
  $pdo = connect();

  if($_POST['act']=='addVideo'){
    if(($_POST['selectCategory'] == '')||(trim($_POST['titleVideo'])=='')||(trim($_POST['utlVideo'])=='')||($_POST['photo'] == '')||(!valide_url($_POST['utlVideo']))){
        if($_POST['selectCategory'] == ''){echo " cl ";}
        if(trim($_POST['titleVideo'])==''){ echo " et "; }
        if(trim($_POST['utlVideo'])==''){ echo " eu "; }elseif(!valide_url($_POST['utlVideo'])){ echo " vu "; }
        if($_POST['photo'] == ''){echo " ph ";}
    }else{
        $description = $_POST['desc'].'####';
        $dr= explode('#',$_POST['selectCategory']);
        mysqli_query($pdo, 'INSERT INTO `news`(`id`,`id_category`,`id_sousCategory`,`id_pseudo`,`auteur`,`titre`,`photo`,`description`,`description2`,`description3`,`description4`,`description5`,`urlVideo`,`SeoDescription`,`SeoKeywords`,`nVues`,`latestNews`,`mustajidaat`,`urgent`,`date`) VALUES 
        (NULL,"'.$dr[0].'","'.$dr[1].'","'.GetIdUser($pdo).'","","'.addslashes($_POST['titleVideo']).'","'.$_POST['photo'].'","'.addslashes($description).'","","","","","'.$_POST['utlVideo'].'","","","'.rand(89, 568).'","","","","'.gmdate("Y/m/j H:i:s", time() + 3600*(1+date("I"))).'")');
          echo " addVideo ";
    }
  }elseif($_POST['act']=='modVideo'){
    if(($_POST['selectCategory'] == '')||(trim($_POST['titleVideo'])=='')||(trim($_POST['url'])=='')||($_POST['photo'] == '')||(!valide_url($_POST['url']))){
      if($_POST['selectCategory'] == ''){echo " cl ";}
      if(trim($_POST['titleVideo'])==''){ echo " et "; }
      if(trim($_POST['url'])==''){ echo " eu "; }elseif(!valide_url($_POST['url'])){ echo " vu "; }
      if($_POST['photo'] == ''){echo " ph ";}
    }else{
        $description = $_POST['desc'].'####';
        $dr= explode('#',$_POST['selectCategory']);
        $url = $_POST["url"]; 

        mysqli_query($pdo, 'UPDATE news SET id_category="'.$dr[0].'" , id_sousCategory="'.$dr[1].'" , titre="'.addslashes($_POST['titleVideo']).'", photo="'.$_POST['photo'].'" , description="'.addslashes($description).'" , urlVideo="'.$url.'"  where id ='.$_POST['id']);
        echo " modVideo ";
    }
  
  }elseif($_POST['act']=='deleteVideo'){
    $id = $_POST['id'];
    mysqli_query($pdo, 'DELETE FROM news WHERE id = "'.$id.'"');
  
  }
?>