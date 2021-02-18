<?php
include('../include/dbconnect.php');
include('../include/header.php');
include('../include/requeteDB.php');
include('../controllers/add_script.php');
?>

<body>
<div class="container-fluid">

<!--    onsubmit="return verif(ajout)-->

    <section>
        <div class="col-12">

                <h2 style="text-align: center">Ajouter un album</h2>
            <div class="row justify-content-center">
                <form enctype="multipart/form-data" id="formAdd" action="" method="POST" >
                    <label class="col col-form-label font-weight-bold" for="artist_name">Artiste :</label>

                    <div>
                        <select type="text" class="select form-control" id="artist_name" name="artist">
                            <?php
                            // Boucle pour récupérer les données et les afficher dans le tableau
                            foreach ($artistList as $artist) {
                                ?>
                                <option value="<?= $artist->artist_id ?>"><?= $artist->artist_name ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>

                    <label class="col col-form-label font-weight-bold">Titre :</label>
                    <input type="text" name="addTitle" id="addTitle" class="form-control" placeholder="Entrez le titre">
                    <span id="missTitre" class="hint missTitre"></span>

                    <label class="col col-form-label font-weight-bold">Label :</label>
                    <input type="text" name="addLabel" id="addLabel" class="form-control" placeholder="Entrez le label">
                    <span id="missLabel" class="hint missLabel"></span>

                    <label class="col col-form-label font-weight-bold">Année :</label>
                    <input type="number" name="addYear" id="addYear" class="form-control" placeholder="Entrez l'année">
                    <span id="missYear" class="hint missYear"></span>


                    <label class="col col-form-label font-weight-bold">Genre :</label>
                    <input type="text" name="addGender" id="addGender" class="form-control" placeholder="Entrez le genre">
                    <span id="missGender" class="hint missGender"></span>


                    <label class="col col-form-label font-weight-bold">Prix :</label>
                    <input type="number" name="addPrice" id="addPrice" class="form-control" placeholder="Entrez le prix">
                    <span id="missPrice" class="hint missPrice"></span>


                    <!-- Uploader une image -->
                    <fieldset>
                        <p>
                            <label for="fichier" title="" class="col col-form-label font-weight-bold">Jaquette :</label>
                            <input type="hidden" name="MAX_FILE_SIZE" value=""/>
                            <input name="fichier" type="file" id="fichier" class="form-control"/>

                        </p>
                    </fieldset>

                    <div class="text-center">
                        <input id="ajout" type="submit" class="logBtn btn btn-primary" name="submit" >
                        <a href="../index.php" class="logBtn btn btn-primary">Retour</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
<?php
if (!empty($message)) {
    echo '<p>', "\n";
    echo "\t\t<strong>", htmlspecialchars($message[0]), "</strong><br>\n";
    echo "\t\t<strong>", htmlspecialchars($message[1]), "</strong><br>\n";
    echo "\t\t<strong>", htmlspecialchars($message[2]), "</strong><br>\n";
    echo "\t\t<strong>", htmlspecialchars($message[3]), "</strong><br>\n";
    echo "\t\t<strong>", htmlspecialchars($message[4]), "</strong><br>\n";
    echo "\t\t<strong>", htmlspecialchars($message[5]), "</strong><br>\n";
    echo "\t\t<strong>", htmlspecialchars($message[6]), "</strong>\n";

    echo "\t</p>\n\n";
}
?>

    <?php

    include('../include/footer.php');
    ?>

