<?php
session_start();
require_once 'config.php';

$idUtilisateur = htmlspecialchars($_POST['idDelete']);
if($idUtilisateur==1){
    header('location:gestion.php?msg=adminID');
    exit;
}

$check = $bdd->prepare('SELECT * FROM utilisateurs WHERE idUtilisateur=?');
$check->execute([$idUtilisateur]);
if($check->rowCount()){
    $delete=$bdd->prepare('DELETE FROM utilisateurs WHERE idUtilisateur=?');
    $delete->execute([$idUtilisateur]);
    header('location:gestion.php?msg=deleted');
} else {
    header('location:gestion.php?msg=notfound');
}

?>