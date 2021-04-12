package Voyelle;

import java.util.Locale;
import java.util.Scanner;

public class Exercice {
    public static void main(String[] args) {
        // j'initialise deux variable, voyelle et consonne
        int voyel =0, cons = 0;

        // j'utilise la methode Scanner pour recuperer les information taper
        Scanner mot = new Scanner(System.in);

        // j'affiche dans le terminal ma demande
        System.out.print("Veuillez rentrez un mot :");
        // je recupere la reponse taper part l'utilisateur
        String m = mot.nextLine();
        // je met toute la chaine de caractère recuperer en minuscule
        m = m.toLowerCase(Locale.ROOT);

        // je creer une boucle, je defini une variable i qui va permettre de compter tte la longueur de la variable m
        for(int i = 0; i < m.length(); i++) {
            // j'utilise .charAT() pour extraire les caractères demander
            char c = m.charAt(i);

            // Si dans la variable c il y a 'c,e,i,o,u' alors la variable voyel prend 1.
            if(c == 'a'|| c == 'e'|| c == 'i' || c == 'o' || c == 'u') {
                voyel++;
                // Sinon pour le restant c'est la consonne qui prend 1.
            }else if ((c >= 'a' && c <= 'z')) {
                cons++;
            }
        }
        // J'affiche le resultat a l'utilisateur.
        System.out.println("Voici le mot :"+" "+m+"   "+"Nombre de voyelle :"+" "+voyel+" "+"et"+" "+"Nombre de consonne :"+" "+cons);
    }
}
