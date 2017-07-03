<?php
require_once 'inc/init.inc.php';

//--------TRAITEMENT--------//
// Redirection si visiteur non connecté
if(!internauteEstConnecte()){
  header('location:connexion.php');
  exit();
}

// Prepare le profil à afficher
debug($_SESSION);
$contenu .= "<h1>Bonjour " . $_SESSION['membre']['pseudo'] . "</h1>";
$contenu .= "<p>Votre email est " . $_SESSION['membre']['email'] . "</p>";




//--------AFFICHAGE--------//
require_once 'inc/haut.inc.php';
echo $contenu;
require_once 'inc/bas.inc.php';
