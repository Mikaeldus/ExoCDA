<?php
include "dbconnect1.php";

$emailPattern = '/^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/';
$passwordPattern = '/^[a-zA-Z\déàâêûîôùäëüïöèñ\-$£!\/?ç#@]+$/';

// définition d'un tableau d'erreur
$tabError = [];

if (isset($_POST['login'])) {
    // vérification du champ lastname
    if (!empty($_POST['email'])) {
        if (preg_match($emailPattern, $_POST['email'])) {
            $email = htmlspecialchars($_POST['email']);
        } else {
            $tabError['email'] = 'Caractère(s) non valide(s)';
        }
    } else {
        $tabError['email'] = 'Veuillez remplir ce champs';
    }

// vérification du champ lastname
    if (!empty($_POST['password'])) {
        if (preg_match($passwordPattern, $_POST['password'])) {
            $password = htmlspecialchars($_POST['password']);
        } else {
            $tabError['password'] = 'Caractère(s) non valide(s)';
        }
    } else {
        $tabError['password'] = 'Veuillez remplir ce champs';
    }
// s'il n'y a pas d'erreur
    if (count($tabError) === 0) {
        // on compte le nombre d'entré selon l'email saisie
        $donnee = ('SELECT COUNT(*) as count FROM user WHERE user_mail = :email');
        $select = $db->prepare($donnee);
        $select->bindValue(':email', $email, PDO::PARAM_STR);
        $select->execute();
        $result = $select->fetch(PDO::FETCH_OBJ);
        // si le resultat est égale à 1
        if ($result->count == 1) {
            // on va chercher les informations selon cet email
            $donnee = ('SELECT * FROM `user` WHERE user_mail = :email');
            $select = $db->prepare($donnee);
            $select->bindValue(':email', $email, PDO::PARAM_STR);
            $select->execute();
            $selectResult = $select->fetch(PDO::FETCH_OBJ);
            // si le mot de passe saisie est identique à celui présent dans la base
            if (password_verify($password, $selectResult->user_mdp)) {
                // déclaration des variables de session
                $_SESSION['nom'] = $selectResult->user_nom;
                $_SESSION['prenom'] = $selectResult->user_prenom;
                $_SESSION['id'] = $selectResult->user_id;

            } else {
                $tabError['login'] = 'Identifiants incorrects !!!';
            }
        }
    }
}


if(isset($_POST['back'])) {
    session_unset();
}
?>
