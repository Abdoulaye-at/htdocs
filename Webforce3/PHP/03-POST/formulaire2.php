<?php

/*------------
 Exercice:
  - Créer un formulaire avec les champs ville code postal et adresse
    - Afficher les données saisies par l'internaute juste au-dessus du formulaire en précisant l'étiquette correspondante

----------*/

echo '<pre>'; var_dump($_POST); echo '<pre>';

if (!empty($_POST)) { // Si $_POST n'est pas vide, le formulaire a été soumis

// Afficher les données du formulaire
echo 'Ville : ' . $_POST['Ville'] . '<br>'; // l'indice de $_POST correspond au 'name' du formulaire

echo 'Code Postal : ' . $_POST['Code_Postal'] . '<br>';

echo 'Adresse : ' . $_POST['Adresse'] . '<br>';

}


?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Coordonnées</title>
  </head>

  <body>

    <h1>Coordonnées</h1>
      <form method="post" action="">

      <label for="Ville">Ville</label>
      <input type="text" id="Ville" name="Ville">
      <br>

      <label for="Code Postal">Code Postal</label>
      <input type="text" id="Code Postal" name="Code_Postal">
      <br>

      <label for="Adresse">Adresse</label>
      <input type="text" id="Adresse" name="Adresse">
      <br>



      <input type="submit" name="validation" value="envoyer">

    </form>
  </body>

</html>
