<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        /* un peu de style  */
        caption {
            border-style: solid;
        }

        table {
            text-align: center;
            border-style: solid;
        }

        th {
            border-style: solid;
            background-color: #ff0000;
        }

        td {
            border-style: solid;
        }
    </style>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="../js/exercice5.js"></script>
    <title>Document</title>
</head>
<body>

<script>

</script>

<button><a href="../../index.php">Retour à l'accueil</a></button>
<br><br>


<div>
    <h3>Montrez que la date du 32/17/2019 est erronée.</h3><br>
    <?php
    $date = "32/17/2019";
    //    Commande avec DateTime
    $testDate = DateTime::createFromFormat('d/m/Y', $date); // On analyse une date en string selon le format demandé
    //    On recupere les erreurs de l'objet DateTime dans un tableau'
    $errors = $testDate->getLastErrors();

    if ($errors['warning_count'] >= 1)
    {
    ?>
    La date du <?= $date ?> est erronée.
</div>
<?php
}
else {
    ?>
    La date du <?= $date ?> est valide.
    <?php
}
?>

</div>

</body>
</html>






