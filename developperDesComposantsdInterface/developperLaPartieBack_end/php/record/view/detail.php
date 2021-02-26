<?php
include "../controllers/dbconnect.php";
include('../include/header.php');
include "../controllers/detail_script.php";


?>


<!--navbar-->
<div class="row">
    <div class="col-12">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <h1 class="h2">Détails</h1>
        </nav>
    </div>
</div>
<!--navbar-->
<body>

<?php
//je recupere les données et change le type avec une boucle
while ($row = $requete4->fetch(PDO::FETCH_OBJ)) {
    ?>
    <section class="container-fluid">

        <div class="row align-items-end">
            <div class="col-md-6 mb-3">
                <p class="font-weight-bold"><u>Title :</u></p>
                <p class="bg-light border mt-2"><?= $row->disc_title ?></p>
            </div>
            <div class="col-md-6 mb-3">
                <p class="font-weight-bold"><u>Artist :</u></p>
                <p class="bg-light border mt-2"><?= $row->artist_name ?></p>
            </div>
        </div>

        <div class="row align-items-end">
            <div class="col-md-6 mb-3">
                <p class="font-weight-bold"><u>Year :</u></p>
                <p class="bg-light border mt-2"><?= $row->disc_year ?></p>
            </div>
            <div class="col-md-6 mb-3">
                <p class="font-weight-bold"><u>Genre :</u></p>
                <p class="bg-light border mt-2"><?= $row->disc_genre ?></p>
            </div>
        </div>

        <div class="row align-items-end">
            <div class="col-md-6 mb-3">
                <p class="font-weight-bold"><u>Label :</u></p>
                <p class="bg-light border mt-2"><?= $row->disc_label ?></p>
            </div>
            <div class="col-md-6 mb-3">
                <p class="font-weight-bold"><u>Price :</u></p>
                <p class="bg-light border mt-2"><?= $row->disc_price ?> €</p>
            </div>
        </div>

        <div class="row justify-content-center text-center">
            <div class="col-md-6 mb-3">
                <p class="font-weight-bold"></p>
                <img class="img-fluid width: 100%" alt="photo" title="photo" src="../src/img/<?= $row->disc_picture ?>">
            </div>
        </div>
        <div class="container">
            <div class="row col-12 justify-content-center text-center">


                <form action="update_form.php" method='GET'>
                    <input type="hidden" name='id' value='<?= $row->disc_id ?>'>
                    <input type="submit" class="logBtn btn btn-primary" value='Modifier'>
                </form>
                <form action="delete_form.php" method='GET'>
                    <input type="hidden" name='id' value='<?= $row->disc_id ?>'>
                    <input type="hidden" name='disc_picture' value='<?= $row->disc_picture ?>'>
                    <input type="hidden" name='disc_title' value='<?= $row->disc_title ?>'>
                    <input type="submit" class="logBtn btn btn-primary" value='Supprimer'>
                </form>
                <form>
                    <a href="../index.php" class="logBtn btn btn-primary">Retour</a>
                </form>
            </div>

        </div>


    </section>
    <?php
}
?>

<?php
include('../include/footer.php');
?>

