<?php

require './User.php';

$user = new User();
var_dump($user -> getFirstName());

//echo $user->firstName;

// appel du setter pour modifier la valeur de l'attribut
$user 
    -> setFirstName('Abdoulaye')
    -> setLastName('Thiaw')
    -> setAge('21');

// appel au getter pour accéder à la valeur de l'attribut
echo '<br>';
echo $user->getLastName();
echo '<br>';
echo $user->getFirstName();
echo '<br>';
echo $user->getAge();
echo '<hr>';
