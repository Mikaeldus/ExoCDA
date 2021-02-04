window.onload = (() => {

})


// je creer ma function pour vérifier mon formulaire 
function verif(formulaire) {
    
    // on teste et on recupere les valuer du formulaire 
    var nomIsOk = verifNom(formulaire.elements['inputNom'].value)
    var prenomIsOk = verifPrenom(formulaire.elements['inputPrenom'].value)
    var codePostalIsOk = verifCodePostal(formulaire.elements['inputCodePostal'].value)
    var emailIsOk = verifEmail(formulaire.elements['inputEmail'].value)
    
    if (nomIsOk && prenomIsOk && codePostalIsOk && emailIsOk) {
        // Tout est OK, on envoie le formulaire
        console.log("Formulaire OK")
        return true;

    } else {
        // Tout n'est pas OK, on n'envoie pas le formulaire
        console.error("Formulaire Pas OK");
        return false;
    }
}



// Ma function pour Verif le Nom 
function verifNom(nom) {
    // je creer ma variable "isOk" qui est vérifier part ma function, si c'est bon elle renvoit true sinon else 
    var isOK = verifAuMoins1Char(nom);
    if (isOK) {
        return true;
    } else {
        // j'indique le champ non rempli à l'utilisateur 
        var missNom = document.getElementById(`missNom`);
        missNom.textContent = `* Champ requis`;
        return false;
    }
}

// Ma function pour Verif le Prenom
function verifPrenom(prenom) {
    // je creer ma variable "isOk" qui est vérifier part ma function, si c'est bon elle renvoit true sinon else
    var isOK = verifAuMoins1Char(prenom);
    if (isOK) {
        return true;
    } else {
        // j'indique le champ non rempli à l'utilisateur 
        var missPrenom = document.getElementById(`missPrenom`);
        missPrenom.textContent = `* Champ requis`;
        return false;
    }
}

// Ma function pour Verif le le codepostale
function verifCodePostal(codePostal) {
    // Si mon code postale ne fait pas 5 nombres alors else 
    if (inputCodePostal.value.length === 5) {
        return true;
    } else {
        // j'indique le champ non rempli à l'utilisateur 
        var missPostale = document.getElementById('missCodePostale');
        missPostale.textContent = `* Champ requis`;
        return false;
    }
}

// Ma function pour vérifier mon Email 
function verifEmail(email) {

    
    // Regexp email from internet
    var regexp = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    // je fais la vérification grace à la regexp si bon return true sinon else 
    if (email.match(regexp)) {
        return true;
    } else {
        // j'indique le champ non rempli à l'utilisateur 
        var missMail = document.getElementById('missMail');
        missMail.textContent = `* Champ requis`;
        return false;
    }
}

// Fonction qui sert a verifier que le parametre donné, est au moins un caractère.
function verifAuMoins1Char(motAVerif) {
    if (motAVerif.length > 0) {
        return true;
    } else {
        return false;
    }
}