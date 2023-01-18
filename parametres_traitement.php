<?php
session_start();
require_once 'config.php';

// Check if PW and retype PW var is defined
if(isset($_POST['password']) && isset($_POST['password_retype'])) {
    $password = htmlspecialchars($_POST['password']);
    $password_retype = htmlspecialchars($_POST['password_retype']);

    // Check if PW field are not empty
    if(!empty($_POST['password']) && !empty($_POST['password_retype'])) {        
        if($password == $password_retype) {
            $password = hash('sha256', $password);
            $insert = $bdd->prepare('UPDATE `utilisateurs` SET `password` = :password WHERE `utilisateurs`.`pseudo` = :pseudo');
            $insert -> execute([
                'pseudo' => $_SESSION['user'],
                'password' => $password
            ]);
            setcookie('pwChanged', TRUE, time() + (10), "/");
        } else {
            if($password != $password_retype) {
                header('Location:parametres.php?reg_err=passworddiff');
            } else {
                header('Location:parametres.php?reg_err=password');
            }
        }
    }
}

// Check if PW and retype PW var is defined
if(isset($_POST['email']) && isset($_POST['email_retype'])) {
    $email = htmlspecialchars($_POST['email']);
    $email_retype = htmlspecialchars($_POST['email_retype']);
    // Check if PW field are not empty
    if(!empty($_POST['email']) && !empty($_POST['email_retype'])) {
        if ($email == $email_retype) {
            $insert = $bdd->prepare('UPDATE `utilisateurs` SET `email` = :email WHERE `utilisateurs`.`pseudo` = :pseudo');
            $insert -> execute([
                'pseudo' => $_SESSION['user'],
                'email' => $email
            ]);
            $_SESSION['email'] = $email;
            setcookie('emailChanged', TRUE, time() + (10), "/");
        }
    }
}

header('Location:parametres.php');

?>
