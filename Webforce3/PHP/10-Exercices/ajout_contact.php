<?php

/* 1- Créer une base de données "contacts" avec une table "contact" :
	  id_contact PK AI INT(3)
	  nom VARCHAR(20)
	  prenom VARCHAR(20)
	  telephone VARCHAR(10)
	  annee_rencontre (YEAR)
	  email VARCHAR(255)
	  type_contact ENUM('ami', 'famille', 'professionnel', 'autre')

	2- Créer un formulaire HTML (avec doctype...) afin d'ajouter un contact dans la bdd. Le champ année est un menu déroulant de l'année en cours à 100 ans en arrière à rebours, et le type de contact est aussi un menu déroulant.

	3- Effectuer les vérifications nécessaires :
	   Les champs nom et prénom contiennent 2 caractères minimum, le téléphone 10 chiffres
	   L'année de rencontre doit être une année valide
	   Le type de contact doit être conforme à la liste des types de contacts
	   L'email doit être valide
	   En cas d'erreur de saisie, afficher des messages d'erreurs au-dessus du formulaire

	4- Ajouter les contacts à la BDD et afficher un message en cas de succès ou en cas d'échec.

*/

//------------------ TRAITEMENT -------------------//

//  Connexion à la BDD //
$pdo = new PDO('mysql:host=localhost;dbname=contacts', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

echo '<pre>'; var_dump($_POST); echo '</pre>';

// Déclarations de mes variables et fonctions //
$message = '';


if(!empty($_POST)) {
  // Contrôle du formulaire
  if(strlen($_POST['nom']) <= 2 || strlen($_POST['nom']) > 20) $message .='Le nom doit comporter entre 2 et 20 caractères <br>';
  if(strlen($_POST['prenom']) <= 2 || strlen($_POST['prenom']) > 20) $message .='Le prénom doit comporter entre 2 et 20 caractères <br>';
  if(isset($_POST['annee_rencontre']) && $_POST['annee_rencontre'] > 1917 || $_POST['annee_rencontre'] < 2017) $message .= 'L\'année de rencontre doit être comprise entre 1917 et 2017. <br>';
  if(isset($_POST['type_contact']) && $_POST['type_contact'] != 'ami' && $_POST['type_contact'] !='famille' && $_POST['type_contact'] !='professionnel' && $_POST['type_contact'] !='autre') $message .='Veuillez saisir un type de contact existant <br>';
  if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) $message .='Veuillez saisir un email valide <br>';
  if(preg_match("#^0[1-68]([-. ]?[0-9]{2}){4}$#", $_POST['telephone'])) $message .= 'Veuillez entrer un numéro de téléphone valide <br>';

  if (empty($message)){
    foreach ($_POST as $indice => $valeur) {
      $_POST[$indice] = htmlspecialchars($_POST[$indice], ENT_QUOTES);
    }
  }


    $resultat = $pdo->prepare("INSERT INTO contact (nom, prenom, telephone, annee_rencontre, email, type_contact)
    VALUES (:nom, :prenom, :telephone, :annee_rencontre, :email, :type_contact)");

    $resultat->bindParam(':nom', $_POST['nom'], PDO::PARAM_STR);
    $resultat->bindParam(':prenom', $_POST['prenom'], PDO::PARAM_STR);
    $resultat->bindParam(':telephone', $_POST['telephone'], PDO::PARAM_STR);
    $resultat->bindParam(':annee_rencontre', $_POST['annee_rencontre'], PDO::PARAM_STR);
    $resultat->bindParam(':email', $_POST['email'], PDO::PARAM_STR);
    $resultat->bindParam(':type_contact', $_POST['type_contact'], PDO::PARAM_STR);

    $success = $resultat->execute();
      if ($success){
        echo "<div class='bg-success'>Félicitations, le contact a bien été ajouté !</div>";
      } else {
        echo "<div class='bg-success'>Veuillez vérifier vos informations !</div>";
      }
    }


?>

<!-- ~ ~ ~ ~ AFFICHAGE ~ ~ ~ -->

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>ajout_contact</title>

    <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="inc/css/bootstrap.min.css">
  </head>

  <body>

    <h1>Créer un nouveau contact</h1>
    <?php
      echo $message;
    ?>
      <form method="post" action="">

      <p>
          <label for="nom">Nom</label><br>
          <input type="text" id="nom" name="nom">
      </p>

      <p>
          <label for="prenom">Prénom</label><br>
          <input type="text" id="prenom" name="prenom">
      </p>

        <p>
          <label for="telephone">Telephone</label><br>
          <input type="text" name="telephone">
        </p>

        <p>
          <label for="annee_rencontre">Année de rencontre</label><br>

          <?php
          echo '<select name="annee_rencontre">';
          for($annees = 2017; $annees >= 1917; $annees--){
            echo "<option>$annees</option>";
          }
          echo '</select>';
          echo '<br>';
          ?>
        </p>

        <p>
          <label for="email">Email</label><br>
          <input type="text" id="email" name="email">
        </p>

        <p>
          <label for="type_contact">Type_contact</label><br>
          <select class="" name="type_contact">
            <option value="ami" name="type_contact">Ami</option>
            <option value="famille" name="type_contact">Famille</option>
            <option value="professionnel" name="type_contact">Professionnel</option>
            <option value="autre" name="type_contact">Autre</option>
          </select>
        </p>

      <p><input type="submit" name="validation" value="Envoyer"></p>

    </form>
  </body>
</html>
