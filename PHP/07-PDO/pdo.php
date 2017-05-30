<?php

//-------------------------//
// PDO - PHP Data Objects //
//-----------------------//

// L'extension PDO définit une interface pour accéder à une base de données depuis PHP.

//-------------------------------------//
echo '<h3> 01. PDO : Connexion </h3>';
//------------------------------------//
$pdo = new PDO('mysql:host=localhost;dbname=entreprise', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

// $pdo est un objet issu de la classe prédefinie PDO : il représente la connexion à la base de données
// Les arguments : 1 driver mysql + serveur + base de données - 2 pseudo - 3 mdp - 4 option 1 pour générer l'affichage des erreurs, option 2 définit le jeu de caractères des échanges avec la bdd

echo '<pre>'; print_r(get_class_methods($pdo)); echo '</pre>';

//--------------------------------------------------------//
echo '<h3> 02. exec avec INSERT, UPDATE, et DELETE </h3>';
//-------------------------------------------------------//

$resultat = $pdo->exec("INSERT INTO employes (prenom, nom, sexe, service, date_embauche, salaire) VALUES ('test', 'test', 'm', 'test', '2016-02-08', 500)");

/*
exec() est utilisé pour la formulation de requêtes ne retournant pas de jeu de résultats : INSERT, UPDATE, DELETE.

  Valeur de retour :
    Succès : un integer (= le nombre de lignes affectées)
    Echec : false

*/
// echo "Nombre d'enregistrements affectés par l'INSERT : $resultat <br>";
// echo "Dernier id généré lors de l'INSERT : " . $pdo->lastInsertId();

// Exemple ave UPDATE
$resultat = $pdo->exec("UPDATE employes SET salaire = 6000 WHERE id_employes = 350");
echo "Nombre d'enregistrements affectés par l'UPDATE : $resultat <br>";

//--------------------------------------------------------//
echo '<h3> 03. query avec SELECT + FETCH_ASSOC </h3>';
//-------------------------------------------------------//

$result = $pdo->query("SELECT * FROM employes WHERE prenom = 'Daniel'");

// Au contraire d'exec(), query() est utilisé avec les requêtes retournant un ou plusieurs résultats : SELECT
/*
  Valeur de retour :
    Succes : on obtient un nouvel objet issu de la classe prédéfinie PDOStatement
    Echec : false
  Notez que query() peut être utilisé avec INSERT UPDATE et DELETE
*/

echo '<pre>'; print_r($result); echo '</pre>';
echo '<pre>'; print_r(get_class_methods($result)); echo '</pre>';
echo $result;
