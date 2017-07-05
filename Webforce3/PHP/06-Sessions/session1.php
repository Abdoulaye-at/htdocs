<?php

  //---------//
 // SESSION //
//---------//

/*
Principe : un fichier temporaire appelé session est crée sur le serveur, avec un identifiant unique. Cette session est liée à un internaute car, dans le même temps, un cookie est déposé dans le navigateur de l'internaute avec l'indentifiant.
Ce cookie devient inactif lorsqu'on quitte le navigateur : la session s'interrompt alors.

Le fichier de session peut contenir toute sorte d'informations, y compris sensibles, car il n'est pas accessible par l'internaute. On y stocke donc par exemple des logins de connexion, des paniers d'achat etc...

Si l'internaute modifie le cookie relatif à une session, le lien avec celle-ci est rompue et l'internaute est déconnecté.

On récupère les données dans la superglobale $_SESSION.

*/

// Création ou ouverture d'une session :
session_start(); // permet de créer un fichier de session sur le serveur, ou de l'ouvrir s'il existe déja

// Remplissage de la session
$_SESSION['pseudo'] = 'tintin';
$_SESSION['mdp'] = 'milou';

echo '1- La session après remplissage';
echo '<pre>'; print_r($_SESSION); echo '</pre>'; // affiche les infos contenues dans la session, le fichier se trouve sur 'xampp/tmp/'

// Vider une partie de la session
unset($_SESSION['mdp']);

echo '2- La session après suppression du mdp';
echo '<pre>'; print_r($_SESSION); echo '</pre>';

// Supprimer entièrement la session :
//session_destroy();
echo '3 - La session après session_destroy()';
echo '<pre>'; print_r($_SESSION); echo '</pre>'; // on voit toujours la session à cet endroit car le session_destroy a la particularité d'être executé qu'à la fin du script, c'est à dire après ce print_r.
