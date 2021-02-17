<?php
//J'include la connection a la db '
include('../include/dbconnect.php');
include('../include/requeteDB.php');
include('../controllers/function.php');

//Je defini l'aborsecence du target pour le fichier'
define('TARGET', '../src/img/');

//Je defini mes variables
$id = $_GET['id'];
$message1 = '';
$tabError1= array();

/* Ajout d'un disque */
//Je verifie si les champ sont remplit
if (isset($_POST['update'])) {

//    J'utilise ma fonction pour verifier  et je recupere le resultat dans une variable
    $tabError1[] = verifUpload();

    $upTitle = $_POST['upTitle'];
    $tabError1[] = regexTextUp($upTitle);

    $upArtist = $_POST['upArtist'];
    $tabError1[] = regexTextUp1($upArtist);

    $upLabel = $_POST['upLabel'];
    $tabError1[] = regexTextUp2($upLabel);

    $upGender = $_POST['upGender'];
    $tabError1[] = regexTextUp3($upGender);

    $upPrice = $_POST['upPrice'];
    $tabError1[] = regexPrix1($upPrice);

    $upYear = $_POST['upYear'];
    $tabError1[] = regexYear1($upYear);



//    je recupere l'extension'
    $extension = pathinfo($_FILES['fichier']['name'], PATHINFO_EXTENSION);
//    Si $tabError est null alors on recupere le submit part champ
    if ($tabError1 === "") {

//        Je defini le nom et l'extension pour l'INSERT dans la db.
        $nomImage = $upTitle . "." . $extension;

        $request = "UPDATE disc SET disc_title = :upTitle, disc_year = :upYear, disc_label = :upLabel, disc_picture = :fichier, disc_genre = :upGender, disc_price = :upPrice, artist_id = :upArtist WHERE disc_id = :id ";
        $result = $db->prepare($request);
        $result->bindValue(':id', $id, PDO::PARAM_INT);
        $result->bindValue(':upTitle', $upTitle, PDO::PARAM_STR);
        $result->bindValue(':upArtist', $upArtist, PDO::PARAM_INT);
        $result->bindValue(':upLabel', $upLabel, PDO::PARAM_STR);
        $result->bindValue(':upYear', $upYear, PDO::PARAM_INT);
        $result->bindValue(':upGender', $upGender, PDO::PARAM_STR);
        $result->bindValue(':upPrice', $upPrice, PDO::PARAM_INT);
        $result->bindValue(':fichier', $nomImage, PDO::PARAM_STR);
////        j'execute l'insert
        $result->execute();

//        J'utilise ma fonction pour l'upload du fichier avec le parametre (titre du disc)
        $message1 = saveFileSystem($upTitle);
//        je redirige vers l'index
        header('Location: http://localhost:8000/index.php');

//        Sinon message d'erreur '
    } else {
        $message1 = $tabError1;
    }
}


//
//?>
