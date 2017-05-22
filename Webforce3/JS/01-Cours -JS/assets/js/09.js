
/*------------------------------------------------------------------
~ ~ ~ ~ ~ ~ ~ ~ ~ ~ ~ ~ ~ ~ ~ LE DOM ~ ~ ~ ~ ~ ~ ~ ~ ~ ~ ~ ~ ~ ~ ~ ~ ~
Le DOM, est un interface de développement en JS pour HTML;
Grâce au DOM, je vais être en mesure de d'accéder / modifier mon HTML.

L'objet "document" : c'est le point d'entrée vers mon contenu HTML !

Chaque page chargée dans mon navigateur à un objet "document".
-------------------------------------------------------------------*/


/*------------------------------------------------------------------
~ ~ ~ ~ ~ ~ ~ ~ ~ ~ document.getElementById ~ ~ ~ ~ ~ ~ ~ ~ ~ ~ ~ ~
------------------------------------------------------------------*/
/*  document.getElementById('') :
    C'est une fonction qui va permettre de récupérer un élément HTML à partir de son identifiant unique : ID.*/

var bonjour = document.getElementById('bonjour');
console.log(bonjour);


/*------------------------------------------------------------------
~ ~ ~ ~ ~ ~ ~ ~ document.getElementByClassName ~ ~ ~ ~ ~ ~ ~ ~ ~ ~ ~
------------------------------------------------------------------*/
/*  document.getElementByClassName('') :
    C'est une fonction qui va permettre de récupérer un OU plusieurs éléments (liste)
    HTML à partir de leur classes.*/

var contenu = document.getElementsByClassName('contenu');
console.log(contenu);


/*------------------------------------------------------------------
~ ~ ~ ~ ~ ~ ~ ~ ~ ~ document.getElementByTagName ~ ~ ~ ~ ~ ~ ~ ~ ~ ~ ~ ~
------------------------------------------------------------------*/
/*  document.getElementByTagName('') :
    C'est une fonction qui va permettre de récupérer un OU plusieurs éléments (liste)
    HTML à partir de leur balises.*/

var span = document.getElementsByTagName('span');
console.log(span);
