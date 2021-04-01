<?php
//exemple de classe incluant du statique
class Voiture{
	
	protected $marque;
	protected $couleur;
	//attribut statique : existe une seule fois pour toute la classe
	//souvent public, contrairement aux attributs normaux
	//on veut la plupart du temps les accès depuis l'extérieur
	static $nbInstance = 0;
	//tableau gardé dans la classe, qui enregistre les informations de toutes les voitures créées
	static $tabVoitures = array();
	
	function __construct($m, $c){
		$this->marque = $m;
		$this->couleur = $c;
		//mise à jour de la valeur de l'attribut statique
		self::$nbInstance++;//self : la classe en cours, de la même manière que $this est l'objet en cours
		self::$tabVoitures[] = $this;
	}
	
	function getMarque(){
		return $this->marque;
	}
	
	function setMarque($newM){
		$this->marque = $newM;
	}
	
	function getCouleur(){
		return $this->couleur;
	}
	
	function setCouleur($newC){
		$this->couleur = $newC;
	}
	
	//possible mais à éviter : on perd tous les avantages de l'objet
	/*static setCouleurVoiture($voiture, $newC){
		$voiture->couleur = newC;
	}*/
	
	//méthode statique pour récupérer le nbInstance
	static function getNbInstance(){
		return self::$nbInstance;
	}
	
	
	function toString(){
		return "Voiture " . $this->couleur . " de marque " . $this->marque . "\n"; 
	}
}

echo Voiture::getNbInstance() . "\n";
//echo Voiture::$nbInstance . "\n";
$voiture1 = new Voiture("Ford","Rouge");
echo $voiture1->toString();
$voiture2 = new Voiture("Ferrari","Rouge");
echo $voiture2->toString();
echo Voiture::getNbInstance() . "\n";
//affichage de toutes les voitures crées avec cette classe
foreach(Voiture::$tabVoitures as $voiture){
	echo $voiture->toString();
}