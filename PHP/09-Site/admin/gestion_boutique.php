<?php
require_once '../inc/init.inc.php';

//------------TRAITEMENT-------------//
if(!internauteEstConnecteEtEstAdmin()){
  header('location:../connexion.php');
  exit();
}

// Enregistrement du produit en bdd
if(!empty($_POST)){
  //debug($_POST);
  // il faudrait ici en temps normal contrôler le formulaire

  $photo_bdd = ''; // représente le chemin de la photo du produit

  //............

  // 5-- photo
  debug($_FILES);
  if(!empty($_FILES['photo']['name'])){
    // si on a upload une photo
    $nom_photo = $_POST['reference'] . '_' . $_FILES['photo']['name']; // on crée un nom unique pour nommer le fichier téléchargé

    $photo_bdd = RACINE_SITE . 'photo/' . $nom_photo; // représente le chemin de la photo affiché sur le site et enregistrée en bdd

    $photo_physique = $_SERVER['DOCUMENT_ROOT'] . $photo_bdd;  // représente le chemin complet depuis le localhost où est enregistré le fichier photo physique sur le serveur
    // $_SERVER['DOCUMENT_ROOT'] = localhost

    copy($_FILES['photo']['tmp_name'], $photo_physique); // enregistre le fichier photo qui est temporairement dans $_FILES['photo']['tmp_name'], dans le répertoire dont le chemin est $photo_physique;
  }

  // 4- suite
  executeRequete("REPLACE INTO produit (id_produit, reference, categorie, titre, description, couleur, taille, public, photo, prix, stock) VALUES (:id_produit, :reference, :categorie, :titre, :description, :couleur, :taille, :public, :photo, :prix, :stock)",
  array(':id_produit'   => $_POST['id_produit'],
        ':reference'    => $_POST['reference'],
        ':categorie'    => $_POST['categorie'],
        ':titre'        => $_POST['titre'],
        ':description'  => $_POST['description'],
        ':couleur'      => $_POST['couleur'],
        ':taille'       => $_POST['taille'],
        ':public'       => $_POST['public'],
        ':photo'        => $photo_bdd,
        ':prix'         => $_POST['prix'],
        ':stock'        => $_POST['stock']));
  $contenu.= '<div class="bg-success">Le produit a été bien enregistré !</div>';
  $_GET['action'] = 'affichage'; // Pour déclencher l'affichage de la table html avec tout les produits
}



// 2- Liens affichage et ajout de produits
$contenu .= '<ul class="nav nav-tabs">
              <li><a href="?action=affichage"> Affichage des produits </a></li>
              <li><a href="?action=ajout"> Ajout de produits </a></li>
            </ul>';

// 6- Affichage des produits dans une table html
if(isset($_GET['action']) && $_GET['action'] == 'affichage'){
  // Si l'affichage est demandé
  $resultat = executeRequete('SELECT * FROM produit');

  $contenu .= '<h3>Affichage des produits</h3>';
  $contenu .= 'Nombre de produits dans la boutique : ' . $resultat->rowCount();

  $contenu .= '<table class="table">';
    // En-têtes du tableau
    $contenu .= '<tr>';
      $contenu .= '<th>id_produit</th>
                  <th>reference</th>
                  <th>categorie</th>
                  <th>titre</th>
                  <th>description</th>
                  <th>couleur</th>
                  <th>taille</th>
                  <th>public</th>
                  <th>photo</th>
                  <th>prix</th>
                  <th>stock</th>
                  <th>action</th>';
   $contenu .= '</tr>';

   // Les lignes du tableau
   while($ligne = $resultat->fetch(PDO::FETCH_ASSOC)){
    //  debug($ligne);
    $contenu .= '<tr>';
    foreach($ligne as $indice => $valeur){
      if($indice == 'photo'){
        // Si nous sommes sur l'indice photo, on met une balise <img>
        $contenu .= '<td><img class="img-responsive" width="70" height="70" src="'. $valeur .'" alt=""></td>';
      } else {
        // Sinon, pas de balise <img>
        $contenu .= '<td>' . $valeur . '</td>';
      }
    }
    $contenu .= '<td>
                  <a href="?action=modification&id_produit='. $ligne['id_produit'] .'">modifier</a> |
                  <a href="?action=suppression&id_produit='. $ligne['id_produit'] .'" onclick="return(confirm(\' Etes-vous sûr de vouloir supprimer ce produit\'));">supprimer</a>
                </td>';
    $contenu .= '</tr>';

  }


  $contenu .= '</table>';
}



//-------------AFFICHAGE-------------//
// Formulaire HTML //
if(isset($_GET['action']) && ($_GET['action'] == 'ajout' || $_GET['action'] == 'modification')) :
  // ...........
?>
<h3>Formulaire de produits</h3>
<form action="" method="post" enctype="multipart/form-data">
  <input type="hidden" name="id_produit" value="0">

  <label for="reference">Référence</label><br><br>
  <input type="text" name="reference" id="reference" value=""><br><br>

  <label for="categorie">Catégorie</label><br><br>
  <input type="text" name="categorie" id="categorie" value=""><br><br>

  <label for="titre">Titre</label><br><br>
  <input type="text" name="titre" id="titre" value=""><br><br>

  <label for="description">Description</label><br>
  <textarea id="description" name="description" ></textarea><br><br>

  <label for="couleur">couleur</label><br><br>
  <input type="text" name="couleur" id="couleur" value=""><br><br>

  <label for="taille">Taille</label><br>
  <select class="" name="taille" id="taille">
      <option value="S">S</option>
      <option value="M">M</option>
      <option value="L">L</option>
      <option value="XL">XL</option>
  </select><br><br>

  <label for="public">Public</label><br>
  <input type="radio" id="homme"name="public" value="m" checked><label for="homme">Homme</label>
  <input type="radio" id="femme"name="public" value="f" ><label for="femme">Femme</label>
  <input type="radio" id="mixte"name="public" value="mixte"><label for="mixte">Mixte</label><br><br>

  <label for="photo">Photo</label><br>
  <input type="file" name="photo" id="photo" value=""><br><br> <!-- Va de paire avec l'attribut encttype de la balise <form>, permet d'uploader un fichier et de remplir la superglobale $_FILES -->

  <label for="prix">Prix</label>
  <input type="text" name="prix" id="prix" value=""><br><br>

  <label for="stock">Stock</label>
  <input type="text" name="stock" id="stock" value=""><br><br>

  <input type="submit" value="Valider" class="btn">
</form>

<?php
endif;

require_once '../inc/haut.inc.php';
echo $contenu;

require_once '../inc/bas.inc.php';
