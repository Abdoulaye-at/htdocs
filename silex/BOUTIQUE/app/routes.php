<?php

// Code ajouté à l'étape 6.3
// Supprimé en 7.9
// $app -> get('/', function(){
//   require '../src/model.php'; // fichier qui contient la fonction afficheAll()
//
//   $infos = afficheAll();
//
//   $produits   = $infos['produits'];
//   $categories = $infos['categories'];
//   // On récupère les infos de notre fonction afficheAll()
//
//   ob_start();
//   require '../views/view.php';
//   $view = ob_get_clean();
//   return $view;
//   // Stocke dans la variable $view notre vue, puis on la retourne... (base de la méthode render())
//
// });

// Code ajouté en 7.9
$app -> get('/', function() use($app){
  $produits   = $app['dao.produit'] -> findAll();
  $categories = $app['dao.produit'] -> findAllCategorie();

  ob_start();
  require '../views/view.php';
  $view = ob_get_clean();
  return $view;
});
