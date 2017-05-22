// Déclarer un tableau numérique
var monTableau = [];
var myArray = new Array;

// Affecter des Valeurs à un Tableau numérique
myArray[0] = "John";
myArray[1] = "Rudy";
myArray[2] = "Teva";
myArray[3] = "Carole";

// Afficher le contenu de mon Tableau numérique dans la console

console.log(myArray[2]); //Teva
console.log(myArray[0]); //John
console.log(myArray); //Affiche toutes les données

// Déclarer et affecter des Valeurs à un Tableau numérique

var nosPrenoms = ["Nabila", "Karim", "Johrdane", "Hanane"]
console.log(nosPrenoms);
console.log(typeof nosPrenoms);

// Déclarer et affecter une valeur à un objet (Pas de tableau associatif en JS)

var coordonnees = {
  "prénom" : "Abdoulaye",
  "nom" : "THIAW",
  "âge" : "21"
}
  console.log(coordonnees);
  console.log(typeof coordonnees);

// Comment créer et affecter des valeurs dans un tableau à 2 dimensions

//Ici, il s'agit de Tableau Numériques
var listeDePrenoms = ["Hugo", "Patrick", "Rodrigue"];
var listeDeNoms    = ["LIEGARD", "ISOLA", "NOUEL"];

//Je vais créer un tableau à 2 dimensions à partir de mes 2 tableaux précedents
var Annuaire = [listeDePrenoms, listeDeNoms];
console.log(Annuaire);

//Afficher un Nom et un Prénom sur ma page HTML
document.write(Annuaire[0][1]);
document.write(" ");
document.write(Annuaire[1][1]);

/*----------------------------------------
EXERCICE:
Créez un tableau à 2 dimensions appelé AnnuaireDesStagiaires qui contiendra toutes les coordonnées pour chaque stagiaire.
EX: NOM PRÉNOM TEL
-----------------------------------------*/
// Déclarer et affecter une valeur à un objet (Pas de tableau associatif en JS)
var AnnuaireDesStagiaires = [
  {"prenom" : "Teva", "nom" : "NAT",  "tel" : "07.50.60.80.90"},
  {"prenom" : "Karim", "nom" : "HIA",  "tel" : "06.07.08.09.10"},
  {"prenom" : "Charles", "nom" : "BERGEAUD",  "tel" : "01.20.30.40.50"}
]

console.log(AnnuaireDesStagiaires);
console.log(typeof AnnuaireDesStagiaires);



/*---------------------------------------------------
                  AJOUTER UN ELEMENT
---------------------------------------------------*/
var Couleurs = ["Bleu", "Jaune", "Vert", "Orange"];
// Si je souhaite ajouter un élément dans mon tableau
// Je fais appel à la fonction push() qui me renvoi le nombre d'éléments de mon tableau
// La Fonction unshift() permet d'ajouter un ou plusieurs éléments en début de tableau
var nombreElementDeMonTableau = Couleurs.push("Rouge");
console.log(Couleurs);
console.log(nombreElementDeMonTableau);

/*----------------------------------------------------------
                  RECUPERER ET SORTIR LE DERNIER ELEMENT
----------------------------------------------------------*/

// La fonction pop() me permet de supprimer le dernier élément de mon tableau et d'en récupérer la valeur.
// Je peux accessoirement récupérer cette valeur dans une variable.
 var monDernierElement = Couleurs.pop();
 // La même chose est possible avec le premier élément en utiilisant la fonction shift();
 // NB: La fonction splice() vous permet de faire sortir un ou plusieurs éléments de votre tableau
