<?php

class User{
    private $firstName;
    private $lastName;
    private $age;
    
    /*
     * Mise en place de la classe     
     * Si ccette classe existe, elle est appelée par l'instanciation
     */
    
    public function __construct($firstName = null) {
        $this->setFirstName($firstName);
    }
    
    public function getFirstName() {
        return $this->firstName;
    }
    
    public function setFirstName($value) {
        $this->firstName = $value;
        return $this;
    }
    
    public function getLastName() {
        return $this->lastName;
    }
    
    public function setLastName($value) {
        $this->lastName = $value;
        return $this;
    }
    
    public function getAge() {
        return $this->age;
    }
    
    public function setAge($age) {
        $this->age = $age;
        return $this;
    }
}


