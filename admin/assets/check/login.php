<?php
  session_start();
  require_once('../func.php');
  $pdo = connect_pdo();
  $act = $_POST['act'] ?? '';

if($act=='ConnexionM'){
    if((trim($_POST['email'] ?? '')=='')||(!email_V($_POST['email'] ?? ''))||(trim($_POST['psw'] ?? '')==''))
    {
        if(trim($_POST['email'] ?? '')==''){ echo " em "; }elseif(!email_V($_POST['email'] ?? '')){ echo " ve "; }
        if(trim($_POST['psw'] ?? '')==''){ echo " ps "; }
    }else{
        $admin = get_admin_by_email($pdo, trim($_POST['email']));
        if($admin && verify_admin_password($pdo, $admin, $_POST['psw'])){
            session_regenerate_id(true);
            $_SESSION['admin_id'] = (int)$admin['id'];
            unset($_SESSION['login_admin']);
            echo ' p1 ';
        }else{ echo ' p2 '; }
    }
}elseif($act=='addUser'){
    if((trim($_POST['nom'] ?? '')=='')||(!validate_arab($_POST['nom'] ?? ''))||(trim($_POST['mail'] ?? '')=='')||(!email_V($_POST['mail'] ?? ''))||(trim($_POST['psw'] ?? '')==''))
    {
        if(trim($_POST['nom'] ?? '')==''){ echo " en "; }elseif(!validate_arab($_POST['nom'] ?? '')){ echo " vn "; }
        if(trim($_POST['mail'] ?? '')==''){ echo " em "; }elseif(!email_V($_POST['mail'] ?? '')){ echo " ve "; }
        if(trim($_POST['psw'] ?? '')==''){ echo " ps "; }
    }else{
        $hash = password_hash($_POST['psw'], PASSWORD_DEFAULT);
        create_admin_user($pdo, $_POST['nom'], $_POST['mail'], $hash);
        echo " addUser ";
    }
}
?>