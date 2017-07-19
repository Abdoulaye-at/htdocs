<?php

namespace BOUTIQUE\Entity;

class Produit {
  private $id_produit;
  private $reference;
  private $categorie;
  private $titre;
  private $description;
  private $couleur;
  private $taille;
  private $public;
  private $photo;
  private $prix;
  private $stock;

  public function getId_produit() {
    return $this -> id_produit;
  }
  public function setId_produit($id) {
    $this -> id_produit = $id;
  }

  public function getReference() {
    return $this -> reference;
  }
  public function setReference($ref) {
    $this -> reference = $ref;
  }

  public function getCategorie() {
    return $this -> categorie;
  }
  public function setCategorie($cat) {
    $this -> categorie = $cat;
  }

  public function getTitre() {
    return $this -> titre;
  }
  public function setTitre($tit) {
    $this -> titre = $tit;
  }

  public function getDescription() {
    return $this -> description;
  }
  public function setDescription($desc) {
    $this -> description = $desc;
  }

  public function getCouleur() {
    return $this -> couleur;
  }
  public function setCouleur($coul) {
    $this -> couleur = $coul;
  }

  public function getTaille() {
    return $this -> taille;
  }
  public function setTaille($tai) {
    $this -> taille = $tai;
  }

  public function getPublic() {
    return $this -> public;
  }
  public function setPublic($pub) {
    $this -> public = $pub;
  }

  public function getPhoto() {
    return $this -> photo;
  }
  public function setPhoto($pho) {
    $this -> photo = $pho;
  }

  public function getPrix() {
    return $this -> prix;
  }
  public function setPrix($pri) {
    $this ->Prix = $pri;
  }

  public function getStock() {
    return $this -> stock;
  }
  public function setStock($sto) {
    $this -> stock = $sto;
  }
}
