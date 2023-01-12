<?php
  session_start();
  if (!isset($_SESSION['user']))
      header('location:connexion.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css" />
        <link rel="stylesheet" href="style_ACCUEIL.css" />
        <link rel="stylesheet" href="style_menudéroulant.css" />
        <title>rGapp</title>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript" src="charts.js"></script>
</head>

<body id="accueil">

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

    
    <h3> Bonjour <?php echo $_SESSION['user']; ?></h3>


<div class="leftcolumn">
     <div class="card">
      <h2>Moyenne du dernier trajet<a href="DONNEES.html"><img src="images/logoplus.png"></a></h2>
      <div id="barchart" style="height: 200px;"></div>
      <p></p>
    </div>
</div>

<div class="rightcolumn">
    <div class="card">
      <h2>Rechercher un utilisateur</h2>
    </div>
    <input type="text" class="form-control" id="live_search" autocomplete="off" placeholder="Search ...">
</div>

<div id="searchresult"></div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

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

<?php include('footer.php'); ?>

</body>
</html>