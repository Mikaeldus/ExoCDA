<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="../js/exercice5.js"></script>
    <title>Document</title>
</head>
<body>

<script>

</script>

<button><a href="../../index.php">Retour à l'accueil</a></button><br>
<?php
// Montre l'adresse ip du server.
echo"Adresse IP du server :   ";
echo $_SERVER["SERVER_NAME"]."<br>";

//Montre l'adresse IP du visiteur.
echo"Adresse IP du visiteur :   ";
echo $_SERVER["REMOTE_ADDR"]."<br>";

?>
</body>
</html>