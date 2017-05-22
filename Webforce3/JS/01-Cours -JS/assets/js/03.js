/*-------------------------------------------------
~ ~ ~ ~ ~ ~ ~ ~ ~ LA CONCATÉNATION ~ ~ ~ ~ ~ ~ ~ ~
--------------------------------------------------*/

var DebutDePhrase       = "Ajourd'hui ";
var DateDuJour          = new Date();
var SuiteDePhrase       = "sont présents : ";
var NombreDeStagiaires  = 11;
var FinDePhrase         = " stagiaires.<br>";

// Nous souhaitons grâce à la concaténation, afficher tout ce petit monde en un seul bloc.

document.write(DebutDePhrase + DateDuJour.getDate() + "/" + (DateDuJour.getMonth()+1) + "/"+ DateDuJour.getFullYear() + SuiteDePhrase + NombreDeStagiaires + FinDePhrase);

/*------------------------------------------------------
EXERCICE:
Créez une concaténation à partir des éléments suivants
------------------------------------------------------*/

var phrase1 = "Je m'appelle ";
var phrase2 = "Blabla et j'ai ";
var age     = 800;
var phrase3 = " ans !";

document.write(phrase1 + phrase2 + age + phrase3);

document.getElementById("demo").innerHTML = Date();
