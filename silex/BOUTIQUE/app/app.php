<?php

use Symfony\Component\Debug\ErrorHandler;
use Symfony\Component\Debug\ExceptionHandler;

// enregistrement des services Error et Exception :
ErrorHandler::register();
ExceptionHandler::register();

// on enregistre notre application au service Doctrine
$app -> register(new Silex\Provider\DoctrineServiceProvider());

// on enregistre dans $app['dao.produit'] notre objet de la classe ProduitDAO. De cette manière quand on en aura besoin, on utilisera $app['dao.produit']
$app['dao.produit'] = function($app){
  return new BOUTIQUE\DAO\ProduitDAO($app['db']);
};
