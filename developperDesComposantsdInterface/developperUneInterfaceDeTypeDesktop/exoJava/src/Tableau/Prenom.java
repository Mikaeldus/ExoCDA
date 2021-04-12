package Tableau;

import java.util.Scanner;

public class Prenom {

    public static void main(String[] args) {
        // J'utilise Scanner sur ma variable scanner
        Scanner scanner = new Scanner(System.in);
        // Je demande combien d'element contiendra le tableau
        System.out.println("Veuillez le nombre total d'elements du tableau :");
        // je declare ma variable n, qui recupere la donnée taper part l'utilisateur
        int n = scanner.nextInt();
        // je creer une variable tab qui sera de type string et qui sera un tableau qui contiendra le nombre d'element donner part l'utilisateur "n"
        String tab[] = new String[n];

        // Je creer une boucle qui aura une variable i, tant que i est inferieur a n alors i prend 1.
        for(int i = 0; i<n; i++) {
            // je demande a l'utilisateur de remplir le champ correspondant a i, car i va parcourir le tableau
            System.out.println("Entrez le prenom"+i+"du tableau");
            // Je recupere la valeur taper part l'utilisateur
            String val = scanner.next();
            // je rentre la donnée de l'utilisateur part rapport a i qui correspond au champ parcouru
            tab[i] = val;
        }
        // Je montre le tableau complet a l'utilisateur
        System.out.println("\n Voici le tableau :");
        // j'utilise une methode pour parcourir mon tableau "tab"
        parcourirTableau(tab);
    }


    //Méthode pour parcourir un tableau

    private static void parcourirTableau(String[] tableau){
        for (String t : tableau){
            System.out.println(t); //Affiche les éléments du tableau pris en paramètre
        }
    }
}
