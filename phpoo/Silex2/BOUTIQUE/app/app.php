<?php

use Symfony\Component\Debug\ErrorHandler;
use Symfony\Component\Debug\ExceptionHandler;

// enregistrement des services Error et Exception :
ErrorHandler::register();
ExceptionHandler::register();

// on enregistre notre application au service Doctrine. 
$app -> register(new Silex\Provider\DoctrineServiceProvider());

// On enregistre notre application au service TWIG : 
$app -> register(new Silex\Provider\TwigServiceProvider(), array(
	'twig.path' => __DIR__ . '/../views'
));

// On enregistre notre application au service Asset : 
$app -> register(new Silex\Provider\AssetServiceProvider(), array(
	'assets.version' => 'v1'
));

$app -> register(new Silex\Provider\SessionServiceProvider());
$app->register(new Silex\Provider\SecurityServiceProvider(), array(
    'security.firewalls' => array(
        'secured' => array(
            'pattern' => '^/',
            'anonymous' => true,
            'logout' => true,
            'form' => array('login_path' => '/login', 'check_path' => '/login_check'),
            'users' => function () use ($app) {
                return new BOUTIQUE\DAO\MembreDAO($app['db']);
            },
        ),
    ),
));


// on enregistre dans $app['dao.produit'] notre objet de la classe ProduitDAO. De cette manière quand on en aura besoin, on utilisera $app['dao.produit']
$app['dao.produit'] = function($app){
	return new BOUTIQUE\DAO\ProduitDAO($app['db']);
};


// on enregistre dans $app['dao.membre'] notre objet de la classe MembreDAO. De cette manière quand on en aura besoin, on utilisera $app['dao.membre']
$app['dao.membre'] = function($app){
	return new BOUTIQUE\DAO\MembreDAO($app['db']);
};


// on enregistre dans $app['dao.commentaire'] notre objet de la classe CommentaireDAO. De cette manière quand on en aura besoin, on utilisera $app['dao.commentaire']
$app['dao.commentaire'] = function($app){
	$commentaireDao = new BOUTIQUE\DAO\CommentaireDAO($app['db']);
	$commentaireDao -> setProduitDao($app['dao.produit']);
	
	return $commentaireDao; 
};












