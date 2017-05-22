/*-------------------------------------
~ ~ ~ ~ ~ LES SELECTEURS EN JQUERY ~ ~ ~ ~ ~
--------------------------------------*/
// Format : $ ('selecteur')

// En jQuery, tout les selecteurs CSS sont disponibles

// DOM ready

$(function() {
  // les flemmards.js
  function l(e) {
    console.log(e);
  }

  // Version en Javascript
  l("SPAN via JS :")
  l(document.getElementsByTagName('span'));

  // Version en jQuery
  l("SPAN via JQ :")
  l($('span'));

  // Sélectionner mon menu

    // Version en Javascript
    l("ID via JS :")
    l(document.getElementById("menu"))

    // Version en jQuery
    l("ID via jQuery :")
    l($("menu"))

    // Par attribut
    l('Par attribut :')
    l($("[href]='http://google.fr'"))
    l($("[href]"))


    // Remarquez que jQuery me permet de sélectionner des éléments de façon beaucoup plus imple de javascript

})
