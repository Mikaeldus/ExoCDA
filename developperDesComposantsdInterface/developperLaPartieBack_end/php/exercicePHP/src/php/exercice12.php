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
    <h3>Comment déterminer si une année est bissextile ?</h3>
    <?php
    //    Je determine ma variable date
    $date = new DateTime();

    //    J'utilise une boucle qui qui va prendre +1 des que $i = 4.' pour les année bissextile.
    for ($i = 0; $i < 4; $i++) {
//        je modify la date pour qu'elle prenne 1 years part boucle
        $date->modify('+1 years');
//        Lorsque le if retourne 1
        if ($date->format('L') == 1) {
            ?>
            L'année <?= $date->format('Y') ?> sera la prochaine année bissextile.
            <?php
        }
    }
    ?>


</div>

</body>
</html>






