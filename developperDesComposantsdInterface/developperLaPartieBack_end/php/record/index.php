<?php
include('./include/dbconnect.php');
include('./include/header.php');
include('./include/requeteDB.php');

//Pour la page Index

$requete1 = $db->prepare("select * from artist JOIN disc ON artist.artist_id = disc.artist_id ORDER BY artist_name");
$requete1->execute();

//On verifie la requete
if (!$requete1){
    $tabErreur = $db->errorInfo();
    echo $tabErreur[2];
    die('Erreur dans la requete');
}
//On verifie la presence de données
if($requete1->rowCount() == 0){
    die('la table est vide');
}

//Je creer une variable pour recuperer le total de row pour l'index'
$total = $requete1->rowcount();


//requete pour les donnée dans l'index'
$requeteIn = $db->prepare("select * from artist JOIN disc ON artist.artist_id = disc.artist_id ORDER BY artist_name");

if (!empty($key) && !empty($value)) {
    $requeteIn->bindParam(":" . $key . "", $value);
} elseif (!empty($key) && !empty($value)) {

    $requeteIn->bindValue(":" . $key . "", "%" . $value . "%");
}
$requeteIn->execute();
while ($index = $requeteIn->fetch(PDO::FETCH_OBJ)) {
    $row[] = $index;
}

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
<section>
    <table class="container-fluid">
        <thread>
            <tr class="col-12">
                <th></th>
                <th></th>
            </tr>
        </thread>
        <tbody>
        <tr>
            <?php
            $i = 0;
//            j'utilise une boucle pour inserer les row dans le html'
            foreach ($row as $key => $value){
//                Si $i est divisble part deux ou est = 0
            if (($i % 2) == 0) {
            ?>
        <tr class="row">
            <td class="col-md-6 mb-3">
                <img class="photo" alt="photo" title="photo" src="./src/img/<?= $value->disc_picture ?>" align="left">
                <p><?= $value->disc_title ?></p>
                <p><?= $value->artist_name ?></p>
                <pre>Labelle : <?= $value->disc_label ?></pre>
                <pre>Année : <?= $value->disc_year ?></pre>
                <pre>Genre : <?= $value->disc_genre ?></pre>
                </div>
                <div>
                    <form action="./view/detail.php" method='get' class=" bottom">
                        <input type="hidden" name='id' value='<?= $value->disc_id ?>'>
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
                <img class="photo" alt="photo" title="photo" src="./src/img/<?= $value->disc_picture ?>" align="left">
                <p><?= $value->disc_title ?></p>
                <p><?= $value->artist_name ?></p>
                <pre>Labelle : <?= $value->disc_label ?></pre>
                <pre>Année : <?= $value->disc_year ?></pre>
                <pre>Genre : <?= $value->disc_genre ?></pre>
                </div>
                <div>
                    <form action="./view/detail.php" method='get' class=" bottom">
                        <input type="hidden" name='id' value='<?= $value->disc_id ?>'>
                        <input type='submit' class="btn btn-primary" value='Détails'>
                    </form>
                </div>
            </td>
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
