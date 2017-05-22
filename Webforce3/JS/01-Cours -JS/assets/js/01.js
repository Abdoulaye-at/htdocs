alert("Bienvenue mon ami");
alert("Comment vas-tu ?")
// COMMENTAIRE UNILIGNE
/*COMMENTAIRE SUR PLUSIEURS LIGNES*/


// 1 - Déclarer une variable en JS
var Prenom;

// 2 - Affecter une valeur
Prenom = "Hugo";

// 3 - Afficher la valeur de ma variable dans la console
console.log(Prenom);

/*--------------------------------------------------
~ ~ ~ ~ ~ ~ ~ LES TYPES DE VARIABLES ~ ~ ~ ~ ~ ~ ~ ~
---------------------------------------------------*/

// ici, "typeof" mes permet de connaître le type de ma variable
console.log(typeof Prenom);

// Declaration d'un nombre
var Age = 40;
console.log(Age);
console.log(typeof Age);

/*----------------------------------------------
~ ~ ~ ~ ~ LA PORTÉE DES VARIABLES ~ ~ ~ ~ ~ ~ ~
-----------------------------------------------
*** Les variables déclarées directement à la racine du ficher js sont appelées variables GLOBALES.

    Elles sont donc disponibles dans l'ensemble de votre document, y compris dans les fonctions.
    La portée des variables globales s'arrête au fichier.
    Si je change de page, les variables n'existent plus.

*** Les variables déclarées à l'intérieur de ma fonction sont appelées variables LOCALES.

    Elles sont disponibles uniquement à l'intérieur de ma fonction.

*** Depuis ECMA6, vous pouvez déclarer une variable avec le mot clé "let".

    Votre variable sera alors accessible uniquement dans le bloc dans lequel elle est contenue.
    Si elle est déclarée dans une fonction, elle sera disponible uniquement dans le bloc concernant la fonction.
    Si elle est déclarée dans une condition, elle sera disponible uniquement dans le bloc concernant la condition.

*/

// Les variables FLOAT //
var uneDecimale = -2.980;
console.log(uneDecimale);
console.log(typeof uneDecimale);

// Les booléens ( VRAI / FAUX ) //
var unBooleen = false;
console.log(unBooleen);
console.log(typeof unBooleen);

// Les constantes //
/*  La déclaration CONST oerlet de créer une constante uniquement en lecture.
    Sa valeur ne pourra être modifiée par des réaffectations ultérieures.
    Une constante ne peut pas être déclarée plusieurs fois
    Par convention, les constantes sont en majuscules !
*/

const PAYS = "France"

// Je ne peut pas faire cela...
// const PAYS = "France"
//  Uncaught TypeError : Assigment to constant variable.

/*----------------------------------------------------------------------------
                                LA MINUTE INFO
----------------------------------------------------------------------------*/

/*  A fur et à mesure que l'on affecte ou ré-affecte des valeurs à une variable et le nouveau type.
    En JavaScript (ECMA Script), les variables sont auto-typées.
    Pour convertit une variable de type NUMBER en STRING et STRING en NUMBER je peux utiliser les fonctions natives de JavaScript.
*/

var unNombre = "24";
console.log(unNombre);
console.log(typeof unNombre);
//  La fonction parseInt() pour retourner un Entier à partir de ma chaîne de caractères.

unNombre = parseInt (unNombre);
console.log(unNombre);
console.log(typeof unNombre);

// Je réaffecte une valeur à ma variable
unNombre = "12.55";
console.log(unNombre);
console.log(typeof unNombre);

// La Fonction parseFloat() permet de retourner un Float sur la Base d'une chaîne de caractères
unNombre = parseFloat (unNombre);
console.log(unNombre);
console.log(typeof unNombre);

// Conversion d'un nombre en STRING avec toString();
var unNombreEnString = 10;
var maChaineDeCaractere = unNombreEnString.toString();
console.log(unNombreEnString);
console.log(typeof unNombreEnString);
console.log(typeof maChaineDeCaractere);
