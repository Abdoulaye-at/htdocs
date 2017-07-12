<?php

abstract class Animal{
    protected $espece = 'indefinie';
    private $color = 'bleu';
    
    public function identifier(){
        return 'je suis un animal';
    }
    
    public function getEspece(){
        return $this-> espece;
    }
    
    private function displayColor(){
        echo $this->color;
    }
    
}
