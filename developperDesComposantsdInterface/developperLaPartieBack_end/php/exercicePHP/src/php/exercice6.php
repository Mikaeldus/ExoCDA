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


<h2>Affichez la liste des régions (par ordre alphabétique) suivie du nom des départements.</h2><br>
<?php
//Je defini mon array
$dep = array(
    "Hauts-de-france" => array("Aisne", "Nord", "Oise", "Pas-de-Calais", "Somme"),
    "Bretagne" => array("Côtes d'Armor", "Finistère", "Ille-et-Vilaine", "Morbihan"),
    "Grand-Est" => array("Ardennes", "Aube", "Marne", "Haute-Marne", "Meurthe-et-Moselle", "Meuse", "Moselle", "Bas-Rhin", "Haut-Rhin", "Vosges"),
    "Normandie" => array("Calvados", "Eure", "Manche", "Orne", "Seine-Maritime")
);
// Tri par ordre Alphabétique
ksort($dep);
?>

<table>
    <thead>
    <td><h5>Region</h5></td>
    <td><h5>Departement</h5></td>
    </thead>
    <tbody>
    <!--    J'affiche mon tableau -->
    <?php
    foreach ($dep as $key => $value) {

        echo "<tr><td>$key</td><td>";

        foreach ($value as $keyVal => $valueVal) {
            echo " $valueVal, ";
        }
        echo "</td></tr>";

    } ?>
    </tbody>
</table>
<br>
<br>

<h2>Affichez la liste des régions suivie du nombre de départements.</h2><br>
<table>
    <thead>
    <td><h5>Region</h5></td>
    <td><h5>Departement</h5></td>
    </thead>
    <tbody>
    <!--    J'affiche mon tableau -->
    <?php
    foreach ($dep as $key => $value) {

        echo "<tr><td>$key</td><td>";
        $valueVal = count($value);

        echo " $valueVal ";

        echo "</td></tr>";

    } ?>
    </tbody>
</table>

</body>
</html>



