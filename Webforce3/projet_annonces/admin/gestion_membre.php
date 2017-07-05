<?php

require_once("../inc/init.inc.php");

// 1- Vérification si Admin :
if(!internauteEstConnecteEtEstAdmin())
{
	header("location:../connexion.php");
	exit();
}

// 3- Suppression d'un membre :
if(isset($_GET['action']) && $_GET['action'] == "supprimer_membre" && isset($_GET['id_membre']))
{	// on ne peut pas supprimer son propre profil :
	if ($_SESSION['membre']['id_membre'] != $_GET['id_membre']) {
		executeRequete("DELETE FROM membre WHERE id_membre=:id_membre", array(':id_membre' => $_GET['id_membre']));
	} else {
		$contenu .= '<div class="bg-danger">Vous ne pouvez pas supprimer votre propre profil ! </div>';
	}

}

// 2- Préparation de l'affichage :
$resultat = executeRequete("SELECT * FROM membre");
$contenu .= '<h3> Membres inscrit </h3>';
$contenu .=  "Nombre de membre(s) : " . $resultat->rowCount();

$contenu .=  '<table class="table"> <tr>';
		// Affichage des entêtes :
		for($i = 0; $i < $resultat->columnCount(); $i++)
		{
			$colonne = $resultat->getColumnMeta($i);  // Retourne les métadonnées pour une colonne dans le jeu de résultats $resultat sous forme de tableau
			//var_dump($colonne);  // on y trouve l'indice "name"
			if ( $colonne['name'] != 'mdp') $contenu .= '<th>' . $colonne['name'] . '</th>';
		}

		$contenu .=  '<th> Supprimer </th>';
		$contenu .=  '<th> Modifier </th>';
		$contenu .=  '</tr>';

		// Affichage des lignes :
		while ($membre = $resultat->fetch(PDO::FETCH_ASSOC))
		{
			$contenu .=  '<tr>';
				foreach ($membre as $indice => $information)
				{
					if ($indice != 'mdp') $contenu .=  '<td>' . $information . '</td>';
				}
				$contenu .=  '<td><a href="?action=supprimer_membre&id_membre=' . $membre['id_membre'] . '" onclick="return(confirm(\'Etes-vous sûr de vouloir supprimer ce membre?\'));"> X </a></td>';
				$contenu .=  '<td><a href="?action=modifier&id_membre=' . $membre['id_membre'] . '"> modifier </a></td>';
			$contenu .=  '</tr>';
		}
$contenu .=  '</table>';
// Modification du produit

require_once("../inc/haut.inc.php");
echo $contenu;

if(isset($_GET['action']) && $_GET['action'] == "modifier"){

  if(isset($_GET['id_membre'])) {


    $resultat = executeRequete("SELECT * FROM membre WHERE id_membre = '$_GET[id_membre]'");
    $membre_actuel = $resultat->fetch(PDO::FETCH_ASSOC);
    debug($membre_actuel);


      if($_POST){
				//echo 'test';
      //   executeRequete('UPDATE membre SET pseudo = :pseudo, mdp = :mdp, nom = :nom, prenom = :prenom, telephone = :telephone, email = :email, civilite = :civilite',
      // array(
			//
      //       ':pseudo'=>$_POST['pseudo'],
      //       ':mdp'=>$_POST['mdp'],
      //       ':nom'=>$_POST['nom'],
      //       ':prenom'=>$_POST['prenom'],
      //       ':telephone'=>$_POST['telephone'],
      //       ':email'=>$_POST['email'],
      //       ':civilite'=>$_POST['civilite']));

			$resultat = $pdo->query('UPDATE membre SET pseudo = :pseudo, mdp = :mdp, nom = :nom, prenom = :prenom, telephone = :telephone, email = :email, civilite = :civilite');
			$resultat->bindValue(':pseudo', $_POST['pseudo'], PDO::PARAM_STR);
			$resultat->bindValue(':mdp', $_POST['mdp'], PDO::PARAM_STR);
			$resultat->bindValue(':nom', $_POST['nom'], PDO::PARAM_STR);
			$resultat->bindValue(':prenom', $_POST['prenom'], PDO::PARAM_STR);
			$resultat->bindValue(':telephone', $_POST['telephone'], PDO::PARAM_INT);
			$resultat->bindValue(':email', $_POST['email'], PDO::PARAM_STR);
			$resultat->bindValue(':civilite', $_POST['civilite'], PDO::PARAM_STR);

			$resultat->execute();

      $contenu .= '<div class="bg-succes">Le produit a bien été modifié.</div>';
    }
  }


  ?>
  <form action="" method"post" class="form-horizontal">
    <fieldset>

    <legend>Modifiez votre annonce</legend>


      <input type="hidden" id="id_membre" name="id_membre" value="<?php if(isset($membre_actuel)){echo $membre_actuel['id_membre'];} ?>" >


    <div class="form-group">
      <label class="col-md-4 control-label" for="pseudo">pseudo</label>
      <div class="col-md-4">
      <input id="pseudo" name="pseudo" placeholder="Votre pseudo..." value="<?php if(isset($membre_actuel)){echo $membre_actuel['pseudo'];} ?>" class="form-control input-md" type="text">
      </div>
    </div>

    <div class="form-group">
      <label class="col-md-4 control-label" for="mdp">Mot de passe</label>
      <div class="col-md-4">
        <input id="mdp" name="mdp" placeholder="Votre mot de passe..." value="<?php if(isset($membre_actuel)){echo $membre_actuel['mdp'];} ?>" class="form-control input-md" type="password">
      </div>
    </div>

    <div class="form-group">
      <label class="col-md-4 control-label" for="nom">Nom</label>
      <div class="col-md-4">
      <input id="nom" name="nom" placeholder="Votre nom..." value="<?php if(isset($membre_actuel)){echo $membre_actuel['nom'];} ?>" class="form-control input-md" type="text">
      </div>
    </div>

    <div class="form-group">
      <label class="col-md-4 control-label" for="prenom">Prénom</label>
      <div class="col-md-4">
      <input id="prenom" name="prenom" placeholder="Votre prénom..." value="<?php if(isset($membre_actuel)){echo $membre_actuel['prenom'];} ?>" class="form-control input-md" type="text">
      </div>
    </div>

    <div class="form-group">
      <label class="col-md-4 control-label" for="email">Email</label>
      <div class="col-md-4">
      <input id="email" name="email" placeholder="Votre email..." value="<?php if(isset($membre_actuel)){echo $membre_actuel['email'];} ?>" class="form-control input-md" type="text">
      </div>
    </div>

    <div class="form-group">
      <label class="col-md-4 control-label" for="civilite">Civilité</label>
      <div class="col-md-4">
        <select id="civilite" name="civilite" class="form-control">
          <option value="homme" <?php if(isset($membre_actuel) && $membre_actuel['civilite'] == 'homme'){echo 'selected';} ?>>Homme</option>
          <option value="femme" <?php if(isset($membre_actuel) && $membre_actuel['civilite'] == 'femme'){echo 'selected';} ?>>Femme</option>
        </select>
      </div>
    </div>

    <div class="form-group">
      <label class="col-md-4 control-label" for="statut">Statut</label>
      <div class="col-md-4">
        <select id="statut" name="statut" class="form-control">
          <option value="0"  <?php if(isset($membre_actuel) && $membre_actuel['statut'] == '0'){echo 'selected';} ?>>admin</option>
          <option value="1" <?php if(isset($membre_actuel) && $membre_actuel['statut'] == '1'){echo 'selected';} ?>>membre</option>
        </select>
      </div>
    </div>

    <input type="submit" name="Envoyer" value="Valider" class="btn btn-default">
    </fieldset>
  </form>
<?php


}






//-------------------------------------------------- Affichage ---------------------------------------------------------//

require_once("../inc/bas.inc.php");
