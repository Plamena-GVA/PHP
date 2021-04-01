<?php

do {
    echo "\n Entrez un chiffre \n";
    $nbA = readline();
}while (!is_numeric ($nbA));

do {
    echo "\n Entrez une opération \n";
    $operation = readline();
     if ($operation != '+' && $operation!= '-' && $operation != '/' && $operation != '*' ) {
          $operation = "Erreur" ;
            echo "\n Mauvaise opération \n";
    }

} while ( $operation == "Erreur");

do {
    echo "\n Entrez un chiffre \n";
    $nbB = readline();
}while (!is_numeric ($nbB));

switch ($operation) {
    case '+':
    $result = ($nbA + $nbB);
    break;

    case '-':
    $result = ($nbA - $nbB);
    break;

    case '*':
    $result = ($nbA * $nbB);
    break;

    case '/':
        if ($nbB != 0 ) {
            $result = ($nbA / $nbB);
        } else {
            echo " Impossible de diviser par 0 ";
        }
        
        break;

}
echo $result . "\n";

