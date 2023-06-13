<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_donnees.css" />
    <link rel="stylesheet" href="style_menudéroulant.css" />
    <link rel="stylesheet" href="style.css" />
    <title>rGapp</title>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript" src="charts.js"></script>
</head>
<body id="donnees">
    <header>
        <div class="ligne1">
            <a href="presentation.html"><img src="images/Ride Green logo.png" alt="logo Ridegreen" id="logo" /></a>
            <h1 class="titre">rGapp</h1>
            <a href="presentation.html"><img src="images/Isepbike logo.png" alt="logo Ridegreen" id="logo" class="logoisepbike"/></a>
            <ul class="navbar">
                <li>
                    <div href="#" class="logomenu"><img src="images/menu.png"></div>
                    <ul>
                        <li><a href="accueil.php">Accueil</a></li>
                        <li><a href="parametres.php">Paramètres</a></li>
                        <li><a href="donnees.html">Vos trajets</a></li>
                        <li><a href="deconnexion.php">Se déconnecter</a></li>
                    </ul>
                </li>
            </div>
            <div class="ligne2">
                <a href="accueil.php">Accueil</a>
                <a href="parametres.php">Paramètres</a>
                <a href="donnees.html">Vos trajets</a>
                <a href="deconnexion.php">Se déconnecter</a>
            </div>
            <script src="headerresponsive.js"></script>
        </header>

        <div class="donnees">
            <div>
                <h1>Votre dernier trajet</h1>
                <div class="graphiques">
                    <div id="chartCO2" style="size: 50%;"></div>
                    <div id="chartBPM"></div>
                    <div id="chart°C"></div>
                    <div id="chartdB"></div>
                </div>
            </div>
            <div id="table">
                <?php
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, "http://projets-tomcat.isep.fr:8080/appService/?ACTION=GETLOG&TEAM=G02E");
                curl_setopt($ch, CURLOPT_HEADER, FALSE);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
                $data = curl_exec($ch);
                curl_close($ch);

                $data_tab = str_split($data, 33);

                echo "<table>";
                echo "<tr>";
                echo "<th>Numéro d'objet</th>";
                echo "<th>Valeur retournée</th>";
                echo "<th>Numéro de trame</th>";
                echo "<th>Année</th>";
                echo "<th>Mois</th>";
                echo "<th>Jour</th>";
                echo "<th>Heure</th>";
                echo "<th>Minute</th>";
                echo "<th>Secondes</th>";
                echo "</tr>";

                foreach ($data_tab as $index => $trame) {
                    list($t, $o, $r, $c, $n, $v, $a, $x, $year, $month, $day, $hour, $min, $sec) = sscanf($trame, "%1s%4s%1s%1s%2s%4s%4s%2s%4s%2s%2s%2s%2s%2s");
                    $trame_number = $index + 1;
                    echo "<tr>";
                    echo "<td>Trame $trame_number</td>";
                    echo "<td>$t</td>";
                    echo "<td>$o</td>";
                    echo "<td>$r</td>";
                    echo "<td>$c</td>";
                    echo "<td>$n</td>";
                    echo "<td>$v</td>";
                    echo "<td>$a</td>";
                    echo "<td>$year</td>";
                    echo "<td>$month</td>";
                    echo "<td>$day</td>";
                    echo "<td>$hour</td>";
                    echo "<td>$min</td>";
                    echo "<td>$sec</td>";
                    echo "</tr>";
                }

                echo "</table>";
                ?>
            </div>
        </div>

        <footer>
            <a href="cgu.html">Mentions légales</a>
            <a href="mailto:ridegreencontact@gmail.com" title="ridegreencontact@gmail.com">Contact</a>
            <a href="faq.html">faq</a>
        </footer>
    </body>
</html>
