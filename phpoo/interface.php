<?php

interface Mouvement
{
	public function demarrer(); 
	public function tourneDroite(); 
	public function tourneGauche(); 
}

class Bateau implements Mouvement 
{
	public function demarrer(){
		// traitements...
	}
	
	public function tourneDroite(){
		
	}
	
	public function tourneGauche(){
		
	}
	
}

class Avion implements Mouvement
{
	public function demarrer(){
		// traitements...
	}
	
	public function tourneDroite(){
		
	}
	
	public function tourneGauche(){
		
	}
}

















