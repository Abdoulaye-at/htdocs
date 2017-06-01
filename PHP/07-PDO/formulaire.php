<?php

/*----------*/
/* EXERCICE */
/*----------*/

/*
Exercice :
Créer un formulaire qui permet d'enregistrer un nouvel employé dans la base de données "entreprise", en écrivant le code suivant :
  1. Création du formulaire HTML
  2. Connexion à la bdd
  3. Lorsque le formulaire est posté, insertion de données du formulaire dans la base avec une requête préparée
  4. Afficher un message "l'employé a bien été ajouté"

*/


// 2. Connexion à la BDD //
$pdo = new PDO('mysql:host=localhost;dbname=entreprise', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

// 3. Insertion des données dans la base de données //
echo '<pre>'; var_dump($_POST); echo '</pre>';

$message = '';

if(!empty($_POST)) {
  // contrôle du formulaire
  if(strlen($_POST['prenom']) < 3 || strlen($_POST['prenom']) > 20) $message .='Le prénom doit comporter entre 3 et 20 caractères <br>';
  if(strlen($_POST['nom']) < 3 || strlen($_POST['nom']) > 20) $message .='Le nom doit comporter entre 3 et 20 caractères <br>';
  if(strlen($_POST['service']) < 3 || strlen($_POST['service']) > 20) $message .='Le nom du service doit comporter entre 3 et 20 caractères <br>';
  if(isset($_POST['sexe']) && $_POST['sexe'] != 'm' && $_POST['sexe'] !='f') $message .='N\'oubliez pas de saisir le genre <br>';
  if(!is_numeric($_POST['salaire']) || $_POST['salaire'] <= 0) $message .= 'Le salaire doit être un nombre supérieur à 0 <br>';

  // contrôle de la date :
  function validateDate($date, $format ='Y-m-d') {
    $d = DateTime::createFromFormat($format, $date);
    if($d && $d->format($format) == $date){
      return true;
    } else {
      return false;
    }
  }
  // return($d && $d->format($format) == $date);

if(!validateDate($_POST['Date_embauche'])) $message .= 'Date incorrecte ! <br>';

  if(empty($message)) { // si message est vide, c'est qu'il n'y a pas d'erreurs

    $resultat = $pdo->prepare("INSERT INTO employes (nom, prenom, sexe, date_embauche, service, salaire)
    VALUES (:nom, :prenom, :sexe, :Date_embauche, :service, :salaire)");

    $resultat->bindParam(':nom', $_POST['nom'], PDO::PARAM_STR);
    $resultat->bindParam(':prenom', $_POST['prenom'], PDO::PARAM_STR);
    $resultat->bindParam(':sexe', $_POST['sexe'], PDO::PARAM_STR);
    $resultat->bindParam(':Date_embauche', $_POST['Date_embauche'], PDO::PARAM_STR);
    $resultat->bindParam(':service', $_POST['service'], PDO::PARAM_STR);
    $resultat->bindParam(':salaire', $_POST['salaire'], PDO::PARAM_STR);

    $resultat->execute();
        echo "Félicitations, l'employé a bien été ajouté !";
    }
}



?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Formulaire.php</title>
  </head>

  <body>

    <h1>Créer un nouvel employé</h1>
      <?php echo $message; ?>
      <form method="post" action="formulaire.php">

      <label for="Nom">Nom</label>
      <input type="text" id="nom" name="nom">
      <br>
      <label for="Prénom">Prénom</label>
      <input type="text" id="prenom" name="prenom">
      <br>
      <label for="Sexe">Sexe</label>
      <INPUT type= "radio" name="sexe" value="m" checked> Homme
      <INPUT type= "radio" name="sexe" value="f"> Femme
      <br>
      <label for="Date d'embauche">Date d'embauche</label>
      <input type="text" id="Date_embauche" name="Date_embauche" placeholder="AAAA-MM-JJ">
      <br>
      <label for="Service">Service</label>
      <input type="text" id="service" name="service">
      <br>
      <label for="Salaire">Salaire</label>
      <input type="text" id="salaire" name="salaire">
      <br>

      <input type="submit" name="validation" value="Envoyer">

    </form>
  </body>

</html>
