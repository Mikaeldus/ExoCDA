<?php
include('../../controlers/login_script.php');
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
<?php
echo $_SESSION['Utilisateur'];
?>
<div class="container">
    <?php
    if(isset($_POST['login']) && count($formError) === 0) {
        ?>
        <span class="alert alert-succes">Connexion réussi</span>
        <?php
    } else {
    if(isset($formError['login'])) {
        ?>
        <span class="alert alert-danger"><?= $formError['login'] ?></span>
        <?php
    }
    ?>
    <div class="row">
        <div class="col-sm-6 offset-sm-3">
            <form action="" method="post" novalidate="novalidate">
                <div class="mb-3">
                    <label for="mail" class="form-label">Email</label>
                    <input type="email" class="form-control" id="mail" name="mail"
                           value="<?= isset($_POST['mail']) ? $_POST['mail'] : '' ?>">
                    <span class="error"><?= isset($formError['mail']) ? $formError['mail'] : '' ?></span>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Mot de passe</label>
                    <input type="password" class="form-control" id="password" name="password"
                           value="<?= isset($_POST['password']) ? $_POST['password'] : '' ?>">
                    <span class="error"><?= isset($formError['password']) ? $formError['password'] : '' ?></span>
                </div>
                <input type="submit" name="login" value="Se connecter" id="submit" class="btn btn-secondary">
                </div>
            </form>
        </div>
    </div>
</div>

<?php
}
?>
</body>
</html>