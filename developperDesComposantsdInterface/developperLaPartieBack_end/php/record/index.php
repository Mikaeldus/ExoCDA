<?php
include('./include/dbconnect.php');
$requete = $db->prepare("select * from artist JOIN disc ON artist.artist_id = disc.artist_id ORDER BY artist_name");
$requete->execute();
include('./include/header.php');
?>



<div class="row col-md-12 mb-12">
<div class="container-fluid">

    <h1 class="h1" style="font-size: 60px">Liste des disques</h1>

<table align="align-center">
<thead>
<tr>
    <th></th>
</tr>
</thead>

<tbody>

<?php
while ($row = $requete->fetch(PDO::FETCH_OBJ)){
    ?>

<tr>
    <td><img class="img-fluid img-reponsive  col-md-6 mb-12"  src="./src/img/<?= $row->disc_picture ?>" align="left">
        <p class="art"> <?= $row->disc_title ?></p>
        <p class="art"> <?= $row->artist_name ?></p>
        <p class="art"><u>Labelle :  </u> <?= $row->disc_label ?></p>
        <p class="art"><u>Année :  </u><?= $row->disc_year ?></p>
        <p class="art"><u>Genre :  </u> <?= $row->disc_genre ?></p>
        <div>
        <form action="details.php" method='get' class="bou">
            <input type="hidden" name='id' value=<?= $row->disc_id ?>>
            <input type='submit' class="btn btn-secondary btn-dark "  value='Détails'></form>
        </div>
    </td>
</tr>

<?php
}
?>

</tbody>
</table>
</div>
</div>

<?php
include('./include/footer.php');
?>