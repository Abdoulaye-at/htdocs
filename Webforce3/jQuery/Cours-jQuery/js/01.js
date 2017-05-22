/*-------------------------------------
~ ~ ~ ~ ~ DISPONIBILITÉ DU DOM ~ ~ ~ ~ ~
--------------------------------------*/

// A partir du moment où mon DOM c'est à dire l'ensemble de l'arborescence de ma page est complètement chargée, je peux commencer à utiliser jQuery.

// Pour commencer à utiliser jQuery, je vais mettre l'ensemble de mon code dans une fonction.

// Cette fonction est appelée automatiquement par jQuery lorsque le DOM est entièrement défini.

// 3 façons de faire :
jQuery(document).ready(function() {
  // Ici, le DOM est entièrement chargé, je peux procéder à mon code JS.
});

$(document).ready(function() {
  // Ici, le DOM est entièrement chargé, je peux procéder à mon code JS.
});

$(function() {
  // Ici, le DOM est entièrement chargé, je peux procéder à mon code JS.

  // EN jQuery
  $("#texteEnjQuery").html("Mon texte en jQuery");

  // En Javacript
  // document.getElementById('texteEnjQuery').innerHTML="Mon texte en Javacript";
});
