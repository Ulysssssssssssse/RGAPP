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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body id="accueil">

<?php include('header.php'); ?>
    
<h3> Bonjour <?php echo $_SESSION['user']; ?></h3>

<div style="display:flex; justify-content:center; align-items:center; margin-top:20px;">
  <button id="bouttonAllumerLED">Allumer la LED</button>
</div>
<?php

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://projets-tomcat.isep.fr:8080/appService/?ACTION=GETLOG&TEAM=G02E");
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$data = curl_exec($ch);
curl_close($ch); 

$data_tab = str_split($data, 33);

echo "Voici les données issues de la carte :<br />";
echo "<table id='myTable'>";
echo "<thead>";
echo "<tr>";
echo "<th>Valeur température</th>";
echo "<th>Jour</th>";
echo "<th>Mois</th>";
echo "<th>Année</th>";
echo "<th>Heure</th>";
echo "<th>Minute</th>";
echo "<th>Secondes</th>";
echo "</tr>";
echo "</thead>";

echo "<tbody>";

foreach ($data_tab as $index => $trame) {
    if ($index >= 1388) { // Condition pour commencer à la trame 1389, les trames avant ne nous intéressent pas car elles ne contiennent pas les bonnes valeurs de température
    list($t, $o, $r, $c, $n, $v, $a, $x, $year, $month, $day, $hour, $min, $sec) = sscanf($trame, "%1s%4s%1s%1s%2s%4s%4s%2s%4s%2s%2s%2s%2s%2s");
    $trame_number = $index + 1;
    echo "<tr>";
    echo "<td>$v</td>";
    echo "<td>$day</td>";
    echo "<td>$month</td>";
    echo "<td>$year</td>";
    echo "<td>$hour</td>";
    echo "<td>$min</td>";
    echo "<td>$sec</td>";
    echo "</tr>";
    }
}

echo "</tbody>";

echo "</table>";

?>

<script>
  // Ce code JS permet d'afficher le tableau et de pouvoir le trier
  // On peut trier dans l'ordre croissant ou decroissant en cliquant sur le nom de la colonne
$(document).ready(function() {
  $("table#myTable th").click(function() {
    var table = $(this).parents("table").eq(0);
    var rows = table.find("tr:gt(0)").toArray().sort(comparer($(this).index()));
    this.asc = !this.asc;
    if (!this.asc) {
      rows = rows.reverse();
    }
    for (var i = 0; i < rows.length; i++) {
      table.append(rows[i]);
    }
  });
});

function comparer(index) {
  return function(a, b) {
    var valA = getCellValue(a, index);
    var valB = getCellValue(b, index);
    return $.isNumeric(valA) && $.isNumeric(valB) ? valA - valB : valA.localeCompare(valB);
  };
}

function getCellValue(row, index) {
  return $(row).children("td").eq(index).text();
}

//Ici, on a le code JS pour l'envoie de la demande d'allumage de LED
document.getElementById("BouttonAllumerLED").addEventListener("click", function(){
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      console.log(this.responseText); // Afficher la réponse du serveur dans la console
    }
  };
  xhttp.open("GET", "testData.php", true);
  xhttp.send();
});
</script>

</body>
</html>
