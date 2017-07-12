<?php
class voiture {

  private $marque;
  private $etat;
  private $date;
  private $couleur;

  const ETAT = [ "bon", "exellent", "mauvais" ];

  public function __construct( $marque, $etat ){

    $this->setMarque($marque);
    $this->setEtat( $etat );

  }

  private function setMarque( $param ){
    if( strlen( $param ) >= 3 && strlen( $param ) <= 20 ){
      $this->marque = $param;
    }else{
      trigger_error('la marque n\'est pas bonne', E_USER_WARNING );
    }
  }

  private function setEtat( $param ){
    if( in_array( $param, self::ETAT ) ){
      $this->etat = $param;
    }else{
      trigger_error('l\'etat n\'est pas valide', E_USER_WARNING );
    }
  }

  // public function

  public function getMarque(){
    return $this->marque;
  }

  public function getEtat(){
    return $this->etat;
  }

  public function getInfos(){
    return $infos = [
      'marque' => $this->getMarque(),
      'etat' => $this->getEtat()
    ];
  }


}

?>
