<?php
require_once './animal.php';


protected $espece = 'chat';

public function identifier() {
    return parent::identifier() . 'je suis un animal'
}

public fonction crier(){
    echo 'miaou';
}

final public function ronronner(){
    echo 'ronron';
}

