<?php
  $contenu = "";
  // Connexion à la bdd
  $pdo = new PDO('mysql:host=localhost;dbname=contacts', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

  // Requête en bdd
  $query = $pdo->query("SELECT * FROM contact");

  $contenu .= '<table border="1">';
    $contenu .= '<tr>
                  <th>Nom</th>
                  <th>Prénom</th>
                  <th>Téléphone</th>
                  <th>Autres infos</th>
                </tr>';
  $contenu .= '</table>';
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Liste contacts</title>
  </head>
  <body>
    <?php echo $contenu ?>
  </body>
</html>
