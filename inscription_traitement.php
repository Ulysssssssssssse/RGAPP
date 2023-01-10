<?php
// session_start();
// require_once 'config.php';
// 
// if(isset($_POST['pseudo']) && isset($_POST['password']) && isset($_POST['password_retype']))  
// {
//     $pseudo = htmlspecialchars($_POST['pseudo']);       //protection XMS
//     $email = htmlspecialchars($_POST['email']);
//     $password = htmlspecialchars($_POST['password']);
//     $password_retype = htmlspecialchars($_POST['password_retype']);
// 
//     $check = $bdd->prepare('SELECT pseudo, email, password FROM utilisateurs WHERE email=?');
//     $check -> execute(array($email));
//     $data = $check->fetch();
//     $row = $check->rowCount();
// 
//     if($row == 0)  //la personne n'est pas dans la bdd
//     {
//         if(strlen($pseudo)<= 100)  //Longeur pseudo <100 
//         {
//             if(strlen($email)<=100)
//             {
//                 if(filter_var($email, FILTER_VALIDATE_EMAIL))   //Verifie le format de l'email
//                 {
//                     if($password == $password_retype)
//                     {
//                         $password = hash('sha256', $password);
//                         $ip = $_SERVER['REMOTE_ADDR'];
// 
//                         $insert = $bdd->prepare('INSERT INTO utilisateurs(pseudo, email, password) VALUES(:pseudo, :email, :password)');
//                         $insert->execute(
//                             array(
//                                 'pseudo' => $pseudo,
//                                 'email' => $email,
//                                 'password' => $password
//                             )
//                         );
// 
//                         // Récupération des données de l'utilisateur pour l'authentification
//                         $check = $bdd->prepare('SELECT idUtilisateur, pseudo, email, password FROM utilisateurs WHERE email=?');
//                         $check -> execute(array($email));
//                         $data = $check->fetch();
// 
//                         // Initialisation de la session de l'utilisateur et redirection vers la page d'accueil
//                         $_SESSION['user'] = $data['pseudo'];
//                         $_SESSION['email'] = $email;
//                         header('location:accueil.php');
//                     } else header('Location: inscription.php?reg_err=password');
//                 } else header('Location: inscription.php?reg_err=email');
//             } else header('Location: inscription.php?reg_err=email_length');
//         } else header('Location: inscription.php?reg_err=pseudo_length');
//     } else header('Location: inscription.php?reg_err=already');
// }



// Start a session and include the config file
session_start();
require_once 'config.php';

// Check if the form fields are set
if (isset($_POST['pseudo']) && isset($_POST['password']) && isset($_POST['password_retype'])) {
  // Sanitize the form input
  $pseudo = htmlspecialchars($_POST['pseudo']);
  $email = htmlspecialchars($_POST['email']);
  $password = htmlspecialchars($_POST['password']);
  $password_retype = htmlspecialchars($_POST['password_retype']);

  // Check if the email is already in the database
  $check = $bdd->prepare('SELECT * FROM utilisateurs WHERE email=?');
  $check->execute([$email]);
  $data = $check->fetch();
  if ($check->rowCount() > 0) {
    // Email is already in the database, redirect with an error
    header('Location: inscription.php?reg_err=already');
    exit;
  }

  // Check the length of the pseudo and email fields
  if (strlen($pseudo) > 100) {
    header('Location: inscription.php?reg_err=pseudo_length');
    exit;
  }
  if (strlen($email) > 100) {
    header('Location: inscription.php?reg_err=email_length');
    exit;
  }

  // Check if the email is a valid format
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header('Location: inscription.php?reg_err=email');
    exit;
  }

  // Check if the passwords match
  if ($password !== $password_retype) {
    header('Location: inscription.php?reg_err=password');
    exit;
  }

  // Hash the password and insert the new user into the database
  $password = hash('sha256', $password);
  $insert = $bdd->prepare('INSERT INTO utilisateurs(pseudo, email, password) VALUES(:pseudo, :email, :password)');
  $insert->execute([
    'pseudo' => $pseudo,
    'email' => $email,
    'password' => $password
  ]);

  // Get the newly created user from the database
  $check = $bdd->prepare('SELECT * FROM utilisateurs WHERE email=?');
  $check->execute([$email]);
  $data = $check->fetch();

  // Initialize the session variables and redirect to the home page
  $_SESSION['user'] = $data['pseudo'];
  $_SESSION['email'] = $email;
  header('location:accueil.php');
}

