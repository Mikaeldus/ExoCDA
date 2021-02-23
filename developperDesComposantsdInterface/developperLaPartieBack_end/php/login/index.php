<?php
session_start();
include ('./include/dbconnect.php');
include('./include/requeteDB.php');

include('./include/header.php');
include('./controllers/login_script.php');
include('./include/dbconnect.php');


?>
<div class="container-fluid">
    <?php
    // si une variable de session est définie
    if (isset($_SESSION['id']) && count($tabError) === 0)
    {
        ?>
        <!--navbar-->
    <nav>
        <nav class="navbar navbar-light bg-light">
            <h1 class="h1">Liste des disques ( <?= $total ?> )</h1>
            <p>Bienvenue <?= $_SESSION['nom'] ?>. Votre connexion est un succès!</p>
            <form method="POST" action="#">
                <a class="btn btn1 btn-primary font-weight-bold" href="view/add_form.php">Ajouter</a>
                <input type="submit" id="back" name="back" value="Deconnexion"
                       class="btn btn1 btn-primary font-weight-bold"/>
            </form>
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
                //            j'utilise une boucle pour inserer les données de la requete
                foreach ($row

                as $key => $value){
                //                Si $i est divisble part deux ou est = 0
                if (($i % 2) == 0) {
                ?>
            <tr class="row">
                <td class="col-md-6 mb-3">
                    <img class="photo" alt="photo" title="photo" src="./src/img/<?= $value->disc_picture ?>"
                         align="left">
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
    ?>

<?php
// sinon on affiche le formulaire de connexion
}
else {
    ?>

    <div class="row">
        <div class="col-sm-6 offset-sm-3">
            <div class="card shadow p-3 mb-5 bg-white rounded mt-5">
                <div class="card-body">
                    <form action="" method="post">
                        <div class="form-group row">
                            <label for="email" class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="email" name="email"
                                       placeholder="Votre email">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-sm-3 col-form-label">Mot de passe</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" id="password" name="password"
                                       placeholder="Votre mot de passe">
                            </div>
                        </div>
                        <div class="form-group row text-center">
                            <div class="col-sm-12">
                                <input type="submit" class="btn btn-primary" name="login" value="Se connecter">
                                <a href="../view/inscription.php" class ="btn btn-primary">Inscription</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    </div>

    <?php
}
?>


<?php
include('./include/footer.php');
?>
