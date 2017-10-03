<?php

namespace BOUTIQUE\Entity;

use Symfony\Component\Security\Core\User\UserInterface;


class Membre implements UserInterface
{
	/*
	Implementer l'interface UserInterface impose 4 choses : 
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
    private $adresse;
    private $code_postal;
    private $statut;
    private $role;
    private $salt;

    public function getId_membre() {
        return $this->id_membre;
    }

    public function setId_membre($id_membre) {
        $this->id_membre = $id_membre;
        return $this;
    }

    public function getUsername() {
        return $this->username;
    }

    public function setUsername($pseudo) {
        $this->username = $pseudo;
    }


    public function getPassword() {
        return $this -> password;
    }

    public function setPassword($mdp) {
        $this->password = $mdp;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
        return $this;
    }

    public function getPrenom()
    {
        return $this->prenom;
    }

    public function setPrenom($prenom) {
        $this->prenom = $prenom;
        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
        return $this;
    }

    public function getCivilite()
    {
        return $this->civilite;
    }

    public function setCivilite($civilite) {
        $this->civilite = $civilite;
        return $this;
    }

    public function getVille()
    {
        return $this->ville;
    }

    public function setVille($ville) {
        $this->ville = $ville;
        return $this;
    }

	public function getCode_postal()
    {
        return $this->code_postal;
    }

    public function setCode_postal($code_postal) {
        $this->code_postal = $code_postal;
        return $this;
    }

    public function getAdresse()
    {
        return $this->adresse;
    }

    public function setAdresse($adresse) {
        $this->adresse = $adresse;
        return $this;
    }

    public function getStatut()
    {
        return $this->statut;
    }

    public function setStatut($statut) {
        $this->statut = $statut;
    }
	
	public function getSalt()
    {
        return $this->salt;
    }

    public function setSalt($salt) {
        $this->salt = $salt;
    }
	
	public function getRole()
    {
        return $this->role;
    }

    public function setRole($role) {
        $this->role = $role;
    }
	
	
	public function getRoles(){
		return array($this -> getRole());
	}
	
	public function eraseCredentials(){
		
	}
}






