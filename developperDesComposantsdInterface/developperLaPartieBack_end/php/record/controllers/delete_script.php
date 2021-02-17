<?php
include('../include/dbconnect.php');
include('../include/requeteDB.php');
$id = $_GET['id'];
$nomImage = $_GET['disc_picture'];
$delfichier = '../src/img/'.$nomImage;

if (isset($_POST['delete'])) {
    $requete = 'DELETE FROM `record`.`disc` WHERE  `disc_id`=:id';
    $result = $db->prepare($requete);
    $result->bindvalue(':id', $id, PDO::PARAM_INT);
    $result->execute();
    @unlink($delfichier);
    header('Location: http://localhost:8000/index.php');
}
?>
