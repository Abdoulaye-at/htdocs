<?php
//BOUTIQUE/src/Entity/Commentaire.php

namespace BOUTIQUE\Entity; 

class Commentaire{
	
	/**
	* Clé primaire de ma table commentaire
	* 
	* @var integer
	*/
	private $id_commentaire;
	
	/**
	* Auteur du commentaire
	* 
	* @var string
	*/
	private $auteur;
	
	/**
	* Contenu du commentaire
	* 
	* @var string
	*/
	private $contenu;
	
	/**
	* Produit lié au commentaire (produit Associé)
	* 
	* @var BOUTIQUE\Entity\Produit
	*/
	private $produit; // et non pas private $id_produit // Contiendra un objet de la classe produit !
	
	/**
	* Contient de la date du commentaire sous forme de datetime
	* 
	* @var string
	*/
	private $date_enregistrement; 
	
	
	public function getId_commentaire(){
		return $this -> id_commentaire;		
	}
	public function setid_commentaire($id){
		$this -> id_commentaire = $id;
	}
	
	public function getAuteur(){
		return $this -> auteur;
	}
	public function setAuteur($auteur){
		$this -> auteur = $auteur;
	}
	
	public function getContenu(){
		return $this -> contenu;
	}
	public function setContenu($content){
		$this -> contenu = $content;
	}
	
	public function getProduit(){
		return $this -> produit;
	}
	public function setProduit(Produit $produit){
		$this -> produit = $produit;
	}
	
	public function getDate_enregistrement(){
		return $this -> date_enregistrement;
	}
	public function setDate_enregistrement($date){
		$this -> date_enregistrement = $date;
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}