<?php


$coEmail = "mik@hotmail.fr";
$coPass = 'Mik00';


// déclaration d'un tableau d'erreur
$formError = [];
$tabError = [];
$passwordHash = '';
$mail = '';
// déclaration des regex


// déclaration des regex
$mailRegex = '/^[a-zA-Z0-9.-]+@[a-zA-Z0-9.-]{2,}.[a-z]{2,4}$/';
$passwordRegex = '/^[\w]+$/';
// si le formulaire est soumis
if (isset($_POST['submit'])) {

    // si le post mail n'est pas vide
    if (!empty($_POST['mail'])) {
        // si les données correspondent aux attentes
        if (preg_match($mailRegex, $_POST['mail'])) {
            // on stock la donnée saisie dans une variable
            $mail = htmlspecialchars($_POST['mail']);
        } else {
            $formError['mail'] = 'erreur de saisie dans le mail';
        }
    } else {
        $formError['mail'] = ' le champ mail est vide';
    }

    // si le post password n'est pas vide
    if (!empty($_POST['password'])) {
        // si les données correspondent aux attentes
        if (preg_match($passwordRegex, $_POST['password'])) {
            // on stock la donnée saisie dans une variable
            $passwordHash = password_hash(htmlspecialchars($_POST['password']), PASSWORD_DEFAULT);
        } else {
            $formError['password'] = 'erreur de saisie dans le mot de passe';
        }
    } else {
        $formError['password'] = ' le champ mot de passe est vide';
    }

    if($formError == 0) {
        if(password_verify($coPass, $passwordHash)) {
            if($coEmail == $mail) {
                session_start();
                $_SESSION['Utilisateur'] = $coEmail;
                $_SESSION['password'] = $coPass;
            } else {
                $formError['login'] = 'Identifiant incorrects !!!';
            }
        }
    }
}
?>
