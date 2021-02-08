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
    <h3>Créer une fonction qui vérifie le niveau de complexité d'un mot de passe</h3>

    <?php
    //    Je creer la function pour verifier le mot de passe
    function password($mdp)
    {
//        je determine deux variables $len pour la longueur du mot de passe $verif pour la regex qui verifie les conditions
        $len = strlen($mdp);
        $verif = preg_match('/\d/', $mdp) + preg_match('/[A-Z]/', $mdp) + preg_match('/[a-z]/', $mdp);
//        Si ma variable $res est = $verif( trois condition ok ) alors elle vaut true, si la longueur du mot et inferieur a 8 alors true.
        $res = $verif == 3 ? true : false;
        $res = $len < 8 ? false : true;

//        Je retourne le resultat
        return $res;
    }

    //    Je determine un password et j'appel la function pour la vérif.
    $resultat = password("10EttOrI");
    var_dump($resultat);
    ?>
</div>

</body>
</html>




