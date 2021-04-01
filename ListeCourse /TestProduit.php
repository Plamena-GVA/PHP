<?php 

 require_once "Produit.php";
 require_once "ListeCourses.php";

 
 

 $produit1 = new Produit(lait,6,1);
 $produit2 = new Produit(tomates,10,0.5);
 $produit4 = new Produit(pain,1,2);


 $lisa = new ListeCourses(array($produit1,$produit2,$produit4),"Carrefour");

 print_r($lisa);
    
 
 
    echo "\nMa Super Liste\n";
    echo $lisa->toString();


