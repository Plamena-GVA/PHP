<?php
abstract class Animal implements GestionAnimaux{

    protected $nom;
    protected $tarif;
    protected $nourritureAnimal;
    protected $quantiteNourriture;
    static $listAnimaux = array ();

    function __construct($nomA, $tarifA, $nA, $qN){
        $this->nom = $nomA;
        $this->tarif = $tarifA;
        $this->nourritureAnimal = $nA;
        $this->quantiteNourriture = $qA;
    }
    public function __get($attr){
        return $this->$attr;
    }
    public function __set($attr,$value){
        return $this->$attr = $value;

    static acheter($nouvelAnimal){
        self::$listAnimaux[]=$nouvelAnimal;
    }
        
    static function vendre(){
        unset
    }
    function manger(){

    }

}