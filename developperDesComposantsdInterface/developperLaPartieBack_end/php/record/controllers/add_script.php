<?php
//J'include la connection a la db '
include('../include/dbconnect.php');
include('../controllers/function.php');


//Je defini l'aborsecence du target pour le fichier'
define('TARGET', '../src/img/');

//je defini une variable message qui est rediriger vers la page add_form en cas de mauvais upload
$message = array();


/* Ajout d'un disque */
//Je verifie si les champ sont remplit
if (isset($_POST['submit'])) {

//    j'inialise une variable pour mon tableau erreur'
    $tabError = array();

//    J'utilise ma fonction pour verifier le fichier et je recupere le resultat dans une variable
    $tabError[] = verifUpload();


//    -------------------------------
//Je recupere les données reçu dans une variable
    $addTitle = $_POST['addTitle'];
//Et je teste chaque variable avec une function, qui renvoient le resultat dans le taberror
    $tabError[] = regexText($addTitle);


    $artist = $_POST['artist'];
    $tabError[] = regexText1($artist);


    $addLabel = $_POST['addLabel'];
    $tabError[] = regexText2($addLabel);


    $addYear = $_POST['addYear'];
    $tabError[] = regexYear($addYear);


    $addGender = $_POST['addGender'];
    $tabError[] = regexText3($addGender);


    $addPrice = $_POST['addPrice'];
    $tabError[] = regexPrix($addPrice);

//--------------------------

//    je recupere l'extension'
    $extension = pathinfo($_FILES['fichier']['name'], PATHINFO_EXTENSION);
//    Si $tabError est null alors on continu
    if ($tabError === "") {

//        Je defini le nom et l'extension pour l'INSERT dans la db.
        $nomImage = $addTitle . "." . $extension;

//        je prepare ma requete d'INSERT dans le DB'
        $request = 'INSERT INTO disc (disc_title, artist_id, disc_picture, disc_label, disc_year, disc_genre, disc_price) '
            . 'VALUES (:addTitle, :artist, :fichier, :addLabel, :addYear, :addGender, :addPrice)';
        $result = $db->prepare($request);
        $result->bindValue(':addTitle', $addTitle, PDO::PARAM_STR);
        $result->bindValue(':artist', $artist, PDO::PARAM_STR);
        $result->bindValue(':addLabel', $addLabel, PDO::PARAM_STR);
        $result->bindValue(':addYear', $addYear, PDO::PARAM_INT);
        $result->bindValue(':addGender', $addGender, PDO::PARAM_STR);
        $result->bindValue(':addPrice', $addPrice, PDO::PARAM_INT);
        $result->bindValue(':fichier', $nomImage, PDO::PARAM_STR);
//        j'execute l'insert
        $result->execute();

//        J'utilise ma fonction pour l'upload du fichier avec le parametre (titre du disc)
        $message = saveFileSystem($addTitle);
//        je redirige vers l'index
        header('Location: http://localhost:8000/index.php');

//        Sinon message d'erreur '
    } else {
        $message = $tabError;
    }
}

?>