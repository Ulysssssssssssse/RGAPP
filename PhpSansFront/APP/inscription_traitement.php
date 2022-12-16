<?php
require_once 'config.php';

if(isset($_POST['pseudo']) && isset($_POST['password']) && isset($_POST['password_retype']))  
{
    $pseudo = htmlspecialchars($_POST['pseudo']);       //protection XMS
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $password_retype = htmlspecialchars($_POST['password_retype']);

    $check = $bdd->prepare('SELECT pseudo, email, password FROM utilisateurs WHERE email=?');
    $check -> execute(array($email));
    $data = $check->fetch();
    $row = $check->rowCount();

    if($row == 0)  //la personne n'est pas dans la bdd
    {
        if(strlen($pseudo)<= 100)  //Longeur pseudo <100 
        {
            if(strlen($email)<=100)
            {
                if(filter_var($email, FILTER_VALIDATE_EMAIL))   //Verifie le format de l'email
                {
                    if($password == $password_retype)
                    {
                        $password = hash('sha256', $password);
                        $ip = $_SERVER['REMOTE_ADDR'];

                        $insert = $bdd->prepare('INSERT INTO utilisateurs(pseudo, email, password) VALUES(:pseudo, :email, :password)');
                        $insert->execute(
                            array(
                                'pseudo' => $pseudo,
                                'email' => $email,
                                'password' => $password
                            )
                        );
                        header('Location:inscription.php?reg_err=success');

                    } else header('Location: inscription.php?reg_err=password');
                } else header('Location: inscription.php?reg_err=email');
            } else header('Location: inscription.php?reg_err=email_length');
        } else header('Location: inscription.php?reg_err=pseudo_length');
    } else header('Location: inscription.php?reg_err=already');


    // else header : redirection vers la page 
}

