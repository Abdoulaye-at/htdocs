<?php


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
	
	// récupérer les infos d'un produit grâce à son id.
	
	// render produit.html.twig (dans le drive)
	// Test : www.boutique.dev/produit/5
});


// EXERCICE 3 : Gérer de A à Z la fonctionnalité qui permet d'afficher la page profil.
//   1 - Créer le fichier membreDAO dans le dossier DAO
//   2 - Créer la fonction find($id) dans le fichier MembreDAO qui va permettre de récupérer les informations d'un membre sous forme d'objet grâce à la méthode BuildMembre() qui transforme un array en objet (attention : il faut que Membre.php soit créé dans Entity/)
//   3 - créer le fichier profil.html.twig (sur la base du fichier dans le drive)
//   4 - Créer la route /profil/{id} qui permet d'afficher la page de profil de tout utilisateur grâce à son ID. 
//   5 - tester www.boutique.dev/profil/3 (cela doit afficher la page du membre "admin")


// EXERCICE 4 : Gérer de A à Z l'affichage de la page connexion (attention juste l'affichage)
//   1 - Récupérer le fichier login.html.twig qui contient le formulaire d'inscription (dans le drive)
//   2 - Créer la route /login qui permet d'afficher la page de connexion






