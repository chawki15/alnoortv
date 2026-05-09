<?php
  session_start();
  require_once('../func.php');
  $pdo = connect();

if($_POST['act']=='seoCat'){
    if(((!validate_Text($_POST['keyWordSeo']))&&(trim($_POST['keyWordSeo'])!=''))||(trim($_POST['descSeo'])=='')||(!validate_Text($_POST['descSeo']))){
        if(trim($_POST['descSeo'])==''){ echo " des "; }elseif(!validate_Text($_POST['descSeo'])){ echo " vdes "; }
        if((!validate_Text($_POST['keyWordSeo']))&&(trim($_POST['keyWordSeo'])!='')){ echo " key "; }
    }else{
        mysqli_query($pdo, 'UPDATE categories SET SeoDescription="'.addslashes($_POST['descSeo']).'" , SeoKeywords="'.addslashes($_POST['keyWordSeo']).'" where id ='.$_POST['id']);
              echo " addSeo ";
              echo " ./afficherCat.php ";
    }
}elseif($_POST['act']=='seoSousCat'){
    if(((!validate_Text($_POST['keyWordSeo']))&&(trim($_POST['keyWordSeo'])!=''))||(trim($_POST['descSeo'])=='')||(!validate_Text($_POST['descSeo']))){
        if(trim($_POST['descSeo'])==''){ echo " des "; }elseif(!validate_Text($_POST['descSeo'])){ echo " vdes "; }
        if((!validate_Text($_POST['keyWordSeo']))&&(trim($_POST['keyWordSeo'])!='')){ echo " key "; }
    }else{
        mysqli_query($pdo, 'UPDATE sous_categories SET SeoDescription="'.addslashes($_POST['descSeo']).'" , SeoKeywords="'.addslashes($_POST['keyWordSeo']).'" where id ='.$_POST['id']);
              echo " addSeo ";
              echo " ./afficherSousCat.php ";
    }
}elseif($_POST['act']=='seoNews'){
    if(((!validate_Text($_POST['keyWordSeo']))&&(trim($_POST['keyWordSeo'])!=''))||(trim($_POST['descSeo'])=='')||(!validate_Text($_POST['descSeo']))){
        if(trim($_POST['descSeo'])==''){ echo " des "; }elseif(!validate_Text($_POST['descSeo'])){ echo " vdes "; }
        if((!validate_Text($_POST['keyWordSeo']))&&(trim($_POST['keyWordSeo'])!='')){ echo " key "; }
    }else{
        mysqli_query($pdo, 'UPDATE news SET SeoDescription="'.addslashes($_POST['descSeo']).'" , SeoKeywords="'.addslashes($_POST['keyWordSeo']).'" where id ='.$_POST['id']);
              echo " addSeo ";
              echo " ./afficherNews.php ";
    }
}elseif($_POST['act']=='seoDialogue'){
    if(((!validate_Text($_POST['keyWordSeo']))&&(trim($_POST['keyWordSeo'])!=''))||(trim($_POST['descSeo'])=='')||(!validate_Text($_POST['descSeo']))){
        if(trim($_POST['descSeo'])==''){ echo " des "; }elseif(!validate_Text($_POST['descSeo'])){ echo " vdes "; }
        if((!validate_Text($_POST['keyWordSeo']))&&(trim($_POST['keyWordSeo'])!='')){ echo " key "; }
    }else{
        mysqli_query($pdo, 'UPDATE news SET SeoDescription="'.addslashes($_POST['descSeo']).'" , SeoKeywords="'.addslashes($_POST['keyWordSeo']).'" where id ='.$_POST['id']);
              echo " addSeo ";
              echo " ./afficherDialogue.php ";
    }
}elseif($_POST['act']=='seoReportage'){
    if(((!validate_Text($_POST['keyWordSeo']))&&(trim($_POST['keyWordSeo'])!=''))||(trim($_POST['descSeo'])=='')||(!validate_Text($_POST['descSeo']))){
        if(trim($_POST['descSeo'])==''){ echo " des "; }elseif(!validate_Text($_POST['descSeo'])){ echo " vdes "; }
        if((!validate_Text($_POST['keyWordSeo']))&&(trim($_POST['keyWordSeo'])!='')){ echo " key "; }
    }else{
        mysqli_query($pdo, 'UPDATE news SET SeoDescription="'.addslashes($_POST['descSeo']).'" , SeoKeywords="'.addslashes($_POST['keyWordSeo']).'" where id ='.$_POST['id']);
              echo " addSeo ";
              echo " ./afficherReportage.php ";
    }
}
?>