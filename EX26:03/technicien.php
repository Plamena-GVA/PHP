<?php

require_once "Employe.php";


class Technicien extends Employe {
	
	protected $grade;

    public function __construct($nomP="Bon", $prenomP="Megane", $ageP=25, $salaire = 2300 , $NumSecu = 9211191119111919, $gradeTTTTTT = "" ){

        parent::__construct($nomP, $prenomP, $ageP, $salaire , $NumSecu );
        $this-> grade=$gradeTTTTTT;

	}

    public function toString(){
        return parent::toString() . "\nGrade : ".$this-> grade;
    }
    public function prime($unePrime) {
        switch ($unePrime) {
            case 'A': case 300 :
                $this-> grade = "A";
                break;
                case 'B': case 200 :
                $this-> grade = "B";
                break;
                case 'C': case 100 :
                $this-> grade = "C";
                break;
            default:
             echo "Prime Inccorect";
                break;
        }
    }
    public function getPrime(){
		switch ($this->grade) {
            case 'A':
                return 300;
            case 'B':
                return 200;
            case 'C':
                return 100; 
            default:
                return 0;
        }
	}
    public function Calcul() {
        return $this->salaire + $this->getPrime();   
    }  
}
