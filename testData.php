<?php



$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://projets-tomcat.isep.fr:8080/appService/?ACTION=GETLOG&TEAM=G02E");
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$data = curl_exec($ch);
curl_close($ch);

$data_tab = str_split($data, 33);

echo "Tabular Data:<br />";
echo "<table>";
echo "<tr>";
echo "<th>Trame</th>";
echo "<th>Type de trame</th>";
echo "<th>Numéro d'objet</th>";
echo "<th>Type de requête</th>";
echo "<th>Numéro de capteur</th>";
echo "<th>Valeur retournée</th>";
echo "<th>Numéro de trame</th>";
echo "<th>Checksum</th>";
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