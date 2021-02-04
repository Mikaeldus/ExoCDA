window.onload = (() => {

    // On Associe le click des buttons à l'appel des fonctions
    document.getElementById('btnExo1').addEventListener('click',clickExo1 );
    document.getElementById('btnExo2').addEventListener('click',clickExo2 );


})

// -------------------Exercice 1 ------------------
function clickExo1() {
    var tableauEx1;
    if(createTable()){
        ajouterDonnee();
    }
    
    

    function createTable() {
        // Demande l'utilisateur de saisir la taille du tableau
        var taille = prompt(`Veuillez saisir la taille du tableau : `);
        taille = parseInt(taille);

        // je verifie que "taille" = nombre sinon ça retourne false 
        if (!isNaN(taille)) {
            tableauEx1 = [taille];
            return true ;
        }
        else {
            alert(`Veuillez recommencer !!`);
            return false ;
        }
    }

    function ajouterDonnee() {
        // Je demande à l'utilisateur de saisir ces données séparer part un ";", pris en compte des données part un split 
        var data = prompt(`Veuillez saisir vos données, séparer par un ";"`);
        tableauEx1 = data.split(";");
        alert(`${tableauEx1}`);
    }

}

// -------------------Exercice 1 ------------------


// -------------------Exercice 2 ------------------


function clickExo2(){
    var taille = getInteger();
    var tableau = initTab(taille);
    tableau = saisieTab(tableau);
    afficheTab(tableau);
    rechercheTab(tableau);
    infoTab(tableau);
    
    //Exo 3
    sortArray(tableau);


}


// Je recupere la taille saisie part l'utilisateur
function getInteger(){
    var taille = parseInt(prompt(`Veuillez saisir la taille du tableau :`));
    return taille;
}
// J'initialise mon tableau part rapport à la "taille" 
function initTab(taille){
    var tableau = [taille];
    return tableau;
}
// je demande une saisie part l'utilisateur des données du tableau, je split pour recuperer toutes les informations
function saisieTab(tableau){
     var data = prompt(`Veuillez saisir vos données, séparer par un ";"`);
     tableau = data.split(";");
     return tableau;
}
// je creer une function qui affiche le tableau 
function afficheTab(tableau){
    alert(`Voici le Tableau ${tableau}`);    
}
// function qui permet une recherche dans le tableau 
function rechercheTab(tableau){
    var index = parseInt(prompt(`Veuillez saisir un index :`));
    alert(`La donnée  à l'index : ${index} est :${tableau[index]}`);
}
// Voici la fonctionne qui permet d'afficher le max et la moyenne de tous les numbers du tableau, la fonction ne fait rien si c'est des lettres
function infoTab(tableau){

    // Et si le tableau contient des lettres ?
    var notNumberArray = false;

    tableau.forEach((value) => {
        var valueParsed = parseInt(value);

        if(!valueParsed) {
            notNumberArray = true;
        }
    })

    if(!notNumberArray) {
        var max = Math.max(...tableau);
        var somme = 0;

        tableau.forEach((nombre) => {
            somme += parseInt(nombre);
        })

        var moyenne = somme / tableau.length;
        alert(`La moyenne : ${moyenne}`);
        alert(`Le max : ${max}`);
    }
}
// Voici la function pour le trie j'utilise un sort 
function sortArray(tableau) {
 
    var confirm = window.confirm('Voulez-vous trier le tableau ?');

    if(confirm) {
        alert (`Voici le tableau trier : ${tableau.sort((a, b) => a-b)}`);
    }
    

}

// -------------------Exercice 2 ------------------