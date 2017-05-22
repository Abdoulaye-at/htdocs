/*---------------------------------------
- - - - - - EXERCICE PRATIQUE - - - - - -
A l'aide de javascript, créez un champ "input" type text avec un Id unique.
Affichez ensuite dans une alerte, la saisie de l'utilisateur.
---------------------------------------*/

var input = document.createElement("INPUT");
input.id = "idInput";
input.placeholder = "Saisissez votre texte...";
document.body.appendChild(input);
input.addEventListener('change', afficheMaSaisie);
function afficheMaSaisie(){
alert(input.value);
};
