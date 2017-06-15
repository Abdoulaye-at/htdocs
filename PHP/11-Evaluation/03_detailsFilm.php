<?php

//  Connexion à la BDD //
$pdo = new PDO('mysql:host=localhost;dbname=exercice_3', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

// Détail :
$contenu = '';
if(isset($_GET['id_film'])){


  $_GET['id_film'] = htmlspecialchars($_GET['id_film']);

  $query = $pdo->prepare("SELECT * FROM movies WHERE id_film = :id_film");
  $query->bindParam(':id_film', $_GET['id_film'], PDO::PARAM_STR);
  $query->execute();

  $film = $query->fetch(PDO::FETCH_ASSOC);
  // J'effectue un print_r pour m'aider à récupérer les données de mon tableau
  // echo '<pre>'; print_r($film); echo '</pre>';

  $contenu .= '<p class="lead">Titre                : '. $film['titre'] .'</p>';
  $contenu .= '<p class="lead">Acteurs              : '. $film['acteurs'] .'</p>';
  $contenu .= '<p class="lead">Réalisateur          : '. $film['realisateur'] .'</p>';
  $contenu .= '<p class="lead">Producteur           : '. $film['producteur'] .'</p>';
  $contenu .= '<p class="lead">Année de production  : '. $film['annee_production'] .'</p>';
  $contenu .= '<p class="lead">Langue               : '. $film['langue'] .'</p>';
  $contenu .= '<p class="lead">Catégorie            : '. $film['categorie'] .'</p>';
  $contenu .= '<p class="lead">Synopsis             : '. $film['synopsis'] .'</p>';
  $contenu .= '<p class="lead">Lien du film         : '. $film['video'] .'</p>';
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Liste détaillée des films</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="inc/css/bootstrap.min.css">
  </head>

  <body>
    <h1>Liste détaillée des films</h1>
    <?php echo $contenu ?>
  </body>
</html>
