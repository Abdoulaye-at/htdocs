<?php

use Symfony\Component\Debug\ErrorHandler;
use Symfony\Component\Debug\ExceptionHandler;

// enregistrement des services Error et Exception :
ErrorHandler::register();
ExceptionHandler::register();
// on enregistre  notre application au service Doctrine.
$app ->register(new Silex\Provider\DoctrineServiceProvider());
//on enregistre notre application au service TWIG:
$app ->register(new Silex\Provider\TwigServiceProvider(),array(

  'twig.path' => __DIR__.'/../views'));

// on enregistre notre application au service asset:
$app ->register(new Silex\Provider\AssetServiceProvider(), array(

  'asset.version' => 'V1' ));
// on enregistre $app['dao.produit'] notre objet de la classe produitDAO. de cette  maniere on aura besoin, on utilisera $app['dao.produit']
$app['dao.produit'] = function($app){
  return new BOUTIQUE\DAO\ProduitDAO($app['db']);
};
// on enregistre $app['dao.membre'] notre objet de la classe membreDAO. de cette  maniere on aura besoin, on utilisera $app['dao.membre']
  $app['dao.membre'] = function($app){
    return new BOUTIQUE\DAO\MembreDAO($app['db']);
};
