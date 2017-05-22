/*--------------------------------------------------
~ ~ ~ ~ ~ ~ ~ ~ LES ÉVENEMENTS ~ ~ ~ ~ ~ ~ ~ ~
Les évènements vont me permettre de déclencher une fonction,
c'est à dire : une série d'instructions, suite à action de mon utilisateur.

OBJECTIFS : Etre en mesure de capturer ces évènements, afin d'executer un fonction.
 ----------------------------------------------------*/

///// Les Évènements : Mouse (Souris) //////

  // click : au clic sur l'élément;
  // mouseenter : la souris passe au-dessus de la zone qu'occupe un élémouseenter
  // mouseleave : la souris de cette zone

///// Les Évènements : KEYBOARD (Clavier) //////

  // keydown : une touche du clavier est enfoncée;
  // keyup : quand la touche est relachée


///// Les Évènements : WINDOW (Fenêtre) //////

  // scroll : défilement de la fenêtre;
  // resize : redimensionnement de la fenêtre;

///// Les Évènements : FORM (Formulaire) //////

  // change : pour les éléments <input>, <select> et <area>;
  // resize : à l'envoi d'un formulaire;

///// Les Évènements : DOCUMENT  //////

  // DOMContentLoaded : Éxecuté lorsque le document HTML est complètement chargé;
  //                    sans attendre le CSS et les images;

/*-------------------------------------
- - - LES ÉCOUTEURS D'ÉVENEMENTS - - -
--------------------------------------*/

/*  Pour attacher un évènement à un élément, ou autrement dit,
    pour déclarer un écouteur d'évenement qui se chargera de lancer une action,
    c'est à dire une fonction pour un élément donné, je vais utiliser la syntaxe suivante :
*/
    var p = document.getElementById('MonParagraphe');
    console.log(p);

    // Je souhaite que mon paragraphe soit rouge au clic de la souris.

    // 1-- Je défini une fonction chargée d'éxecuter cette action.
    function changeColorToRed() {
      p.style.color = "red"
    }

    // 2 -- Je déclare un écouteur qui se chargera d'appeler la fonction au déclenchement de l'évènement "click".
    p.addEventListener("click", changeColorToRed);

    // 3-- Je lui change le curseur au passage de la souris
    document.getElementById("MonParagraphe").style.cursor = "pointer";
