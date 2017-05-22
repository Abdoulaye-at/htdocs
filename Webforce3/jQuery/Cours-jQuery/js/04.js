/*------------------------------
LES SELECTEURS D'ENFANTS JQUERY
-------------------------------*/

// Initialisation de jQuery

$(function () {
  console.log($('section'));
  console.log($('header'));

  // Je selectionne tous les enfants directs de mon header
  console.log($('header').children());

  //
  console.log($('header').children('ul'));

  //
  console.log($('header').children('ul').find('li'));

  // 2ème élément de mes 'li'
  console.log($('header').children('ul').find('li').eq(1));

  // Voisin immédiat de header
  console.log($('header').next());
  console.log($('header').next().next);

  // LES PARENTS
  console.log($('header').parent());




});
