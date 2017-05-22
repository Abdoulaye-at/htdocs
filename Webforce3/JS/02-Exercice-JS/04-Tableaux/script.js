/*----------------------------------
~ ~ ~ ~ ~ ~ ~ EXERCICE ~ ~ ~ ~ ~ ~
-----------------------------------*/

// Supposons le tableau suivant :
var prenoms = ['Hugo', 'Jean', 'Matthieu', 'Luc', 'Pierre', 'Marc'];

// CONSIGNE : Grâce à une boucle FOR, afficher la liste des prénoms du tableau suivant dans la console ou sur votre page //


// ~ ~ ~ ~ 1ère façon de faire ~ ~ ~ ~ //
for(var i = 0; i < 6; i++) {
  console.log(prenoms[i]);
}


// ~ ~ ~ ~ 2ème façon de faire ~ ~ ~ ~ //
console.log("-----------------");

for (var i = 0; i < prenoms.length; i++) {
    console.log(" " + prenoms[i]);
}
  // Par soucis d'efficacité :
  var nmbElemTab = prenoms.lenght
  for (var i = 0; i < nmbElemTab; i++) {
      console.log(" " + prenoms[i]);
  }

// ~ ~ ~ ~ MEME EXO AVEC LA BOUCLE WHILE ~ ~ ~ ~ //
console.log("-----------------");

var j = 0;
while(j < prenoms.lenght); {
  console.log(prenoms[j]);
  j++;
}

// Autre façon de parcourir mon tableau
// Attention ici à la performance
console.log("-----------------");

prenoms.forEach(afficheprenoms);

function afficheprenoms(prenom, index) {
  console.log(prenoms);
}
