<?php
  session_start();
  if(!isset($_SESSION['user'])){
      header('location:connexion.php');
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
        <title>Accueil</title>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript" src="charts.js"></script>
</head>

<body id="accueil">

<?php include('header.php'); ?>
    
<h3> Bonjour <?php echo $_SESSION['user']; ?></h3>


<div class="leftcolumn">
  <div class="card">
    <h2>Moyenne du dernier trajet : <a href="donnees.html">En savoir plus</a></h2>
    <div id="barchart" style="height: 200px;"></div>
    </div>
  </div>
</div>


<?php include('footer.php'); ?>

</body>
</html>