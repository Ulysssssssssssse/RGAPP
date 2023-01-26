<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="style2.css" />
    <link rel="stylesheet" href="style_menudéroulant.css" />
    <script type="text/javascript" src="inscription.js" defer></script>
    <title>Inscription</title>
</head>

<body id="inscription">

<header>
<div class="ligne1">
<a href="presentation.html"><img src="images/Ride Green logo.png" alt="logo Ridegreen" id="logo" /></a>
<h1 class="titre">rGapp</h1>
<a href="presentation.html"><img src="images/Isepbike logo.png" alt="logo Ridegreen" id="logo" class="logoisepbike"/></a>
<ul class="navbar">
    <li >
        <div href="#" class="logomenu"><img src="images/menu.png"></div>
        <ul>
        <li><a href="presentation.html">Présentation</a></li>
        <li><a href="connexion.php">Connexion</a></li>
        <li><a href="inscription.php">Inscription</a></li>
        </ul>
    </li>
</ul>
</div>
<div class="ligne2">
    <a href="presentation.html">Présentation</a>
    <a href="connexion.php">Connexion</a>
    <a href="inscription.php">Inscription</a>
</div>
<script src="headerresponsive.js"></script>    
</header>

<?php
if(isset($_GET['reg_err']))
{
    $err = htmlspecialchars($_GET['reg_err']);
    switch($err)
    {

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

        case 'already_pseudo':
                ?>
                <div class="alert alert-danger">
                    <strong>Erreur </strong> pseudo déjà existant ! <!-- Test OK-->
                </div>
                <?php
                break;

        case 'already':
                ?>
                <div class="alert alert-danger">
                    <strong>Erreur </strong> compte déjà existant ! <!-- Test OK-->
                </div>
                <?php
                break;
    }
}
?>

<form action="inscription_traitement.php" method="post">
    <div class="inscription">
    <h1> Inscription </h1>
        <input class="barre" type="text" name="pseudo" placeholder="Pseudo" autocomplete="off"
        <?php if(isset($_COOKIE['pseudo'])) {echo "value='".$_COOKIE['pseudo']."'";}?>>
        <span id="pseudoMsg"></span>
    <br><br>
        <input class="barre" type="email" name="email"  placeholder="Email" autocomplete="off"
        <?php if(isset($_COOKIE['email'])) {echo "value='".$_COOKIE['email']."'";}?>>
        <span id="emailMsg"></span>
    <br><br>
        <input class="barre" type="password" name="password" placeholder="Mot de passe" autocomplete="off">
        <span id="pwMsg"></span>
    <br><br>
        <input class="barre" type="password" name="password_retype" placeholder="Retapez le mot de passe" autocomplete="off">
        <span id="pwConfirmMsg"></span>
    <br>
    <div style="color: black;width: 7cm;">
        <input type="checkbox" id="cgu" name="cgu">
        En cochant la case, vous acceptez nos <a href="cgu.html">termes et conditions d'utilisation</a>
        <span id="checkboxMsg"></span>
    </div>
    <br>
    <button type="submit" class="btn btn-primary btn-block">Inscription</button>
    </div>
</form>


<?php include('footer.php'); ?>
</body>
</html>
                    
