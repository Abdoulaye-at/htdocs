<?php
namespace BOUTIQUE\DAO;

use Doctrine\DBAL\Connection;
use BOUTIQUE\Entity\membre;

class MembreDAO
{
  private $db;
  public function __construct(Connection $db){
    $this ->db = $db;
  }
  public function getDb(){
    return $this ->db;
  }
  //------------------------
  //  fonction pour recuperer tous les enregistrement de la table membre.
public function find($id_membre){
  $requete = "SELECT * FROM membre WHERE id_membre = ?";
  $resultat = $this->getDb()->fetchAssoc($requete, array($id_membre));

  return $this->buildMembre($resultat);
}
protected function buildMembre($value){
  $membre = new Membre;
  $membre ->setId_membre($value['id_membre']);
  $membre ->setPseudo($value['pseudo']);
  $membre ->setMdp($value['mdp']);
  $membre ->setNom($value['nom']);
  $membre ->setPrenom($value['prenom']);
  $membre ->setEmail($value['email']);
  $membre ->setCivilite($value['civilite']);
  $membre ->setVille($value['ville']);
  $membre ->setCode_postal($value['code_postal']);
  $membre ->setAdresse($value['adresse']);
  $membre ->setStatut($value['statut']);
  return $membre;

}

}
