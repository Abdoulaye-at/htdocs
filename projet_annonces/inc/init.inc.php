<?php

/*
  Le fichier init.inc.php sera inclus dans tout les scripts ( hors les fichiers .inc eux-mêmes ) pour initialiser les éléments suivants :
  - connexion à la bdd
  - création ou ouverture de session
  - définir le chemin du site
  - inclure le fichier fonction.inc.php
*/

// Connexion à la BDD :
$pdo = new PDO('mysql:host=localhost;dbname=annonceo', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

// Session :
session_start();

// Définition du chemin du site
define('RACINE_SITE', '/projet_annonces'); // indique le dossier dans lequel se trouve les sources du site

// Variables d'affichage de contenu :
$contenu = '';
$contenu_gauche = '';
$contenu_droite = '';

// inclusion des fonctions
require_once('fonction.inc.php');
