<?php 

try
{
    $conn = new mysqli('localhost; dbname=isepbike; charset=utf8', 'root', '');
}catch(Exception $e)

{
    die('Erreur' . $e->getMessage());
}



?>