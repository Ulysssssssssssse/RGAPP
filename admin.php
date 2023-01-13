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
        <link rel="stylesheet" href="style_ACCUEIL.css" />
        <link rel="stylesheet" href="style_menudéroulant.css" />
        <title>Gestion</title>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript" src="charts.js"></script>
</head>

<body id="accueil">

<?php include('header.php'); ?>

    <h3> Bonjour <?php echo $_SESSION['user']; ?>.</div></h3>



    <div class="card">
      <h2>Rechercher un utilisateur</h2>
    </div>
    <input type="text" class="form-control" id="live_search" autocomplete="off" placeholder="Search ...">

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