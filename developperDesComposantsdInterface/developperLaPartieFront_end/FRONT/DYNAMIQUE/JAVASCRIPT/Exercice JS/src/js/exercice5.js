window.onload = (() => {

   // Je défini nom/prenom et le sexe part l'utilisateur 
   var prenom = prompt(`Veuillez entrez votre prénom ?`);
   var nom = prompt(`Veuillez entrer votre nom ?`);

   sexe = confirm(`Etes-vous un homme ? `);
   // Si confirmer = Monsieur
   if (sexe) {
       alert(`Bonjour Monsieur ${nom} ${prenom} \nBienvenu sur notre site Web !`);
   }
   // Sinon = Madame
   else {
       alert(`Bonjour Madame ${nom} ${prenom} \nBienvenu sur notre site Web !`);
   }
})
// ----------Exercice 1 JS Cours 05 ------------

 


// ----------Exercice 1 JS Cours 05 ------------
