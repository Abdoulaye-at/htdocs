<?php
include 'class.php';

// Création des objets chats
$minou = new Chat();
$minou -> setPrenom('Julio');
$minou -> setAge(7);
$minou -> setCouleur('noire');
$minou -> setSexe('Male');
$minou -> setRace('Savannah');
$minou -> getInfos();


$mattou = new Chat();
$mattou -> setPrenom('Elvis');
$mattou -> setAge(9);
$mattou -> setCouleur('roux');
$mattou -> setSexe('Femelle');
$mattou -> setRace('Persian');
$mattou -> getInfos();

$minou = new Chat();
$minou -> setPrenom('Albert');
$minou -> setAge(12);
$minou -> setCouleur('noir');
$minou -> setSexe('Male');
$minou -> setRace('Siamois');
$minou -> getInfos();
