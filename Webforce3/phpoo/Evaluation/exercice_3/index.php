<?php

  // Connexion à la bdd
  try{
    $bdd = new PDO('mysql:host=localhost;dbname=voiture', 'root', '',
      array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8')
    );
  } catch (Exception $e){
    die('Erreur : ' . $e -> getMessage());
  }

  // Déclaration des variables
  $errors ='';
  $verification ='';

  // Recuperation des données
  $criteres = array(
    "marque" => $_POST['marque'],
    "modele" => $_POST['modele'],
    "years" => $_POST['years'],
    "couleur" => $_POST['couleur']
  );

  //-----------------------------------------//
  // Traitement du formulaire

  if(!empty($_POST)){

  	foreach($_POST as $key => $value){
  		$_POST[$key] = strip_tags(trim($value));
  	}

  	if(strlen($_POST['marque']) < 3){
  		$errors[] = 'La marque doit comporter au moins 3 caractères';
  	}

  	if(strlen($_POST['modele']) < 3){
  		$errors[] = 'Le modèle doit comporter au moins 3 caractères';
  	}

  	if(!is_numeric($_POST['years']) && strlen($_POST['years']) != 4){
  		$errors[] = 'Veuillez vérifier l\'année.';
  	}

  	if(strlen($_POST['couleur']) < 3){
  		$errors[] = 'La marque doit comporter au moins 3 caractères';
  	}

  	// Si je ne detecte aucune erreur
  	if(!isset($errors)){

  		// J'insert le véhicule dans la bdd
      $insertAuto = $bdd -> prepare('INSERT INTO autos (marque, modele, years, couleur)
      VALUES (:marque, :modele, :years, :couleur)');

      $verification = $insertAuto -> execute(array(
        "marque" => $criteres['marque'],
        "modele" => $criteres['modele'],
        "years" => $criteres['years'],
        "couleur" => $criteres['couleur']
      ));

  		// je crée une condition pour vérifier si ma requête est fonctionnelle
  		if($insertAuto->execute()){
  			$createAuto = true;
  		} else {
  			$errors[] = 'Erreur SQL';
  		}
  	}


  	if(isset($createAuto) && $createAuto == true){
  		echo '<div class="col-md-6 col-md-offset-3">';
  		echo '<div class="alert alert-success">La voiture a été ajoutée avec succès.</div>';
  		echo '</div><br>';
  	}

  	if(!empty($errors)){
  		echo '<div class="col-md-6 col-md-offset-3">';
  		echo '<div class="alert alert-danger">'.implode('<br>', $errors).'</div>';
  		echo '</div><br>';
  	}
  }
  //------------------------------------------//



  if ($verification){

    //Je renvois une reponse JSON
    header('Content-Type: application/json');

    //Je formate la reponse en JSON
    echo json_encode(array(
      "success" => true
    ));
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="jquery.js"></script>
    <script src="script.js"></script>
    <title>Exo 3</title>
  </head>


  <body>
    <div class="wrapper">
      <h2>Crée ta voiture !</h2>

      <form class="create_auto" action="" method="post">

        <p>
          <label for="marque">Marque : </label>
          <input type="text" name="marque" value="">
        </p>

        <p>
          <label for="modele">Modèle : </label>
          <input type="text" name="modele" value="">
        </p>

        <p>
          <label for="years">Année : </label>
          <input type="text" name="years" value="">
        </p>

        <p>
          <label for="couleur">Couleur : </label>
          <input type="text" name="couleur" value="">
        </p>

        <input type="submit" name="valide_auto" value="Fabriquer !">

      </form>

      <p class="return bg-success"></p>
    </div>
  </body>
</html>
