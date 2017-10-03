<?php require '../connexion/connexion.php'; ?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">

    <?php
      $sql = $pdo -> query( "SELECT * FROM t_utilisateurs" );
      $ligne_utilisateur = $sql->fetch();
    ?>

    <title>admin site CV</title>
  </head>

  <body>
    <?php
      echo $ligne_utilisateur['nom'].' '.$ligne_utilisateur['prenom'];

      $sql = $pdo -> prepare("SELECT * FROM t_competences");
      $sql -> execute();
      $nmb_competences = $sql -> rowCount();

      echo '<p> Il y a ' . $nmb_competences . ' compétences dans ma table : </p> <br>';
      echo "<p><a href='#'>Ajouter une compétence</p>";


      echo "<table width='500' border='2' >";
        echo '<tr>';
          echo '<th>Compétences</th>'; 
          echo '<th>Niveau</th>';
          echo '<th>Modifier</th>';
          echo '<th>Supprimer</th>';
        echo '</tr>';

          while ($ligne_competences = $sql -> fetch()) {
            echo '<tr>';
              echo '<td>'. $ligne_competences['competence'] .'</td>';
              echo '<td>'. $ligne_competences['c_niveau'] .'</td>';
              echo "<td><a href ='competences.php'>". "Modif" ."</a></td>";
              echo "<td><a href ='competences.php'>". "Suppr" ."</a></td>";
            echo '</tr>';
          }
      echo '</table>';
    ?>
  </body>
</html>
