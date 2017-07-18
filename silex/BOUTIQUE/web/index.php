<?php

require_once __DIR__ .'/../vendor/autoload.php';

$app = new Silex\Application();

// Code crée à l'étape 2.2
// Code supprimé à l'étape 6.4
// $app -> get('/', function(){
//   return 'Hello world !';
// });
//
// $app -> get('/hello/{name}', function($name) use($app){
//   return 'Hello ' . $app -> escape($name);
// });
// TEST : BOUTIQUE/web/index.php/hello/abdoulaye

require __DIR__ . '/../app/routes.php';

$app -> run();
