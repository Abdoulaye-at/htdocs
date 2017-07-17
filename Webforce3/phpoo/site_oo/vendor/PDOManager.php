<?php
// Cette classe est un sinlgeton. Le singleton est un design pattern, qui permet de créer une classe qui ne sera instanciable qu'une seule fois.
// L'intêret est d'avoir un seul objet qui récupère une seule connexion à la BDD

class PDOManager  {
  private static $instance = Null; // contiendra un objet de la classe PDOManager
  private $pdo; // Contiendra mon objet PDO (connexion à la BDD)

  private function __construct(){} // méthode private donc class non instanciable
  private function __clone(){} // méthode private donc objet non duplicable

  public static function getInstance(){
    if (is_null(self::$instance)) {
      self::$instance = new PDOManager;
    }
    return self::$instance;
  }

  public function getPDO(){
    require __DIR__.'/../app/parameters.php'; // DIR= DIRECTORY : C:\xampp\htdocs\Webforce3\phpoo\site_oo\vendor

    $this -> pdo = new PDO('mysql:host='.$parameters['host'].';dbname='.$parameters['dbname'],$parameters['login'],$parameters['password']);
    return $this -> pdo;
  }
}

$pdomanager = PDOManager::getInstance();
$resultat = $pdomanager -> getPdo() -> query("SELECT * FROM produit");

$produits = $resultat -> fetchAll(PDO::FETCH_ASSOC);

// echo '<pre>';
// print_r($produits);
// echo '</pre>';
