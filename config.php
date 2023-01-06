<?php 

try
{
    $bdd = new PDO('mysql:host=localhost; dbname=isepbike; charset=utf8', 'root', '');}
    
    catch(Exception $e)

{
    die('Erreur' . $e->getMessage());
}

?>

<?php
  $host       = "<localhost>";
  $username   = "<root>";
  $password   = "<1234>";
  $dsn        = "mysql:host=$host;dbname=isepbike";
  $options    = array(
                  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
                );