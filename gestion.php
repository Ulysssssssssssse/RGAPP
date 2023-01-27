<?php
    session_start();
    if (!isset($_SESSION['user'])) {
      header('location:connexion.php');
    }

    // Redirect to homepage if not an admin
    if (!$_SESSION['isAdmin']) {
      header('location:accueil.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="style_accueil.css" />
  <link rel="stylesheet" href="style_menudéroulant.css" />
  <title>Gestion</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</head>

<body id="accueil">

<?php include('header.php'); ?>

<h3> Bonjour <?php echo $_SESSION['user']; ?>.</h3>

<?php
if(isset($_GET['msg']))
{
  $msg = htmlspecialchars($_GET['msg']);
  switch($msg)
  {

  case 'adminID':
    ?>
    <div>
      <p><strong> Erreur </strong> vous ne pouvez pas supprimer le compte administrateur</p>
    </div>
    <?php
    break;

  case 'deleted':
    ?>
    <div>
      <p>Le compte a bien été supprimé</p>
    </div>
    <?php
    break;
                  
  case 'notfound':
    ?>
    <div>
      <p><strong> Erreur </strong> Le compte à supprimer n'existe pas</p>
    </div>
    <?php
    break;

  case 'pseudo_length':
    ?>
    <div>
      <strong> Erreur </strong> Pseudo trop long !
    </div>
    <?php
    break;

  case 'already_pseudo':
    ?>
    <div>
      <strong> Erreur </strong> Le pseudo existe déjà !
    </div>
    <?php
    break;

  case 'already_email':
    ?>
    <div>
      <strong> Erreur </strong> L'email est déjà utilisé !
    </div>
    <?php
    break;

  case 'created':
    ?>
    <div>
      <p>Le compte a bien été créé</p>
    </div>
    <?php
    break;
  }
}
?>

<div class="card">
  <h2>Rechercher un utilisateur</h2>
</div>
<input type="text" class="form-control" id="live_search" autocomplete="off" placeholder="Pseudo ou mail">

<div id="searchresult"></div>
<script type="text/javascript">
  $(document).ready(function(){

    $('#live_search').keyup(function(){

      var input = $(this).val();
      // alert(input)

      if(input != ""){
        $.ajax({
          url : "livesearch.php",
          method : "POST",
          data:{input:input},
          success:function(data){
            $("#searchresult").html(data);
          }
        });
      }else{
        $("searchresult").css("display","none");
      }
    });
  });
</script>


<div id="createAccount">
  <form action="gestion_traitement_create.php" method="post">
    <br><br>
    <p>Créer un compte :</p>
    <input type="text" name="pseudo" placeholder="Pseudo">
    <br>
    <input type="email" name="email" placeholder="Email">
    <br>
    <input type="text" name="password" placeholder="Mot de passe provisoire">
    <br>
    <label for="isAdminCheck">Cochez la case si c'est un gestionnaire : </label>
    <input type="hidden" name="isAdmin" value="0">
    <input type="checkbox" id="isAdminCheck" name="isAdmin" value="1">
    <br>
    <input type="submit" value="Créer le compte">
  </form>
</div>

<div id="userManagement">
  <form action="gestion_traitement_delete.php" method="post">
    <br><br>
    <label for="idDelete">Id de l'utilisateur à supprimer :</label>
    <br>
    <input type="number" name="idDelete" required="required">
    <input type="submit" value="Supprimer le compte">
  </form>
</div>


<?php include('footer.php'); ?>

</body>
</html>

