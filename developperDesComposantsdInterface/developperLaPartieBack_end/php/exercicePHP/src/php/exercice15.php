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
    <h3>Ajoutez 1 mois à la date courante.</h3><br>

    <!--    j'affiche la date du jour -->
    <?php $date = date("d-m-Y"); ?>
    <?php echo "La date du jour : " . $date . ""; ?>
    <br>

    <!--    j'affiche la date dans 1 mois part rapport a la date du jour -->
    <?php $date1 = date('d-m-Y', strtotime('+ 1 month')); ?>
    <?php echo "La date dans un mois : " . $date1 . ""; ?>
</div>


</body>
</html>







