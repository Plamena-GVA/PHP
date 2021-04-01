<?php

interface GestionAnimaux{
    public function achat();
    public function manger();
    public function vente();


}

class Nourriture{
    public $type;
    public $quantite;
    public $label;

    static $stock = array();

    function __construct($Type,$Label,$Quantite){

        $this->type=$Type;
        $this->label = $Label;
        $this->quantite=$Quantite;

        $stockIndex = Nourriture::lookStock($Type);
        if ($stockIndex >=0 ){
            self::$stock[$stockIndex]["quantite"]+= $Quantite;
            echo "\nLe stock de $Label est maintenant a".self::$stock[$stockIndex]["quantite"];
        }else{
            array_push(self::$stock,array("type"=>$Type,"label"=>$Label,"quantite"=>$Quantite));
            echo "\nAjout de $Label*$Quantite dans le stock";
        }
    }

   function getStock($type='tous'){
        if ($type == 'tous'){
            return self::$stock;
        }else{
            $stockIndex = lookStock($type);
            if ($stockIndex !="false"){
                return self::$stock[$stockIndex];
            }else{
                return false;
            }
        }
   }
   
   static function lookStock($Type){
        foreach (self::$stock as $index=> $value){
            if ($value['type'] == $Type){
                return $index;
            }
        }
        return -1;
   } 
   static function lookStockByLabel($Label){
    foreach (self::$stock as $index=> $value){
        if ($value['label'] == $Label){
            return $index;
        }
    }
    return -1;
}

   function toString(){
       return "\nType = ".$this->type."\nLabel = ".$this->label."\nQuantité = ".$this->quantite."Kg";
   }

   static function removeFood($typeNourriture,$Quantite){
        $index = Nourriture::lookStockByLabel($typeNourriture);
        
        if ($index >=0 ){
            self::$stock[$index]["quantite"] -= $Quantite;
        }else{
            echo "\n\nIl n'y a plus de $typeNourriture\n";
        }
   }

    static function afficher(){
       echo "\n\n------Affichage des stocks !------\n\n";
       foreach(self::$stock as $food){
           echo "\nLabel : ".$food['label']."\nQuantité : ".$food['quantite'];
       }
   }

}

class Animal {

    protected $nom;
    protected $prix;
    static $listAnimaux = array();

    function __construct($Nom, $Prix){
		$this->nom = $Nom;
		$this->prix = $Prix;
	}

    function getCurrentPets(){
        return self::$listAnimaux;
    }

    static function afficher(){
        if (count(self::$listAnimaux)>0){
            
            echo "\n\nAffichage de tout les annimaux ! \n";
            foreach(self::$listAnimaux as $animal){
                echo $animal->toString();
            }
        }else{
            echo "\n\nVous n'avez aucun animal !";
        }
    }
}

class Chat extends Animal implements GestionAnimaux{
    protected $typeNourriture = "Croquettes pour chat";
    protected $quantite = 1;
    protected $race = "Inconnu";

    function __construct($Nom, $Prix,$Race, $Nourriture, $Quantite=0){
        parent::__construct($Nom,$Prix);
		$this->typeNourriture = $Nourriture;
		$this->quantite = $Quantite;
		$this->race = $Race;
	}

    public function toString(){
        return "\nChat !\nNom : ".$this->nom."\nRace : ".$this->race."\nPrix : ".$this->prix."$\nNourriture : ".$this->typeNourriture."\nQuantité : ".$this->quantite."kg/jour\n";
    }

    
    public function achat(){ // acheter un animal et le mettre dans les stock
        array_push(parent::$listAnimaux,$this);
    }
    public function manger(){    // retirer la nourriture $type dans les stock 
        Nourriture::removeFood($$this->typeNourriture,$this->quantite);
    }
    public function vente(){        // retirer un
        foreach(parent::$listAnimaux as $key=>$animalux){
            if ($animalux == $this){
                unset(parent::$listAnimaux[$key]);
                return;
            }
        }
    }

}


class Chien extends Animal implements GestionAnimaux{
    protected $typeNourriture = "Croquettes pour chien";
    protected $quantite = 1;
    protected $race = "Inconnu";

    function __construct($Nom, $Prix,$Race, $Nourriture, $Quantite=0){
        parent::__construct($Nom,$Prix);
		$this->typeNourriture = $Nourriture;
		$this->quantite = $Quantite;
		$this->race = $Race;
	}

    public function toString(){
        return "\nChien !\nNom : ".$this->nom."\nRace : ".$this->race."\nPrix : ".$this->prix."$\nNourriture : ".$this->typeNourriture."\nQuantité : ".$this->quantite."kg/jour\n";
    }

    
    public function achat(){ // acheter un animal et le mettre dans les stock
        array_push(parent::$listAnimaux,$this);
    }
    public function manger(){    // retirer la nourriture $type dans les stock 
        Nourriture::removeFood($this->typeNourriture,$this->quantite);
    }
    public function vente(){        // retirer un
        foreach(parent::$listAnimaux as $key=>$animalux){
            if ($animalux == $this){
                unset(parent::$listAnimaux[$key]);
                return;
            }
        }
    }

}


class Poisson extends Animal implements GestionAnimaux{
    protected $typeNourriture = "Croquettes pour poisson";
    protected $quantite = 1;
    protected $espece = "Inconnu";
    protected $habitat = "Inconnu";

    function __construct($Nom, $Prix,$Espece,$Habitat, $Nourriture, $Quantite=0){
        parent::__construct($Nom,$Prix);
		$this->typeNourriture = $Nourriture;
		$this->quantite = $Quantite;
		$this->espece = $Espece;
		$this->habitat = $Habitat;
	}

    public function toString(){
        return "\nPoisson !\nNom : ".$this->nom."\nEspece : ".$this->espece."\nHabitat : ".$this->habitat."\nPrix : ".$this->prix."$\nNourriture : ".$this->typeNourriture."\nQuantité : ".$this->quantite."kg/jour\n";
    }

    public function achat(){ // acheter un animal et le mettre dans les stock
        array_push(parent::$listAnimaux,$this);
    }
    public function manger(){    // retirer la nourriture $type dans les stock 
        Nourriture::removeFood($this->typeNourriture,$this->quantite);
    }
    public function vente(){        // retirer un
        foreach(parent::$listAnimaux as $key=>$animalux){
            if ($animalux == $this){
                unset(parent::$listAnimaux[$key]);
                return;
            }
        }
    }

}

$monChat = new Chat("Garflied",150,"Persan","Croquette Extra",0.250);
$monChien = new Chien("Rex",150,"Persan","Boulette Maxi plus",1.250);
$monPoisson = new Poisson("Némo",150,"Poisson Clow","Eau Salée","FishMaster",0.050);

echo $monChat->toString();
echo $monChien->toString();
echo $monPoisson->toString();

$croquettePlus = new Nourriture("croquetteplus","Croquette +",25);
$croquettePlusPlus = new Nourriture("croquetteplus","Croquette +",10);
$fishFood = new Nourriture("fishfoodgood","FishMaster",10);

Nourriture::afficher();
Animal::afficher();


$monChat->achat();
$monChien->achat();
Animal::afficher();

$monChat->vente();
$monPoisson->achat();

Animal::afficher();
$monPoisson->manger();

Nourriture::afficher();


/*

Exercice pour tester les interfaces :
on veut représenter une partie du fonctionnement d'une animalerie. 
Elle contient des Animaux de différents types (Chat, Chien, Poisson) qui ont un nom, et un tarif de vente, et qui mangent différents types de 
Nourriture dans des quantités variées. Coder le système de classes de l'animalerie :

-une classe parent Animal contenant une liste des animaux (indice : servez-vous du statique...)

-trois classes enfants Chat, Chien, Poisson (précisant la nourriture qu'ils mangent et dans quelle quantité. 
Le chat et le chien ont une race définie, le poisson une espèce et un habitat : eau douce/salée)

-une classe Nourriture répertoriant les types et quantités disponibles dans la boutique, gardés en mémoire 
dans un tableau commun (indice : servez-vous du statique...)

-une interface GestionAnimaux contenant les déclarations de méthodes suivantes : achat($nouvelAnimal)
(note : méthode statique), vente(), manger($typeNourriture) 
et qui doit être implémentée dans les classes enfant(modifié)
[14:50]
Amusez-vous bien !

*/