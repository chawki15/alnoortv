<?php
session_start();
require_once('../func.php');
$pdo = connect_pdo();
$act = $_POST['act'] ?? '';

if($act=='addWriter'){
    if((trim($_POST['nom'] ?? '')=='')||(($_POST['photo'] ?? '') == '')){
        if(trim($_POST['nom'] ?? '')==''){ echo " en "; }
        if(($_POST['photo'] ?? '') == ''){echo " ph ";}
    }else{
        $stmt = $pdo->prepare('INSERT INTO writers(id, id_pseudo, nom, photo) VALUES (NULL, :id_pseudo, :nom, :photo)');
        $stmt->execute([':id_pseudo' => (int)GetIdUser($pdo), ':nom' => $_POST['nom'], ':photo' => $_POST['photo']]);
        echo " addWriter ";
    }
}elseif($act=='modWriter'){
    if((trim($_POST['nom'] ?? '')=='')||($_POST['photo'] ?? '') == ''){
        if(trim($_POST['nom'] ?? '')==''){ echo " en "; }
        if(($_POST['photo'] ?? '') == ''){echo " ph ";}
    }else{
        $stmt = $pdo->prepare('UPDATE writers SET nom = :nom, photo = :photo WHERE id = :id');
        $stmt->execute([':nom' => $_POST['nom'], ':photo' => $_POST['photo'], ':id' => (int)$_POST['id']]);
        echo " modWriter ";
    }
}elseif($act=='addOpinions'){
    $title = trim($_POST['title'] ?? '');
    $selectNom = $_POST['selectNom'] ?? '';
    $desc = trim($_POST['desc'] ?? '');
    
    if($title == '' || $selectNom == '' || $desc == '' || !validate_desarab($desc)){
        if($selectNom == ''){ echo " cl ";}  
        if($title == ''){ echo " et "; }
        if($desc == ''){ echo " ed "; }elseif(!validate_desarab($desc)){ echo " vd "; }
    }else{
        $stmt = $pdo->prepare('INSERT INTO opinion(id, id_writer, id_pseudo, titre, description, date) VALUES (NULL, :id_writer, :id_pseudo, :titre, :description, :date)');
        $stmt->execute([
            ':id_writer' => (int)$_POST['selectNom'],
            ':id_pseudo' => (int)GetIdUser($pdo),
            ':titre' => $_POST['title'],
            ':description' => $_POST['desc'],
            ':date' => gmdate("Y/m/j H:i:s", time() + 3600*(1+date("I")))
        ]);
        echo " addOpinions ";
    }
}elseif($act=='modOpinions'){
    if((trim($_POST['title'] ?? '')=='')||(($_POST['selectNom'] ?? '') == '')||(trim($_POST['desc'] ?? '')=='')||(!validate_desarab($_POST['desc'] ?? ''))||(!validate_numeric((string)($_POST['id'] ?? '')))){
        if(trim($_POST['title'] ?? '')==''){ echo " et "; }
        if(($_POST['selectNom'] ?? '') == ''){echo " cl ";}
        if(trim($_POST['desc'] ?? '')==''){ echo " ed "; }elseif(!validate_desarab($_POST['desc'] ?? '')){ echo " vd "; }
        if(!validate_numeric((string)($_POST['id'] ?? ''))){ echo " id "; }
    }else{
        $stmt = $pdo->prepare('UPDATE opinion SET id_writer = :id_writer, titre = :titre, description = :description WHERE id = :id');
        $stmt->execute([
            ':id_writer' => (int)$_POST['selectNom'],
            ':titre' => $_POST['title'],
            ':description' => $_POST['desc'],
            ':id' => (int)$_POST['id']
        ]);
        echo " modOpinions ";
    }
}elseif($act=='deleteOpinions'){
    $id = $_POST['id'];
    $stmt = $pdo->prepare('DELETE FROM opinion WHERE id = :id');
    $stmt->execute([':id' => (int)$id]);
}elseif($act=='deleteWriter'){
    $id = $_POST['id'];
    $stmt = $pdo->prepare('DELETE FROM writers WHERE id = :id');
    $stmt->execute([':id' => (int)$id]);
}

?>