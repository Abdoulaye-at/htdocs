<?php
// code ajouté à l'etape 6.3
// $app -> get('/', function(){
//     require '../src/model.php';// Fichier qui contient la fonction afficheAll()
//     $infos = afficheAll();
//     $produits = $infos['produits'];
//     $categories = $infos['categories'];
//     // on recupere les infos de notre fonction afficheAll()
//
//     ob_start();
//     require '../views/view.php';
//     $view = ob_get_clean();
//     return $view;
    // stock dans la variable $view notre vue, puis on la retourne ... (base de la methode render())
//});



// code ajouté en 7.9  :
// $app -> get('/', function() use($app){
//   $produits = $app['dao.produit'] ->findAll();
//   $categories = $app['dao.produit'] ->findAllCategorie();
//
//   ob_start();
//   require '../views/view.php';
//   $view = ob_get_clean();
//   return $view;
// });



// code ajouté 8.6
$app -> get('/', function() use($app){
  $produits = $app['dao.produit'] -> findAll();
  $categories = $app['dao.produit'] -> findAllCategorie();

  $params = array(
    'produits' => $produits,
    'categories' => $categories
  );
  return $app['twig'] -> render('index.html.twig', $params);
}) -> bind('home');


// Exercice 1: ajouter la page Boutique :
$app -> get('/boutique/{categorie}', function($categorie) use($app){

  $produits = $app['dao.produit'] -> findAllByCategorie($categorie);
  $categories = $app['dao.produit'] -> findAllCategorie();

  $params = array(
    'categories' => $categories,
    'produits' => $produits
  );
  // rendre la vue boutique.html.twig (index.html.twig)
  return $app['twig'] -> render('boutique.html.twig', $params);
})-> bind('boutique');



//Exercice 2: ajouter la page produit :
// recuperer les infos d'un produit grace a son id.

$app -> get('/produit/{id}', function($id) use($app){
  $produit = $app['dao.produit'] -> find($id);
  $suggestions = $app['dao.produit']-> findSuggestions($id);
  $params = array(
    'produit' => $produit,
    'suggestions' =>$suggestions
  );
  // rendre la vue boutique.html.twig
  return $app['twig'] -> render('produit.html.twig', $params);
  // test : www.boutique.dev/produit/5

})-> bind('produit');



$app -> get('/profil/{id}', function($id) use($app){
  $profil = $app['dao.membre'] -> find($id);

  $params = array(
    'profil' => $profil
  );
  // rendre la vue boutique.html.twig
  return $app['twig'] -> render('profil.html.twig', $params);
  // test : www.boutique.dev/produit/5

})-> bind('profil');


$app -> get('/login/', function() use($app){
// affichage de la page de connexion:
$params = array(
);
  return $app['twig'] -> render('login.html.twig', $params);
})-> bind('login');


// EXERCICE 3 : Gérer de A à Z la fonctionnalité qui permet d'afficher la page profil.
//   1 - Créer le fichier membreDAO dans le dossier DAO
//   2 - Créer la fonction find($id) dans le fichier MembreDAO qui va permettre de récupérer les informations d'un membre sous forme d'objet grâce à la méthode BuildMembre() qui transforme un array en objet (attention : il faut que Membre.php soit créé dans Entity/)
//   3 - créer le fichier profil.html.twig (sur la base du fichier dans le drive)
//   4 - Créer la route /profil/{id} qui permet d'afficher la page de profil de tout utilisateur grâce à son ID.
//   5 - tester www.boutique.dev/profil/3 (cela doit afficher la page du membre "admin")


// EXERCICE 4 : Gérer de A à Z l'affichage de la page connexion (attention juste l'affichage)
//   1 - Récupérer le fichier login.html.twig qui contient le formulaire d'inscription (dans le drive)
//   2 - Créer la route /login qui permet d'afficher la page de connexion


// EXERCICE 5 :
// On souhaite ajouter à nos fiches produit des suggestions :
// 	-> Lorsqu'on visite un produit il faut proposer tous les produits de la même categorie... sauf (evidement) le produit qu'on est en train de vister.
//
// Vous devez :
// 	1/ ajouter une méthode findSuggestions($id) dans ProduitDAO, qui va retourner tous les produits sous forme d'un array composé d'objet de la même categorie que celui dont on récupére l'ID, sauf le produit dont on récupere l'ID
//
// 	2/ Dans notre route produit/{id} récupérer les produits suggérés dans une variable $suggestions
//
// 	3/ Dans notre vue produit.html.twig afficher tous les produits suggérés
