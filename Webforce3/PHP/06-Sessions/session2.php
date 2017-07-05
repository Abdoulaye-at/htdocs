<?php

// ouverture de la session en cours :
session_start();

echo 'La session est accessible dans tout les scripts du site comme ici';
echo '<pre>'; print_r($_SESSION); echo '</pre>';

// Conclusion :
// Ce fichier n'a pas de lien avec session1.php, il n'y a pas d'inclusion, il pourrait être dans n'importe quel dossier du site, s'appeler n'importe comment, et pourtant les infos du fichier de session restent accessible grâce à session_start.
