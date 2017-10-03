<?php

namespace BOUTIQUE\DAO;

use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Doctrine\DBAL\Connection;
use BOUTIQUE\Entity\Membre;


class MembreDAO extends DAO implements UserProviderInterface
{
	
	public function loadUserByUsername($username){	
		// Cette méthode va récupérer un utilisateur en fonction de son username
		$requete = "SELECT * FROM membre WHERE username = ?";
		$resultat = $this -> getDb() -> fetchAssoc($requete, array($username));
		
		if($resultat){
			return $this -> buildEntityObject($resultat);
		}
		else{
			throw new UsernameNotFoundException("L'utilisateur " . $username . " n'existe pas !");
		}
	}
	

	public function supportsClass($class){
		// Cette méthode permet au coeur de symfony de vérifier si l'objet membre qu'il va récupérer correspond bien à un objet de la class membre. 
		return 'BOUTIQUE\Entity\Membre' === $class;
	}
	
	
	public function refreshUser(UserInterface $membre){
		// Le fonctionnement des composants de sécurité de Symfony implique qu'avec chaque requete HTTP, l'utilisateur est rechargé. 
		$class = get_class($membre);
		if(!$this -> supportsClass($class)){
			throw new UnsupportedUserException('La classe instanciée : ' . $class . 'n\'est pas supportée !');
		}
		return $this -> loadUserByUserName($membre -> getUsername());
	}
	
	
	
	
	
	
	public function find($id){
		$requete = "SELECT * FROM membre WHERE id_membre = ?";
		$resultat = $this -> getDb() -> fetchAssoc($requete, array($id));
		
		// $resultat représente le membre à afficher, mais sous forme d'array. Nous on veut le récupérer sous forme d'un objet...
		return $this -> buildEntityObject($resultat);
		// buyildMembre(), nous permet de transforme un array en objet de la classe Membre. 	
	}
	
	protected function buildEntityObject($infos){
		$membre = new Membre; 
		
		$membre -> setId_membre($infos['id_membre']);
		$membre -> setUsername($infos['username']);
		$membre -> setPassword($infos['password']);
		$membre -> setNom($infos['nom']);
		$membre -> setPrenom($infos['prenom']);
		$membre -> setEmail($infos['email']);
		$membre -> setCivilite($infos['civilite']);
		$membre -> setVille($infos['ville']);
		$membre -> setCode_postal($infos['code_postal']);
		$membre -> setAdresse($infos['adresse']);
		$membre -> setStatut($infos['statut']);
		
		$membre -> setRole($infos['role']);
		$membre -> setSalt($infos['salt']);
		
		return $membre;
	}
}


