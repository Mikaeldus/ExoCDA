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

<button><a href="../../index.php">Retour à l'accueil</a></button><br><br>


<?php
//Je defini mon tableau avec mes données.
$capitales = array(
    "Bucarest" => "Roumanie",
    "Bruxelles" => "Belgique",
    "Oslo" => "Norvège",
    "Ottawa" => "Canada",
    "Paris" => "France",
    "Port-au-Prince" => "Haïti",
    "Port-d'Espagne" => "Trinité-et-Tobago",
    "Prague" => "République tchèque",
    "Rabat" => "Maroc",
    "Riga" => "Lettonie",
    "Rome" => "Italie",
    "San José" => "Costa Rica",
    "Santiago" => "Chili",
    "Sofia" => "Bulgarie",
    "Alger" => "Algérie",
    "Amsterdam" => "Pays-Bas",
    "Andorre-la-Vieille" => "Andorre",
    "Asuncion" => "Paraguay",
    "Athènes" => "Grèce",
    "Bagdad" => "Irak",
    "Bamako" => "Mali",
    "Berlin" => "Allemagne",
    "Bogota" => "Colombie",
    "Brasilia" => "Brésil",
    "Bratislava" => "Slovaquie",
    "Varsovie" => "Pologne",
    "Budapest" => "Hongrie",
    "Le Caire" => "Egypte",
    "Canberra" => "Australie",
    "Caracas" => "Venezuela",
    "Jakarta" => "Indonésie",
    "Kiev" => "Ukraine",
    "Kigali" => "Rwanda",
    "Kingston" => "Jamaïque",
    "Lima" => "Pérou",
    "Londres" => "Royaume-Uni",
    "Madrid" => "Espagne",
    "Malé" => "Maldives",
    "Mexico" => "Mexique",
    "Minsk" => "Biélorussie",
    "Moscou" => "Russie",
    "Nairobi" => "Kenya",
    "New Delhi" => "Inde",
    "Stockholm" => "Suède",
    "Téhéran" => "Iran",
    "Tokyo" => "Japon",
    "Tunis" => "Tunisie",
    "Copenhague" => "Danemark",
    "Dakar" => "Sénégal",
    "Damas" => "Syrie",
    "Dublin" => "Irlande",
    "Erevan" => "Arménie",
    "La Havane" => "Cuba",
    "Helsinki" => "Finlande",
    "Islamabad" => "Pakistan",
    "Vienne" => "Autriche",
    "Vilnius" => "Lituanie",
    "Zagreb" => "Croatie"
);
?>

<h3>Calendrier trier par liste des capitales (par ordre alphabétique) suivi du pays.</h3><br>
<table>
    <thead>
    <td><h5>Capitales</h5></td>
    <td><h5>Pays</h5></td>
    </thead>
    <tbody>
    <!--    je recupere ma variable array et j'utilise un ksort() pour ranger part ordre croissant les capitales -->
    <?php $capitales = new ArrayObject($capitales); ?>
    <?php $capitales ->ksort(); ?>
    <?php foreach ($capitales as $key => $value) { ?>
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

<h3>Calendrier trier par liste des pays (par ordre alphabétique) suivi de la capitale.</h3><br>
<table>
    <thead>
    <td><h5>Pays</h5></td>
    <td><h5>Capitales</h5></td>
    </thead>
    <tbody>
    <!--    je recupere ma variable array et j'utilise un asort() pour ranger part ordre croissant la liste des pays
     j'ai aussi inversé l'affichage pays -> capitales. -->
    <?php $capitales = new ArrayObject($capitales); ?>
    <?php $capitales ->asort(); ?>
    <?php foreach ($capitales as $value => $key) { ?>
        <tr>
            <td><?= $key ?></td>
            <td><?= $value ?></td>
        </tr>

    <?php } ?>
    </tbody>
</table>
<br>
<br>
<h3>Afficher le nombre de pays dans le tableau</h3><br>

<?php $nb = count($capitales); ?>
<?php echo "Le tableau contient " .$nb." de pays."; ?>



<h3>Retirer tous les capitales commençant part la lettre 'B'.</h3><br>
<?php
//Fait la regex avec un simulateur.
$delb ='/^(B){1}/';

foreach ($capitales as $key => $value) {
//    A chaque fois que sa renvoi true la ligne est retirer de l'array
    if(preg_match($delb, $key))
        unset ($capitales[$key]);
}
?>

<table>
    <thead>
    <td><h5>Capitales</h5></td>
    <td><h5>Pays</h5></td>
    </thead>
    <tbody>
<!--    J'affiche mon nouveau tableau :-->

    <?php foreach ($capitales as $key => $value) { ?>
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
</html>


