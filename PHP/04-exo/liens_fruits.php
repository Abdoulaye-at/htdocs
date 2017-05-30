<?php

/*
exercice :
faire 4 liens html avec le nom des fruits (cerise, banane, pomme, peche)
afficher le prix de fruit choisit pour 1000g quand on clique dessus (dans liens_fruits.php)
*/

echo '<pre>'; var_dump($_GET); echo '</pre>';

include('fonction.inc.php');

if(isset($_GET['fruits'])) echo calcul($_GET['fruits'], 1000);

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Nos fruits</title>
  </head>

  <body>
    <h1>Nos fruits</h1>
    <a href='?fruits=bananes'>Bananes</a>
    <a href='?fruits=cerises'>Cerises</a>
    <a href='?fruits=pommes'>Pommes</a>
    <a href='?fruits=peches'>Pêches</a>
  </body>
</html>
