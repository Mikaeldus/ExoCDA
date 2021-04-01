<?php
include('./include/header.php');
include "./controllers/dbconnect.php";
include "./controllers/index_script.php";
?>
<body>


<div class=" container-fluid">

    <!--navbar-->
    <nav class="">
        <nav class="navbar navbar-light bg-light">
            <h1 class="h1">Liste des disques (<?= $total ?>)</h1>
            <a class="btn btn1 btn-primary font-weight-bold" href="view/add_form.php">Ajouter</a>
        </nav>
    </nav>
    <!--navbar-->

    <!----body---->

    <?php
    $i = 0;
    //            j'utilise une boucle pour inserer les données de la requete
    foreach ($row as $key => $value){
    //                Si $i est divisble part deux ou est = 0
    if (($i % 2) == 0) {
    ?>
    <div class="row">
        <div class="col-md-6 mb-3">

            <div class="row">
                <div class="col-md-6 mb-6">
                    <img class="img-fluid width: 100%" alt="photo" title="photo"
                         src="./src/img/<?= $value->disc_picture ?>"
                         align="left">
                </div>

                <div>
                    <p><?= $value->disc_title ?></p>
                    <p><?= $value->artist_name ?></p>
                    <p>Labelle : <?= $value->disc_label ?></p>
                    <p>Année : <?= $value->disc_year ?></p>
                    <p>Genre : <?= $value->disc_genre ?></p>

                    <form action="./view/detail.php" method='get' class=" bottom">
                        <input type="hidden" name='id' value='<?= $value->disc_id ?>'>
                        <input type='submit' class="btn btn-primary" value='Détails'>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-6 mb-3">

            <div class="row">
                <?php
                $i++; // On incrémente le compteur
                } else //Si on est dans la deuxième
                {
                ?>

                <div class="col-md-6 mb-3">
                    <img class="img-fluid width: 100%" alt="photo" title="photo"
                         src="./src/img/<?= $value->disc_picture ?>"
                         align="left">
                </div>

                <div><p><?= $value->disc_title ?></p>
                    <p><?= $value->artist_name ?></p>
                    <p>Labelle : <?= $value->disc_label ?></p>
                    <p>Année : <?= $value->disc_year ?></p>
                    <p>Genre : <?= $value->disc_genre ?></p>

                    <form action="./view/detail.php" method='get' class=" align-bottom">
                        <input type="hidden" name='id' value='<?= $value->disc_id ?>'>
                        <input type='submit' class="btn btn-primary" value='Détails'>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
<?php
$i++; //Idem
}
}
?>

<?php
include('./include/footer.php');
?>
