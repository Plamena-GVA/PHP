<?php

require_once "Produit.php";
require_once "ListeCourses.php";

echo "\nBonjour, bienvenu sur l'application de gestion des produits !\n";

$panier = NULL;
$registeredProducts =new ListeCourses("Produits enregistrés");

productRegister("banane",46,1);
productRegister("pomme",200,1);
productRegister("chou",10,1.5);

echo "\n";
do{
    echo "\n-----Tapez-----\n/register pour enregistrer un nouveau produit\n/add pour ajouter un produit dans votre 'panier' \n/show pour voir tout les produits disponible\n/basket pour visualiser votre panier\n";
    $cmd = readline();
    switch ($cmd) {
        case '/register':
            productRegister();
            break;
        case '/add':
            addToList();
            break;
        case '/show':
            printProducts();
            break;
        case '/basket':
            printList($panier);
            break;
        default:
            break;
    }
}while ($cmd != "/quit");

function productRegister($name = NULL,$amount = NULL,$price = NULL){
    global $registeredProducts;
    if ($name == NULL){
        echo "\nNom du produit :";
        $productName = readline();
        echo "\nPrix unitaire du produit :";
        $productPrice = readline();
        echo "\nQuantité de produit en stock :";
        $productAmount = readline();
    }else{
        $productName = $name;
        $productPrice = $price;
        $productAmount = $amount;
    }
    $newProduct = new Produit($productName,$productAmount,$productPrice);
    $registeredProducts->ajouterProduit($newProduct);
    echo "\nNouveau produit enregistré :".$newProduct->toString();
}

function addToList(){
    global $panier;
    global $registeredProducts;
    if ($panier == NULL){
        $panier = new ListeCourses("Megane");
        echo "\nCreation du panier $panier->magasin";
    }else{
        echo "Ajout dans le panier $panier->magasin";
    }

    do{
        echo "\nNom du produit a ajouter ou /show pour voir les produits disponible :";
        $productName = readline();
        if ($productName == "/show"){
            printProducts($panier);
        }else{
            /*
            $indice = $registeredProducts->indiceProduit($productName);
            if ($indice>=0){
                $currentQuantite = $registeredProducts->tableauProduit[$indice]->quantite;
                do{
                    echo "\nNombre de produit a ajouter dans votre panier (max=$currentQuantite): ";
                    $amount = readline();
                }while($amount>$currentQuantite);

            }else{
            
            }
            */
            foreach ($registeredProducts->tableauProduit as $product){
                if ($productName == $product->nom){
                    $panier->ajouterProduit($product);
                    echo "\nVous avez ajouté des $product->nom dans le panier : $panier->magasin";
                    return;
                }
            }
        }
    }while($productName =="/show");
}

function printProducts(){
    global $registeredProducts;
    if (count($registeredProducts->tableauProduit)>0) {
        echo "\nAffichage de tout les produits disponible\n";
        foreach ($registeredProducts->tableauProduit as $product){
            echo "\n".$product->toString();
        }
    }else{ 
        echo "\nAucun produit enregistré\n";
    }
}


function printList($list){
    if ($list!=NULL) {
        echo "\n----Panier----\n".$list->toString();
    }else{ 
        echo "\nAucun produit dans votre panier\n";
    }
}