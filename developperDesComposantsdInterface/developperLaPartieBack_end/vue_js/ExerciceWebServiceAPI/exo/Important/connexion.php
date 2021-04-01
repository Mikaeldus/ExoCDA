<?php
try
{
    $db = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '1989', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
}
catch (Exception $e)
{
    echo'Erreur: '.$e->getMessage().'<br>';
    echo'N° : '.$e->getCode();
    die('Fin du script');
}


