<?php
function saveFileSystem($nomImage)
{

//    je recupere l'extension'
    $extension = pathinfo($_FILES['fichier']['name'], PATHINFO_EXTENSION);

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
function verifUpload()
{

    $tabExt = array('jpg', 'gif', 'png', 'jpeg');
    $extension = pathinfo($_FILES['fichier']['name'], PATHINFO_EXTENSION);

    var_dump("$extension");
    var_dump($extension);

    if (empty($_FILES['fichier']['name'])) {
        var_dump("IF 1");

        return 'Le fichier n existent pas !';
    }
    if (in_array(strtolower($extension), $tabExt)) {
        var_dump("IF 2");
        return "";
    } else {
        var_dump("ELSE");
        return 'L\'extension du fichier est incorrecte !';
    }
}

?>