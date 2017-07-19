<?php

namespace BOUTIQUE\Entity;

class Membre {
  private $id_membre;
  private $pseudo;
  private $mdp;
  private $nom;
  private $prenom;
  private $email;
  private $civilite;
  private $ville;
  private $code_psotal;
  private $adresse;
  private $statut;
}

public function getId_membre() {
  return $this -> id_membre;
}
public function setId_membre($id) {
  $this -> id_membre = $id;
}

public function getPseudo() {
  return $this -> pseudo;
}
public function setPseudo($pse) {
  $this -> pseudo = $pse;
}

public function getMdp() {
  return $this -> mdp;
}
public function setMdp($mdp) {
  $this -> mdp = $mdp;
}

public function getNom() {
  return $this -> nom;
}
public function setNom($nom) {
  $this -> nom = $nom;
}

public function getPrenom() {
  return $this -> nom;
}
public function setPrenom($prenom) {
  $this -> prenom = $prenom;
}

public function getEmail() {
  return $this -> nom;
}
public function setEmail($email) {
  $this -> email = $email;
}

public function getCivilite() {
  return $this -> nom;
}
public function setCivilite($civ) {
  $this -> civilite = $civ;
}

public function getVille() {
  return $this -> ville;
}
public function setVille($ville) {
  $this -> ville = $ville;
}

public function getCode_postal() {
  return $this -> code_postal;
}
public function setCode_postal($cp) {
  $this -> code_postal = $cp;
}

public function getAdresse() {
  return $this -> adresse;
}
public function setAdresse($adresse) {
  $this -> adresse = $adresse;
}

public function getStatut() {
  return $this -> statut;
}
public function setStatut($statut) {
  $this -> statut = $statut;
}
