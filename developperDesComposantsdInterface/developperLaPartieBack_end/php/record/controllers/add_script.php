<?php

// requete permettant l'affichage des artistes dans le select
try {
    $requete = $db->prepare('SELECT * FROM artist ORDER BY artist_name');
    $requete->execute();
    $artistList = $requete->fetchAll(PDO::FETCH_OBJ);
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}

//J'include la connection a la db '
include "dbconnect.php";


//Je defini l'aborsecence du target pour le fichier'
define('TARGET', '../src/img/');

$extension="";

//    j'inialise une variable pour mon tableau erreur'
$tabError = [];

//regex

$filterText = '/(^[\wéèêëûüîïôàçæœ\(\)\&\s\-\.\,\_\+\=\/\%€@\'\"\*\\`\!\?\;\[\]]*$)/i';
$filterPrix = '/(^[0-9]{1,4}\.[0-9]{2}$)/';
$filterYear = '/(^(19|20){1}[0-9]{2}$)/';


// Je verifie si les champs sont remplit
if (isset($_POST['submit'])) {

    // je verifie le champ
    if (!empty($_POST['addTitle'])) {
        // Si ok je verifie avec la regex
        if (preg_match($filterText, $_POST['addTitle'])) {
            // Si ok je recupere le resultat du champ dans une variable
            $addTitle = $_POST['addTitle'];
            // sinon message d'erreur '
        } else {
            $tabError['missTitle'] = 'Erreur de saisie dans le champ !';
        }
    } else {
        $tabError['missTitle'] = 'Le champ est vide !';
    }

    if (!empty($_POST['artist'])) {
        if (preg_match($filterText, $_POST['artist'])) {
            $artist = $_POST['artist'];
        } else {
            $tabError['missArtist'] = 'Erreur de saisie dans le champ !';
        }
    } else {
        $tabError['missArtist'] = 'Le champ est vide !';
    }

    if (!empty($_POST['addLabel'])) {
        if (preg_match($filterText, $_POST['addLabel'])) {
            $addLabel = $_POST['addLabel'];
        } else {
            $tabError['missLabbel'] = 'Erreur de saisie dans le champ !';
        }
    } else {
        $tabError['missLabbel'] = 'Le champ est vide !';
    }

    if (!empty($_POST['addYear'])) {
        if (preg_match($filterYear, $_POST['addYear'])) {
            $addYear = $_POST['addYear'];
        } else {
            $tabError['missYear'] = 'Erreur de saisie dans le champ !';
        }
    } else {
        $tabError['missYear'] = 'Le champ est vide !';
    }

    if (!empty($_POST['addGender'])) {
        if (preg_match($filterText, $_POST['addGender'])) {
            $addGender = $_POST['addGender'];
        } else {
            $tabError['missGender'] = 'Erreur de saisie dans le champ !';
        }
    } else {
        $tabError['missGender'] = 'Le champ est vide !';
    }

    if (!empty($_POST['addPrice'])) {
        if (preg_match($filterPrix, $_POST['addPrice'])) {
            $addPrice = $_POST['addPrice'];
        } else {
            $tabError['missPrix'] = 'Erreur de saisie dans le champ !';
        }
    } else {
        $tabError['missPrix'] = 'Le champ est vide !';
    }

    //Si mon tabError = 0 alors on continu
    if (count($tabError) === 0) {

        //Je recupere l'extension du fichier
        $extension = pathinfo($_FILES['fichier']['name'], PATHINFO_EXTENSION);
        //Je recupere le titre et l'extension dans une variable
        $nomImage = $addTitle . "." . $extension;

        //je prepare ma requete d'INSERT dans le DB'
        $request = 'INSERT INTO disc (disc_title, artist_id, disc_picture, disc_label, disc_year, disc_genre, disc_price) '
            . 'VALUES (:addTitle, :artist, :fichier, :addLabel, :addYear, :addGender, :addPrice)';
        $result = $db->prepare($request);
        $result->bindValue(':addTitle', $addTitle, PDO::PARAM_STR);
        $result->bindValue(':artist', $artist, PDO::PARAM_STR);
        $result->bindValue(':addLabel', $addLabel, PDO::PARAM_STR);
        $result->bindValue(':addYear', $addYear, PDO::PARAM_INT);
        $result->bindValue(':addGender', $addGender, PDO::PARAM_STR);
        $result->bindValue(':addPrice', $addPrice, PDO::PARAM_STR);
        $result->bindValue(':fichier', $nomImage, PDO::PARAM_STR);


        //j'execute l'insert
        $result->execute();
    }

    //Avec une variable je defini les extension autoriser
    $tabExt = array('jpg', 'gif', 'png', 'jpeg');

    //je verifie si le champ est rempli
    if (!empty($_FILES['fichier']['name'])) {

        //Je verifie l'extension du fichier grace a ma variable
        if (in_array(strtolower($extension), $tabExt)) {
            //Si ok je deplace mon fichier grace au target et je nomme le fichier grace a ma variable plus haut
            if (move_uploaded_file($_FILES['fichier']['tmp_name'], TARGET . $nomImage)) {
                //Je retourne sur l'index si aucun soucis
                header('Location: http://localhost:8000/index.php');
                //Sinon message d'erreur
            } else {
                $tabError['missfichier'] = 'Soucis de fichier Upload impossible !';
            }

        } else {
            //sinon je return un message d'erreur
            $tabError['missfichier'] = 'L\'extension du fichier est incorrecte !';
        }

    } else {
        $tabError['missfichier'] = 'Le fichier n existent pas !';
    }


}

?>
