<?php
require_once ('../inc/init.inc.php');

// Exercice :
/*
  Vous allez créer la page de gestion des membres dans le back-office :
  1- Seul l'administrateur doit avoir accès à cette page. Les membres sont redirigés vers la page connexion.php
  2- Afficher dans cette page tous les membres inscrits sur le site sous forme de table html, contenant toutes les infos sauf le mot de passe.
  3 -Bonus- Dans cette page, ajouter la possibilité à l'admin de pouvoir supprimer un membre.
  4 -Bonus- Donner la possibilité à l'admin de modifier le statut d'un membre pour en faire un admin

*/


//--------TRAITEMENT--------//
// L'internaute n'est pas l'administrateur //
if(!internauteEstConnecteEtEstAdmin()){
  // on le renvoie vers sa page de profil
  header('location:../connexion.php');
  exit();
}
$resultat = executeRequete("SELECT * FROM membre");

$contenu .= '<table class="table">';
  $contenu .= '<tr>';
    $contenu .= $donnees['pseudo'] . '<br>';
    $contenu .= $donnees['nom'] . '<br>';
    $contenu .= $donnees['prenom'] . '<br>';
    $contenu .= $donnees['email'] . '<br>';
    $contenu .= $donnees['civilite'] . '<br>';
    $contenu .= $donnees['ville'] . '<br>';
    $contenu .= $donnees['code_postal'] . '<br>';
    $contenu .= $donnees['adresse'] . '<br>';
  $contenu .= '</tr>';
$contenu .= '</table>';

$membres = executeRequete("SELECT * FROM membre WHERE id_membre ='2'");
$membre = $membres -> fetch(PDO::FETCH_ASSOC);
foreach ($membres as $membre) {
  debug($membre);
  # code...
}


//--------AFFICHAGE--------//
require_once ('../inc/haut.inc.php');
echo $contenu;
?>


<?php
require_once ('../inc/bas.inc.php');
