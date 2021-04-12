package Pyramide;

import java.util.Scanner;

public class Exercice {
    public static void main(String[] args) {
        // J'utilise Scanner pour recuperer les donnée taper
        Scanner row = new Scanner(System.in);
        // Je demande a l'utilisateur le nombre de ligne pour la pyramide
        System.out.println(" Nombre de ligne pour la pyramide :");
        // je recupere le nb emis part l'utilisateur
        int rows = row.nextInt();
        // J'affiche le titre :
        System.out.println("Pyramide complete\n");
        // je declare une boucle for qui a comme variable i, qui tant qu'il n'est pas egale a rows il continu la boucle
        for (int i = 0; i < rows; i++) {
            // je declare une boucle for qui a comme variable j, qui tant qu'il n'est pas egale a i, il continu la boucle pour afficher un "vide"
            for (int j = 0; j < rows - i; j++) {
                System.out.print(" ");
            }
            // je declare une boucle for qui a comme variable k, qui tant qu'il est inferieur ou egale a i il continu la boucle pour afficher "*"
            for (int k = 0; k <= i; k++) {
                System.out.print("* ");
            }
            System.out.println("");
        }
    }
}
