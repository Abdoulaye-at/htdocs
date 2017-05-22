/*---------------------------------------------
~ ~ ~ ~ ~ LA MANIPULATION DES CONTENUS~ ~ ~ ~ ~
----------------------------------------------*/

function l(e) {
  console.log(e);
}

// Je souhaite récupérer mon lien ; comment procéder ? //
 var google = document.getElementById('google');
 l(google);

 // Je souhaite accéder aux informations de ce lien, par exemple :

  // --A-- Le lien vers lequel pointe la balise //
  l('Lien vers lequel pointe la balise');
  l(google.href);

  // --B-- L'ID de la balise //
  l('L\'ID de la balise');
  l(google.id);

  // --C-- La Classe de la balise //
  l('La classe de la balise');
  l(google.className);

  // --D-- Le texte de la balise //
  l('Le texte de la balise');
  l(google.textContent);

  // Maintenant, je souhaite modifier la valeur de mon lien
  // Comme une variable classique, je vais simplement venir affecter une nouvelle valeur

  google.textContent = "Mon lien vers Google";

///////// AJOUTER UN ÉLEMENT DANS MA PAGE ////////////

// 2 méthodes possibles

// 1 : La fonction document.createElement() va permettre de générer un nouvel élément dans le DOM ;
//     que je pourrais par la suite modifier avec les méthodes que nous venons de voir.

// PS : Ce nouvel élément est placé en mémoire

// Définition de mon élément

var span = document.createElement('span');

// Si je souhaite lui donner une id
span.id = "MonSpan"

// Si je souhaite lui attribuer un contenu
span.textContent = "Nouveau contenu en js";


// 2 : La fonction appendChild() va nous permettre de rajouter un enfant à un élément du document

google.appendChild(span);

/*--------------------------------------------------------------
- - - - - - - - - - - - - - EXERCICE - - - - - - - - - - - - - -
En partant du travail déja réalisé sur la page.
Créez directement dans la page une balise <h1> ayant comme contenu : "Titre de mon article".

Dans cette balise, vous créerez un lien vers une url de votre choix.

BONUS : Ce lien sera de couleur rouge et non souligné
----------------------------------------------------------------*/

/////////   CORRECTION   /////////
// Creation de la balise h1
var h1 = document.createElement("h1");

// Création de la balise a
var a = document.createElement("a");

  // Je crée le contenu de mon titre
  a.textContent = "Titre de mon article"
  // Je met mon lien (a) dans mon h1 grâce à la propriété "appendChild()"
  h1.appendChild(a);

  // Je met mon h1 dans ma page, dans mon body
  document.body.appendChild(h1);

  // BONUS //
    // Je veux que mon lien soit de couleur rouge
    a.style.color = "red";
    a.style.textDecoration = "none;"
