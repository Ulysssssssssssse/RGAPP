//Fichier de config

<?php 
try
{
    $bdd = new PDO('mysql:host=localhost; dbname=isepbike; charset=utf8', 'root', '');
}catch(Exception $e)

{
    die('Erreur' . $e->getMessage());
}



?>