<?php

$erreur = array();

$regexTexte = '/^[a-zA-Z\-\déèàçùëüïôäâêûîô#&]+$/';
$regexPostale = '/^((0[1-9])|([1-8][0-9])|(9[0-8])|(2A)|(2B))[0-9]{3}$/';
$regexMail = '/[a-z0-9._%+-]+@[a-z0-9.-]+.[a-z]{2,4}/';
$regexSujet = '/^[a-zA-Z\-\d\, éèàçùëüïôäâêûîô#&]+$/';

$adresse = $_POST['adresse'];
$commentaires = $_POST['commentaires'];
$date = $_POST['date_de_naissance'];
$sexe = $_POST['sexe'];
$autoriser = $_POST['autoriser'];


if(isset($_POST['submit'])) {
	
	
	if(!empty(['nom'])) {
		if(preg_match($regexTexte, $_POST['nom'])) {
			$nom = $_POST['nom'];
		}else{
			$erreur['nom'] = 'Mauvaise saisie';
		}
	}else{
		$erreur['nom'] = 'Veuillez remplir le Nom';
	}
	
	if(!empty(['prenom'])) {
		if(preg_match($regexTexte, $_POST['prenom'])) {
			$prenom = $_POST['prenom'];
		}else{
			$erreur['prenom'] = 'Mauvaise saisie';
		}
	}else{
		$erreur['prenom'] = 'Veuillez remplir le Prenom';
	}
	
	if(!empty(['email'])) {
		if(preg_match($regexMail, $_POST['email'])) {
			$email = $_POST['email'];
		}else{
			$erreur['email'] = 'Mauvaise saisie';
		}
	}else{
		$erreur['email'] = 'Veuillez remplir le mail';
	}

	
	if(!empty(['ville'])) {
		if(preg_match($regexTexte, $_POST['ville'])) {
			$ville = $_POST['ville'];
		}else{
			$erreur['ville'] = 'Mauvaise saisie';
		}
	}else{
		$erreur['ville'] = 'Veuillez remplir la ville';
	}
	
	if(!empty(['codePostale'])) {
		if(preg_match($regexPostale, $_POST['codePostale'])) {
			$code = $_POST['codePostale'];
		}else{
			$erreur['code'] = 'Mauvaise saisie';
		}
	}else{
		$erreur['code'] = 'Veuillez remplir le code postale';
	}
	
	if(!empty(['sujet'])) {
		if(preg_match($regexSujet, $_POST['sujet'])) {
			$sujet = $_POST['sujet'];
		}else{
			$erreur['sujet'] = 'Mauvaise saisie';
		}
	}else{
		$erreur['sujet'] = 'Veuillez remplir le sujet';
	}

}else{
	
}
if(empty($erreur)){
	echo"Voici les données envoyé :<br>";
	echo"Nom : $nom<br>";
	echo"Prenom : $prenom <br>";
	echo"Date de naissance : $date<br>";
	echo"Email : $email<br>";
	echo"Adresse : $adresse <br>";
	echo"Sexe : $sexe<br>";
	echo"Ville : $ville<br>";
	echo"Code Postale : $code<br>";
	echo"Sujet : $sujet<br>";
	echo"Votre question : $commentaires<br>";
	echo"Autorisation : $autoriser<br>";
	echo "Bonjour". " " .$_REQUEST['prenom']. " " .$_REQUEST['nom']. "<br>";
}else{
	var_dump($erreur);
}

?>