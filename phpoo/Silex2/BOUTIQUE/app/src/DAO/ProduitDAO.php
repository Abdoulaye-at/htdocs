<?php
namespace BOUTIQUE\DAO;

use Doctrine\DBAL\Connection;
use BOUTIQUE\Entity\Produit;

class ProduitDAO
{
  private $db;
  public function __construct(Connection $db){
    $this ->db = $db;
  }
  public function getDb(){
    return $this->db;
  }
  //--------------------
  //  fonction pour recuperer tous les enregistrement de la table produit.
  public function findAll(){
    $requete = "SELECT * FROM produit";
    $resultat = $this->getDb()->fetchAll($requete);
    // Avec DBAL, fetchAll execute la requete puis fait le fetchALL().
    // En l'etat $resulat contient:un tableau multidimentionnel composé de plusieurs array (un array par produit trouvé)
    // convertir notre array en array d'objet

    // je construit un objetpour mon array
    $produit = array();
    foreach ($resultat as $value) {
    $id_produit = $value['id_produit'];
    $produit[$id_produit] = $this->buildProduit($value);
    }
    return $produit;
  }
  // fonction pour recuperer tous les produits en fonction d'une categorie
  public function findAllByCategorie($categorie){
    $requete = "SELECT * FROM produit WHERE categorie = ?";
    $resultat = $this->getDb()->fetchAll($requete, array($categorie));
    $produit = array();
    foreach ($resultat as $value) {
    $id_produit = $value['id_produit'];
    $produit[$id_produit] = $this->buildProduit($value);
    }
    return $produit;
  }

  // fonction pour recuperer toutes les categories:
  public function findAllCategorie(){
    // on recupere sous forme d'array ...
    $requete = "SELECT DISTINCT categorie FROM produit";
    $resultat = $this->getDb()->fetchAll($requete);
    return $resultat;
  }

  // fonction pour recuperer un produit par son Id :
  public function find($id){
    // un seul résultat donc utiliser la methode fetchAssoc($requete) au lieu de fetchAll($requete), et pas besoin d'une boucle pour transformer me tableau en objet...
    $requete = "SELECT * FROM produit WHERE id_produit =  $id ";
    $resultat = $this->getDb()->fetchAssoc($requete);
    //pour securiser on ajoute un array apres le fetch et pn remplace $id dans la requete par le point d'interogation.

    return $this -> buildProduit($resultat);//
  }

  protected function buildProduit($value){
    $produit = new Produit;
    $produit ->setId_produit($value['id_produit']);
    $produit ->setReference($value['reference']);
    $produit ->setCategorie($value['categorie']);
    $produit ->setTitre($value['titre']);
    $produit ->setDescription($value['description']);
    $produit ->setTaille($value['taille']);
    $produit ->setPublic($value['public']);
    $produit ->setPhoto($value['photo']);
    $produit ->setPrix($value['prix']);
    $produit ->setStock($value['stock']);
    return $produit;

  }

  //
 public function findSuggestions($id) {
   $produit = $this -> find($id);// je recupere toutes les infos du produits en cours d'affichage.
   $categorie = $produit -> getCategorie();
   $id = $produit -> getId_produit();
   // ces deux donnees ne sont pas sensibles, elle proviennent directement de la BDD.

   $requete = "SELECT * FROM produit WHERE categorie = '$categorie' AND id_produit != $id ORDER BY prix DESC LIMIT 0,5";// la requete pour avoir tous les produit dans la suggestion sauf celui qui est affiché ($categorie et $id_produit c'est quelque chose qu'on recupere de notre bdd (la methode getCategorie fait deja la securite pour $categorie))
   $resultat = $this->getDb()->fetchAll($requete);//

   $suggestions = array();
   foreach ($resultat as $value){
     $id = $value['id_produit'];
     $suggestions[$id] = $this->buildProduit($value);//
   }
   return $suggestions;
 }
}
