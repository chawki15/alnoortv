<?php
  session_start();
  require_once('../func.php');
  $pdo = connect_pdo();
  $act = $_POST['act'] ?? '';

if($act=='addCat'){
    if((trim($_POST['category'] ?? '')=='')||(!validate_arab($_POST['category'] ?? ''))){
        if(trim($_POST['category'] ?? '')==''){ echo " ec "; }elseif(!validate_arab($_POST['category'] ?? '')){ echo " vc "; }
    }else{
        $stmt = $pdo->prepare('INSERT INTO categories (id, name, SeoDescription, SeoKeywords) VALUES (NULL, :name, "", "")');
        $stmt->execute([':name' => trim($_POST['category'])]);
		echo " addcat ";
    }
}elseif($act=='modCat'){
    if((trim($_POST['category'] ?? '')=='')||(!validate_arab($_POST['category'] ?? ''))){
        if(trim($_POST['category'] ?? '')==''){ echo " ec "; }elseif(!validate_arab($_POST['category'] ?? '')){ echo " vc "; }
    }else{
        if(!isset($_POST['id']) || !validate_numeric((string)$_POST['id'])){
            echo " id ";
            exit;
        }
        $stmt = $pdo->prepare('UPDATE categories SET name = :name WHERE id = :id');
        $stmt->execute([':name' => trim($_POST['category']), ':id' => (int)$_POST['id']]);
		echo " modcat ";
    }
}
?>