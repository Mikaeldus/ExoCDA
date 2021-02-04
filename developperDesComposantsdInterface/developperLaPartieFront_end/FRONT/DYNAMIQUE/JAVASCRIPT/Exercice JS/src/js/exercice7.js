window.onload = (() => {
    document.getElementById('btnParite').addEventListener('click', clickParite);
    document.getElementById('btnAge').addEventListener('click', clickAge);
    document.getElementById('btnCalc').addEventListener('click', clickCalculette);
})


function clickParite() {

   // Je demande à l'utilisateur un nombre, je creer un variable "r" pour definir le resultat d'un division du chiffre
   var n = prompt(` Veuillez saisir un nombre :`);
   r = n % 2;

   // Si "n" est divisble part 2 et que le resultat est egale à 0 alors ce nombre est pair sinon il est impair
   if (n / 2 && r === 0) {
       alert(`Ce nombre est pair !!`);
   }
   else {
       alert(`Ce nombre est impair !!!`);
   }
}




function clickAge() {
    // je demande à l'utilisateur son année de naissance, je creer une variable avec l'année en cours, avec la variable "r" je determine l'age de la personne.
    var annee = prompt(`Veuillez saisir votre année de naissance : `);
    var aujourd = 2020;
    var r = aujourd - annee;

    // Si "annee" est supérieur ou egale à 2003 ou que la variable "r" est inférieur ou égale à 17 = mineur
    if (annee >= 2003 || r <= 17) {
        alert(`Vous etes mineur ! \nvotre age : ${r}`);
    }
    // sinon = majeur
    else {
        alert(`Vous etes majeur ! \nvotre age : ${r}`);
    }

}


function clickCalculette() {
    // Si "nb1" ou "nb2 n'est pas un chiffre il sera considerer comme nul, je demande aussi à l'utilisateur un opérateur"
    var nb1 = parseInt(prompt(`Veuillez saisir un nombre : `));
    var nb2 = parseInt(prompt(`Veuillez saisir un deuxième nombre : `));
    var op = prompt(`Veuillez saisir un opérateur "+" "-" "*" "/" :`);

    // si l"op" n'est pas + - * / alors il est nul
    if (op === "+" || op === "-" || op === "*" || op === "/") {
        var nb1parsed = parseInt(nb1);
        var nb2parsed = parseInt(nb2);
        console.log(`Voici les trois éléments demander : ${nb1parsed} ${op} ${nb2parsed}`);
        // j'utilise ma fonction crée pour effectuer les calcules
        operation(nb1parsed, nb2parsed, op);
    }
    else {
        // Si l'"op" n'est pas bien defini alors l'alert se lance
        alert(`Veuillez recommencer !!`);
    }

}

// Ma function interne operation, suivant le type d'op une instruction se lance
function operation(nb1, nb2, op) {
    switch (op) {
        case "/":
            if (nb2 === 0 || nb1 === 0) {
                alert(`Impossible de diviser par zéro`);
            }
            else {
                var somme = nb1 / nb2;
                alert(`Somme : ${somme}`);
            }
            break;

        case "*":
            var somme = nb1 * nb2;
            alert(`Somme : ${somme}`);
            break;

        case "-":
            var somme = nb1 - nb2;
            alert(`Somme : ${somme}`);
            break;

        case "+":
            var somme = nb1 + nb2;
            alert(`Somme : ${somme}`);
    }
}
