<?php
class Voiture {

    public $couleur;
    public $marque;
    public static $NbInstance = 0;


    function __construct($couleur,$marque){
    
        $this->couleur = $couleur;
        $this->marque = $marque;
        self::$NbInstance ++;
    }

    static function getNbInstance(){
        return self::$NbInstance;
    }

    function getCouleur(){
        return $this->couleur;
    }

    function setCouleur($uneCouleur){
        $this->couleur = $uneCouleur;
    }
    function getMarque(){
        return $this->marque;    
    }
    
    function setMarque($uneMarque){
        $this->marque = $uneMarque;

    }
    
    
    function isRed(){
        if (strtoupper($this->couleur)=="RED"or strtoupper($this->couleur)=="ROUGE"){
            return true;
        }else {
            return false;
        }

    }
    
    function isFerrari(){
        if (strtoupper($this->marque)=="FERRARI"){
            return true;
        }else{
            return false;
        }

    }



    public function staticValue() {
        return self::$NbInstance;

    }

}

echo "\n----Bonjour----\n";

echo "\nNombre voiture crée :".Voiture::$NbInstance;


$fefe = new Voiture("Ferrari","Pista Spider");


echo "\nNombre voiture crée :".Voiture::$NbInstance;

$fofo = new Voiture("BMW","X6");
echo "\nNombre voiture crée :".Voiture::$NbInstance;
