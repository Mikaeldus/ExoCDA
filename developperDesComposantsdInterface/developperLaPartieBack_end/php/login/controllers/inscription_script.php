<?php
include "dbconnect.php";
// définition des regexs
$namePattern = '/^[a-zA-Zéàâêûîôùäëüïöèñç \-]+$/';
$emailPattern = '/^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/';
$passwordPattern = '/^[a-zA-Z\déàâêûîôùäëüïöèñ\-$£!\/?ç#@]+$/';

// définition d'un tableau d'erreur
$tabError = [];

// si on a la présence d'un post signin
if (isset($_POST['inscription'])) {
// vérification du champ lastname
    if (!empty($_POST['nom'])) {
        if (preg_match($namePattern, $_POST['nom'])) {
            $nom = htmlspecialchars($_POST['nom']);
        } else {
            $tabError['nom'] = 'Caractère(s) non valide(s)';
        }
    } else {
        $tabError['nom'] = 'Veuillez remplir ce champs';
    }

// vérification du champ lastname
    if (!empty($_POST['prenom'])) {
        if (preg_match($namePattern, $_POST['prenom'])) {
            $prenom = htmlspecialchars($_POST['prenom']);
        } else {
            $tabError['prenom'] = 'Caractère(s) non valide(s)';
        }
    } else {
        $tabError['prenom'] = 'Veuillez remplir ce champs';
    }

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
            $password = htmlspecialchars(password_hash($_POST['password'], PASSWORD_DEFAULT));
        } else {
            $tabError['password'] = 'Caractère(s) non valide(s)';
        }
    } else {
        $tabError['password'] = 'Veuillez remplir ce champs';
    }

    if (count($tabError) === 0) {
        $donnee = 'INSERT INTO `user` ( user_nom , user_prenom, user_mail, user_mdp) VALUES (:nom, :prenom, :email, :password)';
        $insert = $db->prepare($donnee);
        $insert->bindValue(':nom', $nom, PDO::PARAM_STR);
        $insert->bindValue(':prenom', $prenom, PDO::PARAM_STR);
        $insert->bindValue(':email', $email, PDO::PARAM_STR);
        $insert->bindValue(':password', $password, PDO::PARAM_STR);
        if (!$insert->execute()) {
            $tabError['insert'] = 'Une erreur inattendu s\'est produite lors de l\'inscription';
        } else {
            $_SESSION['nom'] = $nom;
            $_SESSION['prenom'] = $prenom;
            $_SESSION['id'] = $db->lastInsertId();
        }

    }

}

?>