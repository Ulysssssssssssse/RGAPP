<?php
session_start();
require_once 'config.php';

// Check if PW and retype PW var is defined
if(isset($_POST['password']) && isset($_POST['password_retype'])) {
    // Check if PW field are not empty
    if(!empty($_POST['password']) && !empty($_POST['password_retype'])) {
        $password = htmlspecialchars($_POST['password']);
        $password_retype = htmlspecialchars($_POST['password_retype']);
        
        if($password == $password_retype) {
            $password = hash('sha256', $password);
            $insert = $bdd->prepare('UPDATE `utilisateurs` SET `password` = :password WHERE `utilisateurs`.`pseudo` = :pseudo');
            $insert -> execute([
                'pseudo' => $_SESSION['user'],
                'password' => $password
            ]);
            echo "mdp changé";
        } if($password != $password_retype) {
            header('Location:parametres.php?reg_err=passworddiff');
        } else {
            header('Location:parametres.php?reg_err=password');
        }
    }
}

// Check if PW and retype PW var is defined
if(isset($_POST['email'])) {
    // Check if PW field are not empty
    if(!empty($_POST['email'])) {
        $email = htmlspecialchars($_POST['email']);
        $insert = $bdd->prepare('UPDATE `utilisateurs` SET `email` = :email WHERE `utilisateurs`.`pseudo` = :pseudo');
        $insert -> execute([
            'pseudo' => $_SESSION['user'],
            'email' => $email
        ]);
        $_SESSION['email'] = $email;
        echo "email changé";
    }
}

?>
