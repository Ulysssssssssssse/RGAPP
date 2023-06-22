<header>
<div class="ligne1">
<a href="presentation.html"><img src="images/Ride Green logo.png" alt="logo Ridegreen" id="logo" /></a>
<h1 class="titre">rGapp</h1>
<a href="presentation.html"><img src="images/Isepbike logo.png" alt="logo Ridegreen" id="logo" class="logoisepbike"/></a>
<ul class="navbar">
    <li >
        <div href="#" class="logomenu"><img src="images/menu.png"></div>
        <ul>

        <?php if($_SESSION['isAdmin']) { ?>
            <li><a href="gestion.php">Gestion</a></li>
        <?php } else { ?>
            <li><a href="accueil.php">Accueil</a></li>
        <?php } ?>

        <li><a href="parametres.php">Paramètres</a></li>

        <?php if(!$_SESSION['isAdmin']) { ?>
            <li><a href="testData.php">Vos données</a></li>
        <?php } ?>

        <li><a href="deconnexion.php">Se déconnecter</a></li>
        </ul>
    </li>
</div>

<div class="ligne2">
    <?php if($_SESSION['isAdmin']) { ?>
        <a href="gestion.php">Gestion</a>
    <?php } else { ?>
        <a href="accueil.php">Accueil</a>
    <?php } ?>

    <a href="parametres.php">Paramètres</a>
    <?php if(!$_SESSION['isAdmin']) { ?>
        <a href="testData.php">Vos données</a>
    <?php } ?>
    <a href="deconnexion.php">Se déconnecter</a>
</div>
<script src="headerresponsive.js"></script>
</header>