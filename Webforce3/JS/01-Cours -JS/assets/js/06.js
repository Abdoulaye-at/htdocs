/*-------------------------------------
~ ~ ~ ~ ~ ~ LES FONCTIONS  ~ ~ ~ ~ ~ ~
--------------------------------------*/
// Déclarer une fonction
// Cette fonction ne retourne aucune valeur
function DitBonjour() {
    // Lors de l'appel de la fonction, les instructions ci-dessous seront éxecutées.
    alert("Bonjour !");
}

DitBonjour();

// Déclarer une fonction qui prend une variable en paramètre

function Bonjour(Prenom) {
  document.write("<p> Hello <stong>" + Prenom + "</strong> ! </p>");
}

Bonjour("Abdoulaye");

function addition(nb1, nb2) {
  var resultat = nb1 + nb2;
  return resultat;
}

var resultat= addition(10, 5);
document.write("<p>" + resultat + "</p>")
