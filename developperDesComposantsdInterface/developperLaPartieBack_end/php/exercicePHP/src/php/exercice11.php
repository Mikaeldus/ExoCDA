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
    <h3>Combien reste-t-il de jours avant la fin de votre formation.</h3>

    <?php
    // Declaration des objets date
    $datefin = new DateTime('2021-08-31');
    $aujourdhui = new DateTime();
    // Différence entre date de la fin de formation et aujourd'hui
    $temps = $datefin->diff($aujourdhui);
    // Affichage de la différence en jours
    echo "Il reste ".$temps->days." jours.";
    ?>


</div>

</body>
</html>





