<?php
    session_start();
    if (!isset($_SESSION['user']))
        header('location:connexion.php');
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_PARAMETRES.css" />
    <link rel="stylesheet" href="style_menudéroulant.css" />
    <link rel="stylesheet" href="style.css" />
    <title>Paramètre</title>
</head>

<body id="parametres">
  <header>
    <div class="ligne1">
    <a href="PRESENTATION.html"><img src="images/Ride Green logo.png" alt="logo Ridegreen" id="logo" /></a>
    <h1 class="titre">rGapp</h1>
    <a href="PRESENTATION.html"><img src="images/Isepbike logo.png" alt="logo Ridegreen" id="logo" class="logoisepbike"/></a>
    <ul class="navbar">
        <li >
          <div href="#" class="logomenu"><img src="images/menu.png"></div>
          <ul>
            <li><a href="ACCUEIL.php">Accueil</a></li>
            <li><a href="PARAMETRES.php">Paramètres</a></li>
            <li><a href="DONNEES.html">Vos trajets</a></li>
            <li><a href="deconnexion.php">Se déconnecter</a></li>
          </ul>
        </li>
    </div>
    <div class="ligne2">
      <a href="ACCUEIL.php">Accueil</a>
      <a href="PARAMETRES.php">Paramètres</a>
      <a href="DONNEES.html">Vos trajets</a>
      <a href="deconnexion.php">Se déconnecter</a>
    </div>
    <script src="headerresponsive.js"></script>
  </header>

  <div class="informationsprofil">
    <h3>Vos informations </h3>
    Nom utilisateur: <?php echo $_SESSION['user']; ?> 
    <br>   
    Email: <?php echo $_SESSION['email']; ?>
  </div>

  <form action="parametres_traitement.php" method="post">
    <div class="parametres">
        <h1>Modifier votre profil</h1>
        <br>
        <input type="email" class="barre" placeholder="Nouvel email" name="email">
        <br><br>
        <input type="password" class="barre" placeholder="Nouveau mot de passe" name="password">
        <br><br>
        <input type="password" class="barre" placeholder="Confirmer mot de passe" name="password_retype">
        <br><br>
        <button type="submit" class="bouton" value="Valider" name="Valider">Valider</button>
    </div>
  </form>

<?php include('footer.php'); ?>
</body>
</html>