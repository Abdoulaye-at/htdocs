<?php

namespace Controller;

use \W\Controller\Controller;

class DefaultController extends Controller
{

	/**
	 * Page d'accueil par défaut
	 */
	public function home(){
		$this->show('default/home');
	}
	public function a_propos(){
		$this->show('default/a_propos');
	}
	public function competences(){
		$this->show('default/competences');
	}
	public function etudes_exp(){
		$this->show('default/etudes_exp');
	}
	public function portfolio(){
		$this->show('default/portfolio');
	}
	public function contact(){
		$this->show('default/contact');
	}

}
