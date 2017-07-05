<?php

  //-----------------//
 // ~ ~ Cookies ~ ~ //
//-----------------//

/*
Définition :
Un cookie est un petit fichier (4 ko maxi), déposé par le serveur du site dans le navigateur de l'internaute et qui peut contenir des informations. Les cookies sont automatiquement renvoyés au serveur web par le navigateur lorsque l'internaute navigue dans les pages concernées par les cookies.

PHP permet de récupérer très facilement les données contenues dans un cookie, ces informations sont récupérées dans la superglobale $_COOKIE.

Précaution à prendre avec les cookies : étant sauvegardés sur le poste de l'internaute, un cookie peut potentiellement être détourné ou dérobé. On évite donc de stocker des données sensibles.

*/

// Application pratique : nous allons stocker la lanque choisie par l'internaute dans un cookie afin de lui afficher le site dans cette langue à chaque visite

// On détermine une variable $langue :
if(isset($_GET['langue'])) {
  // si on a cliqué sur un des liens
  $langue = $_GET['langue'];
} elseif (isset($_COOKIE['langue'])) {
  // si on a reçu un cookie appelé 'langue'
  $langue = $COOKIE['langue'];
} else {
  // sinon, on affecte la langue 'fr' par défaut
  $langue = 'fr';
}

// Création du cookie :
$un_an = 365 * 24 * 3600; // variable qui représente un an exprimé en secondes
setCookie('langue', $langue, time() + $un_an); // envoi un cookkie dans le navigateur de l'internaute : setCookie('nom', 'valeur', 'date d'expiration en timestamp')
// Pour rendre un cookie inactif, on le programme à une date passée ou à 0 car il n'existe pas de fonction pour supprimer un cookie

// Affichage de la langue
echo 'langue : ';
switch ($langue) {
  case 'fr': echo 'français'; break;
  case 'es': echo 'espagnol'; break;
  case 'it': echo 'italien'; break;
  case 'en': echo 'anglais'; break;
  default: echo 'français';
}
//----------------- HTML ---------------------//
?>

<h1>Votre langue</h1>
<ul>
  <li><a href="?langue=fr">Français</a></li>
  <li><a href="?langue=es">Espagnol</a></li>
  <li><a href="?langue=it">Italien</a></li>
  <li><a href="?langue=en">Anglais</a></li>
</ul>
