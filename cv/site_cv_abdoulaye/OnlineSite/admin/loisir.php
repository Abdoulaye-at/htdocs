<?php require '../connexion/connexion.php'; ?>
<?php
  // Gestion des contenus
    // Insertion du contenu
      if (isset($_POST['competences'])) {
        if ($_POST['competences'] != '' && $_POST['c_niveau'] != '') {
          $competence = addslashes($_POST['competences']);
          $c_niveau = addslashes($_POST['c_niveau']);

          $pdo->exec(" INSERT INTO t_competences VALUES (NULL, 'competences', '$c_niveau', '1')");
          header("location: ../admin/competences.php");
        }
      }

  // Suppression des competences
  if (isset($_GET['id_competences'])) {
    $suppression = $_GET['id_competences'];
    $sql = "DELETE FROM t_competences WHERE id_competences='$suppression'";
    $pdo -> query($sql);
    header('location:../admin/competences.php');
  }
?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">

    <?php
      $sql = $pdo -> query( "SELECT * FROM t_utilisateurs" );
      $ligne_utilisateur = $sql->fetch();
    ?>

    <title>admin competences</title>
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
          // echo '<th>Modifier</th>';
          echo '<th>Supprimer</th>';
        echo '</tr>';

          while ($ligne_competences = $sql -> fetch()) {
            echo '<tr>';
              echo '<td>'. $ligne_competences['competence'] .'</td>';
              echo '<td>'. $ligne_competences['c_niveau'] .'</td>';
              // echo "<td><a href ='competences.php'>". "Modif" ."</a></td>";
              echo '<td><a href ="competences.php?id_competences='. $ligne_competences['id_competences'] .'">Suppr</a></td>';
            echo '</tr>';
          };
      echo '</table>';
    ?>
    <!-- Formulaire d'ajout de compétence -->
    <h2>Ajouter d'une compétence</h2>
    <form action="competences.php" method="post">
      <input type="text" name="competences" id="competences" required>
      <input type="text" name="c_niveau" id="c_niveau" required> <br>
      <input type="submit" value="Ajouter une compétence">
    </form>
  </body>
</html>
