<?php

abstract class Joueur
{
	public function seConnecter(){
		return $this -> etreMajeur();
	}
	
	abstract public etreMajeur();  
	// Une méthode abstraite n'a pas de corps. 
	// Une méthode abstraite doit OBLIGATOIREMENT etre redéfinie dans le cadre de l'héritage. 
}

//--------------
class JoueurFr extends Joueur{
	public etreMajeur(){
		return 18;
	}
}
//--------------
class JoueurUs extends Joueur{
	public etreMajeur(){
		return 21;
	}
}
