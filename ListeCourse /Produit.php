<?php

class Produit {
    public $nom;
    public $quantite;  
    public $prixUnit;

    function __construct($nomP="pomme Bio", $quantiteP = 5 , $prixUnitP = 0.45){
         $this->nom = $nomP;
         $this->quantite = $quantiteP;
         $this->prixUnit = $prixUnitP;
   
    }

    function modifierProduit($nouveauProduit){
        
        $this->nom = $nouveauProduit;
    }

    function toString(){
        return "\nProduit : " . $this->nom . "\nQuantité : " . $this->quantite . "\nPrix Unitaire : " . $this->prixUnit."\n" . "€/u\n" ;
        
    }

    public function monTotal(){
        return $this->quantite * $this->prixUnit;
    }

    

}

    $produit = new Produit();
    echo "\nMa Super Liste\n";
    echo $produit->toString();
    echo $produit->nom;
    echo $produit->monTotal();







