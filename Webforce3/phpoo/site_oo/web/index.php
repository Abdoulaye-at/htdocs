<?php

session_start();

require __DIR__ . '/../vendor/PDOManager.php';
require __DIR__ . '/../src/Model/ProduitModel.php';
require __DIR__ . '/../src/Controller/ProduitController.php';


// Test produit model
// $pm = new ProduitModel;
// $produits = $pm -> getAllProduits();
// $produits = $pm -> getAllProduits('pull');
//
// echo '<pre>';
// print_r($produits);
// echo '</pre>';


// Test de produit controller

$pc = new ProduitController;
$pc -> afficheAll();
