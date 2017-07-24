<?php
namespace BOUTIQUE\Entity;

class Membre implements UserInterface{

  /*
    Implementer l'interface UserInterface impose 4 choses
      - username et non pseudo
      - password et non mdp
      - getRoles() (en plus de getRole())
      - eraseCredentials()
  */

	private $id_membre;
	private $username;
	private $password;
	private $nom;
	private $prenom;
	private $email;
	private $civilite;
	private $ville;
	private $code_postal;
	private $adresse;
	private $statut;

	public function getId_membre(){
		return $this -> id_membre;
	}
	public function setId_membre($id){
		$this -> id_membre = $id;
	}


	public function getUsername(){
		return $this -> username;
	}
	public function setUsername($username){
		$this -> username = $username;
	}

	public function getPassword(){
		return $this -> password;
	}
	public function setPassword($password){
		$this -> password = $password;
	}


	public function getNom(){
		return $this -> nom;
	}
	public function setNom($nom){
		$this -> nom = $nom;
	}


	public function getPrenom(){
		return $this -> prenom;
	}
	public function setPrenom($prenom){
		$this -> prenom = $prenom;
	}


	public function getEmail(){
		return $this -> email;
	}
	public function setEmail($email){
		$this -> email = $email;
	}


	public function getCivilite(){
		return $this -> civilite;
	}
	public function setCivilite($civilite){
		$this -> civilite = $civilite;
	}


	public function getVille(){
		return $this -> ville;
	}
	public function setVille($ville){
		$this -> ville = $ville;
	}


	public function getCode_postal(){
		return $this -> code_postal;
	}
	public function setCode_postal($code_postal){
		$this -> code_postal = $code_postal;
	}


	public function getAdresse(){
		return $this -> adresse;
	}
	public function setAdresse($adresse){
		$this -> adresse = $adresse;
	}


	public function getStatut(){
		return $this -> statut;
	}
	public function setStatut($statut){
		$this -> statut = $statut;
	}


	public function getSalt(){
		return $this -> salt;
	}
	public function setSalt($salt){
		$this -> salt = $salt;
	}


	public function getRole(){
		return array($this -> getRole());
	}
	public function setRole($role){
		$this -> role = $role;
	}

  public function eraseCredentials(){

  }

}
