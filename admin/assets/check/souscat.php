<?php
session_start();
require_once('../func.php');
$pdo = connect_pdo();
$act = $_POST['act'] ?? '';

if($act=='addSousCat'){
    if((trim($_POST['sousCategory'] ?? '')=='')||(!validate_arab($_POST['sousCategory'] ?? ''))||($_POST['selectCategory'] == '')||(!validate_numeric((string)$_POST['selectCategory']))){
        if(trim($_POST['sousCategory'] ?? '')==''){ echo " ec "; }elseif(!validate_arab($_POST['sousCategory'] ?? '')){ echo " vc "; }
        if($_POST['selectCategory'] == ''){echo " cl ";}
    }else{
         $stmt = $pdo->prepare('INSERT INTO sous_categories (id, id_category, name, SeoDescription, SeoKeywords) VALUES (NULL, :id_category, :name, "", "")');
        $stmt->execute([':id_category' => (int)$_POST['selectCategory'], ':name' => trim($_POST['sousCategory'])]);
		echo " addSouscat ";
    }
}elseif($act=='modSousCat'){
     if((trim($_POST['sousCategory'] ?? '')=='')||(!validate_arab($_POST['sousCategory'] ?? ''))||($_POST['selectCategory'] == '')||(!validate_numeric((string)$_POST['selectCategory']))){
        if(trim($_POST['sousCategory'] ?? '')==''){ echo " ec "; }elseif(!validate_arab($_POST['sousCategory'] ?? '')){ echo " vc "; }
        if($_POST['selectCategory'] == ''){echo " cl ";}
    }else{
        if(!isset($_POST['id']) || !validate_numeric((string)$_POST['id'])){
            echo " id ";
            exit;
        }
        $stmt = $pdo->prepare('UPDATE sous_categories SET id_category = :id_category, name = :name WHERE id = :id');
        $stmt->execute([
            ':id_category' => (int)$_POST['selectCategory'],
            ':name' => trim($_POST['sousCategory']),
            ':id' => (int)$_POST['id']
        ]);
		echo " modSouscat ";
    }
}

?>