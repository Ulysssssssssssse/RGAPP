<?php
session_start();
require_once 'config.php';

// Check if the form fields are set
if (isset($_POST['email']) && isset($_POST['pseudo']) && isset($_POST['password']) && isset($_POST['password_retype'])) {
  // Sanitize the form input
  $pseudo = htmlspecialchars($_POST['pseudo']);
  $email = htmlspecialchars($_POST['email']);
  $password = htmlspecialchars($_POST['password']);
  $password_retype = htmlspecialchars($_POST['password_retype']);

  // email in DB?
  $check = $bdd->prepare('SELECT * FROM utilisateurs WHERE email=?');
  $check->execute([$email]);
  $data = $check->fetch();
  // If yes, "error"
  if ($check->rowCount() > 0) {
    header('Location: inscription.php?reg_err=already');
    exit;
  }

  // pseudo in DB?
  $check = $bdd->prepare('SELECT * FROM utilisateurs WHERE pseudo=?');
  $check->execute([$pseudo]);
  $data = $check->fetch();
  // If yes, "error"
  if ($check->rowCount() > 0) {
    header('Location: inscription.php?reg_err=pseudo_already');
    exit;
  }
  
  // Vérif taille 'pseudo' et 'email'
  if (strlen($pseudo) > 100) {
    header('Location: inscription.php?reg_err=pseudo_length');
    exit;
  }
  if (strlen($email) > 100) {
    header('Location: inscription.php?reg_err=email_length');
    exit;
  }

  // Vérif format 'email'
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header('Location: inscription.php?reg_err=email');
    exit;
  }

  // Vérif les mdp
  if ($password !== $password_retype) {
    header('Location: inscription.php?reg_err=password');
    exit;
  }

  // ajoute utilisateur dans DB
  $password = hash('sha256', $password);
  $insert = $bdd->prepare('INSERT INTO utilisateurs(pseudo, email, password) VALUES(:pseudo, :email, :password)');
  $insert->execute([
    'pseudo' => $pseudo,
    'email' => $email,
    'password' => $password
  ]);

  
  // Redirige automatiquement sur la page d'accueil
  $check = $bdd->prepare('SELECT * FROM utilisateurs WHERE email=?');
  $check->execute([$email]);
  $data = $check->fetch();
  $_SESSION['user'] = $data['pseudo'];
  $_SESSION['email'] = $email;
  $_SESSION['isAdmin'] = 0;
  header('location:accueil.php');
}

