<?php
//-----------//
// Exercice //
//---------//
/*
1. Réaliser un formulaire permettant de sélectionner un fruit dans une liste déroulante, et de saisir un poids dans un input.
2. Traiter les informations du formulaire pour afficher le prix du fruit choisit pour le poids saisi, toujours en passant par la fonction calcul.
*/

echo '<pre>'; var_dump($_POST); echo '</pre>';

include('fonction.inc.php');

if(!empty($_POST)) {
  echo calcul($_POST['select'], $_POST['Poids']);
}


?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Exo formulaire</title>
  </head>

  <body>

    <h1>Exo formulaire</h1>
      <form method="post" action="formulaire.php">
        <select name="select">
          <option  value="cerises">Cerises</option>
          <option value="pommes" >Pommes</option>
          <option value="bananes">Bananes</option>
          <option value="peches">Peches</option>
        </select>
        <br>

      <label for="Poids">Poids</label>
      <input type="text" id="Poids" name="Poids">
      <br>


      <input type="submit" name="validation" value="envoyer">

    </form>
  </body>

</html>
