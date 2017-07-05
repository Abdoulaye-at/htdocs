<?php
require_once('inc/init.inc.php');

//---------- TRAITEMENT -----------//
$aside = "";

// 1- Contrôle de l'existence du produit demandé
if(isset($_GET['id_produit'])){
  // si l'indice id_produit existe bien, on vérifie l'existence de l'id_produit en base
  $resultat = executeRequete("SELECT * FROM produit WHERE id_produit = :id_produit", array('id_produit' => $_GET['id_produit']));

  if($resultat->rowCount() == 0){
    // si id_produit n'existe pas en bdd, on redirige vers la boutique
    header('location:boutique.php');
    exit();
  }

} else {
  // si id_produit n'existe pas dans l'url, on redirige vers la boutique
  header('location:boutique.php');
  exit();
}

// 2- Mise en forme des informations sur le produit
$produit = $resultat -> fetch(PDO::FETCH_ASSOC);

$contenu .= '<div class="row">
              <div class="col-lg-12">
                <h1 class="page-header">'. $produit['titre'] .'</h1>
              </div>
            </div>';
$contenu .= '<div class="col-md-8">
              <img src="'. $produit['photo'] .'" alt="" class="img-responsive">
            </div>';
$contenu .= '<div class="col-md-4">
              <h3>Description</h3>
              <p>'. $produit['description'] .'</p>
              <h3>Détails</h3>
              <ul>
                <li>Catégorie : '. $produit['categorie'] .'</li>
                <li>Couleur : '. $produit['couleur'] .'</li>
                <li>Taille : '. $produit['taille'] .'</li>
              </ul>
              <p class="lead">Prix : '. $produit['prix'] .' €</p>
            </div>';

// 3- Affichage du formulaire d'ajout au panier
$contenu .= '<div class="col-md-4">';
  if($produit['stock'] > 0){ // si le produit est disponible (stock > 0)

    // On crée le formulaire
    $contenu .= '<form method="post" action="panier.php">';
      $contenu .= '<input type="hidden" name="id_produit" value="'. $produit['id_produit'] .'">';
      $contenu .= '<select name="quantite" class="form-group-sm form-control-static">';
        for ($i = 1; $i <= $produit['stock'] && $i <=5; $i++){
          $contenu .= "<option>$i</option>";

        }
      $contenu .= '</select>';
      $contenu .= '<input type="submit" class="btn" value="Ajouter au panier" name="ajout_panier">';

    $contenu .= '</form>';

  } else {
    $contenu .= '<p class="alert alert-danger">Produit indisponible !</p>';
  }

  // 4- Lien retour vers la boutique
  $contenu .= '<p><a href="boutique.php?categorie='. $produit['categorie'] .'">Retour vers votre séléction</a></p>';

$contenu .= '</div>';

// Exercices :
/*
  Créer des suggestions de produits : afficher 2 produits (photo et titre) aléatoirement appartenant à la catégorie du produit séléctionné par l'internaute.
  - Ces deux produits doivent être différents du produit affiché dans fiche_produit
  - La photo est cliquable et renvoie à la fiche _produit

  Note : utiliser la variable $aside pour afficher le contenu.
*/

// Affichage de la confirmation de l'ajout d'un article au panier :
if(isset($_GET['statut_produit']) && $_GET['statut_produit'] == 'ajoute'){
  // On met en place le pop-up HTML :
  $contenu_gauche = '<div class="modal fade" id="myModal" role="dialog">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 class="modal-title">Le produit a été ajouté !</h4>
                          </div>

                          <div class="modal-body">
                            <p><a href="panier.php">Voir le panier</a></p>
                            <p><a href="boutique.php">Continuer ses achats</a></p>
                          </div>
                        </div>
                      </div>
                    </div>';
}



//------------ AFFICHAGE ---------//

require_once('inc/haut.inc.php');
echo $contenu_gauche;
?>
  <div class="row">
    <?php echo $contenu; ?>
  </div>
  <!-- Suggestion de produits -->
  <div class="row">
    <div class="col-lg-12">
      <h3 class="page-header">Suggestions de produits</h3>
    </div>
    <?php echo $aside; ?>
  </div>

  <script>
    $(function(){
      $("#myModal").modal("show"); // appel la boite modale bootstrap
    });
  </script>
<?php
require_once('inc/bas.inc.php');
