<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css" />
        <link rel="stylesheet" href="style2.css" />
        <title>rGapp</title>
    </head>

        
            <body id="inscription">
                <header>
                    <a href="PRESENTATION.html"><img src="images/Ride Green logo.png" alt="logo Ridegreen" id="logo"/></a>
                    <h1 class="titre">rGapp</h1>
                    <img src="images/Isepbike logo.png" alt="IsepbikeInscription" id="IsepBike"/></a>
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
                                        <div class="alert alert-success">
                                            <strong>Succès </strong> mot de passe différents ! 
                                        </div>
                                        <?php
                                        break;

                                case 'email':
                                    ?>
                                        <div class="alert alert-success">
                                            <strong>Succès </strong> email non valide ! 
                                        </div>
                                        <?php
                                        break;
                                                
                                case 'email_length':
                                    ?>
                                        <div class="alert alert-success">
                                            <strong>Succès </strong> email trop long ! 
                                        </div>
                                        <?php
                                        break;

                                case 'pseudo_length':
                                    ?>
                                        <div class="alert alert-success">
                                            <strong>Succès </strong> pseudo trop long ! 
                                        </div>
                                        <?php
                                        break;


                                case 'already':
                                    ?>
                                        <div class="alert alert-success">
                                            <strong>Succès </strong> compte deja existant ! 
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
                        <br><br>
                        <div style="color: black;width: 7cm;">En vous inscrivant, vous acceptez nos<a href="CGU.html"> termes et conditions d'utilisation</a></div>
                        <br>
                        <button type = "submit" class="boutton">Inscription</button>
                        <br>
                        <a href="accueil.php" style="font-size: 1.5em;"> Connexion </a>
                        </div>
                    </form>


                <footer>
                    <a href="CGU.html">Mentions légales</a>
                    <a href="mailto:ridegreencontact@gmail.com" title="ridegreencontact@gmail.com">Contact</a>
                    <a href="FAQ.html">FAQ</a>
                </footer>
            </body>
    </html>
                    