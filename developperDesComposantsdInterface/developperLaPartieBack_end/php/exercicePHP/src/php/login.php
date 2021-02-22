<?php
session_start();

include('login_script.php');
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="src/css/style.css">
    <title>Login</title>

</head>
<body>

<div class="container">
    <?php
    // si une variable de session est définie
    if (isset($_SESSION['login']) && count($tabError) === 0)
    {
        ?>
        <p>
            Bienvenue <?= $_SESSION['login'] ?>. Votre connexion est un succès!
        </p>
        <form method="POST" action="#">
            <input type="submit" id="back" name="back" value="Retour à la connexion" class="waves-effect waves-light btn" />
        </form>
        <?php
        // sinon on affiche le formulaire de connexion
    }
    else
    {
        ?>


        <div class="row">
            <form class="col s12" action="#" method="POST">
                <div class="row">
                    <div class="input-field col s6">
                        <input id="login" type="text" class="validate"  name="login" placeholder="Identifiant">
                        <span class="error"><?= isset($tabError['login']) ? $tabError['login'] : '' ?></span>
                        <label for="login">Identifiant</label>
                    </div>
                    <div class="input-field col s6">
                        <input id="password" type="password" class="validate" name="password" >
                        <span class="error"><?= isset($tabError['password']) ? $tabError['password'] : '' ?></span>
                        <label for="password">Mot de passe</label>
                    </div>
                </div>
                <input type="submit" id="submit" name="submit" class="waves-effect waves-light btn" value="Se connecter">
            </form>
        </div>

        <?php
    }
    ?>

</div>
</body>
</html>