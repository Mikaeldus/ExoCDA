<?php
require_once 'connexion.php';

$requete = $db->query ("SELECT * FROM user");
$resultat = $requete->fetchAll(PDO::FETCH_OBJ);
header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json');

echo json_encode($resultat);