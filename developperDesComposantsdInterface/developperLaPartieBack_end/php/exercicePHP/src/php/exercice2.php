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
<div>
    <!-- tant que $a n'est pas egale à 500 alors la boucle continu  -->
    <?php
    $a = 1;
    while($a < 501) {
        echo $a."  :  Je dois faire des sauvegardes régulières de mes fichiers.". "</br>";
        $a++;
		}
    ?>
</div>
</body>
</html>

