<?php

//Pour chaque fonction je return un message pour indiquer le resultat.

//Function pour l'upload du fichier.
function saveFileSystem($nomImage) {

//    je recupere l'extension'
    $extension  = pathinfo($_FILES['fichier']['name'], PATHINFO_EXTENSION);

//    je remplace le nom du fichier part le titre du disc avec l'extension '
    $nomImage = $nomImage . "." . $extension;

//    Je deplace le fichier vers la cible de mon TARGET
    if (move_uploaded_file($_FILES['fichier']['tmp_name'], TARGET . $nomImage)) {
        return "Fichier Copié";
    } else {
        return "Impossible de copié le fichier";
    }
}

//je crée une function pour verifier le fichier.
function verifUpload() {
//  Extensions autorisees
    $tabExt = array('jpg', 'gif', 'png', 'jpeg');
//    je recupere l'extension'
    $extension = pathinfo($_FILES['fichier']['name'], PATHINFO_EXTENSION);

//    je verifie si le champ est rempli
    if (empty($_FILES['fichier']['name'])) {
        var_dump("IF 1");
//        j'envoi un message sinon '
        return 'Le fichier n existent pas !';
    }
    // On verifie l'extension du fichier
    if (in_array(strtolower($extension), $tabExt)) {
        var_dump("IF 2");
//        Comme l'extension est correcte je n'envoi aucun caractere dans ma variable pour pouvoir basculer lors de l'upload vers l'index
        return "";
    } else {
        var_dump("ELSE");
//        sinon je return un message d'erreur
        return 'L\'extension du fichier est incorrecte !';
    }
}



// ----------Function pour verifier les regex dans l'INSERT---------'
function regexText($addTitle) {
    $filterText = '/(^[\wéèêëûüîïôàçæœ\(\)\&\s\-\.\,\_\+\=\/\%€@\'\"\*\\`\!\?\;\[\]]*$)/i';

    if(preg_match($filterText,$addTitle)) {
        return "";
    } else {
        return 'Le titre n est pas correct';
    }
}

function regexText1($artist) {
    $filterText = '/(^[\wéèêëûüîïôàçæœ\(\)\&\s\-\.\,\_\+\=\/\%€@\'\"\*\\`\!\?\;\[\]]*$)/i';

    if(preg_match($filterText,$artist)) {
        return "";
    } else {
        return 'L artiste n est pas correct';
    }
}

function regexText2($addLabel) {
    $filterText = '/(^[\wéèêëûüîïôàçæœ\(\)\&\s\-\.\,\_\+\=\/\%€@\'\"\*\\`\!\?\;\[\]]*$)/i';

    if(preg_match($filterText,$addLabel)) {
        return "";
    } else {
        return 'Le labbel n est pas correct';
    }
}

function regexText3($addGender) {
    $filterText = '/(^[\wéèêëûüîïôàçæœ\(\)\&\s\-\.\,\_\+\=\/\%€@\'\"\*\\`\!\?\;\[\]]*$)/i';

    if(preg_match($filterText,$addGender)) {
        return "";
    } else {
        return 'Le genre n est pas correct';
    }
}

function regexPrix($addPrice) {
    $filterPrix = '/(^[0-9]{1,4}\.[0-9]{2}$)/';

    if(preg_match($filterPrix,$addPrice)) {
        return "";
    } else {
        return 'Le prix doit comporter des decimals (ex: 32,00)';
    }
}

function regexYear($addYear) {
    $filterYear = '/(^(19|20){1}[0-9]{2}$)/';

    if(preg_match($filterYear,$addYear)) {
        return "";
    } else {
        return 'Veuillez rentrez une année correct';
    }
}




// ----------Function pour verifier les regex dans l'upload---------'
function regexTextUp($upTitle) {
    $filterText = '/(^[\wéèêëûüîïôàçæœ\(\)\&\s\-\.\,\_\+\=\/\%€@\'\"\*\\`\!\?\;\[\]]*$)/i';

    if(preg_match($filterText,$upTitle)) {
        return "";
    } else {
        return 'Le titre n est pas correct';
    }
}

function regexTextUp1($upArtist) {
    $filterText = '/(^[\wéèêëûüîïôàçæœ\(\)\&\s\-\.\,\_\+\=\/\%€@\'\"\*\\`\!\?\;\[\]]*$)/i';

    if(preg_match($filterText,$upArtist)) {
        return "";
    } else {
        return 'L artiste n est pas correct';
    }
}

function regexTextUp2($upLabel) {
    $filterText = '/(^[\wéèêëûüîïôàçæœ\(\)\&\s\-\.\,\_\+\=\/\%€@\'\"\*\\`\!\?\;\[\]]*$)/i';

    if(preg_match($filterText,$upLabel)) {
        return "";
    } else {
        return 'Le labbel n est pas correct';
    }
}

function regexTextUp3($upGender) {
    $filterText = '/(^[\wéèêëûüîïôàçæœ\(\)\&\s\-\.\,\_\+\=\/\%€@\'\"\*\\`\!\?\;\[\]]*$)/i';

    if(preg_match($filterText, $upGender)) {
        return "";
    } else {
        return 'Le genre n est pas correct';
    }
}

function regexPrix1($upPrice) {
    $filterPrix = '/(^[0-9]{1,4}\.[0-9]{2}$)/';

    if(preg_match($filterPrix,$upPrice)) {
        return "";
    } else {
        return 'Le prix doit comporter des decimals (ex: 32,00)';
    }
}

function regexYear1($upYear) {
    $filterYear = '/(^(19|20){1}[0-9]{2}$)/';

    if(preg_match($filterYear,$upYear)) {
        return "";
    } else {
        return 'Veuillez rentrez une année correct';
    }
}
?>