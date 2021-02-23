<?php

$emailPattern = '/^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/';
$passwordPattern = '/^[a-zA-Z\déàâêûîôùäëüïöèñ\-$£!\/?ç#@]+$/';

// définition d'un tableau d'erreur
$tabError = [];

if (isset($_POST['submit'])) {



    if (!empty($_POST['login'])) {
        if (preg_match($emailPattern, $_POST['login'])) {
            $login = htmlspecialchars($_POST['login']);
        } else {
            $tabError['login'] = 'Caractère(s) non valide(s)';
        }
    } else {
        $tabError['login'] = 'Veuillez remplir ce champs';
    }


    if (!empty($_POST['password'])) {
        if (preg_match($passwordPattern, $_POST['password'])) {
            $password = htmlspecialchars($_POST['password']);
        } else {
            $tabError['password'] = 'Caractère(s) non valide(s)';
        }
    } else {
        $tabError['password'] = 'Veuillez remplir ce champs';
    }

  if(count($tabError) === 0) {
        $id = 'mikael@gmail.fr';
        $mdp = 'mikael';
        var_dump($password);
        var_dump($login);
        if($password === $mdp) {
            $_SESSION['password'] = $mdp ;
        }else{
            $tabError['password'] = 'Mot de passe incorrects !!!';
        }

        if($login === $id){
            $_SESSION['login'] = $login ;
        }else{
            $tabError['login'] = 'identifiant incorrects !!!';
        }
    }
}

if(isset($_POST['back'])) {
    session_unset();
}
?>
