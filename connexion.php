<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />  <!-- Style bootstrap pour les alertes ! -->
        <link rel="stylesheet" href="style.css" />
        <link rel="stylesheet" href="style2.css" />
        <title> rGapp </title>
</head>


            <body id="connexion">
                <header>
                    <a href="PRESENTATION.html"> <img src="images/Ride Green logo.png" alt="Logo Ridegreen" id="logo"/> </a>
                    <h1 class="titre"> rGapp </h1>
                    <img src="images/Isepbike logo.png" alt="Isepbike" id="IsepBike" /> </a>
</div>
                </header>



                <div class='login-form'>

                    <?php
                    if (isset($_GET['login_err']))
                    {
                        $err = htmlspecialchars($_GET['login_err']);
                        switch($err)
                        {
                            case 'password':
                                ?>
                                <div class="alert alert-danger">
                                    <strong> Erreur </strong> Mot de passe incorrect    <!-- test ok :) -->
                                </div>
                                <?php
                                break;

                            case 'email':
                                ?>
                                <div class="alert alert-danger">
                                     <strong> Erreur </strong> email incorrect  <!--  On tombe dans le cas du compte non existant, ce qui n'est pas faux du coup :)-->
                                </div>
                                <?php
                                break;

                            case 'already':
                                ?>
                                <div class="alert alert-danger">
                                    <strong> Erreur </strong> Compte non existant       <!-- Test ok !  -->
                                </div>
                                <?php
                                break;

                            
                        }
                    }
                    ?>

<div class="background">
                    <form action="connexion_traitement.php" method="post">
                    <div class="connexion">
                        <h1> Connexion </h1>
                            <input class="barre" type="email" name="email" placeholder="email" required="required" autocomplete="off">
                        <br>
                            <input class="barre" type="password" name="password" placeholder="Mot de passe" required="required" autocomplete="off">
                        <br> <br>
                            <button class="btn btn-primary btn-block" type="submit" value="Connexion" name=Connexion >Connexion</button>
                            <br>
                            <a href="inscription.php" style="font-size: 1.5em;"> inscription </a>
                    </div>
                    </form>
                </div>


<footer>
    <a href="GPU.html"> Mentions légales </a>
    <a href="mailto:ridegreencontact@gmail.com" title="ridegreencontact@gmail.com"> Contact </a>
    <a href="FAQ.html"> FAQ </a>

</footer>

</body>
</html>

