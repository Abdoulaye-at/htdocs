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

//$resultat = $pdo->exec("INSERT INTO employes (prenom, nom, sexe, service, date_embauche, salaire) VALUES ('test', 'test', 'm', 'test', '2016-02-08', 500)");

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

$result = $pdo->query("SELECT * FROM employes WHERE prenom = 'thomas'");

// Au contraire d'exec(), query() est utilisé avec les requêtes retournant un ou plusieurs résultats : SELECT
/*
  Valeur de retour :
    Succes : on obtient un nouvel objet issu de la classe prédéfinie PDOStatement
    Echec : false
  Notez que query() peut être utilisé avec INSERT UPDATE et DELETE
*/

echo '<pre>'; print_r($result); echo '</pre>'; // affiche les propriétés de l'objet PDOStatement
echo '<pre>'; print_r(get_class_methods($result)); echo '</pre>'; // affiche les méthodes issues de la classe PDOStatement

// $result est le résultat de la requête sous une forme inexploitable directement : il faut donc le transformer par la méthode fetch();

$employe = $result->fetch(PDO::FETCH_ASSOC); // la méthode fetch() avec le paramètre PDO::FETCH_ASSOC permet de transformer l'objet $result en un array associatif ($employe) indexé avec le nom des champs de la requête

echo '<pre>'; print_r($employe); echo '</pre>';
echo "Je suis $employe[prenom] $employe[nom] du service $employe[service] <br>"; // On peut afficher le contenu de l'array avec des crochets.

// On peut transformer $result selon l'une des autres méthodes suivantes :
$result = $pdo->query("SELECT * FROM employes WHERE prenom = 'thomas'");

$employe = $result->fetch(PDO::FETCH_NUM); // ici, on obtient un array indexé numériquement.
echo '<pre>'; print_r($employe); echo '</pre>';
echo " Je suis $employe[1] $employe[2] du service $employe[4] <br>";

//---
$result = $pdo->query("SELECT * FROM employes WHERE prenom = 'thomas'");
$employe = $result->fetch(); // fetch() sans argument fait un mélange de FETCH_ASSOC et de FETCH_NUM
echo '<pre>'; print_r($employe); echo '</pre>';
echo " Je suis $employe[1] $employe[nom] du service $employe[4] <br>";

//----
$result = $pdo->query("SELECT * FROM employes WHERE prenom = 'thomas'");
$employe = $result->fetch(PDO::FETCH_OBJ); // retourne un objet avec le nom des champs de la requête comme propriétés (=attributs) publiques
echo '<pre>'; print_r($employe); echo '</pre>';
echo "Je suis $employe->prenom $employe->nom du service $employe->service . <br>"; // $employe est un objet, on utilise donc la notation '->'

//Remarque : il faut choisir l'un des traitements fetch() que l'on veut effectuer, car on ne peut pas en faire plusieurs sur le même résultat

echo '<hr>';

  //----------//
 // EXERCICE //
//----------//

$result = $pdo->query("SELECT * FROM employes WHERE id_employes = '417'");
$employe = $result->fetch(PDO::FETCH_OBJ); // retourne un objet avec le nom des champs de la requête comme propriétés (=attributs) publiques
echo '<pre>'; print_r($employe); echo '</pre>';
echo "Je suis l'employé d'id 417 et de service $employe->service . <br>";


//--------------------------------------------//
echo '<h3> 04. while et FETCH_ASSOC </h3>';
//------------------------------------------//

// Jusqu'ici, il n'y avait qu'un seuk résultat dans l'objet PDOStatement issu de la requête. Pour traiter plusieurs résultats, il faut faire une boucle while.

$resultat = $pdo->query("SELECT * FROM employes");

echo 'Nombre d\'employés dans la requête ' . $resultat->rowCount() . '<br>';

while($contenu = $resultat->fetch(PDO::FETCH_ASSOC)) { // fetch() retourne la ligne suivante du jeu de résultat contenu dans $resultat en un array associatif.
                                                      // la boucle while pemet de parcourir tout les résultats en faisant avancer le curseur dans la boucle table.
  //echo '<pre>'; print_r($contenu); echo '</pre>';
  echo '<div>';
    echo $contenu['id_employes'] . '<br>';
    echo $contenu['prenom'] . '<br>';
    echo $contenu['service'] . '<br>';
  echo '----------------------</div>';
}

// Remarque : il n'y a pas un seul array avec tous les enregistrements, mais un array par employé.
// Remarque : La boucle while est à utiliser lorsqu'on à potentiellement plusieurs résultats, sinon utiliser un fetch();


//---------------------------------//
echo '<h3> 05. FETCH_ALL </h3>';
//-------------------------------//

$resultat = $pdo->query("SELECT * FROM employes");
$donnees = $resultat->fetchALL(PDO::FETCH_ASSOC); // retourne toutes les lignes de résultats dans un tableau multidimentionnel : on a un array associatif à chaque indice numérique représentant un employé. Marche aussi avec PDO::FETCH_NUM;

// Pour afficher tout le contenu de cet array multidimensionnel, nous faisons des boucles foreach imbriquées :
echo '<hr>';

foreach($donnees as $employe){ // $employe est un sous array associatif contenant les infos de l'employe
  echo '<pre>'; print_r($employe); echo '</pre>';
  foreach($employe as $indice => $valeur){ // cette boucle parcourt toutes les infos du sous array représentant un employé
    echo $indice . ' : ' . $valeur . '<br>';
  }
  echo '--------------- <br>';
}

  //--------------------------------//
   echo '<h3> 06. EXERCICE </h3>';
//-------------------------------//

// Afficher la liste des différents services, en la mettant dans une liste <ul> -> <li>

// Avec FETCH_ASSOC

$resultat = $pdo->query("SELECT DISTINCT service FROM employes");
echo '<ul>';
  while($donnees = $resultat->fetch(PDO::FETCH_ASSOC)){
    echo '<li>' . $donnees['service'] . '</li>';
  }
echo '</ul>';


// Avec FETCH_ALL
$resultat = $pdo->query("SELECT DISTINCT service FROM employes");
$donnees = $resultat->fetchALL(PDO::FETCH_ASSOC);

echo '<ul>';
  foreach($donnees as $value){
    // echo '<pre>'; print_r($employe); echo '</pre>';
      echo '<li>'. $value['service'] . '</li>';
  }
echo '</ul>';


  //---------------------------------//
   echo '<h3> 07. TABLE HTML </h3>';
//---------------------------------//

$resultat = $pdo->query("SELECT * FROM employes");

echo '<table border ="1">';

  // Affichage de la ligne des en-têtes
  echo '<tr>';
    for($i=0; $i < $resultat->columnCount(); $i++){ // fait autant de tour de boucles qu'il y a de colonnes dans le jeu de résultat
      //echo '<pre>'; print_r($resultat->getColumnMeta($i)); echo '</pre>'; // on voit que getcolumnMeta() retourne un array qui contient l'indice name avec le nom du champ de la table sql

      $colonne = $resultat->getColumnMeta($i);
      echo '<th>' . $colonne['name'] . '</th>';
    }
  echo '</tr>';

  // Affichage des lignes de la table :
  while($ligne = $resultat->fetch(PDO::FETCH_ASSOC)){
    echo '<tr>';
      foreach($ligne as $informations){
        echo'<td>' . $informations .  '</td>';

      }
    echo '</tr>';
  }

echo '</table>';



  //--------------------------------------------------//
   echo '<h3> 08. prepare, bindParam, execute </h3>';
//--------------------------------------------------//

$nom = 'sennard';

// --1-- Préparation de la requête //
$resultat = $pdo->prepare("SELECT * FROM employes WHERE nom = :nom"); // prépare la requête avec un marqueur nominatif qui attend une valeur

// --2-- On lie le marqueur à une variable //
$resultat->bindParam(':nom', $nom, PDO::PARAM_STR); // bindParam reçoit exclusivement une variable vers laquelle pointe le marqueur : ici, on lie le marqueur :nom a la variable $nom. Ainsi, si le contenu de la variable change, la valeur du marqueur changera automatiquement lorsque l'on fera un execute. On a aussi des constantes PDO::PARAM_INT et PDO::PARAM_BOOL.

// --3-- On execute la requête //
$resultat->execute();

// --4-- fetch() //
$donnees = $resultat->fetch(PDO::FETCH_ASSOC);
echo implode($donnees, ' -- ');
echo '<br>';

/*
  prepare() permet de préparer la requête , mais ne l'execute pas
  execute() permet d'executer une requête préparée

  Valeur de retour:
    prepare() renvoie toujours un objet PDOStatement
    execute() :
      Succès : true
      Echec : false
  Les requêtes préparées sont préconisées si vous exécutez plusieurs fois la même requête, et ainsi vouloir éviter de répéter le cycle complet : analyse / interprétation / exécution

  Les requêtes préparées sont aussi utilisées pour assainir les données (prepare + bindParam + execute).
*/

// Si on change le contenu de la variable $nom, il n'est pas nécessaire de refaire un bindParam avan un nouvel execute() :
$nom = 'sennard';
$resultat->execute();
$donnees = $resultat->fetch(PDO::FETCH_ASSOC);
echo implode( $donnees, ' -- ');


  //--------------------------------------------------//
   echo '<h3> 09. prepare, bindValue, execute </h3>';
//--------------------------------------------------//

// --1-- Préparation de la requête //
$resultat = $pdo->prepare("SELECT * FROM employes WHERE nom = :nom");

// --2-- On lie le marqueur à une variable //
$resultat->bindValue(':nom', 'thoyer', PDO::PARAM_STR); //

// --3-- On execute la requête //
$resultat->execute();

// --4-- fetch() //
$donnees = $resultat->fetch(PDO::FETCH_ASSOC);
echo implode($donnees, ' -- ');

  //--------------------------------//
   echo '<h3> 10. EXERCICE </h3>';
//--------------------------------//

// Affichez dans une liste <ul> <li> le titre des livres empruntés par Chloé en utilisant une requête préparée

$pdo = new PDO('mysql:host=localhost;dbname=bibliotheque', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

$resultat = $pdo->prepare(" SELECT titre FROM livre WHERE id_livre  IN (SELECT id_livre FROM emprunt WHERE id_abonne IN (SELECT id_abonne FROM abonne WHERE prenom =
 :prenom))");

$prenom = 'chloe';
$resultat->bindParam(':prenom', $prenom, PDO::PARAM_STR);
$resultat->execute();

echo '<ul>';
  while($donnees = $resultat->fetch(PDO::FETCH_ASSOC)){
    echo '<li>' . $donnees['titre'] . '</li>' ;
  }
echo '</ul>';

  //----------------------------------------------//
   echo '<h3> 11. POINTS COMPLÉMENTAIRES </h3>';
//----------------------------------------------//

$pdo = new PDO('mysql:host=localhost;dbname=entreprise', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

echo '<strong>Le marqueur "?" <strong> <br>';

$resultat = $pdo->prepare("SELECT * FROM employes WHERE nom = ? AND prenom = ?"); // On prépare la requête sans les variables que l'on remplace par des marqueurs

$resultat->execute(array('durand', 'damien'));

$donnees = $resultat->fetch(PDO::FETCH_ASSOC); // pas de boucle while car on est certain qu'il n'y a qu'un seul résultat dans la requête
echo $donnees['service'] . '<br>';


echo '<strong> execute sans bindParam <strong> <br>';
$resultat = $pdo->prepare("SELECT * FROM employes WHERE nom = :nom AND prenom = :prenom");
$resultat->execute(array(':nom'=>'durand', ':prenom'=>'damien')); // nous associons les marqueurs nominatifs dans un array associatif passé en argument de execute();

$donnees = $resultat->fetch(PDO::FETCH_ASSOC); // pas de boucle while car on est certain qu'il n'y a qu'un seul résultat dans la requête
echo 'Service : ' . $donnees['service'] . '<br>';




//
