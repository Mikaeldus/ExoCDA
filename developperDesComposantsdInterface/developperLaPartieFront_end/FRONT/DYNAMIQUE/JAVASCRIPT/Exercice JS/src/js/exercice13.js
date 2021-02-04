window.onload = (() => {

    // On Associe le click des buttons à l'appel des fonctions
    document.getElementById('btnExo1').addEventListener('click', clickExo1);

})

function clickExo1() {
    // j'attribut à ma variable tableau une valeur
    var tableau = [];
    // je lance mes functions si dans le tableau ce ne sont pas des nombres ou si c'est 0  il return else 
    tableau = saisieTab(tableau);
    if (!isNaN(tableau)) {
        infoTab(tableau);
    }
    else {
        alert(`Veuillez recommencer !! `);
    }
}


function saisieTab() {
    var data = prompt(`Veuillez saisir vos données, séparer par un ";"`);
    tableau = data.split(";");
    return tableau;
}

function infoTab(tableau) {
    // Et si le tableau contient des lettres ?
    var notNumberArray = false;

    tableau.forEach((value) => {
        var valueParsed = parseInt(value);

        if (!valueParsed) {
            notNumberArray = true;
        }
    })

    if (!notNumberArray) {
        var max = Math.max(...tableau);
        var somme = 0;

        tableau.forEach((nombre) => {
            somme += parseInt(nombre);
        })

        var moyenne = somme / tableau.length;
        alert(`La moyenne : ${moyenne}`);
        alert(`Le max : ${max}`);
        alert(`Voici le Tableau ${tableau}`);
    }
}
