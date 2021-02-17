<?php
include('../include/dbconnect.php');
include('../include/requeteDB.php');

//Je recupere l'id '
$id = $_GET['id'];

//Le nom de l'image'
$nomImage = $_GET['disc_picture'];

//Une variable pour recuperer l'ancienne aborecense de l'image
$delfichier = '../src/img/'.$nomImage;

//Je verifie mes champs
if (isset($_POST['delete'])) {

//    je defini ma requete
    $requete = 'DELETE FROM `record`.`disc` WHERE  `disc_id`=:id';

//    je prepare ma requete dans une variable
    $result = $db->prepare($requete);

//    Part rapport a l'ID '
    $result->bindvalue(':id', $id, PDO::PARAM_INT);

//    j'execute '
    $result->execute();

//    Je supprime le fichier
    @unlink($delfichier);

//    je retourne sur l'index '
    header('Location: http://localhost:8000/index.php');
}
?>
