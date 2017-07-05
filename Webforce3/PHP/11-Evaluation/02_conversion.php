<?php

  //-------------//
 // Exercice 2 //
//-----------//

// Créer une fonction permettant de convertir un montant en euros vers un montant en dollars américains

// Cette fonction prendra deux paramètres :
// ● Le montant de type int ou float
// ● La devise de sortie (uniquement EUR ou USD).
// Si le second paramètre est “USD”, le résultat de la fonction sera, par exemple :
// 1 euro = 1.085965 dollars américains
// Il faut effectuer les vérifications nécessaires afin de valider les paramètres.


// Variables
$resultat = '';

// Fonction de conversion
function conversion($montant, $devise){
  if (is_numeric($montant) && $montant > 0) {
    # code...

    if ($devise == 'EUR') {
      $resultat =  $montant . ' Euro = ' . $montant * 1.085965 .' dollards américains</p>';

    } elseif($devise == 'USD'){
      $resultat = $montant . ' Dollards américains = ' . $montant / 1.085965 .' Euros</p>';

    } else {
      $resultat = '<p class="lead">Veuillez entrer un nombre valide !</p>';
    }
  }

  echo $resultat;
}

conversion(100, 'EUR');

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Conversion</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="inc/css/bootstrap.min.css">
  </head>
  <body>
    <?= $resultat;  ?>
  </body>
</html>
