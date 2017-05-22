    /*------------------------------------------------- 
    |~ ~ ~ ~ ~ ~ ~ ~ ~ LES EVENEMENTS ~ ~ ~ ~ ~ ~ ~ ~ ~ |
    | ------------------------------------------------- |                          |                                                   |
    |   Les évènements, vont me permettre de déclencher |
    |   une fonction, c'est à dire : une série d'ins-   |
    |   tructions, suite à une action de mon utili-     |
    |   sateur.                                         |
    |                                                   |
    |   OBJECTIF : Etre en mesure de capturer ces       |
    |   évènements, afin d'exécuter une fonction.       |
    |--------------------------------------------------*/

// -- Les Evenements : MOUSE (Souris)

    // click : au clic sur un élément
    // mouseenter : la souris passe au dessus de la zone qu'occupe un element.
    // mouseleave : la souris sort de cette zone

// -- Les Evenements : KEYBOARD (Clavier)

    // keydown : une touche du clavier est enfoncée
    // keyup : une touche a été relachée

// -- Les Evenements : WINDOW (Fenetre)

    // scroll : défilement de la fenetre
    // resize : redimensionnement de la fenetre

// -- Les Evenements : FORM (Formulaire)

    // change : pour les éléments <input>, <select> et <textarea>
    // submit : à l'envoi d'un formulaire

// -- Les Evenements : DOCUMENT

    // DOMContentLoaded : Executé lorsque le document HTML est complètement chargé sans attendre le CSS et les images.

/* -------------------------------
    LES ECOUTEURS D'EVENEMENTS
-------------------------------- */

// -- Pour attacher un évènement à un élément, ou autrement dit, pour déclarer un écouteur d'évènement qui se chargera de lancer une action, c'est à dire une fonction pour un évènement donné, je vais utiliser la syntaxe suivante :

var p = document.getElementById("MonParagraphe");
console.log(p);

// -- Je souhaite que mon paragraphe soit rouge au clic de la souris.

    // -- 1 : Je défini une fonction chargée d'exécuter cette action.
    function changeColorToRed() {
        p.style.color = "red";
    }

    // -- 2 : Je déclare un écouteur qui se chargera d'appeler la fonction au déclenchement de l'évenement.
    p.addEventListener("click", changeColorToRed);
    
/* -------------------------------
        EXERCICE PRATIQUE
A l'aide de javascript, créez un champ "input" type text avec un ID unique.
Affichez ensuite dans une alerte, la saisie de l'utilisateur.
-------------------------------- */

// -- Création du Champ input
var input = document.createElement('input');

// -- Attribution d'un Attribut
input.setAttribute('type','text');

// -- Attribution d'un ID
input.id = "MonInput";

// -- Ajout de l'élément dans la page.
document.body.appendChild(input);

// ------------------------

// -- Création d'un écouteur
input.addEventListener('change', voirLaSaisieDeMonInput);

function voirLaSaisieDeMonInput() {
    alert(input.value);
}