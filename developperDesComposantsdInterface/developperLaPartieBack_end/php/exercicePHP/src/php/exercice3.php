<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        /* un peu de style  */
        caption{
            border-style:solid;
        }
        table{
            text-align:center;
            border-style:solid;
        }
        th{
            border-style:solid;
            background-color:red;
        }
        td{
            border-style:solid;
        }
    </style>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="../js/exercice5.js"></script>
    <title>Document</title>
</head>
<body>

<script>

</script>

<button><a href="../../index.php">Retour à l'accueil</a></button><br>


<div>
    <table>
        <!-- je determine les deux variables nombre qui font office de structure pour le tableau et à chaque champ le résultat des deux nombres -->
        <thead>
        <tr>
            <th></th>
            <!--            //Grace a la boucle avec le nombre1 je determine le nombre de th.-->
            <?php
            for($nombre1 = 0; $nombre1 <= 12; $nombre1++){
                ?>
                <th>
                    <?= $nombre1 ?>
                </th>
                <?php
            }
            ?>
        </tr>
        </thead>

        <tbody>
        <!--        Grace a la boucle avec le nombre2 je determine le nombre de th.-->
        <?php
        for($nombre2 =0; $nombre2 <=12; $nombre2++){
            ?>
            <tr>
                <th>
                    <?= $nombre2 ?>
                </th>
                <!--                // Je creer une boucle qui affiche le resultat tant que nb1 est <= 12.-->
                <?php
                for($nombre1 = 0; $nombre1 <=12; $nombre1++){
                    ?>
                    <td>
                        <?= $nombre2 * $nombre1 ?>
                    </td>
                    <?php
                }
                ?>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
</div>
</body>
</html>


