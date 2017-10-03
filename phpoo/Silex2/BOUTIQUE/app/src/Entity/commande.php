<?php
namespace BOUTIQUE\Entity;
class commande
{
  private $id_commande;
  private $id_membre;
  private $montant;
  private $date_enregistrement;
  private $etat;

  public function getId_commande(){
    return $this -> id_commande;

  }
  public function setId_commande($idC){
    $this -> id_commande = $idC;
  }
  public function getId_membre(){
    return $this -> id_membre;

  }
  public function setId_membre($id){
    $this -> id_membre = $id;
  }
  public function getMontant(){
    return $this -> montant;

  }
  public function setMontant($montant){
    $this -> montant = $montant;
  }
  public function getDate_enregistrement(){
    return $this -> montant;

  }
  public function setDate_enregistrement($date){
    $this -> date_enregistrement = $date;
  }

  public function getEtat(){
    return $this -> etat;

  }
  public function setEtat($etat){
    $this -> etat = $etat;
  }






}
