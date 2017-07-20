<?php

require_once __DIR__ . '/../vendor/autoload.php';

$app = new Silex\Application(); 


// Code créé à l'étape 2.2
// Code supprimé à l'étape 6.4
// $app -> get('/', function(){
	// return 'Bonjour tout le monde !';
// });



// $app -> get('/hello/{name}', function($name) use($app){
	// return 'Hello ' . $app -> escape($name);
// });




//$app['debug'] = true;

require __DIR__ . '/../app/config/dev.php';
require __DIR__ . '/../app/app.php';
require __DIR__ . '/../app/routes.php';

$app -> run(); 







