/*-------------------- EXEMPLE------------------|
// LES CONTITIONS //
var Major = 18;

if (Major >= 18) {
    alert("Bien le bonjour ! ");
} else {
  alert("Google...");
}
------------------------------------------------*/

/*
------------------------------------ EXERCICE ------------------------------
Créer une fonction permettant de cérifier l'âge de l'utilisateur.
S'il a la majorité légale, alors je lui souhaite la bienvenue,
sinon, je fait une redirection sur Google après lui avoir signalé le soucis.
----------------------------------------------------------------------------
*/

function age(){
    var a = prompt("Quel âge avez-vous?");

    if(a>=18)
    {
        alert("Bien le bonjour !");
    }
    else
    {
      alert("Désolé, vous n'avez pas l'âge requis pour explorer notre page. Vous allez être redirigés sur Google.fr")
      window.open ("http://www.google.fr");
    }
}

age();
