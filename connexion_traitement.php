<?php
session_start();
require_once 'config.php';

if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);

    // Check if email exists in database
    $check = $bdd->prepare('SELECT idUtilisateur, pseudo, email, password, isAdmin FROM utilisateurs WHERE email = ?');
    $check->execute(array($email));
    $data = $check->fetch();
    $row = $check->rowCount();

    // If email exists
    if($row == 1) {
        // Check email format
        if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $password = hash('sha256', $password);
            // Check if entered password matches password in database
            if($data['password'] === $password) {
                $_SESSION['user'] = $data['pseudo'];
                $_SESSION['email'] = $email;
                $_SESSION['isAdmin'] = $data['isAdmin'];
                // Check if user is admin
                if($_SESSION['isAdmin']) {
                    // Redirect to admin homepage
                    header('location:admin.php');
                } else {
                    // Redirect to homepage
                    header('location:accueil.php');
                }
            } else {
                // PW error
                header('location:connexion.php?login_err=password');
            }
        } else {
            // Email format error
            header('location:connexion.php?login_err=email');
        }
    } else {
        // Non existant error
        header('location:connexion.php?login_err=already');
    }
} else {
    // Empty error
    header('location:connexion.php');
}

//Header : redirection vers une page

?>