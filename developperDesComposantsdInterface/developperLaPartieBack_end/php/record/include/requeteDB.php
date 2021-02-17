<?php

//Pour la page Index

$requete1 = $db->prepare("select * from artist JOIN disc ON artist.artist_id = disc.artist_id ORDER BY artist_name");
$requete1->execute();

//On verifie la requete
if (!$requete1){
    $tabErreur = $db->errorInfo();
    echo $tabErreur[2];
    die('Erreur dans la requete');
}
//On verifie la presence de données
if($requete1->rowCount() == 0){
    die('la table est vide');
}

//Je creer une variable pour recuperer le total de row pour l'index'
$total = $requete1->rowcount();



//Page globale

// requete permettant l'affichage des artistes dans le select
try {
    $requete = $db->prepare('SELECT * FROM artist ORDER BY artist_name');
    $requete->execute();
    $artistList = $requete->fetchAll(PDO::FETCH_OBJ);
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}



//Page update

// requete permettant de lies les donnnées part rapport à l'ID'
$requete2 = $db->prepare('SELECT * FROM artist JOIN disc ON artist.artist_id = disc.artist_id WHERE disc_id = :id');
$requete2->bindParam(':id', $_GET['id'], PDO::PARAM_INT);
$requete2->execute();
$disc = $requete2->fetch(PDO::FETCH_OBJ);



//Page detail

// requete permettant de lies les donnnées part rapport à l'ID'
$requete4 = $db->prepare('SELECT * FROM artist JOIN disc ON artist.artist_id = disc.artist_id WHERE disc_id = :id');
$requete4->bindParam(':id', $_GET['id'], PDO::PARAM_INT);
$requete4->execute();


?>