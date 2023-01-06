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
  $host       = "<endpoint>";
  $username   = "<username>";
  $password   = "<password>";
  $dsn        = "mysql:host=$host;dbname=tasks";
  $options    = array(
                  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
                );