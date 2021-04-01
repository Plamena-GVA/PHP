<?php

Abstract class Forme {

    public $_origineX; 
    public $_origineY; 

    abstract protected function Surface();
    abstract protected function Affiche();

    public function __get($attr){
        return $this->$attr;
    }

    public function __set($attr,$value){
        return $this->$attr=$value;
    }

    public function toSting(){
        return "Point d'origine : X=" . $this->origineX . "Y="
. $this->originelY ;
   }
}

class Cercle extends Forme{
    public $_rayon; 

    function __construct($monrayon,$x=0, $y=0){
    
        $this->_rayon = $monrayon;
        $this->_origineX = $x;
        $this->_origineY = $y;
    }
   
    protected function Surface(){
        return M_PI * $this->rayon**2;
    }


    protected function Affiche(){
        echo $this->Surface();
    }    
}

class Rectangle extends Forme{
    public $_largeur; 
    public $_longeur; 

    function __construct($maLargeur,$malongeur,$x=0, $y=0){
    
        $this->_largeur = $maLargeur;
        $this->_longeur = $malongeur;
        $this->_origineX = $x;
        $this->_origineY = $y;
    }
   
    protected function Surface(){
        return $this->_largeur * $this->_longeur;
    }


    protected function Affiche(){
        echo $this->Surface();
    }
}
    








