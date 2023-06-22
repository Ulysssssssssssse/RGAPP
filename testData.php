<?php
session_start();
if(!isset($_SESSION['user'])){
    header('location:connexion.php');
}
require_once 'config.php';
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
  <button id="boutonInverserLED">Inverser état LED</button>
</div>
<?php

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://projets-tomcat.isep.fr:8080/appService/?ACTION=GETLOG&TEAM=G02E");
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$data = curl_exec($ch);
curl_close($ch); 

$data_tab = str_split($data, 33);

//récupère date et heure de la dernière mesure
$derniereDateHeure = $bdd->query('SELECT DateMesure, HeureMesure FROM mesures WHERE IdMesure=(SELECT max(IdMesure) FROM mesures)')->fetch();
$derniereDate = $derniereDateHeure['DateMesure'];
$derniereHeure = $derniereDateHeure['HeureMesure'];

$date = DateTime::createFromFormat('Y-m-d', $derniereDate);
$time = DateTime::createFromFormat('H:i:s', $derniereHeure);

$derniereDateHeure = clone $date;
$derniereDateHeure->setTime($time->format('H'), $time->format('i'), $time->format('s'));

$derniereDateHeureText = $derniereDateHeure->format('Y-m-d H:i:s');

$ajouterMesure = $bdd->prepare('INSERT INTO mesures (IdCapteur, DateMesure, HeureMesure, ValeurMesure) VALUES (?, ?, ?, ?)');


echo "<table id='myTable'>";
echo "<thead>";
echo "<tr>";
echo "<th>Capteur</th>";
echo "<th>Valeur</th>";
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
  if ($index >= 2300) { 
    list($t, $o, $r, $c, $n, $v, $a, $x, $year, $month, $day, $hour, $min, $sec) = sscanf($trame, "%1s%4s%1s%1s%2s%4s%4s%2s%4s%2s%2s%2s%2s%2s");
    // t: type de trame
    // o: objet
    // r: requête
    // c: capteur
    // n: 
    // v: valeur
    // a: 
    // x:  
    
    $dateMesure = new DateTime();
    $dateMesure -> setDate($year, $month, $day);

    $heureMesure = new DateTime();
    $heureMesure -> setTime($hour, $min, $sec);

    $dateHeureMesure = clone $dateMesure;
    $dateHeureMesure -> setTime($hour, $min, $sec);
    
    if ($dateHeureMesure > $derniereDateHeure){
      $ajouterMesure->execute([intval($c), $dateMesure->format('Y-m-d'), $heureMesure->format('H:i:s'), $v]);
    }


    $trame_number = $index + 1;
    echo "<tr>";
    if ($c == 3) { // capteur temp
      echo "<td>Température</td>"; 
      $v = floatval($v)/10;
      echo "<td>$v °C </td>";
    } 
    elseif ($c == 7) { // capteur son
      echo "<td>Son</td>"; 
      echo "<td>$v</td>"; 
    } 
    elseif ($c == 9) { // err
      echo "<td>ECG</td>"; 
      echo "<td>$v</td>"; 
    } 
    else {
      echo "<td>$c</td>"; 
      echo "<td>$v</td>"; 
    }
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

//Ici, on a le code JS pour inverser l'état de la LED
document.getElementById("boutonInverserLED").addEventListener("click", function(){
  // Envoi la requête GET à la passerelle pour allumer la LED
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      console.log("La trame a été envoyée."); // Afficher un message dans la console si la trame a été envoyée avec succès
    }
    else if (this.readyState == 4 && this.status != 200) {
      console.error("Erreur lors de l'envoi de la trame :", this.responseText); // Afficher un message d'erreur dans la console si la trame n'a pas été envoyée avec succès
    }
  };
  xhttp.open("GET", "http://projets-tomcat.isep.fr:8080/appService/?ACTION=COMMAND&TEAM=G02E&TRAME=1", true); // Remplacez "adresseIP" et "port" par les valeurs correspondantes pour votre passerelle
  xhttp.send();
});
</script>

</body>
</html>

