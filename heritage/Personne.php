<?php
//un premier exemple de classe en PHP
class Personne{
	//attributs de la classe : ce dont mes objets sont faits
	//attributs protected : accessibles depuis l'intérieur de la classe et de ses classes enfant
	protected $nom;
	protected $prenom;
	protected $age;
	protected $tel;
	
	//méthodes : ce que l'objet peut faire / ce qu'on peut faire sur l'objet
	
	//constructeur : fabrique mes objets
	//constructeur par défaut, sans paramètres
	/*function __construct(){
		//ne pas oublier this ou ça va casser
		$this->nom = "Enrici";
		$this->prenom = "Cyril";
		$this->age = 30;
		$this->tel = "0493660499";
	}*/
	

	
	//constructeur paramétré : beaucoup plus polyvalent
	public function __construct($nomP="Enrici", $prenomP="Cyril", $ageP=30, $telP="0493660499"){
		$this->nom = $nomP;
		$this->prenom = $prenomP;
		$this->age = $ageP;
		$this->tel = $telP;
	}
	
	//getter : méthode de récupération de valeur d'attribut
	public function getNom(){
		return $this->nom;
	}
	
	//setter : méthode de mise à jour de valeur d'attribut
	public function setNom($nouveauNom){
		
		$this->nom = $nouveauNom; //le mot-clé le plus utilisé sans doute
	}
	
	//getter : méthode de récupération de valeur d'attribut
	public function getPrenom(){
		return $this->prenom;
	}
	
	//setter : méthode de mise à jour de valeur d'attribut
	public function setPrenom($nouveauPrenom){
		
		$this->prenom = $nouveauPrenom; //le mot-clé le plus utilisé sans doute
	}
	
	//getter : méthode de récupération de valeur d'attribut
	public function getAge(){
		return $this->age;
	}
	
	//setter : méthode de mise à jour de valeur d'attribut
	public function setAge($nouvelAge){
		
		$this->age = $nouvelAge; //le mot-clé le plus utilisé sans doute
	}
	
	//getter : méthode de récupération de valeur d'attribut
	public function getTel(){
		return $this->tel;
	}
	
	//setter : méthode de mise à jour de valeur d'attribut
	public function setTel($nouveauTel){
		
		$this->tel = $nouveauTel; //le mot-clé le plus utilisé sans doute
	}
	
	//représentation string de l'objet (par exemple à but d'affichage)
	public function toString(){
		return "Nom : " . $this->nom . "\nPrenom : " . $this->prenom . "\nAge : " . $this->age . "\nNum Tel : " . $this->tel . "\n";
	}
	
	
}

//pour ce premier exemple le code utilisant la classe est laissé dans ce fichier. ça ne durera pas
/*
//on crée un nouvel objet depuis la classe Personne
// = on instancie Personne = on crée une instance de Personne
$personneTest = new Personne();
echo $personneTest->getNom();

//attention : l'affichage direct de la personne demande une conversion qui n'est pas gérée par défaut -> FATAL ERROR
//echo $personneTest;

//appel de méthode/fonction de la classe
$personneTest->setNom("Cyril");
//récupération d'une valeur d'attribut appartenant à mon objet
echo $personneTest->getNom() ."\n";
print_r($personneTest);
//var_dump($personneTest);
$personne2 = new Personne();
$personne2->setNom("Remi");
print_r($personne2);
$personne3 = new Personne("Jonathan", "Amselem", 32, "95959590545");
print_r($personne3);
//attention à l'ordre des paramètres !
//ATTENTION avec les variables objet
echo "experience sur les adresses objet\n";
$personne4 = new Personne("Megane", "Lindon", 25);
var_dump($personne4);


$personne5 = $personne4; //on a pas créé un nouvel objet mais on pointe sur un objet déjà existant
$personne5->setNom("Lucas");
var_dump($personne5);
var_dump($personne4);
$personne4->setNom("Antoine");
var_dump($personne5);
$personne5 = new $personne4; //on crée un nouvel objet avec les valeurs par défaut, via le constructeur de l'objet $personne4 : possible, mais difficile à interpréter
var_dump($personne5);

$nom = readline("entrez un nom");
$prenom = readline("entrez un prénom");
$age = readline("entrez un age");
$tel = readline("entrez un numéro de téléphone");
$personneReelle = new Personne($nom, $prenom, $age, $tel);
echo $personneReelle->toString();*/