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
            background-color: red;
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


<?php
//Je defini mon tableau avec mes données.
$tab = array(
    "Janvier" => 31,
    "Fevrier" => 28,
    "Mars" => 31,
    "Avril" => 30,
    "Mai" => 31,
    "Juin" => 30,
    "Juillet" => 31,
    "Aout" => 31,
    "Septembre" => 30,
    "Octobre" => 31,
    "Novembre" => 30,
    "Decembre" => 31,
);
?>

<h3>Calendrier Classique</h3><br>
<table>
    <thead>
    <!--    je defini l'entete da l'array-->
    <tr>
        <th>Mois</th>
        <th>Jours</th>
    </tr>
    </thead>
    <tbody>
    <!--    je recupere les clefs et les valeurs pour remplir mes champs, pour mettre sur la meme ligne j'indique que valeur = clef-->
    <?php foreach ($tab as $key => $value) { ?>
        <tr>
            <td><?= $key ?></td>
            <td><?= $value ?></td>
        </tr>
    <?php } ?>
    </tbody>
</table>
<br>
<br>
</body>

<h3>Calendrier trier part nombre de jour croissant</h3><br>
<table>
    <thead>
    <tr>
    <th>Mois</th>
    <th>Jours</th>
    </tr>
    </thead>
    <tbody>
    <!--    je recupere ma variable array et j'utilise un assort() pour ranger part ordre croissant -->
    <?php $tab = new ArrayObject($tab); ?>
    <?php $tab->asort(); ?>
    <?php foreach ($tab as $value => $key) { ?>
        <tr>
            <td><?= $value ?></td>
            <td><?= $key ?></td>
        </tr>

    <?php } ?>
    </tbody>
</table>


</body>
</html>


