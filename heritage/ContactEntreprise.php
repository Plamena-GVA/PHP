<?php
require_once "Personne.php";

class ContactEntreprise extends Personne{

    protected $numeroSiret;
	protected $adressePhysique;

    function __construct($nomU, $prenomU, $ageU, $telU, $NumSiret, $adresseP){
    
        parent::__construct($nomU, $prenomU, $ageU, $telU);
    
        $this->tel = str_replace("0", "+33", $this->tel, $x=1);
        $this->numeroSiret = $NumSiret;
        $this->adressePhysique = $adresseP;

    }

    public function getnSiret(){
        return $this->numeroSiret;
    }

    public function setnSiret($nouveaunSiret){
        
        $this->numeroSiret = $nouveaunSiret; 
    }

    public function getAdresseP(){
        return $this->adressePhysique;
    }

    public function setAdresseP($nouveauAdresseP){
        
        $this->adressePhysique = $nouveauAdresseP;
    }

    function toString(){
        return parent::toString() . "Numero Siret : " . $this->numeroSiret  . "\n" . "Adresse :" .$this->adressePhysique . "\n" ;
    }

}
