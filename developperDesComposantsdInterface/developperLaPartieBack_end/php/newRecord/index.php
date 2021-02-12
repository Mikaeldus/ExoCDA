<?php
include('./include/dbconnect.php');
$requete = $db->prepare("select * from artist JOIN disc ON artist.artist_id = disc.artist_id ORDER BY artist_name");
$requete->execute();
?>
<?php
include('./include/header.php');
?>
<section>
    <h1>Liste des disques</h1>
    <table>
        <thread>
            <tr>
                <th></th>
                <th></th>
            </tr>
        </thread>
        <tbody>
        <?php
//        On declare le compteur
        $i = 0;
//        On defini la boucle
        while($row = $requete->fetch(PDO::FETCH_OBJ)){
//            Si on est a la premiere case
        if(($i % 2) == 0)
            {
                ?>
                <tr>
                <td>
                <img class="img-fluid"  src="./src/img/<?= $row->disc_picture ?>" align="left">
                <?= $row->disc_title ?><br>
                <?= $row->artist_name ?><br>
                    <u>Labelle :</u><?= $row->disc_label ?><br>
                    <u>Année :</u><?= $row->disc_year ?><br>
                    <u>Genre :</u> <?= $row->disc_genre ?><br>
                <div>
                    <form action="details.php" method='get' class="bou">
                        <input type="hidden" name='id' value=<?= $row->disc_id ?>>
                        <input type='submit' class="btn btn-secondary btn-dark "  value='Détails'></form>
                </div>
                </td>
                <?php
                $i++; // On incrémente le compteur
            }
        else //Si on est dans la deuxième
        {
            ?>
            <td>
            <img class="img-fluid"  src="./src/img/<?= $row->disc_picture ?>" align="left">
            <?= $row->disc_title ?><br>
            <?= $row->artist_name ?><br>
            <u>Labelle :</u><?= $row->disc_label ?><br>
            <u>Année :</u><?= $row->disc_year ?><br>
            <u>Genre :</u> <?= $row->disc_genre ?><br>
            <div>
                <form action="details.php" method='get' class="bou">
                    <input type="hidden" name='id' value=<?= $row->disc_id ?>>
                    <input type='submit' class="btn btn-secondary btn-dark "  value='Détails'></form>
            </div>
            </tr>
            <?php
            $i++; //Idem
        }
        }
        ?>

        </tbody>
    </table>
</section>

<?php
include('./include/footer.php');
?>
