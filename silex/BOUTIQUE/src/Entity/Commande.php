<?php

namespace BOUTIQUE\Entity;

class Membre {
  private $id_commande;
  private $id_membre;
  private $montant;
  private $date_enregistrement;
  private $etat;
}

public function getId_commande() {
  return $this -> id_commande;
}
public function setId_commande($id) {
  $this -> id_commande = $id;
}

public function getId_membre() {
  return $this -> id_membre;
}
public function setId_membre($id) {
  $this -> id_membre = $id;
}

public function getMontant() {
  return $this -> montant;
}
public function setMontant($mont) {
  $this -> montant = $mont;
}

public function getDate_enregistrement() {
  return $this -> Date_enregistrement;
}
public function setDate_enregistrement($date) {
  $this -> Date_enregistrement = $date;
}

public function getEtat() {
  return $this -> etat;
}
public function setEtat($etat) {
  $this -> etat = $etat;
}
