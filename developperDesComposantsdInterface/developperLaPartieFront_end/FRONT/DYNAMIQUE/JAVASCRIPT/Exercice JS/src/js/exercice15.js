window.onload = (() => {

    // On Associe le click des buttons à l'appel des fonctions
    document.getElementById('button1').addEventListener('click', clickExo1);
    document.getElementById('button2').addEventListener('click', verif);
    document.getElementById('button3').addEventListener('click', generer);
})







// ----------- Ecercice 1 ---------
// je creer la function 
clickExo1 = (() => {
    // je recupere ma valeur dans ma page html et je creer ma variable  
    var text = document.getElementById('text').value;
    // Si ma variable est des nombres alors le resultat est else 
    if (isNaN(text)) {
        alert(`Vous avez saisie ${text}`);
    }
    else {
        alert(`Veuillez saisir un champ valide !`);
    }

})
// ---------------Exo 1 -----------------







// -----------------Exo 2 -----------------
// je creer mes variables pour les initialisées
var chiffre = 0;
var i = 1;
var vide = document.getElementById('aleatoire');


// je creer ma function pour généré un nombre aléatoire compris entre 0-20
generer = (() => {
    aleatoire.textContent = '';
    i = 1;
    chiffre = parseInt(Math.random() * 20);
    // controle sur console 
    console.log(chiffre);
    // je retourne ma valeur chiffre 
    return chiffre;
})

// je creer ma function vérif 
verif = (() => {
    // je declare ma variable qui utilise la saisie part l'utilisateur 
    var nombre = document.getElementById(`usernombre`).value;

    console.log(nombre);
    // controle console 

    // Si la valeur de nombre n'est pas des nombres cela return NAN 
    if (isNaN(nombre)) {
        // je remplit la champ vide part une demande pour l'utilisateur 
        aleatoire.textContent = `Veuillez saisir un nombre entre 1 et 20 merci`;
    } else {
        // Si nombre est égale à chiffre :
        if (parseInt(nombre) == chiffre) {
            aleatoire.textContent = `Félicitation, vous avez trouver le bon nombre ${chiffre} en ${i} coup(s) :)`;
            console.log(`Félicitation, vous avez trouver le bon nombre ${chiffre} en ${i} coup(s) :`);


            // et si nombre est inférieur a chiffre 
        } else if (parseInt(nombre) < chiffre) {
            aleatoire.textContent = `Plus grand`;
            console.log(`Plus grand`);

            // Sinon si nombre est supérieur à chiffre : 
        } else {
            aleatoire.textContent = `Plus petit`;
            console.log(`Plus petit`);
            i++;
        }
    }
})


// ----------------------Exo 2 ----------------------