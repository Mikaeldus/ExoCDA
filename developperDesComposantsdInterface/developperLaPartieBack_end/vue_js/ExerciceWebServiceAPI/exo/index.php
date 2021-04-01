<?php
include './Important/connexion.php';
include './Include/header.php';
include './Controller/UserController.php';
?>

<main id="app">

    <?php include_once 'Include/navbar.php' ?>
    <!--    DEFAULT INDEX   -->
    <div v-if="index">
        <h1 class="center-align">Bienvenue</h1>
    </div>

    <!--    LIST ET EDIT    -->
    <div v-if="listeUser">
        <?php include 'View/listeUser.php'?>
    </div>

    <!--    ADD MODE    -->
    <div v-if="AjoutUser" class="container">
        <?php include 'View/AjoutUser.php'?>
    </div>

</main>

<?php include 'Include/footer.php' ?>
