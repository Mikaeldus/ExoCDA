<?php
 include('./src/php/dbconnect.php');
$requete = $db->prepare("select * from artist JOIN disc ON artist.artist_id = disc.artist_id ORDER BY artist_name");
$requete->execute();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="src/css/style.css">
    <script src="./main.js"></script>
    <title>Record</title>
</head>
<body>
<table>
<thead>
<tr>
    <th></th>

    <th>Album</th>
    <th>Artiste</th>
    <th>Labelle</th>
    <th>Année</th>
    <th>Genre</th>

</tr>
</thead>
<tbody>
<?php
while ($row = $requete->fetch(PDO::FETCH_OBJ)){
    ?>
 <tr>
     <td><img class="photo" src="./src/img/<?= $row->disc_picture ?>"></td>
     <td><?= $row->disc_title ?></td>
     <td><?= $row->artist_name ?></td>
     <td><?= $row->disc_label ?></td>
     <td><?= $row->disc_year ?></td>
     <td><?= $row->disc_genre ?></td>
 </tr>
<?php
}
?>
</tbody>
</table>
</body>

</html>