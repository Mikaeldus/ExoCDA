<?php


//Je recupere l'id
$id = $_GET['id'];

//J'include la connection a la db '
include "dbconnect.php";


//Je defini l'aborsecence du target pour le fichier'
define('TARGET', '../src/img/');

//j'inialise une variable pour mon tableau erreur'
$tabError = [];

//regex
$filterText = '/(^[\wéèêëûüîïôàçæœ\(\)\&\s\-\.\,\_\+\=\/\%€@\'\"\*\\`\!\?\;\[\]]*$)/i';
$filterPrix = '/(^[0-9]{1,4}\.[0-9]{2}$)/';
$filterYear = '/(^(19|20){1}[0-9]{2}$)/';


// Je verifie si les champs sont remplit
if (isset($_POST['update'])) {

    // je verifie le champ
    if (!empty($_POST['upTitle'])) {
        // Si ok je verifie avec la regex
        if (preg_match($filterText, $_POST['upTitle'])) {
            // Si ok je recupere le resultat du champ dans une variable
            $upTitle = $_POST['upTitle'];
            // sinon message d'erreur '
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

    //Si mon tabError = 0 alors on continu
    if (count($tabError) === 0) {
        //Je recupere l'extension du fichier
        $extension = pathinfo($_FILES['fichier']['name'], PATHINFO_EXTENSION);
        //Je recupere le titre et l'extension dans une variable
        $nomImage = $upTitle . "." . $extension;

        //je prepare ma requete
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

    //j'execute l'insert
        $result->execute();
    }

    //Avec une variable je defini les extension autoriser
    $tabExt = array('jpg', 'gif', 'png', 'jpeg');

    //je verifie si le champ est rempli
    if (!empty($_FILES['fichier']['name']))
        //Je verifie l'extension du fichier grace a ma variable
        if (in_array(strtolower($extension), $tabExt)) {
            //Si ok je deplace mon fichier grace au target et je nomme le fichier grace a ma variable plus haut
            if (move_uploaded_file($_FILES['fichier']['tmp_name'], TARGET . $nomImage)) {
                //Je retourne sur l'index si aucun soucis
                header('Location: http://localhost:8000/index.php');
            //sinon je return un message d'erreur
            } else {
                $tabError['missfichier'] = 'Soucis de fichier Upload impossible !';
            }

        } else {

            $tabError['missfichier'] = 'L\'extension du fichier est incorrecte !';
        }

}

?>




