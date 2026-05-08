<?php
  session_start();
  require_once('assets/func.php');
  $db = connect_pdo();

if(Get_current_page() != 'login.php'){
    if(!isset($_SESSION['admin_id']))
    {
        die('<meta http-equiv="refresh" content="0; url=login.php">');
    }
}else{
    if(isset($_SESSION['admin_id']))
    {
       die('<meta http-equiv="refresh" content="0; url=./">');
    }
}

if(isset($_SESSION['admin_id'])){
  $d1 = get_admin_by_id($db, (int)$_SESSION['admin_id']);
} 

if(curPageName()=='modCat.php'){
  $name = GetTableByID($db,'categories','name',$_GET['u']);
}

if(curPageName()=='modSouscat.php'){
  $cat = GetTableByID($db,'sous_categories','id_category',$_GET['u']);
  $nom = GetTableByID($db,'sous_categories','name',$_GET['u']);
}

if(curPageName()=='modNews.php'){
  $titre = GetTableByID($db,'news','titre',$_GET['u']);
    $cat = GetTableByID($db,'news','id_category',$_GET['u']);
    $souscat = GetTableByID($db,'news','id_sousCategory',$_GET['u']);
    $latestNews	 = GetTableByID($db,'news','latestNews',$_GET['u']);
    $urgent = GetTableByID($db,'news','urgent',$_GET['u']);
    $mustajidaat = GetTableByID($db,'news','mustajidaat',$_GET['u']);
    $photo = GetTableByID($db,'news','photo',$_GET['u']);
    $auteur =  GetTableByID($db,'news','auteur',$_GET['u']);
    $descrition = explode('##',GetTableByID($db,'news','description',$_GET['u']));
    $des1 = $descrition[0]; $photo1 = $descrition[2]; $titrephoto1 = $descrition[1]; $social1 = $descrition[3];
    $descrition2 = explode('##',GetTableByID($db,'news','description2',$_GET['u']));
    $des2 = $descrition2[0]; $photo2 = $descrition2[2]; $titrephoto2 = $descrition2[1]; $social2 = $descrition2[3];
    $descrition3 = explode('##',GetTableByID($db,'news','description3',$_GET['u']));
    $des3 = $descrition3[0]; $photo3 = $descrition3[2]; $titrephoto3 = $descrition3[1]; $social3 = $descrition3[3];
    $descrition4 = explode('##',GetTableByID($db,'news','description4',$_GET['u']));
    $des4 = $descrition4[0]; $photo4 = $descrition4[2]; $titrephoto4 = $descrition4[1]; $social4 = $descrition4[3];
    $descrition5 = explode('##',GetTableByID($db,'news','description5',$_GET['u']));
    $des5 = $descrition5[0]; $photo5 = $descrition5[2]; $titrephoto5 = $descrition5[1]; $social5 = $descrition5[3];
}

if(curPageName()=='modVideo.php'){
  $titre = GetTableByID($db,'news','titre',$_GET['u']);
  $cat = GetTableByID($db,'news','id_category',$_GET['u']);
  $souscat = GetTableByID($db,'news','id_sousCategory',$_GET['u']);
  $photo = GetTableByID($db,'news','photo',$_GET['u']);
  $descrition = explode('##',GetTableByID($db,'news','description',$_GET['u']));
  $des = $descrition[0];
  $url =  GetTableByID($db,'news','urlVideo',$_GET['u']);
}

if(curPageName()=='modWriter.php'){
  $nom = GetTableByID($db,'writers','nom',$_GET['u']);
  $photo = GetTableByID($db,'writers','photo',$_GET['u']);
}

if(curPageName()=='modOpinion.php'){
  $nomW = GetTableByID($db,'opinion','id_writer',$_GET['u']);
  $titre = GetTableByID($db,'opinion','titre',$_GET['u']);
  $description = GetTableByID($db,'opinion','description',$_GET['u']);
}

if(curPageName()=='modInInfo.php'){
  $titre = GetTableByID($db,'caricature','titre',$_GET['u']);
  $photo = '../assets/img/infographics/'.GetTableByID($db,'caricature','photo',$_GET['u']);
}

//  if(loggedAdmin($db)){header("Location:index.php");}
if(curPageName()=='seo.php'){
  if($_GET['v'] =='cat'){
    $titre = GetTableByID($db,'categories','name',$_GET['s']);
    $keyWordSeo = GetTableByID($db,'categories','SeoKeywords',$_GET['s']);
    $descSeo = GetTableByID($db,'categories','SeoDescription',$_GET['s']);
    $cat ='seoCat';
  }

  if($_GET['v'] =='souscat'){
    $titre = GetTableByID($db,'sous_categories','name',$_GET['s']);
    $keyWordSeo = GetTableByID($db,'sous_categories','SeoKeywords',$_GET['s']);
    $descSeo = GetTableByID($db,'sous_categories','SeoDescription',$_GET['s']);
    $cat ='seoSousCat';
  }

  if($_GET['v'] =='news'){
    $titre = GetTableByID($db,'news','titre',$_GET['s']);
    $keyWordSeo = GetTableByID($db,'news','SeoKeywords',$_GET['s']);
    $descSeo = GetTableByID($db,'news','SeoDescription',$_GET['s']);
    $cat ='seoNews';
  }

}


?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="rtl">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <title>Panel MtvPlus.ma</title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700"
  rel="stylesheet">
  <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css"
  rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
  <link rel="stylesheet" type="text/css" href="assets/css-rtl/vendors.css">
  <link rel="stylesheet" type="text/css" href="assets/css-rtl/app.css">
  <link rel="stylesheet" type="text/css" href="assets/css-rtl/core/menu/menu-types/vertical-menu.css">
  <link rel="stylesheet" type="text/css" href="assets/css-rtl/core/colors/palette-gradient.css">
<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css'>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <link rel="stylesheet" href="style.css">
  <style>
   .description #wn-1 {
  display: none;
}
#progress-wrp,#progress-wrp2,#progress-wrp3,#progress-wrp4,#progress-wrp5,#progress-wrp6,#progress-wrp7,#progress-wrp8,#progress-wrp9,#progress-wrp10 {border: 1px solid #0099CC;display: none;padding: 1px;position: relative;border-radius: 3px;
  margin: 41px 10px 12px 10px;text-align: left;background: #fff;box-shadow: inset 1px 3px 6px rgba(0, 0, 0, 0.12);}
#progress-wrp .progress-bar,#progress-wrp2 .progress-bar2,#progress-wrp3 .progress-bar3,#progress-wrp4 .progress-bar4,#progress-wrp5 .progress-bar5,#progress-wrp6 .progress-bar6,#progress-wrp7 .progress-bar7,#progress-wrp8 .progress-bar8,#progress-wrp9 .progress-bar9,#progress-wrp10 .progress-bar10{height: 17px;border-radius: 3px;background-color: #007bff;width: 0;box-shadow: inset 1px 1px 10px rgba(0, 0, 0, 0.11);}
#progress-wrp .status,#progress-wrp2 .status2,#progress-wrp3 .status3,#progress-wrp4 .status4,#progress-wrp5 .status5,#progress-wrp6 .status6,#progress-wrp7 .status7,#progress-wrp8 .status8,#progress-wrp9 .status9,#progress-wrp10 .status10{    top: -2px;
    left: 33%;
    position: absolute;
    display: inline-block;
    font-size: 12px;
    font-weight: bold;
    color: #000000;}


    .btn-add a{
      color: #fff !important;
    font-weight: bold;
    }

    .radio-inline {
  display: inline-block;
  position: relative;
  padding: 0 6px;
}

.radio-inline input[type='radio'] {
  display: none;
}
.radio-inline{padding-left:0;margin-bottom:0}
.radio-inline+.radio-inline{margin-left:22px}
.radio-inline label{font-weight:500;font-size:14px;margin-bottom:0}
.radio-inline label:before{content:"";width:18px;height:18px;border:2px solid #cfcfcf;display:inline-block;border-radius:50%;margin-right:9px;vertical-align:middle}
.radio-inline input{opacity:0;visibility:hidden}
.radio-inline input:checked~label:before{border-color:#1b2633;background:#1b2633;box-shadow:inset 0 0 0 4px #fff}


#principale2{
    clear: both;
    color: #2d3c4d;
    width: 107px;
    text-align: center;
    position: absolute;
    font-size: 8pt;
    font-style: italic;
    margin-top: -120px;
}
#wn1,#whiteMax1,#taille1,#wn2,#whiteMax2,#taille2,#wn3,#whiteMax3,#taille3,#wn4,#whiteMax4,#taille4,#wn5,#whiteMax5,#taille5,#wn6,#whiteMax6,#taille6,#wn7,#whiteMax7,#taille7,#wn8,#whiteMax8,#taille8,#wn9,#whiteMax9,#taille9,#wn10,#whiteMax10,#taille10{
  display: none;
    clear: both;
    color: red;
    width: 107px;
    text-align: center;
    position: absolute;
    font-size: 8pt;
    font-style: italic;
    margin-top: -120px;
}


  </style>
</head>
