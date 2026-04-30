<?php
session_start();
require_once('../func.php');
$db = connect();

  if($_POST['act']=='addNews'){
    if(($_POST['selectCategory'] == '')||(trim($_POST['titleNews'])=='')||(trim($_POST['auteur'])=='')||(!validate_arab($_POST['auteur']))||(trim($_POST['photoNews'])=='')||(trim($_POST['desc2'])=='')||((!validate_arab($_POST['descphoto2']))&&(trim($_POST['descphoto2'])!=''))||((trim($_POST['descphoto2'])!='')&&(trim($_POST['photoNews2'])==''))
    ||(trim($_POST['desc3'])!='')||((!validate_arab($_POST['descphoto3']))&&(trim($_POST['descphoto3'])!=''))||((trim($_POST['descphoto3'])!='')&&(trim($_POST['photoNews3'])==''))
    ||(trim($_POST['desc4'])!='')||((!validate_arab($_POST['descphoto4']))&&(trim($_POST['descphoto4'])!=''))||((trim($_POST['descphoto4'])!='')&&(trim($_POST['photoNews4'])==''))
    ||(trim($_POST['desc5'])!='')||((!validate_arab($_POST['descphoto5']))&&(trim($_POST['descphoto5'])!=''))||((trim($_POST['descphoto5'])!='')&&(trim($_POST['photoNews5'])==''))
    ||(trim($_POST['desc6'])!='')||((!validate_arab($_POST['descphoto6']))&&(trim($_POST['descphoto6'])!=''))||((trim($_POST['descphoto6'])!='')&&(trim($_POST['photoNews6'])==''))
    ){
      
      if($_POST['selectCategory'] == ''){echo " cl ";}
      if(trim($_POST['titleNews'])==''){ echo " enw "; }
      if((trim($_POST['photoNews'])=='')){ echo " enwph "; }
      if(trim($_POST['auteur'])==''){ echo " eAuteur "; }elseif(!validate_arab($_POST['auteur'])){ echo " vAuteur "; }
      

      if((!validate_arab($_POST['descphoto2']))&&(trim($_POST['descphoto2'])!='')){ echo " dscphoto2 "; }
      if((trim($_POST['descphoto2'])!='')&&(trim($_POST['photoNews2'])=='')){ echo " photonw2 "; }

      if((!validate_arab($_POST['descphoto3']))&&(trim($_POST['descphoto3'])!='')){ echo " dscphoto3 "; }
      if((trim($_POST['descphoto3'])!='')&&(trim($_POST['photoNews3'])=='')){ echo " photonw3 "; } 

     
      if((!validate_arab($_POST['descphoto4']))&&(trim($_POST['descphoto4'])!='')){ echo " dscphoto4 "; }
      if((trim($_POST['descphoto4'])!='')&&(trim($_POST['photoNews4'])=='')){ echo " photonw4 "; } 

     
      if((!validate_arab($_POST['descphoto5']))&&(trim($_POST['descphoto5'])!='')){ echo " dscphoto5 "; }
      if((trim($_POST['descphoto5'])!='')&&(trim($_POST['photoNews5'])=='')){ echo " photonw5 "; }
      if((!validate_arab($_POST['descphoto6']))&&(trim($_POST['descphoto6'])!='')){ echo " dscphoto6 "; }
      if((trim($_POST['descphoto6'])!='')&&(trim($_POST['photoNews6'])=='')){ echo " photonw6 "; }   

    }else{
        $description = $_POST['desc2'].'##'.$_POST['descphoto2'].'##'.$_POST['photoNews2'].'##'.$_POST['smpost2'];
        $description2 = $_POST['desc3'].'##'.$_POST['descphoto3'].'##'.$_POST['photoNews3'].'##'.$_POST['smpost3'];
        $description3 = $_POST['desc4'].'##'.$_POST['descphoto4'].'##'.$_POST['photoNews4'].'##'.$_POST['smpost4'];
        $description4 = $_POST['desc5'].'##'.$_POST['descphoto5'].'##'.$_POST['photoNews5'].'##'.$_POST['smpost5'];
        $description5 = $_POST['desc6'].'##'.$_POST['descphoto6'].'##'.$_POST['photoNews6'].'##'.$_POST['smpost6'];
        $dr= explode('#',$_POST['selectCategory']);
        mysqli_query($db, 'INSERT INTO `news`(`id`,`id_category`,`id_sousCategory`,`id_pseudo`,`auteur`,`titre`,`photo`,`description`,`description2`,`description3`,`description4`,`description5`,`urlVideo`,`SeoDescription`,`SeoKeywords`,`nVues`,`latestNews`,`mustajidaat`,`urgent`,`date`) VALUES 
        (NULL,"'.$dr[0].'","'.$dr[1].'","'.GetIdUser($db).'","'.addslashes($_POST['auteur']).'","'.addslashes($_POST['titleNews']).'","'.$_POST['photoNews'].'","'.addslashes($description).'","'.addslashes($description2).'","'.addslashes($description3).'","'.addslashes($description4).'","'.addslashes($description5).'","","","","'.rand(89, 568).'","'.$_POST['lastNews'].'","'.$_POST['mustajidaat'].'","'.$_POST['urgent'].'","'.gmdate("Y/m/j H:i:s", time() + 3600*(1+date("I"))).'")');
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
      
      mysqli_query($db, 'UPDATE news SET auteur="'.addslashes($_POST['auteur']).'" , id_category="'.$dr[0].'" , id_sousCategory="'.$dr[1].'" , titre="'.addslashes($_POST['titleNews']).'", photo="'.$_POST['photoNews'].'" , description="'.addslashes($description).'" , description2="'.addslashes($description2).'" , description3="'.addslashes($description3).'" , description4="'.addslashes($description4).'" , description5="'.addslashes($description5).'" , latestNews="'.$_POST['lastNews'].'", mustajidaat="'.$_POST['mustajidaat'].'", urgent="'.$_POST['urgent'].'"  where id ='.$_POST['id']);
      		echo " modNews ";
    }
}elseif($_POST['act']=='deleteNews'){
  $id = $_POST['id'];
  mysqli_query($db, 'DELETE FROM news WHERE id = "'.$id.'"');

}

  ?>