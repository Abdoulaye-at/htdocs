<?php
//BOUTIQUE/src/Entity/Commentaire.php

namespace BOUTIQUE\Entity;

class Commentaire {

  /**
  * Clé primaire de ma table
  * @var integer
  *
  */
  private $id_commentaire;

  /**
  * Auteur du commentaire
  * @var string
  */
  private $auteur;

  /**
  * Contenu du commentaire
  * @var BOUTIQUE\Entity\Produit
  */
  private $contenu;
  private $produit; // et non pas id_produit, contiendra un objet de la classe produit;

  /**
  * Contient la date sous forme de datetime
  * @var BOUTIQUE\Entity\Produit
  */
  private $date_enregistrement;

  public function getId_commentaire(){
    return $this -> id_commentaire;
  }
  public function setId_commentaire($id){
    $this -> id_commentaire = $id;
  }

  public function getAuteur(){
    return $this -> auteur;
  }
  public function setAuteur($auteur){
    $this -> contenu = $auteur;
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
























};
