<?php
//classe représentant une liste de courses
class ListeCourses{
	//elle contient un tableau de produits, un prix total de la liste et le nom du magasin où on fait les achats
	public $magasin;
	public $tableauProduit;
	public $prixTotal;
	
		//création de la liste : elle contient un tableau
	function __construct($mag, $tableauP=array()){
		$this->magasin = $mag;
		$this->tableauProduit = $tableauP;
		$this->calculPrixTotal();
		
	}
	
	//ajout d'un produit dans la liste
	function ajouterProduit($nouveauProduit){
		//on cherche si le produit ajouté serait déjà dans la liste de courses
		//et on met bien entendu à jour le prix total de la liste
		$indice = $this->indiceProduit($nouveauProduit->nom);
		//si oui, on augmente simplement la quantité présente
		if($indice != -1){
			$this->tableauProduit[$indice]->quantite += $nouveauProduit->quantite;
		}else{ //sinon on l'ajoute à la fin du tableau
			array_push($this->tableauProduit, $nouveauProduit);
		}
		//et on ajoute au prix total la valeur du nouveau produit
		$this->ajouterPrix($nouveauProduit);
		
	}
	
	//retourne l'emplacement dans le tableau des produits d'un produit qu'on cherche par son nom, -1 si non trouvé
	function indiceProduit($nomP){
		//on parcourt tout le tableau de produits
		foreach($this->tableauProduit as $indice=>$produit){
			//si on trouve un produit qui a le nom recherché, on renvoie sa position
			if($produit->nom == $nomP){
				return $indice;
			}
		}
		//si on a pas trouvé le bon nom on renvoie -1
		return -1;
	}
	
	//calcul du prix total de la liste de courses
	function calculPrixTotal(){
		$this->prixTotal = 0;
		foreach($this->tableauProduit as $produit){
			//on réutilise la fonction d'ajout d'un prix seul
			$this->ajouterPrix($produit);
		}
	}
	
	//ajout du tarif d'un produit au prix total de la liste de courses
	function ajouterPrix($produit){
		$this->prixTotal += $produit->calculPrixTotal();
	}
	
	//préparation d'une chaîne de caractères représentant la liste de courses
	function toString(){
		$chaineLC = "Liste de courses " . $this->magasin . " :\n";
		//pour chaque produit, on ajoute ses informations
		foreach($this->tableauProduit as $produit){
			$chaineLC .= $produit->toString() . "\n";
		}
		$chaineLC .= "TOTAL 	: " . $this->prixTotal . "€\n";
		return $chaineLC;
	}
	
	
}