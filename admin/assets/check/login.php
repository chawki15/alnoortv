<?php
  session_start();
  require_once('../func.php');
  $db = connect();

if($_POST['act']=='ConnexionM'){
    if((trim($_POST['email'])=='')||(!email_V($_POST['email']))||(trim($_POST['psw'])==''))
    {
        if(trim($_POST['email'])==''){ echo " em "; }elseif(!email_V($_POST['email'])){ echo " ve "; }
        if(trim($_POST['psw'])==''){ echo " ps "; }
    }else{
        $d = mysqli_fetch_array(mysqli_query($db,'SELECT id FROM  admin  WHERE email = "'.$_POST['email'].'" AND password = "'.md5($_POST['psw']).'"'));
        if($d['id']>0){echo ' p1 '; $_SESSION['login_admin'] = md5($d['id']); }else{ echo ' p2 '; }
    }

}elseif($_POST['act']=='addUser'){
    if((trim($_POST['nom'])=='')||(!validate_arab($_POST['nom']))||(trim($_POST['mail'])=='')||(!email_V($_POST['mail']))||(trim($_POST['psw'])==''))
    {
        if(trim($_POST['nom'])==''){ echo " en "; }elseif(!validate_arab($_POST['nom'])){ echo " vn "; }
        if(trim($_POST['mail'])==''){ echo " em "; }elseif(!email_V($_POST['mail'])){ echo " ve "; }
        if(trim($_POST['psw'])==''){ echo " ps "; }
    }else{
        mysqli_query($db, 'INSERT INTO `admin`(`id`,`name`,`email`,`password`,`active`) VALUES (Null,"'.$_POST['nom'].'","'.$_POST['mail'].'","'.md5($_POST['psw']).'","0")');
        echo " addUser ";
    }
}
?>