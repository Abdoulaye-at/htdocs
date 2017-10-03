<?php
//BOUTIQUE/src/DAO/ProduitDAO.php

namespace BOUTIQUE\DAO;

use Doctrine\DBAL\Connection;
use BOUTIQUE\Entity\Produit;

class ProduitDAO extends DAO
{
	// Fonction pour récupérer tous les enregistrements de la table produit : 
	public function findAll(){
		$requete = "SELECT * FROM produit";
		$resultat = $this -> getDb() -> fetchAll($requete);
		// Avec DBAL, fetchAll() exécute la requete puis fait le fetchAll()
		
		// En l'état $resultat contient un tableau multidimentionnel composé de plusieurs array (un array par produit trouvé).
		
		// convertir notre array d'array, en array d'objet
		$produits = array();
		foreach($resultat as $value){
			$id_produit = $value['id_produit'];
			$produits[$id_produit] = $this -> buildEntityObject($value);
		}
		return $produits; 
	}
	
	
	// Fonction pour récupérer tous les produits en fonction d'une categorie
	public function findAllByCategorie($categorie){
		$requete = "SELECT * FROM produit WHERE categorie = ? ";
		$resultat = $this -> getDb() -> fetchAll($requete, array($categorie));
		
		$produits = array();
		foreach($resultat as $value){
			$id_produit = $value['id_produit'];
			$produits[$id_produit] = $this -> buildEntityObject($value);
		}
		return $produits; 
	}
	
	
	// Fonction pour récupérer toutes les catégories :
	public function findAllCategorie(){
		// On récupere sous forme d'array...
		// 3 lignes de code
		$requete = "SELECT DISTINCT categorie FROM produit";
		$resultat = $this -> getDb() -> fetchAll($requete);	
		return $resultat; 
	}
	
	
	// Fonction pour récupérer un produit par son ID :
	public function find($id){
		// Un seul résultat donc utiliser la methode fetchAssoc($requete) au lieu de fetchAll($requete), et pas besoin d'une boucle pour transformer le tableau en objet...	
		$requete = "SELECT * FROM produit WHERE id_produit = ?";
		$resultat = $this -> getDb() -> fetchAssoc($requete, array($id));
		
		return $this -> buildEntityObject($resultat);
		// Me retourne le produit sous forme d'un objet ! 
	}
	
	
	public function findSuggestion($id){
		
		$produit = $this -> find($id);
		// Me retourne toutes les infos du produit en cours d'affichage
		
		$categorie 	= $produit -> getCategorie();
		$id 		= $produit -> getId_produit();
		// ces deux données ne sont pas sensibles, elles proviennent directement de la BDD
		
		$requete = "SELECT * FROM produit WHERE categorie = '$categorie' AND id_produit != $id ORDER BY prix DESC LIMIT 0,5 ";
		
		$resultat = $this -> getDb() -> fetchAll($requete);
		
		$suggestions = array();
		foreach($resultat as $value){
			$id = $value['id_produit'];
			$suggestions[$id] = $this -> buildEntityObject($value);
		}
		return $suggestions; 
	}
	
	
	
	
	
	
	protected function buildEntityObject($value){
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




