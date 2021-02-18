<?php

//Page globale

// requete permettant l'affichage des artistes dans le select
try {
    $requete = $db->prepare('SELECT * FROM artist ORDER BY artist_name');
    $requete->execute();
    $artistList = $requete->fetchAll(PDO::FETCH_OBJ);
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}

?>