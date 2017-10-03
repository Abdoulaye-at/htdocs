<?php
//site_oo/vendor/PDOManager.php

// Cette classe est un singleton. Le singleton est un design pattern, qui permet de créer une classe qui ne sera instanciable qu'une seule fois. 
// L'intérêt est d'avoir un seul objet qui récupéère une seule connexion à la BDD. 

class PDOManager
{
	private static $instance = NULL; // contiendra un objet de la classe PDOManager
	private $pdo; // Contiendra mon objet PDO (connexion à la BDD)
	
	private function __construct(){} // méthode private donc classe non instanciable. 
	private function __clone(){}
	
	public static function getInstance(){
		if(is_null(self::$instance)){
			self::$instance = new PDOManager;
		}
		return self::$instance;
	}
	
	public function getPdo(){
		require __DIR__ . '/../app/parameters.php';
		// require C:\xampp\htdocs\phpoo\site_oo\vendor
		
		$this -> pdo = new PDO('mysql:host=' . $parameters['host'] . ';dbname=' . $parameters['dbname'], $parameters['login'], $parameters['password']); 
		return $this -> pdo;
	}
}
//$pdomanager = new PDOManager; // Impossible d'instancier un objet comme on le fait d'habitude...

// $pdomanager = PDOManager::getInstance();
// $resultat = $pdomanager -> getPdo() -> query("SELECT * FROM produit");
// $produits = $resultat -> fetchAll(PDO::FETCH_ASSOC);

// echo '<pre>'; 
// print_r($produits);
// echo '</pre>'; 




