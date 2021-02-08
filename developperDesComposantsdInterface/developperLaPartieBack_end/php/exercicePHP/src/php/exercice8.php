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
    <h3>Ecrivez une fonction qui calcul la somme des valeurs d'un tableau.</h3><br>

    <?php
    //    Je creer ma function Array
    function sum($array)
    {
//        je determineune variable qui donne la somme du tableau
        $result = array_sum($array);
//        je retourne le resultat avec une variable
        return $result;
    }

    //    je determine les valeurs du tableau
    $tab = array(4, 3, 8, 2);
    $somme = sum($tab);
    //    J'appel ma function pour avoir la sum du tableau
    echo ' Resultat : ' . $somme . ''
    ?>
</div>


</body>
</html>




