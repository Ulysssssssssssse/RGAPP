<?php
    session_start();
    if (!isset($_SESSION['user'])){
        header('location:connexion.php');
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_PARAMETRES.css" />
    <link rel="stylesheet" href="style_menudéroulant.css" />
    <link rel="stylesheet" href="style.css" />
    <script type="text/javascript" src="parametres.js" defer></script>
    <title>Paramètre</title>
</head>

<body id="parametres">

<?php include('header.php'); ?>


<?php
if(isset($_COOKIE['emailChanged'])){
  if($_COOKIE['emailChanged']){
    echo '<div class="changedAlert">Votre mail a bien été modifié</div>';
  }
}
if(isset($_COOKIE['pwChanged'])){
  if($_COOKIE['pwChanged']){
    echo '<div class="changedAlert">Votre mot de passe a bien été modifié</div>';
  }
} 
?>

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
        <span id="emailMsg"></span>
      <br><br>
        <input type="email" class="barre" placeholder="Confirmer nouvel email" name="email_retype">
        <span id="emailConfirmMsg"></span>
      <br><br>
        <input type="password" class="barre" placeholder="Nouveau mot de passe" name="password">
        <span id="pwMsg"></span>
      <br><br>
        <input type="password" class="barre" placeholder="Confirmer mot de passe" name="password_retype">
        <span id="pwConfirmMsg"></span>
      <br><br>
        <button type="submit" class="bouton" value="Valider" name="Valider">Valider</button>
  </div>
</form>

<?php include('footer.php'); ?>
</body>
</html>
