<h1>Couleur de mes fruits</h1>

<?php

//-----------------------------------------*
// Exercices :
/*------------------------------------------------
Dans listeFruits.php : créer 3 liens banane, kiwi, et cerise
Passer le fruit dans l'URL en GET à la page couleur.php
Dans couleur.php : rtécupérer le fruit dans l'URL, et afficher sa couleur dans un paragraphe
--------------------------------------------------*/

echo '<pre>'; var_dump($_GET); echo '</pre>';

if(isset($_GET['article'])) {
  // Si l'indice article existe, c'est qu'il est dans l'URL
  if ($_GET['article'] == 'banane') {
    echo '<p> La couleur des bananes est le jaune </p>';
  } elseif ($_GET['article'] == 'kiwi') {
    echo "<p> La couleur du kiwi est le vert </p>";
  } elseif ($_GET['article'] == 'cerise'){
      echo "<p> La couleur des cerises est le rouge </p>";
    }
} else {
    echo "<p> Article inexistant dans la boutique </p>";
  }
