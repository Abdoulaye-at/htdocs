/*--------------------------------------
~ ~ ~ ~ ~ CHAINAGE DE METHODES ~ ~ ~ ~ ~
---------------------------------------*/

$(function() {
  // Je souhaite cacher toutes les div de ma page HTML
  $('div').hide('slow', function() {

    // Une fois que la méthode hide() est terminée, mon alerte peut s'éxecuter.
       alert("Fin du hide");

    // La fonction s'executera pour l'ensemble des éléments du sélecteur.

    // CSS
    $('div').css('background', 'lightgreen');
    $('div').css('color', 'green');

    // Je fait réapparaitre mes div
    $('div').show();

    // En utilisant le chainage de méthodes, vous pouvez faire s'enchaîner plusieurs fonctions les unes après les autres...
    // $('p').hide(2000).css('color', 'blue').css('font-size', '20px').delay(2000).show(500);

    // On peut encore optimiser le code...
    $('p').hide(3000).css({'color': 'blue','font-size': '20px'}).delay(1000).show(500);
  })
})
