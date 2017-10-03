<?php
//site_oo/web/index.php

session_start(); 

require __DIR__ . '/../vendor/PDOManager.php';
require __DIR__ . '/../src/Model/ProduitModel.php';

$pm = new ProduitModel;

//$produits = $pm -> getAllProduits();
$produits = $pm -> getAllProduitsByCategorie('pull');
$categories = $pm -> getAllCategories();
$produit = $pm -> getProduitById(8);

echo '<pre>'; 
print_r($categories);
print_r($produit);
echo '</pre>'; 

