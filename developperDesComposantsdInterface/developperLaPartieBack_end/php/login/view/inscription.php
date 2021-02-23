<?php
session_start();
include ('../include/dbconnect.php');
include ('../include/header.php');
include('../controllers/inscription_script.php');

?>
<div class="container">
    <?php
    if (isset($_POST['inscription']) && count($tabError) === 0) {

        header('Location: http://localhost:8000/index.php');
        ?>
        <?php
    } else {
        ?>
        <div class="row">
            <div class="col-sm-6 offset-sm-3">
                <div class="card shadow p-3 mb-5 bg-white rounded mt-5">
                    <div class="card-body">
                        <p class="h2 mb-3">Inscription</p>
                        <!-- signin form -->
                        <form action="" method="post" novalidate class="">
                            <div class="form-group row">
                                <label for="nom" class="col-sm-3 col-form-label">Nom</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="nom" name="nom"
                                           placeholder="Votre nom">
                                </div>
                                <span class="error"><?= isset($tabError['nom']) ? $tabError['nom'] : '' ?></span>
                            </div>
                            <div class="form-group row">
                                <label for="prenom" class="col-sm-3 col-form-label">Prénom</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="prenom" name="prenom"
                                           placeholder="votre prénom">
                                </div>
                                <span class="error"><?= isset($tabError['prenom']) ? $tabError['prenom'] : '' ?></span>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="email" name="email"
                                           placeholder="Votre email">
                                </div>
                                <span class="error"><?= isset($tabError['email']) ? $tabError['email'] : '' ?></span>
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-sm-3 col-form-label">Mot de passe</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control" id="password" name="password"
                                           placeholder="Votre mot de passe">
                                </div>
                                <span class="error"><?= isset($tabError['password']) ? $tabError['password'] : '' ?></span>
                            </div>
                            <div class="form-group row text-center">
                                <div class="col-sm-12">
                                    <input type="submit" class="btn btn-primary" name="inscription" value="S'inscrire">
                                    <a href="../index.php" class="btn btn-primary">Retour</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
    ?>


</div>
<?php
include ('../include/footer.php');
?>
