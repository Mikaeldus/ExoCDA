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
    <h3>Ecrivez une fonction qui permette de générer un lien.</h3><br>

    <?php
    //    Je creer la function
    //    Je determine à l'appel de la function les deux variables utiliser'
    function lien($url, $util) { ?>
    <a href=<?= '"' . $url . '">' . $util ?></a>
        <?php } ?>
        <?php lien("https://ncode.amorce.org/login", "Test de l'appel"); ?>
</div>


</body>
</html>




