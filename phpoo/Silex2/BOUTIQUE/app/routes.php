<?php

use Symfony\Component\HttpFoundation\Request;


//Code ajouté à l'etape 6.3
// Supprimer en 7.9
// $app -> get('/', function(){
	// require '../src/model.php'; 
	//Fichier qui contient la fonction afficheAll()
	
	// $infos = afficheAll();
	
	// $produits = $infos['produits'];
	// $categories = $infos['categories'];
	//on récupère les infos de notre fonction afficheAll()
	
	// ob_start();
	// require '../views/view.php';
	// $view = ob_get_clean();
	// return $view;
	//Stocke dans la variable $view notre vue, puis on la retourne... (base de la méthode render())
// }); 


// Code ajouté en 7.9 : 
//Code est supprimé en 8.6
// $app -> get('/', function() use($app){
	// $produits = $app['dao.produit'] -> findAll();
	// $categories = $app['dao.produit'] -> findAllCategorie();
	
	
	// ob_start();
	// require '../views/view.php';
	// $view = ob_get_clean();
	// return $view;
// }); 


// Code ajouté en 8.6 : 
$app -> get('/', function() use($app){
	$produits = $app['dao.produit'] -> findAll();
	$categories = $app['dao.produit'] -> findAllCategorie();
	
	$params = array(
		'produits' => $produits,
		'categories' => $categories
	);
	
	return $app['twig'] -> render('index.html.twig', $params); 
}) -> bind('home'); // le nom de cette route est 'home'


// EXERCICE 1 : Page Boutique/
$app -> get('/boutique/{categorie}', function($categorie) use($app){ 

	$produits = $app['dao.produit'] -> findAllByCategorie($categorie);
	$categories = $app['dao.produit'] -> findAllCategorie();

	$params = array(
		'produits' => $produits,
		'categories' => $categories
	);

	return $app['twig'] -> render('boutique.html.twig', $params);  
	// rendre la vue boutique.html.twig (index.html.twig)
}) -> bind('boutique');










// EXERCICE 2 : Page Produit/
$app -> get('/produit/{id}', function($id) use($app){ 
	
	$produit = $app['dao.produit'] -> find($id);
	$suggestions = $app['dao.produit'] -> findSuggestion($id);
	$commentaires = $app['dao.commentaire'] -> findAllByProduit($id);
	
	$params = array(
		'produit' => $produit,
		'suggestions' => $suggestions,
		'commentaires' => $commentaires
	);
	
	return $app['twig'] -> render('produit.html.twig', $params); 
	
						
}) -> bind('produit');









//EXERCICE 3 : 
$app -> get('/profil/{id}', function($id) use($app){
	$membre = $app['dao.membre'] -> find($id);
	
	$params = array(
		'membre' => $membre,
		'title' => 'Profil de ' . $membre -> getPseudo()
	);
	
	return $app['twig'] -> render('profil.html.twig', $params);

}) -> bind('profil');




// EXERCICE 4 :
$app -> get('/login/', function(Request $request) use($app){
	
	$params = array(
		'error' => $app['security.last_error']($request),
		'last_username' => $app['session'] -> get('_security.last_username')
	);
	
	return $app['twig'] -> render('login.html.twig', $params);
	
	
}) -> bind('login');







