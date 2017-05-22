/*Réaliser une fonction permettant à un internaute de :
- Saisir son prénom dans un prompt
- Retourner à l'utilisateur : Bonjour [Prenom]; Quel âge as-tu ?
- Saisir son âge
- Retourner à l'utilisateur : Tu est donc né en [ Année de naissance ]
- Afficher ensuite un récapitulatif dans la page
Bonjour [Prénom], Tu as [Age] :*/

// Processus de
// 1-- Initialisation des variables //
var DateDuJour = new Date();

// 2-- Création de la fonction //
function Hello() {
// Je demande à l'utilisateur son prénom
    prenom = prompt("Veuillez saisir votre prénom", "Abdoulaye");

// Je demande à l'utilisateur son âge
    age = parseInt(prompt("Bonjour " + prenom + ", quel âge as-tu ?"));

// J'affiche une alerte avec son année de naissance
    alert("Waow ! Tu est donc né en " + (DateDuJour.getFullYear() - age) + " !");

// Affichage du récapitulatif dans mon HTML
    document.write("Bonjour " + prenom + " tu as " + age + " ans !");
}

// 3-- Éxécution de la fonction //
Hello();
