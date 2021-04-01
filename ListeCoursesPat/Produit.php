<?php
//une classe Produit
//représente un produit dans une liste de courses

class Produit{
	//attributs du produit
	public $nom;
	public $quantite;
	public $prixUnit;
	
	//constructeur de Produit
	public function __construct($nomP, $qP, $pUP){
		$this->nom = $nomP;
		$this->quantite = $qP;
		$this->prixUnit = $pUP;
	}
	
	//retourne le prix total de la quantité de produit achetée
	public function calculPrixTotal(){
		return $this->quantite * $this->prixUnit;
	}
	
	//retourne une string représentant le produit sous le format nom : quantité prix Unitaire
	public function toString(){
		return $this->nom . " : " . $this->quantite . " " . $this->prixUnit ."€/u";
	}
}