<?php
$id = $_GET['id'];

//J'include la connection a la db '
include('../include/dbconnect.php');


//Je defini l'aborsecence du target pour le fichier'
define('TARGET', '../src/img/');

//    j'inialise une variable pour mon tableau erreur'
$tabError = [];

//regex

$filterText = '/(^[\wéèêëûüîïôàçæœ\(\)\&\s\-\.\,\_\+\=\/\%€@\'\"\*\\`\!\?\;\[\]]*$)/i';
$filterPrix = '/(^[0-9]{1,4}\.[0-9]{2}$)/';
$filterYear = '/(^(19|20){1}[0-9]{2}$)/';

if (isset($_POST['update'])) {




    if (!empty($_POST['upTitle'])) {
        if (preg_match($filterText, $_POST['upTitle'])) {
            $upTitle = $_POST['upTitle'];
        } else {
            $tabError['missTitle'] = 'Erreur de saisie dans le champ !';
        }
    } else {
        $tabError['missTitle'] = 'Le champ est vide !';
    }

    if (!empty($_POST['upArtist'])) {
        if (preg_match($filterText, $_POST['upArtist'])) {
            $upArtist = $_POST['upArtist'];
        } else {
            $tabError['missArtist'] = 'Erreur de saisie dans le champ !';
        }
    } else {
        $tabError['missArtist'] = 'Le champ est vide !';
    }

    if (!empty($_POST['upLabel'])) {
        if (preg_match($filterText, $_POST['upLabel'])) {
            $upLabel = $_POST['upLabel'];
        } else {
            $tabError['missLabbel'] = 'Erreur de saisie dans le champ !';
        }
    } else {
        $tabError['missLabbel'] = 'Le champ est vide !';
    }

    if (!empty($_POST['upYear'])) {
        if (preg_match($filterYear, $_POST['upYear'])) {
            $upYear = $_POST['upYear'];
        } else {
            $tabError['missYear'] = 'Erreur de saisie dans le champ !';
        }
    } else {
        $tabError['missYear'] = 'Le champ est vide !';
    }

    if (!empty($_POST['upGender'])) {
        if (preg_match($filterText, $_POST['upGender'])) {
            $upGender = $_POST['upGender'];
        } else {
            $tabError['missGender'] = 'Erreur de saisie dans le champ !';
        }
    } else {
        $tabError['missGender'] = 'Le champ est vide !';
    }

    if (!empty($_POST['upPrice'])) {
        if (preg_match($filterPrix, $_POST['upPrice'])) {
            $upPrice = $_POST['upPrice'];
        } else {
            $tabError['missPrix'] = 'Erreur de saisie dans le champ !';
        }
    } else {
        $tabError['missPrix'] = 'Le champ est vide !';
    }

    if (count($tabError) === 0) {
        $extension = pathinfo($_FILES['fichier']['name'], PATHINFO_EXTENSION);
        $nomImage = $upTitle . "." . $extension;

//        je prepare ma requete
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


//       j'execute l'insert
        $result->execute();
    }


//    je recupere l'extension'

    $tabExt = array('jpg', 'gif', 'png', 'jpeg');

//    je verifie si le champ est rempli
    if (!empty($_FILES['fichier']['name']))

        if (in_array(strtolower($extension), $tabExt)) {

            if (move_uploaded_file($_FILES['fichier']['tmp_name'], TARGET . $nomImage)) {

                header('Location: http://localhost:8000/index.php');

            } else {
                $tabError['missfichier'] = 'Soucis de fichier Upload impossible !';
            }

        } else {
//        sinon je return un message d'erreur
            $tabError['missfichier'] = 'L\'extension du fichier est incorrecte !';
        }

    }




?>




