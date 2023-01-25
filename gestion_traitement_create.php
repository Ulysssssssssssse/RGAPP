<?php
session_start();
require_once 'config.php';


// Sanitize the form input
$pseudo = htmlspecialchars($_POST['pseudo']);
$email = htmlspecialchars($_POST['email']);
$password = htmlspecialchars($_POST['password']);
$isAdmin = htmlspecialchars($_POST['isAdmin']);


// pseudo in DB?
$check = $bdd->prepare('SELECT * FROM utilisateurs WHERE pseudo=?');
$check->execute([$pseudo]);
$data = $check->fetch();
// If yes, "error"
if ($check->rowCount() > 0) {
header('Location:gestion.php?msg=already_pseudo');
exit;
}

// email in DB?
$check = $bdd->prepare('SELECT * FROM utilisateurs WHERE email=?');
$check->execute([$email]);
$data = $check->fetch();
// If yes, "error"
if ($check->rowCount() > 0) {
setcookie('pseudo', $pseudo, time() + (2), "/");
setcookie('email', $email, time() + (2), "/");
header('Location:gestion.php?msg=already_email');
exit;
}

if (strlen($pseudo) > 100) {
header('Location:gestion.php?msg=pseudo_length');
exit;
}


// ajoute utilisateur dans DB
$password = hash('sha256', $password);
$insert = $bdd->prepare('INSERT INTO utilisateurs(pseudo, email, password, isAdmin) VALUES(:pseudo, :email, :password, :isAdmin)');
$insert->execute([
'pseudo' => $pseudo,
'email' => $email,
'password' => $password,
'isAdmin' => $isAdmin
]);

header('location:gestion.php?msg=created');


