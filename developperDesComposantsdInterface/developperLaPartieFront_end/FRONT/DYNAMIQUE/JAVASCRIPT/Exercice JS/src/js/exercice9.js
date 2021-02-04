window.onload = (() => {

    // On Associe le click des buttons à l'appel des fonctions
    document.getElementById('btnImg').addEventListener('click',clickImg );
    document.getElementById('btnToken').addEventListener('click',clickStringToken );


})



function clickImg() {

    // Je défini 2 variable rempli part l'utilisateur
    var x = prompt(`Veuillez saisir un nombre: `);
    var y = prompt(`Veuillez saisir un multiplicateur :`);
    // je lance ensuite les deux functions 
    operationDivers(x, y);
    affichImg(img);
}

// Je creer une function img
function affichImg(img) {
    // je creer une variable img dans le document, j'indique le chemin de l'img 
    var img = document.createElement('img');
    img.src = '../img/papillon.jpg';
    // Ensuite je demande d'enlever ce qu'il y a dans la balise du document avec l'id et je le remplace part l'img
    var container = document.getElementById('img');
    container.appendChild(img);
}

// Je creer un function operation 
function operationDivers(x, y) {
    // Avec les valeur "x" et "y" je fait l'operation cube et multiplication, que j'envois vers le document en remplacant l'existant pour mes variables "operation/(1)" 
    var somme = x * x * x;
    var somme1 = x * y;
    var operation = `Le cube de ${x} est égale à ${somme}`;
    var operation1 = `Le produit de ${x} * ${y} est égale à ${somme1} `;


    document.getElementById('t1').innerHTML = operation;
    document.getElementById('t2').innerHTML = operation1;
}
// -------------- Exercice  JS Cours 09 IMG -----------

// -------------- Exercice  JS Cours 09 String Token -----------

function clickStringToken() {
    // Je demande à l'utilisateur des informations séparer part ";" et je lui fait confirmer le ";", après je lui demande de choisir l'information qu'il veut recuperer
    var str1 = prompt(`Veuillez rentrer votre \nNom : \nPrenom : \nVille : \nCode postale : \nSéparer part un ;`);
    var str2 = prompt('Veuillez confirmer que vous  avez mis le bon séparateur :');
    var n = prompt(`Quel est le mot à extraire avec le numéro : \nNom"1" : \nPrenom"2" : \nVille"3" : \nCode postale"4"`);
    // je lance la seconde function
    strtok(str1, str2, n);


    function strtok(str1, str2, n) {
        // Je determine la variable chaine avec split qui intéprete un tableau avec les variables str1 separer part str2 
        var chaine = str1.split(str2);
        // "n" determine la donner à recuperer dans la chaine 
        var chaineDeCaractere = chaine[n - 1];
        var resultat = `Le mot que vous avez choisit d'extraire est  ${chaineDeCaractere}`;
        var resultat1 = `Dans la liste "${chaine}"`;

        // Ensuite j'affiche les informations sur la page HTML grace au ID
        document.getElementById('t1').innerHTML = resultat;
        document.getElementById('t2').innerHTML = resultat1;
    }
}
