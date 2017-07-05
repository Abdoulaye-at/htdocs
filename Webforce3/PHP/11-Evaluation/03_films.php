<?php
  //------------//
 // Exercice 3 //
//------------//


/* Vous travaillez pour un cinéma et devez créer une base de données de film. Votre base de données s’appellera « exercice_3 ». Vous devrez ensuite créer un script qui permettra
  d’ajouter et d’afficher des films.*/

//---- Étape 1 ----//
// Création de la base de données

//---- Étape 2 ----//
/* Créer un formulaire permettant d’ajouter un film et effectuer les vérifications nécessaires.

  Prérequis :
  ● Les champs “titre, nom du réalisateur, acteurs, producteur et synopsis” comporteront au minimum 5 caractères.
  ● Les champs : année de production, langue, category, seront obligatoirement un menu déroulant
  ● Le lien de la bande annonce sera obligatoirement une URL valide
  ● En cas d’erreurs de saisie, des messages d’erreurs seront affichés en rouge. Chaque film sera ajouté à la base de données créée. Un message de réussite confirmera
  l’ajout du film.
*/

//------------------ TRAITEMENT -------------------//

//  Connexion à la BDD //
$pdo = new PDO('mysql:host=localhost;dbname=exercice_3', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

// Déclarations des arrays
$categorie = array('action', 'aventure', 'animation', 'thriller');
$langue = array('français', 'anglais', 'espagnol' );


// Vérifications du formulaire //
$message = ''; // Je déclare une variable qui me permettra d'afficher d'éventuels messages d'erreur

if(!empty($_POST)) {
  //echo "<pre>"; var_dump($_POST); echo "</pre>";

  // Contrôle du formulaire
  if(strlen($_POST['titre']) <= 5) $message .='Le titre doit comporter au moins 5 caractères <br>';
  if(strlen($_POST['acteurs']) <= 5) $message .='Le champs acteurs doit comporter au moins 5 caractères <br>';
  if(strlen($_POST['realisateur']) <= 5) $message .='Le champs realisateur doit comporter au moins 5 caractères <br>';
  if(strlen($_POST['producteur']) <= 5) $message .='Le champs producteur doit comporter au moins 5 caractères <br>';
  if(!(isset($_POST['annee_production']) && $_POST['annee_production'] > 1917 && $_POST['annee_production'] <= 2017)) $message .= 'L\'année de production doit être comprise entre 1917 et 2017. <br>';
  if(!in_array($_POST['langue'], $langue)) $message .='Veuillez saisir une langue existante <br>';
  if(!in_array($_POST['categorie'], $categorie)) $message .='Veuillez saisir une catégorie existante <br>';
  if(strlen($_POST['synopsis']) <= 5) $message .='Le synopsis doit comporter au moins 5 caractères <br>';
  if (!filter_var($_POST['video'], FILTER_VALIDATE_URL)) $message .='Merci de saisir une URL valide. <br>';

  if (empty($message)){
    foreach ($_POST as $indice => $valeur) {
      $_POST[$indice] = htmlspecialchars($_POST[$indice], ENT_QUOTES);
    }
  }

  // Préparation de la requête SQL
  $resultat = $pdo->prepare("INSERT INTO movies (titre, acteurs, realisateur, producteur, annee_production, langue, categorie, synopsis, video)
  VALUES (:titre, :acteurs, :realisateur, :producteur, :annee_production, :langue, :categorie, :synopsis, :video)");

  $resultat->bindParam(':titre', $_POST['titre'], PDO::PARAM_STR);
  $resultat->bindParam(':acteurs', $_POST['acteurs'], PDO::PARAM_STR);
  $resultat->bindParam(':realisateur', $_POST['realisateur'], PDO::PARAM_STR);
  $resultat->bindParam(':producteur', $_POST['producteur'], PDO::PARAM_STR);
  $resultat->bindParam(':annee_production', $_POST['annee_production'], PDO::PARAM_STR);
  $resultat->bindParam(':langue', $_POST['langue'], PDO::PARAM_INT);
  $resultat->bindParam(':categorie', $_POST['categorie'], PDO::PARAM_STR);
  $resultat->bindParam(':synopsis', $_POST['synopsis'], PDO::PARAM_STR);
  $resultat->bindParam(':video', $_POST['video'], PDO::PARAM_STR);

  $success = $resultat->execute();
    if ($success){
      echo "<div class='bg-success'>Félicitations, le film a bien été ajouté à la base de données!</div>";
    } else {
      echo "<div class='alert alert-danger'>Veuillez vérifier vos informations !</div>";
    }
}

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Films</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="inc/css/bootstrap.min.css">
  </head>

  <body>
    <h1>Ma base de données films</h1>
    <?php
      if(!empty($message)){
        echo "<div class='alert alert-danger'> $message </div>";
      }
    ?>
    <!-- Création du formulaire -->
    <form class="" action="" method="post">
      <div class="">
        <label for="titre">Titre</label>
        <input type="text" name="titre" >
      </div>

      <div class="">
        <label for="acteurs">Acteurs</label>
        <input type="text" name="acteurs">
      </div>

      <div class="">
        <label for="realisateur">Réalisateur</label>
        <input type="text" name="realisateur" >
      </div>

      <div class="">
        <label for="producteur">Producteur</label>
        <input type="text" name="producteur">
      </div>

      <div class="">
        <label for="annee_production">Année de production</label>
        <?php
        echo '<select name="annee_production" class="form-group-sm form-control-static">';
        for ($i=2017; $i > 1917; $i--) {
          echo '<option>' .$i. '</option>';
        }
        echo '</select>';
      ?>
      </div>

      <div class="">
        <label for="langue">Langue</label>
        <?php
          echo "<select name='langue'>";
            foreach ($langue as $indice => $valeur) {
              echo "<option>$valeur</option>";
            }
          echo "</select>";
        ?>
      </div>

      <div class="">
        <label for="categorie">Catégorie</label>
        <?php
          echo "<select name='categorie'>";
            foreach ($categorie as $indice => $valeur) {
              echo "<option>$valeur</option>";
            }
          echo "</select>";
        ?>
      </div>

      <div class="">
        <label for="synopsis">Synopsis</label>
        <input type="text" name="synopsis">
      </div>

      <div class="">
        <label for="video">Video</label>
        <input type="text" name="video">
      </div>

      <input class="btn btn-default" type="submit" name="envoyer" value="Valider">

    </form>
  </body>
</html>
