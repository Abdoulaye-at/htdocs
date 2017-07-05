<?php

//---------------------------------------//
// Cas pratique : un espace de dialogue //
//-------------------------------------//

/*
  Objectif : Créer un espace de dialogue de type avis ou livre d'or.

  Base de données : dialogue
  Table : commentaire
  Champs :  id_commentaire        INT(3) PK AI
            pseudo                VARCHAR(20)
            message               TEXT
            date_enregistrement   DATETIME
*/

// Connexion à la bdd
$pdo = new PDO('mysql:host=localhost;dbname=dialogue', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
var_dump($_POST);
// Si le formulaire est posté :
if(!empty($_POST)){

  // 3. Traitement contre les failles XSS et les innjections CSS : échapper les données
  // Exemple de faille CSS :                        <style>body{display:none}</style>
  // Exemple de faille XSS Xcross Site Script:      <script> while(true){alert('Vous êtes bloqués');} </script>

  //Pour s'en prémunir :
  $_POST['pseudo'] = htmlspecialchars($_POST['pseudo'], ENT_QUOTES);
  $_POST['message'] = htmlspecialchars($_POST['message'], ENT_QUOTES);
  // convertit les caractères spéciaux en entités html, ce qui permet de rendre inoffensives les balises HTML injectés dans le formulaire. On parle d'échappement des données.

  // Compléments :
  $_POST['message'] = strip_tags($_POST['message']); // supprime toutes les balises html contenues dans $_POST['message']

  //htmlentities() permet aussi de convertir en entités html les caractères spéciaux lorsqu'on fait un echo direct de données issues de l'internaute


  // 1. Requête non-protégée contre les injections, et qui n'accepte pas les apostrophes
  // $r = $pdo->query("INSERT INTO commentaire(pseudo, date_enregistrement, message) VALUES('$_POST[pseudo]', NOW(), '$_POST[message]')");

  // Nous avons fait l'injection SQL suivante dans le champs message :  "ok'); DELETE FROM commentaire; ("
  // Elle a pour conséquences l'effacement de la table commentaire. Pour se prémunir de ce type d'injections, on effectue une requête préparée
  // Au passage, les apostrophes sont sont désormais utilisables dans les champs

  $stmt = $pdo->prepare("INSERT INTO commentaire (pseudo, message, date_enregistrement) VALUES (:pseudo, :message, NOW())");
  $stmt->bindParam(':pseudo', $_POST['pseudo'], PDO::PARAM_STR);
  $stmt->bindParam(':message', $_POST['message'], PDO::PARAM_STR);

  $stmt->execute();
  // L'injection SQL ne fonctionne plus, car on a mis des marqueurs dans la requête plus des bindParam qui assainissent les données en neutralisant
}

?>

<h2> Formulaire </h2>

<form method="post" action="">

    <label for="pseudo"> Pseudo </label><br>
    <input type="text" name="pseudo" id="pseudo"><br>

    <label for="message"> Message </label><br>
    <textarea name="message" id="message"></textarea><br>

    <input type="submit" name="envoi" value="Envoyer">
</form>

<?php
  // Affichage des messages postés
  $resultat = $pdo->query("SELECT pseudo, message, date_enregistrement FROM commentaire ORDER BY date_enregistrement DESC");
  echo "Nombre de commentaires : " . $resultat->rowCount();

  while($commentaire = $resultat->fetch(PDO::FETCH_ASSOC)){
    echo '<div>';
      echo '<div> Pseudo : ' . $commentaire['pseudo'] . ', le ' . $commentaire['date_enregistrement'] . '</div>';
      echo '<div> Message : ' . $commentaire['message'] . '</div>';
    echo '</div> <hr>';
  }
?>
