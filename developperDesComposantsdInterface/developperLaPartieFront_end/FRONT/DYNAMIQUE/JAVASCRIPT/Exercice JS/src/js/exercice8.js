window.onload = (() => {

    // On Associe le click des buttons à l'appel des fonctions
    document.getElementById('btnSaisie').addEventListener('click',clickSaisie );
    document.getElementById('btnEntier').addEventListener('click',clickEntier );
    document.getElementById('btnMoyenne').addEventListener('click',clickMoyenne );
    document.getElementById('btnMultiples').addEventListener('click',clickMultiples );
    document.getElementById('btnVoyelles').addEventListener('click',clickVoyelle );
})


function clickSaisie() {

    // je declare les variables i et prénom, prenom en ''
    var i = 1;
    var prenom = '';

    // je demande a l'utilisateur le prenom, si prenom est annuler ou que prenom est egale a rien, la boucle est annuler sinon l'instruction continu
    do {
        prenom = prompt(`Veuillez indiquez le prenom ${i} :`);
        if (prenom != null && prenom != '') {
            // les prenoms et le chiffre est indiquez dans la console
            console.log(`${i} ${prenom}`);
            i++;
        }
    } while (prenom != null && prenom != '');

}

// -------------- Exercice  JS Cours 08 Saisie -----------

// -------------- Exercice  JS Cours 08 Entiers inférieur à N -----------

function clickEntier() {
    // je déclare les valeurs pour les variables "i" et "n"
    n = 0;
    i = 0;
    // je demande a l'utilisateur un nombre
    n = prompt(`Veuillez entrer un nombre : `);
    // avec mon for, j'indique la situation initial i=0, ensuite tant que i est inferieur a "n", intruction est que i prend +1 tant qu'il est inferieur a "n"
    for (i = 0; i < n; i++) {
        console.log(i);
        // la boucle se repete tant que "i" est inferieur a "n"
    }
}

// -------------- Exercice  JS Cours 08 Entiers inférieur à N -----------

// -------------- Exercice  JS Cours 08 Moyenne -----------

function clickMoyenne() {

    // je defini 3 variable donc l'entier est rentré part l'utilisateur
    var nb = parseInt(prompt(`Veuillez saisir un entier : `));
    var somme = 0
    var i = 0

    // Tant que "nb" est un chiffre il n'est pas considerer Nan
    while (isNaN(nb)) {
        // la valeur ne sera pris en compte que si c'est un nombre
        var nb = parseInt(prompt(`Veuillez saisir un nombre : `));
    }
    // Tant que la valeur rentrer part l'utilisateur n'est pas 0 la boucle continu 
    while (nb != 0) {
        // la somme est egale aux nombres rentrer part l'utilisateur 
        somme += nb;
        // la moyenne est egale a la somme et le nombre de rentrer de chiffre part l'utilisateur 
        Moyenne = somme / i;
        console.log(`Ceci est la somme : ${somme}`);
        console.log(`Ceci est la moyenne : ${Moyenne}`);
        // je donne a i +1 pour que la boucle s active 
        i++
        var nb = parseInt(prompt(`Veuillez saisir un nombre : `));
    }
}

// -------------- Exercice  JS Cours 08 Moyenne -----------

// -------------- Exercice  JS Cours 08 Multiples -----------


function clickMultiples() {
    // je declare mes variables ( "i"=0 et "n" et "m" sont défini part l'utilisateur)
    i = 0;
    n = parseInt(prompt(`Veuillez saisir un nombre : `));
    m = parseInt(prompt(`Veuillez saisir un multiple :`));

    // somme est egale au "n" fois le "i", la boucle s'active avec i++.
    do {
        somme = n * i;
        console.log(`${n} * ${i} = ${somme}`);
        i++;
        // tant que "i" est inférieur ou égale a "m" la boucle continu
    } while (i <= m);
}

// -------------- Exercice  JS Cours 08 Multiples -----------

// -------------- Exercice  JS Cours 08 Nombre de voyelles -----------

function clickVoyelle() {
    // je demande à l'utilisateur de rentrer un mot qui a pour variable "mot"
    var mot = prompt(`Veuillez entrer un mot :`).toLowerCase();
    // toLowerCase permet de transformer la chaine de caractère en minuscule
    if (mot) {
        // je defini la variable "nombreDeVoyelle" à 0
        var nombreDeVoyelle = 0;
        // tant que "i" égal 0 ou i est inférieur à la longueur du mot, i prend +1 donc la boucle continu
        for (i = 0; i < mot.length; i++) {
            switch (mot[i]) {
                case 'a':
                case 'e':
                case 'i':
                case 'o':
                case 'u':
                case 'y':
                    // nombreDeVoyelle gagne +1 des que i rencontre une lettre case qui sont défini(voyelle)
                    nombreDeVoyelle++;
                    break;
                default: break;
            }
        }
        // j'indique dans la console le mot est le nombre de voyelle
        console.log(`le nombre de voyelle dans le ${mot} est ${nombreDeVoyelle}`);
    }
    else {
        alert(`Veuillez saisir un mot !!`);
    }

}
