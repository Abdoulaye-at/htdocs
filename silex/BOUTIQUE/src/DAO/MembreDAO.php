<?php
namespace BOUTIQUE\DAO;

use Doctrine\DBAL\Connection;
use BOUTIQUE\Entity\Membre;

class MembreDAO {
  private $db;

  public function __construct(Connection $db){
    $this -> db = $db;
  }

  public function getDb(){
    return $this -> db;
  }

  //-----------------

  public function find($id)
   $requete = "SELECT * FROM  membre where id_membre = ?";
   $resultat = $this -> getDb() -> fetchAssoc($requete, array($id));
   // $resultat nous retourne le membre a afficher sous forme d'array, nous voulons cependant le retourner sous forme d'objet :

   return $this -> buildMembre($resultat);
   // buildMembre permet de transformer un array sous forme d'objet de la classe Membre

}

protected function buildMembre($infos){
  $membre = new Membre;

  $membre -> setId_Membre($infos['id_membre']);
  $membre -> setPseudo($infos['pseudo']);
  $membre -> setMdp($infos['mdp']);
  $membre -> setNom($infos['nom']);
  $membre -> setPrenom($infos['prenom']);
  $membre -> setEmail($infos['email']);
  $membre -> setCivilite($infos['civilite']);
  $membre -> setVille($infos['ville']);
  $membre -> setCode_Postal($infos['code_postal']);
  $membre -> setAdresse($infos['adresse']);
  $membre -> setStatut($infos['statut']);


  return $membre;
}
