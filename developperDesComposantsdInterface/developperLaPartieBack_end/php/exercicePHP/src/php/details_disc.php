<?php
$db = new PDO('mysql:host=localhost;charset=utf8;dbname=record', 'root', '1989');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$requete = $db->prepare("select * from artist JOIN disc ON artist.artist_id = disc.artist_id where disc_id=7 ");
$requete->execute(array($_GET["disc_id"]));
$disc = $requete->fetch(PDO::FETCH_OBJ);

?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Test PDO</title>
</head>
<body>
Disc N° <?= $disc->disc_id ?>
Disc name <?= $disc->disc_title ?>
Disc year <?= $disc->disc_year ?>
Auteur <?= $disc->artist_name ?>
</body>
</html>