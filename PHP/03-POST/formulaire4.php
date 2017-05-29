<?php

/*
Exercice :
  - Réaliser un formulaire 'pseudo' et 'email' dans formulaire3.php
  - Récupérer les données saisies dans le formulaire dans la page formulaire4.php et les Afficher

  - De plus, si le champ pseudo est laissé vide, afficher un message dans formulaire4.php qui précise que le champ est obligatoire

*/


echo '<pre>'; var_dump($_POST); echo '<pre>';

if (!empty($_POST)) { // Si $_POST n'est pas vide, le formulaire a été soumis

  if (empty($_POST['Pseudo'])) {
    echo 'Attention, ce champ est obligatoire';
  } else { 
    echo 'Pseudo : ' . $_POST['Pseudo'] . '<br>'; // l'indice de $_POST correspond au 'name' du formulaire

    echo 'Email : ' . $_POST['Email'] . '<br>';
  }
}

?>
