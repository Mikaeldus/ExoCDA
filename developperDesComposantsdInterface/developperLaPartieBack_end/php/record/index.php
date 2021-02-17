<?php
include('./include/dbconnect.php');
include('./include/header.php');
include('./include/requeteDB.php');


?>

<!--navbar-->
<nav>
    <nav class="navbar navbar-light bg-light">
        <h1 class="h1">Liste des disques ( <?= $total ?> )</h1>
        <a class="btn btn1 btn-primary font-weight-bold" href="view/add_form.php">Ajouter</a>
    </nav>
</nav>
<!--navbar-->

<!----body---->
<body>
<div class="container-fluid">

    <section>

        <!--    On declare la table -->
        <table class="container-fluid">
            <thread>
                <tr class="col-12">
                    <th></th>
                    <th></th>
                </tr>
            </thread>
            <tbody>
            <?php
            // On declare le compteur
            $i = 0;
            //        On defini la boucle
            while ($row = $requete1->fetch(PDO::FETCH_OBJ)) {
//            Si on est a la premiere case
                if (($i % 2) == 0) {
                    ?>

                    <tr class="row">
                    <td class="col-md-6 mb-3">

                        <p>
                            <img class="photo" src="./src/img/<?= $row->disc_picture ?>" align="left">
                            <p><?= $row->disc_title ?></p>
                            <p><?= $row->artist_name ?></p>
                            <pre>Labelle : <?= $row->disc_label ?></pre>
                            <pre>Année : <?= $row->disc_year ?></pre>
                            <pre>Genre : <?= $row->disc_genre ?></pre>
                        </div>
                        <div>
                            <form action="./view/detail.php" method='get' class=" bottom">
                                <input type="hidden" name='id' value=<?= $row->disc_id ?>>
                                <input type='submit' class="btn btn-primary" value='Détails'>
                            </form>
                        </div>

                    </td>
                    <?php
                    $i++; // On incrémente le compteur
                } else //Si on est dans la deuxième
                {
                    ?>
                    <td class="col-md-6 mb-3">
                        <img class="photo" src="./src/img/<?= $row->disc_picture ?>" align="left">
                        <p><?= $row->disc_title ?></p>
                        <p><?= $row->artist_name ?></p>
                        <pre>Labelle : <?= $row->disc_label ?></pre>
                        <pre>Année : <?= $row->disc_year ?></pre>
                        <pre>Genre : <?= $row->disc_genre ?></pre>
                        <div>
                            <form action="./view/detail.php" method='get' class="">
                                <input type="hidden" name='id' value=<?= $row->disc_id ?>>
                                <input type='submit' class="btn btn-primary " value='Détails'>
                            </form>
                        </div>
                    </tr>
                    </td>
                    <?php
                    $i++; //Idem
                }
            }
            ?>
</div>
</tbody>
</table>
</section>

<?php
include('./include/footer.php');
?>
