<?php
  session_start();
  require_once('../func.php');
  $db = connect_pdo();

if($_POST['act']=='addCat'){
    if((trim($_POST['category'])=='')||(!validate_arab($_POST['category']))){
        if(trim($_POST['category'])==''){ echo " ec "; }elseif(!validate_arab($_POST['category'])){ echo " vc "; }
    }else{
        $stmt = $db->prepare('INSERT INTO categories (id, name, SeoDescription, SeoKeywords) VALUES (NULL, :name, "", "")');
        $stmt->execute([':name' => trim($_POST['category'])]);
		echo " addcat ";
    }
}elseif($_POST['act']=='modCat'){
    if((trim($_POST['category'])=='')||(!validate_arab($_POST['category']))){
        if(trim($_POST['category'])==''){ echo " ec "; }elseif(!validate_arab($_POST['category'])){ echo " vc "; }
    }else{
        if(!isset($_POST['id']) || !validate_numeric((string)$_POST['id'])){
            echo " id ";
            exit;
        }
        $stmt = $db->prepare('UPDATE categories SET name = :name WHERE id = :id');
        $stmt->execute([':name' => trim($_POST['category']), ':id' => (int)$_POST['id']]);
		echo " modcat ";
    }
}
?>