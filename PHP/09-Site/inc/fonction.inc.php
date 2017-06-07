<?php

function debug($var){
  echo'<div style="background:orange; padding: 5px;">';
    echo '<pre>'; print_r($var); echo '</pre>';
  echo '</div>';
}

//---------- Fonctions membre ----------//

function internauteEstConnecte(){
  if(isset($_SESSION['membre'])){ // Si l'indice membre existe dans $_SESSION, c'est que le membre s'est connecté
    return true;
  } else {
    return false;
  }
  // équivaut à : return (isset($_SESSION['membre']));
}

function internauteEstConnecteEtEstAdmin(){
  if(internauteEstConnecte() && $_SESSION['membre']['statut'] == 1){ // si l'internaute est connecté ET que son statut vaut 1, alors il est ADMIN
    return true;
  } else {
    return false;
  }
  // équivaut à : return (internauteEstConnecte() && $_SESSION['membre']['statut'] == 1);
}

//------------------------------------------//
function executeRequete($req, $param = array()){
  if(empty($param)){
    foreach ($param as $indice => $valeur) {
      $param[$indice] = htmlspecialchars($valeur, ENT_QUOTES); // évite les injections css et xcss en neutralisant les caractères spéciaux
    }
  }
  global $pdo;
  $r = $pdo->prepare($req);
  $succes = $r->execute($param);

  if(!$succes){
    die('Erreur sur la requête SQL'); // arrête le script et affiche un msg d'erreur
  }

  return $r;
}
