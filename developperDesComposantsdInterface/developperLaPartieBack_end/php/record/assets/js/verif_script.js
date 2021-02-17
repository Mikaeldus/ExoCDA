window.onload = (() => {

})


// ----- PAGE ADD_Form ------
// J'ai juste creer la verif pour que les champs soient rempli'

// je creer ma function pour vérifier mon ajout
function verif(ajout) {

    // on teste et on recupere les valuer du formulaire
    var addTitleIsOk = verifTitre(ajout.elements['addTitle'].value)
    var addLabelIsOk = verifLabel(ajout.elements['addLabel'].value)
    var addGenderIsOK = verifGender(ajout.elements['addGender'].value)
    var addYearIsOK = verifYear(ajout.elements['addYear'].value)
    var addPriceIsOK = verifPrice(ajout.elements['addPrice'].value)


    if (addTitleIsOk && addLabelIsOk && addGenderIsOK && addYearIsOK && addPriceIsOK) {
        // Tout est OK, on return true
        console.log("OK")
        return true;

    } else {
        // Tout n'est pas OK, on envoi false
        console.error("Pas OK");
        return false;
    }
}


// Ma function pour Verif le Titre
function verifTitre(addTitle) {
    // je creer ma variable "isOk" qui est vérifier part ma function, si c'est bon elle renvoit true sinon else
    var isOK = verifAuMoins1Char(addTitle);
    if (isOK) {
        return true;
    } else {
        // j'indique le champ non rempli à l'utilisateur
        var missTitre = document.getElementById(`missTitre`);
        missTitre.textContent = `* Champ requis`;
        return false;
    }
}

// Ma function pour Verif le Titre
function verifYear(addYear) {
    // je creer ma variable "isOk" qui est vérifier part ma function, si c'est bon elle renvoit true sinon else
    var isOK = verifAuMoins1Char(addYear);
    if (isOK) {
        return true;
    } else {
        // j'indique le champ non rempli à l'utilisateur
        var missYear = document.getElementById(`missYear`);
        missYear.textContent = `* Champ requis`;
        return false;
    }
}

// Ma function pour Verif le label
function verifLabel(addLabel) {
    // je creer ma variable "isOk" qui est vérifier part ma function, si c'est bon elle renvoit true sinon else
    var isOK = verifAuMoins1Char(addLabel);
    if (isOK) {
        return true;
    } else {
        // j'indique le champ non rempli à l'utilisateur
        var missLabel = document.getElementById(`missLabel`);
        missLabel.textContent = `* Champ requis`;
        return false;
    }
}

// Ma function pour Verif le genre
function verifGender(addGender) {
    // je creer ma variable "isOk" qui est vérifier part ma function, si c'est bon elle renvoit true sinon else
    var isOK = verifAuMoins1Char(addGender);
    if (isOK) {
        return true;
    } else {
        // j'indique le champ non rempli à l'utilisateur
        var missGender = document.getElementById(`missGender`);
        missGender.textContent = `* Champ requis`;
        return false;
    }
}

// Ma function pour Verif le prix
function verifPrice(addPrice) {
    // je creer ma variable "isOk" qui est vérifier part ma function, si c'est bon elle renvoit true sinon else
    var isOK = verifAuMoins1Char(addPrice);
    if (isOK) {
        return true;
    } else {
        // j'indique le champ non rempli à l'utilisateur
        var missPrice = document.getElementById(`missPrice`);
        missPrice.textContent = `* Champ requis`;
        return false;
    }
}

// ----- PAGE ADD_Form ------


// Fonction qui sert a verifier que le parametre donné, est au moins un caractère.
function verifAuMoins1Char(motAVerif) {
    if (motAVerif.length > 0) {
        return true;
    } else {
        return false;
    }
}