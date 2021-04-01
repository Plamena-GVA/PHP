<?php
class Employe{
	
	protected $nom;
	protected $prenom;
	protected $age;
	protected $salaire;
    protected $numSecu;

    public function __construct($nomP="Bon", $prenomP="Megane", $ageP=25, $salaire = 2300, $NumSecu = 9211191119111919){
		$this->nom = $nomP;
		$this->prenom = $prenomP;
		$this->age = $ageP;
		$this->salaire = $salaire;
        $this->numSecu = $NumSecu;

	}

    public function Augmentation($salaireA) {
        $this->salaire += $salaireA;
        
    }

    public function toString(){
        return "Nom : " . $this->nom . "\nPrenom : " . $this->prenom . "\nAge : " . $this->age . "\n Salaire : " . $this->salaire . "Num Secu :" . $this->numSecu . "\n";
    }
}

$Lalou = new Employe() ;
echo $Lalou -> toString();