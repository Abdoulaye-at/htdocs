<h1>Page détail des articles</h1>

<?php
//------------------------//
// La superglobale $_GET //
//----------------------//

// $_GET représente l'URL : il s'agit d'une superglobale, donc d'un array

// Superglobale signifie que cette variable est disponible dans tout les contextes du script, y compris dans les fonction

// Les informations transitent dans l'URL de la manière suivante :
// ?induce=valeur&indice2=valeur2

// La superglobale $_GET transforme ces informations passées dans l'URL en cet array:
// $_GET = array('indice' => 'valeur', 'indice2' => 'valeur2' )

echo '<pre>'; var_dump($_GET); echo '</pre>'; // Pour vérifier que je reçois quelque chose dans l'url

// On met une condition qui vérifie qu'on a bien les infos dans l'URL
if(isset($_GET['article']) && isset($_GET['couleur']) && isset($_GET['prix'])) {
echo '<p> Article : ' . $_GET['article'] . '</p>';
echo '<p> Couleur : ' . $_GET['couleur'] . '</p>';
echo '<p> Prix : ' . $_GET['prix'] . '</p>';
} else {
  echo "<p> Ce produit n'existe pas </p>";
}
