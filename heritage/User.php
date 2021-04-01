<?php
require_once "Personne.php";
//User hérite de la classe Personne
class User extends Personne{
	
	//attributs supplémentaires par rapport à Personne
	protected $email;
	protected $password;
	
	//constructeur de la classe enfant
	function __construct($nomU, $prenomU, $ageU, $telU, $emailU, $passU){
		/*$this->nom = $nomU;
		$this->prenom = $prenomU;
		$this->age = $ageU;
		$this->tel = $telU;*/
		//réutilisation du constructeur du parent
		parent::__construct($nomU, $prenomU, $ageU, $telU);
		//ajout d'un indicateur téléphonique sur le numéro : permet de tester la mise à jour d'un attribut déjà existant
		$this->tel = str_replace("0", "+33", $this->tel, $x=1);
		$this->email = $emailU;
		$this->password = $passU;
	}
	
	//getters/setters des nouveaux attributs
	//les anciens seront appelés automatiquement, pas besoin de les réécrire
	
	//getter : méthode de récupération de valeur d'attribut
	public function getEmail(){
		return $this->email;
	}
	
	//setter : méthode de mise à jour de valeur d'attribut
	public function setEmail($nouvelEmail){
		
		$this->email = $nouvelEmail; //le mot-clé le plus utilisé sans doute
	}
	
	//getter : méthode de récupération de valeur d'attribut
	public function getPassword(){
		return $this->password;
	}
	
	//setter : méthode de mise à jour de valeur d'attribut
	public function setPassword($nouveauPassword){
		
		$this->password = $nouveauPassword; //le mot-clé le plus utilisé sans doute
	}
	
	//on peut aussi appeler les autres méthodes de la classe parent !
	function toString(){
		return parent::toString() . "Mail : " . $this->email . "\n";
	}
	
}