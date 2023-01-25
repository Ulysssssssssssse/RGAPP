<?php 
try
{
    $bdd = new PDO('mysql:host=localhost; dbname=isepbike; charset=utf8', 'lightsail', 'lightsail');}
    
    catch(Exception $e)
{
    die('Erreur' . $e->getMessage());
}
?>