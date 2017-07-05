<?php

//---- Étape 3 ----//

/*  Créer une page listant dans un tableau HTML les films présents dans la base de données.
   Ce tableau ne contiendra, par film, que le nom du film, le réalisateur et l’année de production.
   Une colonne de ce tableau contiendra un lien « plus d’infos » permettant de voir la fiche d’un film dans le détail.
*/

//  Connexion à la BDD //
$pdo = new PDO('mysql:host=localhost;dbname=exercice_3', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

// 2- Requête en BDD :
$query = $pdo->query("SELECT * FROM movies");

echo '<table class="table table-stripped table-bordered">';
	echo  '<tr>
					<th>Titre</th>
					<th>Réalisateur</th>
					<th>Année de production</th>
					<th>Plus d\'infos</th>
				 </tr>';

	while($film = $query->fetch(PDO::FETCH_ASSOC)){
		//echo '<pre>'; print_r($restos); echo '</pre>';
		echo '<tr>
						<td>'. $film['titre'] .'</td>
						<td>'. $film['realisateur'] .'</td>
						<td>'. $film['annee_production'] .'</td>
						<td> <a href="03_detailsFilm.php?id_film='.$film['id_film'].'">Autres infos </a> </td>
					 </tr>';
	}


echo '</table>';
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>liste_Films</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="inc/css/bootstrap.min.css">
  </head>
  <body>

  </body>
</html>
