<?php

namespace BOUTIQUE\DAO;

use Doctrine\DBAL\Connection;
use BOUTIQUE\Entity\Produit;

class ProduitDAO {
  private $db;

  public function __construct(Connection $db){
    $this -> db = $db;
  }

  public function getDb(){
    return $this -> db;
  }

  //----------------------
  public function findAll(){
    $requete = "SELECT * FROM produit";
    $resultat = $this -> getDb() -> fetchAll($requete);
    // Avec DBAL, fetchAll() execute la requête puis fait le fetchAll()

    // En l'état $resultat contient un tableau multidimentionnel composé de plusieurs array (un par produit)

    // convertir notre array composé d'array en array composé d'objets

    // var_dump($resultat);
    $produits = array();
    foreach ($resultat as $value) {
      $id_produit = $value['id_produit'];
      $produits['id_produit'] = $this -> buildProduit($value);
    }


    return $produits;
  }

  // Fonction pour récupérer tous les produits en fonction d'une catégorie

  public function findAllByCategorie($categorie){
    $requete = "SELECT * FROM produit WHERE categorie = ?";
    $resultat = $this -> getDb() -> fetchAll($requete, array($categorie));

    $produits = array();
    foreach ($resultat as $categorie) {
      $id_produit = $categorie['id_produit'];
      $produits['id_produit'] = $this -> buildProduit($categorie);
    }
    return $produits;
  }

  // Fonction pour récupérer toutes les catégories

  public function findAllCategorie(){
    $requete = "SELECT DISTINCT categorie FROM produit";
    $resultat = $this -> getDb() -> fetchAll($requete);
    return $resultat;
  }

  // Fonction pour récupérer un produit par son Id

  public function find($id){
    $requete = "SELECT * FROM produit WHERE id_produit = ?";
    $resultat = $this -> getDb() -> fetchAssoc($requete, array($id));

    return $this -> buildProduit($resultat);
    // Me retourne le produit sous forme d'un objet
  }

  protected function buildProduit($value){
    $produit = new Produit;

    $produit -> setId_produit($value['id_produit']);
    $produit -> setReference($value['reference']);
    $produit -> setCategorie($value['categorie']);
    $produit -> setTitre($value['titre']);
    $produit -> setDescription($value['description']);
    $produit -> setCouleur($value['couleur']);
    $produit -> setTaille($value['taille']);
    $produit -> setPublic($value['public']);
    $produit -> setPhoto($value['photo']);
    $produit -> setPrix($value['prix']);
    $produit -> setStock($value['stock']);

    return $produit;
  }
}




































//
