<?php
class ListeCourses {
    public $maliste;
    public $totalprix;
    public $magasin;

    function __construct ( $uneListe, $uneBoutique) {
        $this->maliste = $uneListe;
        $this->magasin = $uneBoutique;
        $this->totalprix = $this->calculePrixTotal();
      
    }

    function calculePrixTotal(){
        $resultat = 0;
        foreach ($this-> maliste as $produit){
            $resultat = $resultat + $produit->monTotal();
        }
        return $resultat;
    }
    function toString(){
        $resultat ="";
        foreach ($this-> maliste as $produit){
            $resultat = $resultat . $produit->toString();        
        }
        return  $resultat;

    }
    
    
    function ajouterProduit($unProduit){
        array_push($this->maliste,$unProduit);
    }
}