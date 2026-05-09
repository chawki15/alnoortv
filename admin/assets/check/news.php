<?php
session_start();
require_once('../func.php');
$pdo = connect_pdo();
try {
  $normalizeEditorText = function ($value) {
    $value = (string)$value;
    $value = str_replace(['&nbsp;', '\xc2\xa0'], ' ', $value);
    $value = strip_tags($value);
    return trim($value);
  };

  $desc2_clean = $normalizeEditorText($_POST['desc2'] ?? '');
  $desc3_clean = $normalizeEditorText($_POST['desc3'] ?? '');
  $desc4_clean = $normalizeEditorText($_POST['desc4'] ?? '');
  $desc5_clean = $normalizeEditorText($_POST['desc5'] ?? '');
  $desc6_clean = $normalizeEditorText($_POST['desc6'] ?? '');

  if($_POST['act']=='addNews'){
    if(($_POST['selectCategory'] == '')||(trim($_POST['titleNews'])=='')||(trim($_POST['auteur'])=='')||(!validate_arab($_POST['auteur']))||(trim($_POST['photoNews'])=='')||($desc2_clean=='')||(!validate_desarab($desc2_clean))||((!validate_arab($_POST['descphoto2']))&&(trim($_POST['descphoto2'])!=''))||((trim($_POST['descphoto2'])!='')&&(trim($_POST['photoNews2'])==''))
    ||((!validate_desarab($desc3_clean))&&($desc3_clean!=''))||((!validate_arab($_POST['descphoto3']))&&(trim($_POST['descphoto3'])!=''))||((trim($_POST['descphoto3'])!='')&&(trim($_POST['photoNews3'])==''))
    ||((!validate_desarab($desc4_clean))&&($desc4_clean!=''))||((!validate_arab($_POST['descphoto4']))&&(trim($_POST['descphoto4'])!=''))||((trim($_POST['descphoto4'])!='')&&(trim($_POST['photoNews4'])==''))
    ||((!validate_desarab($desc5_clean))&&($desc5_clean!=''))||((!validate_arab($_POST['descphoto5']))&&(trim($_POST['descphoto5'])!=''))||((trim($_POST['descphoto5'])!='')&&(trim($_POST['photoNews5'])==''))
    ||((!validate_desarab($desc6_clean))&&($desc6_clean!=''))||((!validate_arab($_POST['descphoto6']))&&(trim($_POST['descphoto6'])!=''))||((trim($_POST['descphoto6'])!='')&&(trim($_POST['photoNews6'])=='')) )
    {
      
      if($_POST['selectCategory'] == ''){echo " cl ";}
      if(trim($_POST['titleNews'])==''){ echo " enw "; }
      if((trim($_POST['photoNews'])=='')){ echo " enwph "; }
      if(trim($_POST['auteur'])==''){ echo " eAuteur "; }elseif(!validate_arab($_POST['auteur'])){ echo " vAuteur "; }
      if($desc2_clean==''){ echo " edes2 "; }elseif(!validate_desarab($desc2_clean)){ echo " vdes2 "; }

      if((!validate_arab($_POST['descphoto2']))&&(trim($_POST['descphoto2'])!='')){ echo " dscphoto2 "; }
      if((trim($_POST['descphoto2'])!='')&&(trim($_POST['photoNews2'])=='')){ echo " photonw2 "; }

       if((!validate_desarab($desc3_clean))&&($desc3_clean!='')){ echo " vdes3 "; }
      if((!validate_arab($_POST['descphoto3']))&&(trim($_POST['descphoto3'])!='')){ echo " dscphoto3 "; }
      if((trim($_POST['descphoto3'])!='')&&(trim($_POST['photoNews3'])=='')){ echo " photonw3 "; } 

      if((!validate_desarab($desc4_clean))&&($desc4_clean!='')){ echo " vdes4 "; }
      if((!validate_arab($_POST['descphoto4']))&&(trim($_POST['descphoto4'])!='')){ echo " dscphoto4 "; }
      if((trim($_POST['descphoto4'])!='')&&(trim($_POST['photoNews4'])=='')){ echo " photonw4 "; } 

      if((!validate_desarab($desc5_clean))&&($desc5_clean!='')){ echo " vdes5 "; }
      if((!validate_arab($_POST['descphoto5']))&&(trim($_POST['descphoto5'])!='')){ echo " dscphoto5 "; }
      if((trim($_POST['descphoto5'])!='')&&(trim($_POST['photoNews5'])=='')){ echo " photonw5 "; }
      
      if((!validate_desarab($desc6_clean))&&($desc6_clean!='')){ echo " vdes6 "; }
      if((!validate_arab($_POST['descphoto6']))&&(trim($_POST['descphoto6'])!='')){ echo " dscphoto6 "; }
      if((trim($_POST['descphoto6'])!='')&&(trim($_POST['photoNews6'])=='')){ echo " photonw6 "; }   

    }else{
        $description = $_POST['desc2'].'##'.$_POST['descphoto2'].'##'.$_POST['photoNews2'].'##'.$_POST['smpost2'];
        $description2 = $_POST['desc3'].'##'.$_POST['descphoto3'].'##'.$_POST['photoNews3'].'##'.$_POST['smpost3'];
        $description3 = $_POST['desc4'].'##'.$_POST['descphoto4'].'##'.$_POST['photoNews4'].'##'.$_POST['smpost4'];
        $description4 = $_POST['desc5'].'##'.$_POST['descphoto5'].'##'.$_POST['photoNews5'].'##'.$_POST['smpost5'];
        $description5 = $_POST['desc6'].'##'.$_POST['descphoto6'].'##'.$_POST['photoNews6'].'##'.$_POST['smpost6'];
        $dr= explode('#',$_POST['selectCategory']);
      $stmt = $pdo->prepare('INSERT INTO news(id,id_category,id_sousCategory,id_pseudo,auteur,titre,photo,description,description2,description3,description4,description5,urlVideo,SeoDescription,SeoKeywords,nVues,latestNews,mustajidaat,urgent,date) VALUES (NULL,:id_category,:id_sousCategory,:id_pseudo,:auteur,:titre,:photo,:description,:description2,:description3,:description4,:description5,"","","",:nVues,:latestNews,:mustajidaat,:urgent,:date_now)');
        $stmt->execute([
          ':id_category' => (int)$dr[0],
          ':id_sousCategory' => (int)($dr[1] ?? 0),
          ':id_pseudo' => (int)GetIdUser($pdo),
          ':auteur' => trim($_POST['auteur']),
          ':titre' => trim($_POST['titleNews']),
          ':photo' => trim($_POST['photoNews']),
          ':description' => $description,
          ':description2' => $description2,
          ':description3' => $description3,
          ':description4' => $description4,
          ':description5' => $description5,
          ':nVues' => rand(89, 568),
          ':latestNews' => (int)$_POST['lastNews'],
          ':mustajidaat' => (int)$_POST['mustajidaat'],
          ':urgent' => (int)$_POST['urgent'],
          ':date_now' => gmdate("Y/m/j H:i:s", time() + 3600*(1+date("I"))),
        ]);
        echo " addNews ";
    }
}elseif($_POST['act']=='modNews'){
    if(($_POST['selectCategory'] == '')||(trim($_POST['titleNews'])=='')||(trim($_POST['auteur'])=='')||(!validate_arab($_POST['auteur']))||(trim($_POST['photoNews'])=='')||(trim($_POST['desc2'])=='')||(!validate_desarab($_POST['desc2']))
    ||((!validate_arab($_POST['descphoto2']))&&(trim($_POST['descphoto2'])!=''))||((trim($_POST['descphoto2'])!='')&&(trim($_POST['photoNews2'])==''))
    ||((!validate_desarab($_POST['desc3']))&&(trim($_POST['desc3'])!=''))||((!validate_arab($_POST['descphoto3']))&&(trim($_POST['descphoto3'])!=''))||((trim($_POST['descphoto3'])!='')&&(trim($_POST['photoNews3'])==''))
    ||((!validate_desarab($_POST['desc4']))&&(trim($_POST['desc4'])!=''))||((!validate_arab($_POST['descphoto4']))&&(trim($_POST['descphoto4'])!=''))||((trim($_POST['descphoto4'])!='')&&(trim($_POST['photoNews4'])==''))
    ||((!validate_desarab($_POST['desc5']))&&(trim($_POST['desc5'])!=''))||((!validate_arab($_POST['descphoto5']))&&(trim($_POST['descphoto5'])!=''))||((trim($_POST['descphoto5'])!='')&&(trim($_POST['photoNews5'])==''))
    ||((!validate_desarab($_POST['desc6']))&&(trim($_POST['desc6'])!=''))||((!validate_arab($_POST['descphoto6']))&&(trim($_POST['descphoto6'])!=''))||((trim($_POST['descphoto6'])!='')&&(trim($_POST['photoNews6'])==''))
    ){
      
      if($_POST['selectCategory'] == ''){echo " cl ";}
      if(trim($_POST['titleNews'])==''){ echo " enw "; }
      if((trim($_POST['photoNews'])=='')){ echo " enwph "; }
      if(trim($_POST['auteur'])==''){ echo " eAuteur "; }elseif(!validate_arab($_POST['auteur'])){ echo " vAuteur "; }
      if(trim($_POST['desc2'])==''){ echo " edes2 "; }elseif(!validate_desarab($_POST['desc2'])){ echo " vdes2 "; }

      if((!validate_arab($_POST['descphoto2']))&&(trim($_POST['descphoto2'])!='')){ echo " dscphoto2 "; }
      if((trim($_POST['descphoto2'])!='')&&(trim($_POST['photoNews2'])=='')){ echo " photonw2 "; }

      if((!validate_desarab($_POST['desc3']))&&(trim($_POST['desc3'])!='')){ echo " vdes3 "; }
      if((!validate_arab($_POST['descphoto3']))&&(trim($_POST['descphoto3'])!='')){ echo " dscphoto3 "; }
      if((trim($_POST['descphoto3'])!='')&&(trim($_POST['photoNews3'])=='')){ echo " photonw3 "; } 

      if((!validate_desarab($_POST['desc4']))&&(trim($_POST['desc4'])!='')){ echo " vdes4 "; }
      if((!validate_arab($_POST['descphoto4']))&&(trim($_POST['descphoto4'])!='')){ echo " dscphoto4 "; }
      if((trim($_POST['descphoto4'])!='')&&(trim($_POST['photoNews4'])=='')){ echo " photonw4 "; } 

      if((!validate_desarab($_POST['desc5']))&&(trim($_POST['desc5'])!='')){ echo " vdes5 "; }
      if((!validate_arab($_POST['descphoto5']))&&(trim($_POST['descphoto5'])!='')){ echo " dscphoto5 "; }
      if((trim($_POST['descphoto5'])!='')&&(trim($_POST['photoNews5'])=='')){ echo " photonw5 "; } 

      if((!validate_desarab($_POST['desc6']))&&(trim($_POST['desc6'])!='')){ echo " vdes6 "; }
      if((!validate_arab($_POST['descphoto6']))&&(trim($_POST['descphoto6'])!='')){ echo " dscphoto6 "; }
      if((trim($_POST['descphoto6'])!='')&&(trim($_POST['photoNews6'])=='')){ echo " photonw6 "; }  

    }else{
      $description = $_POST['desc2'].'##'.$_POST['descphoto2'].'##'.$_POST['photoNews2'].'##'.$_POST['smpost2'];
        $description2 = $_POST['desc3'].'##'.$_POST['descphoto3'].'##'.$_POST['photoNews3'].'##'.$_POST['smpost3'];
        $description3 = $_POST['desc4'].'##'.$_POST['descphoto4'].'##'.$_POST['photoNews4'].'##'.$_POST['smpost4'];
        $description4 = $_POST['desc5'].'##'.$_POST['descphoto5'].'##'.$_POST['photoNews5'].'##'.$_POST['smpost5'];
        $description5 = $_POST['desc6'].'##'.$_POST['descphoto6'].'##'.$_POST['photoNews6'].'##'.$_POST['smpost6'];
      $dr= explode('#',$_POST['selectCategory']);
      
      $stmt = $pdo->prepare('UPDATE news SET auteur=:auteur,id_category=:id_category,id_sousCategory=:id_sousCategory,titre=:titre,photo=:photo,description=:description,description2=:description2,description3=:description3,description4=:description4,description5=:description5,latestNews=:latestNews,mustajidaat=:mustajidaat,urgent=:urgent WHERE id=:id');
      $stmt->execute([
        ':auteur' => trim($_POST['auteur']),
        ':id_category' => (int)$dr[0],
        ':id_sousCategory' => (int)($dr[1] ?? 0),
        ':titre' => trim($_POST['titleNews']),
        ':photo' => trim($_POST['photoNews']),
        ':description' => $description,
        ':description2' => $description2,
        ':description3' => $description3,
        ':description4' => $description4,
        ':description5' => $description5,
        ':latestNews' => (int)$_POST['lastNews'],
        ':mustajidaat' => (int)$_POST['mustajidaat'],
        ':urgent' => (int)$_POST['urgent'],
        ':id' => (int)$_POST['id'],
      ]);
        echo " modNews ";
    }
}elseif($_POST['act']=='deleteNews'){
  $id = isset($_POST['id']) ? (int)$_POST['id'] : 0;
  if($id > 0){
    $stmt = $pdo->prepare('DELETE FROM news WHERE id = :id');
    $stmt->execute([':id' => $id]);
  }
}
} catch (Throwable $e) {
  echo ' server_error ';
}
?>