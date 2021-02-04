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
    <?php
    // j'initialise ma boucle avec une variable qui prend 1 tant qu'il n'est pas supérieur à 150.
    for($nombre = 0; $nombre < 150; $nombre++){
        ?>
        <?php
//        Si ma variable peut etre diviser part deux et qui est different de 0 alors la boucle continu.
//        On affiche tous les nombres qui ne sont pas divisable part deux.
        if($nombre % 2 !== 0){
            ?>
            <?= $nombre ?>
            <?php
        }
    }
    ?>
</div>
</body>
</html>
