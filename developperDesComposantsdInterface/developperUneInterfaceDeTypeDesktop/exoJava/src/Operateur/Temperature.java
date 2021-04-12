package Operateur;

import java.util.Scanner;
public class Temperature {
    public static void main(String[]args){

        // j'utilise la methode scanner pour recuperer les donnes taper
        Scanner nb = new Scanner(System.in);

        // j'affiche ma demande a l'utilisateur
        System.out.print("Entrez une temperature en Fahrenheit :");
        // je recupere ce qui est taper
        double fahrenheit = nb.nextDouble();

        // J'effectue mon operation pour avoir ma valeur a la variable celsius
        double celsius = ((fahrenheit - 32) * 5) / 9;
        // J'utilise match.round pour afficher les decimal apres la virgule
        double res = Math.round(celsius * 10.0) / 10.0;
        // j'affiche le resultat :
        System.out.println(+res+"Celsius");

    }
}


