<?php
  //-------------//
 // EXERCICE 1 //
//-----------//

// Créer un tableau en PHP contenant les infos suivantes :
 // Prénom ● Nom ● Adresse ● Code Postal ● Ville ● Email ● Téléphone ● Date de naissance au format anglais (YYYY-MM-DD)

 $coordonnees = array(  'Nom'               => 'Thiaw',
                        'Prénom'            => 'Abdoulaye',
                        'Adresse'           => '12 rue Gambetta',
                        'Code Postal'       => '93500',
                        'Ville'             => 'Pantin',
                        'Email'             => 'abdoulaye.at@gmail.com',
                        'Téléphone'         => '0148402534',
                        'Date de naissance' => '1996/08/04');
// echo '<pre>'; echo var_dump($coordonnees); echo '</pre>';

// Je déclare une variable d'affichage pour le html
$contenu = '';

// function conversion($date, $format) {
// $objetdate = new DateTime($date);
//
//   if ($format == $objetdate->format('Y-m-d')) {
//     echo '<li">Date format Fr : ' . $objetdate->format('d-m-Y').'</li>';
//   }
// }

// A l’aide d’une boucle, afficher le contenu de ce tableau (clés + valeurs) dans une liste HTML. La date sera affichée au format français (DD/MM/YYYY).
foreach ($coordonnees as $indice => $valeur) {

  // $date = new DateTime($indice['Date de naissance']);
  // echo $date->format('d-m-Y');

  $contenu .= "<ul  class='list-group'>
                <li class='list-group-item'>$indice => $valeur</li>
              </ul>";
}

 ?>

 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title>EVAL : 01-Présentation</title>
     <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="inc/css/bootstrap.min.css">
   </head>

   <body>
      <?php echo $contenu ?>
   </body>
 </html>
