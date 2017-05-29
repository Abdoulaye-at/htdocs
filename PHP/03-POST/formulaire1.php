<?php

  echo '<pre>'; var_dump($_POST); echo '<pre>';

  if (!empty($_POST)) { // Si $_POST n'est pas vide, le formmulaire a été soumis

  // Afficher les données du formulaire
  echo 'Prénom : ' . $_POST['prenom'] . '<br>'; // l'indice de $_POST correspond au 'name' du formulaire

  echo 'Description : ' . $_POST['description'] . '<br>';

  }

?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Mon formulaire</title>
  </head>

  <body>

    <h1>Formulaire 1</h1>
        <form method="post" action=""> <!-- method = comment vont circuler les données.
                                            action = l'url de destination des données. Si laissé vide, les données circulent sur la page du formulaire -->

      <label for="prenom">Prénom</label>
      <input type="text" id="prenom" name="prenom"> <!-- Les attributs name permettent de remplir les indices de $_POST -->
      <br>

      <label for="description">Description</label><!-- L'attribut for est là pour des raisons d'accessibilités : quand on clique sur le label,
         le curseur se posiitonne dans l'input d'id correspondant -->
      <textarea id="description" name="description"></textarea>
      <br>

      <input type="submit" name="validation" value="envoyer">

    </form>
  </body>

</html>
