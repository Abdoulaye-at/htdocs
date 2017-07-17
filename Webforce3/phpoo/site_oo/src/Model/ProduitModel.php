<?php

class ProduitModel  {

  private $db;

  public function __construct(){
    $this -> db = PDOManager::getInstance() -> getPdo();
  }

  public function getDb(){
    return $this -> db;
  }

  //----------------------

  // SELECT * FROM produit
  public function getAllProduits(){

    $requete = "SELECT * FROM produit";
    $resultat = $this -> getDb() -> query($requete);

    $produits = $resultat -> fetchAll(PDO::FETCH_ASSOC);

    if (!$produits) {
      return false;
    } else {
      return $produits;
    }
  }

  // SELECT DISTINCT categorie FROM produit
  public function getALLCategories(){

    $requete = "SELECT DISTINCT categorie FROM produit";
    $resultat = $this -> getDb()  -> query($requete);

    $categories = $resultat -> fetchAll(PDO::FETCH_ASSOC);

    if (!$categories) {
      return false;
    } else {
      return $categories;
    }
  }

  // SELECT * FROM produit WHERE categorie = XX
  public function getAllProduitsByCategorie($categorie){
    $requete = "SELECT * FROM produit WHERE categorie = :categorie";
    $resultat = $this -> getDb()  -> query($requete);
    $resultat -> bindParam(':categorie', $categorie, PDO::PARAM_STR);

    $produits -> execute();
    $produits = $resultat -> fetchAll(PDO::FETCH_ASSOC);

    if (!$produits) {
      return false;
    } else {
      return $produits;
    }
  }

  // SELECT * FROM produit WHERE id_produit= XX
  public function getProduitById($id){
    $requete = "SELECT * FROM produit WHERE id_produit = :id_produit";
    $resultat = $this -> getDb()  -> query($requete);
    $resultat -> bindParam(':id_produit', $id_produit, PDO::PARAM_STR);

    $produits -> execute();
    $produits = $resultat -> fetchAll(PDO::FETCH_ASSOC);

    if (!$produits) {
      return false;
    } else {
      return $produits;
    }
  }


}
