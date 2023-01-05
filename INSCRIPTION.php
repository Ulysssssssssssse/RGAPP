<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="style2.css" />
    <title>rGapp</title>
</head>
     
<body id="inscription">
    <header>
        <div class="ligne1">
        <a href="PRESENTATION.html"><img src="images/Ride Green logo.png" alt="logo Ridegreen" id="logo" /></a>
        <h1 class="titre">rGapp</h1>
        <a href="PRESENTATION.html"><img src="images/Isepbike logo.png" alt="logo Ridegreen" id="logo" /></a>
        </div>
        <div class="ligne2">
            <a href="PRESENTATION.html">Présentation</a>
            <a href="connexion.php">Connexion</a>
            <a href="INSCRIPTION.php">Inscription</a>
        </div>
    </header>

        <?php
            if(isset($_GET['reg_err']))
            {
                $err = htmlspecialchars($_GET['reg_err']);

                switch($err)
                {
                    case 'success':
        ?>
                            <div class="alert alert-success">
                                <strong>Succès </strong> inscription reussie ! 
                            </div>
                            <?php
                            break;

                    case 'password':
                            ?>
                            <div class="alert alert-danger">
                                <strong> Erreur </strong> mot de passe différents !   <!-- Test OK-->
                            </div>
                            <?php
                            break;

                    case 'email':
                            ?>
                            <div class="alert alert-danger">
                                <strong> Erreur </strong> email non valide ! <!-- Test OK, il faut modifier l'attribut "mail" en "text" pour pouvoir afficher l'erreur -->
                            </div>
                            <?php
                            break;
                                    
                    case 'email_length':
                            ?>
                            <div class="alert alert-danger">
                                <strong> Erreur </strong> email trop long ! <!-- Test OK, inspecter et transformer 'mail' en 'text' pour afficher l'erreur-->
                            </div>
                            <?php
                            break;

                    case 'pseudo_length':
                            ?>
                            <div class="alert alert-danger">
                                <strong> Erreur </strong> pseudo trop long ! <!-- Test OK-->
                            </div>
                            <?php
                            break;


                    case 'already':
                            ?>
                            <div class="alert alert-danger">
                                <strong>Erreur </strong> compte deja existant ! <!-- Test OK-->
                            </div>
                            <?php
                            break;
    
                }
            }

                            ?>

        <form action="inscription_traitement.php" method="post">
            <div class="inscription">
            <h1> Inscription </h1>
                <input class="barre" type="text" name="pseudo" placeholder="Pseudo" required="required" autocomplete="off">
            <br><br>
                <input class="barre" type="email" name="email"  placeholder="Email" required="required" autocomplete="off">
            <br><br>
                <input class="barre" type="password" name="password" placeholder="Mot de passe" required="required" autocomplete="off">
            <br><br>
                <input class="barre" type="password" name="password_retype" placeholder="Retapez le mot de passe" required="required" autocomplete="off">
            <br>
            <div style="color: black;width: 7cm;">En vous inscrivant, vous acceptez nos<a href="CGU.html"> termes et conditions d'utilisation</a></div>
            <br>
            <button type = "submit" class="btn btn-primary btn-block">Inscription</button>
            <br>
            <a href="connexion.php" style="font-size: 1.5em;"> Connexion </a>
            </div>
        </form>


<?php include('footer.php'); ?>
</body>
</html>
                    