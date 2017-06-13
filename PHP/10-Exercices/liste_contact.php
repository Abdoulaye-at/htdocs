<?php
/*
	1- Afficher dans une table HTML la liste des contacts avec les champs nom, prénom, téléphone, et un champ supplémentaire "autres infos" avec un lien qui permet d'afficher le détail de chaque contact.

	2- Afficher sous la table HTML le détail d'un contact quand on clique sur le lien "autres infos".
*/


//------------------ TRAITEMENT -------------------//

//  Connexion à la BDD //
$pdo = new PDO('mysql:host=localhost;dbname=contacts', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

$resultat = $pdo->prepare("SELECT id_contact, nom, prenom, telephone FROM contact ");
$resultat->execute();

$contenu = "";

 while($contacts = $resultat->fetch(PDO::FETCH_ASSOC)){
  //echo'<pre>'; var_dump($contacts); echo'</pre>';
  $contenu .= '<tr>';
    foreach($contacts as $indice => $valeur){
      $contenu .= '<td>' . $valeur . '</td>';
      // $contenu .= '<td>' . '.<a href="">Autres infos</a>.' . '</td>';
    }
  $contenu .= '</tr>';
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>liste_contact</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="inc/css/bootstrap.min.css">
  </head>

  <body>
    <table class="table">
      <tr>
        <th>id_contact</th>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Téléphone</th>
        <th><a href="">Autres infos</a></th>
      </tr>
      <?php echo $contenu; ?>
    </table>
  </body>
</html>
