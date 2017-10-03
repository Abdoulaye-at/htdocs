<?php
//BOUTIQUE/src/DAO/DAO.php

namespace BOUTIQUE\DAO;

use Doctrine\DBAL\Connection;


abstract class DAO
{
	private $db; 
	
	public function __construct(Connection $db){
		$this -> db = $db;
	}

	public function getDb(){
		return $this -> db;
	}
	
	
	abstract protected function buildEntityObject($infos);
	
}