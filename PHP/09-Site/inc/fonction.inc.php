<?php

function debug($var){
  echo'<div style="background:orange; padding: 5px;">';
    echo '<pre>'; print_r($var); echo '</pre>';
  echo '</div>';
}

//---------- Fonctions membre ----------//

function internauteEstConnecte(){
  if(isset($_SESSION['membre'])){ // Si l'indice membre existe dans $_SESSION, c'est que le membre s'est connecté
    return true;
  } else {
    return false;
  }
  // équivaut à : return (isset($_SESSION['membre']));
}

function internauteEstConnecteEtEstAdmin(){
  if(internauteEstConnecte() && $_SESSION['membre']['statut'] == 1){ // si l'internaute est connecté ET que son statut vaut 1, alors il est ADMIN
    return true;
  } else {
    return false;
  }
  // équivaut à : return (internauteEstConnecte() && $_SESSION['membre']['statut'] == 1);
}

//------------------------------------------//
function executeRequete($req, $param = array()){
  if(empty($param)){
    foreach ($param as $indice => $valeur) {
      $param[$indice] = htmlspecialchars($valeur, ENT_QUOTES); // évite les injections css et xcss en neutralisant les caractères spéciaux
    }
  }
  global $pdo;
  $r = $pdo->prepare($req);
  $succes = $r->execute($param);

  if(!$succes){
    die('Erreur sur la requête SQL'); // arrête le script et affiche un msg d'erreur
  }

  return $r;
}

//--------- FONCTIONS LIÉES AU PANIER -------//

// On crée le panier vide :
function creationDuPanier(){
  if(!isset($_SESSION['panier'])){ // si le panier n'existe pas encore
    $_SESSION['panier'] = array();
    $_SESSION['panier']['titre'] = array();
    $_SESSION['panier']['id_produit'] = array();
    $_SESSION['panier']['quantite'] = array();
    $_SESSION['panier']['prix'] = array();
  }
}

// Fonction pour rajouter un produit au panier :
function ajouterProduitDansPanier($titre, $id_produit, $quantite, $prix){
  creationDupanier();

  $position_produit = array_search($id_produit, $_SESSION['panier']['id_produit']); // retourne l'indice du produit si celui-ci existe, retourne false dans le cas contraire

  if($position_produit === false){
    // le produit n'est pas dans le panier et on l'y ajoute
    $_SESSION['panier']['titre'][] = $titre;
    $_SESSION['panier']['id_produit'][] = $id_produit;
    $_SESSION['panier']['quantite'][] = $quantite;
    $_SESSION['panier']['prix'][] = $prix; // crochets vide pour ajouter le contenu de la variable à l'indice numérique suivant
  } else {
    // Sinon, on ajoute la nouvelle quantité à la quantité existante dans le panier
    $_SESSION['panier']['quantite'][$position_produit] += $quantite;
  }
}

// Calculer le montant total du panier
function montantTotal(){
  $total = 0;

  // On parcourt le panier pour additionner les quantité fois prix :
  for($i=0; $i < count($_SESSION['panier']['id_produit']); $i++){
    $total += $_SESSION['panier']['quantite'][$i] * $_SESSION['panier']['prix'][$i];
  }

  return round($total, 2); // arrondi $total à 2 décimales
}

// Retirer un produit du panier :
function retirerProduit($id_produit){
  $position_produit = array_search($id_produit, $_SESSION['panier']['id_produit']);

  if($position_produit !== false){
    array_splice($_SESSION['panier']['titre'], $position_produit, 1);
    array_splice($_SESSION['panier']['id_produit'], $position_produit, 1);
    array_splice($_SESSION['panier']['quantite'], $position_produit, 1);
    array_splice($_SESSION['panier']['prix'], $position_produit, 1); // coupe une tranche d'un array à partir de l'indice $position_produit et sur 1 indice
  }
}

// Fonction qui compte le nombre de produits différents dans le panier
function quantiteProduit(){
  if(isset($_SESSION['panier'])){
    // si le panier existe :
    return count($_SESSION['panier']['id_produit']);
  } else {
    return 0;
  }
}
