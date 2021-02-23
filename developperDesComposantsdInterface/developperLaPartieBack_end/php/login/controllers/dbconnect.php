<?php

//Je me connecte a la DB
try
{
    $db = new PDO("mysql:host=localhost;charset=utf8;dbname=login", "root", "1989");

    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (Exception $e)
{
    echo 'Erreur : ' . $e->getMessage() . '<br />';
    echo 'N° : ' . $e->getCode();
    die('Fin du script');
}
?>