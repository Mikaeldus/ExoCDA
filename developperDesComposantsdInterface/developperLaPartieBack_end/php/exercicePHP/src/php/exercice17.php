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

<h3>Écrire un programme qui lit ce fichier et qui construit une page web contenant une liste de liens hypertextes.</h3>
<br>
<div>
    <?php
    //    J'indique l'aborescence du fichier et je l'ouvre'
    $fichier = file("../docs/liens.txt");
    //    Je compte chaque ligne du fichier
    $total = count($fichier);

    //    Je creer une boucle tant que i n'est pas egale au nombre de ligne elle continu d'afficher la ligne echo
    for ($i = 0; $i < $total; $i++) {
        echo $fichier[$i] . "<br>";
    }
    ?>
</div>
<br>


<h3>Récupération d'un fichier distant</h3><br>


<table>
    <thead>
    <tr>
        <th scope="" col">Surname</th>
        <th scope="" col">Firstname</th>
        <th scope="" col">Email</th>
        <th scope="" col">Phone</th>
        <th scope="" col">City</th>
        <th scope="" col">State</th>
    </tr>
    </thead>

    <tbody>
    <?php
    $i = 0;
    $file = file('http://bienvu.net/misc/customers.csv');
    foreach ($file as $key => $line) {
        $tab[$i] = explode(",", $line);
        var_dump($tab[$i]);
        ?>

        <tr>
            <th><?php echo $tab[$i][0]; ?></th>
            <th><?php echo $tab[$i][1]; ?></th>
            <th><?php echo $tab[$i][2]; ?></th>
            <th><?php echo $tab[$i][3]; ?></th>
            <th><?php echo $tab[$i][4]; ?></th>
            <th><?php echo $tab[$i][5]; ?></th>
        </tr>
        <?php
        $i++;
    }
    ?>
    <?php
    var_dump($file);
    ?>
    </tbody>
</table>


</body>
</html>








