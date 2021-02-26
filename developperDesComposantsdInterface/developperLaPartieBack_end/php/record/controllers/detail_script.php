<?php
//Page detail

// requete permettant de lies les donnnées part rapport à l'ID'
$requete4 = $db->prepare('SELECT * FROM artist JOIN disc ON artist.artist_id = disc.artist_id WHERE disc_id = :id');
$requete4->bindParam(':id', $_GET['id'], PDO::PARAM_INT);
$requete4->execute();
//Je recupere mon ID
$id = $_GET['id'];
?>