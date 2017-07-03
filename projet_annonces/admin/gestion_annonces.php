<?php
  require_once('../inc/init.inc.php');


  // Ajout de l'annonce en base de données //
  $message="";
  if(!empty($_POST)){
    // Je vérifie les données de mon formulaire
    if(strlen($_POST['titre']) < 3 || strlen($_POST['titre']) > 20) $message .='Le titre doit comporter entre 3 et 20 caractères <br>';
    if(strlen($_POST['descCourte']) < 3 || strlen($_POST['descCourte']) > 50) $message .='Veuillez saisir une courte description comprise entre 3 et 50 caractères <br>';
    if(strlen($_POST['descLongue']) < 5 || strlen($_POST['descLongue']) > 150) $message .='Votre description doit se limiter à 150 caractères <br>';
    if(!is_numeric($_POST['prix']) || $_POST['prix'] <= 0 && $_POST['prix'] < 12) $message .='N\'oubliez pas de saisir le prix !<br>';
    if(strlen($_POST['pays']) < 3 || strlen($_POST['pays']) > 20) $message .='N\'oubliez pas de saisir votre pays !<br>';
    if(strlen($_POST['ville']) < 3 || strlen($_POST['ville']) > 20) $message .='N\'oubliez pas de saisir le ville !<br>';
    if(strlen($_POST['adresse']) < 3 || strlen($_POST['adresse']) > 50) $message .='N\'oubliez pas de saisir votre adresse !<br>';
    if(!is_numeric($_POST['cp']) || $_POST['cp'] <= 0) $message .= 'Veuillez vérifier votre code postal <br>';

    // Vérification du format photo
    $ext = pathinfo($_POST['photo'], PATHINFO_EXTENSION);
    if($ext != 'jpg')  $message.= 'Veuillez vérifier le format ';
    debug($_POST);

  if(empty($message)) { // si message est vide, c'est qu'il n'y a pas d'erreurs
    $pdo = new PDO('mysql:host=localhost;dbname=annonceo', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

    $resultat = $pdo->prepare("INSERT INTO annonce (titre, descCourte, descLongue, prix, photo, pays, ville, adresse, cp)
    VALUES (:titre, :descCourte, :descLongue, :prix, :photo, :pays, :ville, :adresse, :cp)");

    $resultat->bindParam(':titre', $_POST['titre'], PDO::PARAM_STR);
    $resultat->bindParam(':descCourte', $_POST['descCourte'], PDO::PARAM_STR);
    $resultat->bindParam(':descLongue', $_POST['descLongue'], PDO::PARAM_STR);
    $resultat->bindParam(':prix', $_POST['prix'], PDO::PARAM_STR);
    $resultat->bindParam(':photo', $_POST['photo'], PDO::PARAM_STR);
    $resultat->bindParam(':pays', $_POST['pays'], PDO::PARAM_STR);
    $resultat->bindParam(':ville', $_POST['ville'], PDO::PARAM_STR);
    $resultat->bindParam(':adresse', $_POST['adresse'], PDO::PARAM_STR);
    $resultat->bindParam(':cp', $_POST['cp'], PDO::PARAM_STR);

    $resultat->execute();
      echo "Félicitations, l'annonce a bien été enregistrée !";
  }
}

  // 2- Liens affichage et ajout de produits
  $contenu .= '<ul class="nav nav-tabs">
  <li><a href="?action=affichage"> Affichage des produits </a></li>
  <li><a href="?action=ajout"> Ajout de produits </a></li>
  </ul>';

  // AFFICHAGE DES ANNONCES //
  if(isset($_GET['action']) && $_GET['action'] == 'affichage'){
    // Si l'affichage est demandé
    $resultat = executeRequete('SELECT id_annonce, titre, descCourte, descLongue, prix, photo, pays, ville, adresse, cp FROM annonce');

    $contenu .= '<h3>Affichage des annonces</h3>';
    $contenu .= 'Nombre d\'annonces dans la boutique : ' . $resultat->rowCount();

    $contenu .= '<table class="table">';
    // En-têtes du tableau
    $contenu .= '<tr>';
    $contenu .= ' <th>id_annonce</th>
                  <th>titre</th>
                  <th>Description courte</th>
                  <th>Description longue</th>
                  <th>Prix</th>
                  <th>Photo</th>
                  <th>Pays</th>
                  <th>Ville</th>
                  <th>Adresse</th>
                  <th>Code postal</th>
                  <th>action</th>';
    $contenu .= '</tr>';

    // Les lignes du tableau
    while($ligne = $resultat->fetch(PDO::FETCH_ASSOC)){
        debug($ligne);
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
      <a href="?action=modification&id_produit='. $ligne['id_annonce'] .'">modifier</a> |
      <a href="?action=suppression&id_produit='. $ligne['id_annonce'] .'" onclick="return(confirm(\' Etes-vous sûr de vouloir supprimer ce produit\'));">supprimer</a>
      </td>';
      $contenu .= '</tr>';

    }


    $contenu .= '</table>';
  }
  require_once('../inc/haut.inc.php');
  debug($message);
?>

<!-- 1. CRÉATION DU FORMULAIRE -->

<legend>Ajouter une annonce</legend>

<form action="" method="post" class="form-horizontal" content="multipart/form-data">
  <fieldset>

    <div class="form-group">
      <label class="col-md-4 control-label" for="Titre">Titre</label>
      <div class="col-md-4">
      <input id="Titre" name="titre" placeholder="" class="form-control input-md" type="text">
      </div>
    </div>

    <div class="form-group">
      <label class="col-md-4 control-label" for="descCourte">Description courte</label>
      <div class="col-md-4">
      <input id="descCourte" name="descCourte" placeholder="..." class="form-control input-md" type="text">
      </div>
    </div>

    <div class="form-group">
      <label class="col-md-4 control-label" for="descLongue">Description longue</label>
      <div class="col-md-4">
        <textarea class="form-control" id="descLongue" name="descLongue"></textarea>
      </div>
    </div>

    <div class="form-group">
      <label class="col-md-4 control-label" for="prix">Prix</label>
      <div class="col-md-4">
      <input id="prix" name="prix" placeholder="€" class="form-control input-md" type="text">
      </div>
    </div>

    <div class="form-group">
      <label class="col-md-4 control-label" for="photo">Photo</label>
      <div class="col-md-4">
      <input id="photo" name="photo" class="input-file" type="file">
      </div>
    </div>

    <div class="form-group">
      <label class="col-md-4 control-label" for="pays">Pays</label>
      <div class="col-md-4">
      <input id="pays" name="pays" placeholder="" class="form-control input-md" type="text">
      </div>
    </div>

    <div class="form-group">
      <label class="col-md-4 control-label" for="ville">Ville</label>
      <div class="col-md-4">
      <input id="ville" name="ville" placeholder="" class="form-control input-md" type="text">
      </div>
    </div>

    <div class="form-group">
      <label class="col-md-4 control-label" for="adresse">Adresse</label>
      <div class="col-md-4">
      <input id="adresse" name="adresse" placeholder="" class="form-control input-md" type="text">
      </div>
    </div>

    <div class="form-group">
      <label class="col-md-4 control-label" for="cp">Code Postal</label>
      <div class="col-md-4">
      <input id="cp" name="cp" placeholder="" class="form-control input-md" type="text">
      </div>
    </div>

    <div class="form-group">
      <label class="col-md-4 control-label" for="submit"></label>
      <div class="col-md-4">
        <button id="submit" name="submit" class="btn btn-success">Valider</button>
      </div>
    </div>

  </fieldset>
</form>




<!-- FICHIERS D'INCLUSION -->
<?php
echo $contenu;

require_once '../inc/bas.inc.php';
