window.onload = (() => {


    // j'attribut mes variables "a" / "b" / "c"
    var a = 100;
    var b = 100;
    var c = 1.00;

    console.log(`Valeur : ${a}`);
    // vérification en console log

    // j'attribut la nouvelle valeur à "a" et je defini "d" en valeur à "b"
    a = a + c;
    var d = b;

    // j'utilise la variable "d" pour decrementé la variable b
    d = b--;

    console.log(`Valeur ${b}`);
    // vérification en console log

    // Si la valeur de "d" est inférieur ou égal à la valeur de "a" ou que "a" est supérieur ou égale à la valeur de "d" alors le resultat est : 
    if (d <= a || a >= d) {
        console.log(`Ceci est une chaine de caratères : ${a} \nCeci est la valeur de ${d} `);
    }
    // Sinon j'inverse la décrémentation :
    else {
        d = b++;
        console.log(`Ceci est une chaine de caratères : ${a} \nCeci est la valeur de ${d}`);
    }
})
