<?php
//BOUTIQUE/src/DAO/CommentaireDAO.php

namespace BOUTIQUE\DAO;

use Doctrine\DBAL\Connection;
use BOUTIQUE\Entity\Commentaire;

class CommentaireDAO extends DAO
{
	
	/**
	* Contiendra un objet de la classe ProduitDAO afin d'interagir et de récupérer un objet Produit pour chaque commentaire récupéré
	*
	* @var BOUTIQUE\DAO\ProduitDAO
	*/
	private $produitDao; 
	
	public function setProduitDao(ProduitDAO $produitDao){
		$this -> produitDao = $produitDao;
	}
	
	public function findAllByProduit($id_produit){
		$requete = "SELECT id_commentaire, auteur, contenu, date_enregistrement FROM commentaire WHERE id_produit = ? ORDER BY date_enregistrement DESC";
		
		$resultat = $this -> getDb() -> fetchAll($requete, array($id_produit));
		// Etape 1 : J'ecris et j'exécute ma requete ! je ne récupère pas toutes les infos, l'id_produit ne m'interesse pas car n'existe pas dans un objet commentaire.
		// $resultat est un array composé d'array. Grâce à la méthode BuildCommentaire on va récupérer un array d'objet. 
		
		$produit = $this -> produitDao -> find($id_produit);
		// AU passage je récupérer le produit correspondant aux commentaire sous forme d'objet. Cela va me servir car on a dit que dans un objet commentaire on a un objet produit. 
		
		$commentaires = array(); // je crée un array vide qui va stocker tous les objets commentaire....
		
		foreach($resultat as $value){ //Pour chaque résultat...
			$id_commentaire = $value['id_commentaire'];
			//Je stocke son id dans $id_commentaire
			
			$commentaire = $this -> buildEntityObject($value);
			// je crée un objet Commentaire pour chaque résultat
			
			$commentaire -> setProduit($produit);
			// J'ajoute a chacun de mes objets commentaire, un objet produit
			
			$commentaires[$id_commentaire] = $commentaire;
			// Enfin chaque objet commentaire, va etre stocker dans un tableau multidimentionnel avec en indice l'id du commentaire
		}
		return $commentaires;	
		// je retourne mon tableau multidimentionnel contenant tous les commentaires liés à un produit sous forme d'objet. Et chaque objet commentaire contient un objet produit !!
	}
	
	
	
	protected function buildEntityObject($infos){
		$commentaire = new Commentaire; 
		
		$commentaire -> setId_commentaire($infos['id_commentaire']);
		$commentaire -> setAuteur($infos['auteur']);
		$commentaire -> setContenu($infos['contenu']);
		$commentaire -> setDate_enregistrement($infos['date_enregistrement']);
		
		// Si ma requete faisait un 'SELECT *' alors je ferais ceci : 
		if(array_key_exists('id_produit', $infos)){
			$id_produit = $infos['id_produit'];
			$produit = $this -> produitDao -> find($id_produit);
			$commentaire -> setProduit($produit);
		}
		
		return $commentaire;
	}
}