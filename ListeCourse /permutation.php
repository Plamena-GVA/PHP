<?php
//fonction qui ne marche pas
function permutation($x, $y) {
	echo "permutation...\n" ;
	$t = $x ;
	$x = $y ;
	$y = $t ;
}

//fonction qui renvoie un demi-résultat
function permutation2($x,$y){
	echo "permutation type 2...\n" ;
	$t = $x ;
	$x = $y ;
	$y = $t ;
	//return $x, $y; //attention : syntaxe invalide !
	return $x; //récupère une seule valeur
}

//version avec variables globales
//inconvénient : on ne peut plus permuter qu' $a et $b
function permutation3() {
	global $a, $b;
	echo "permutation 3...\n" ;
	$t = $a ;
	$a = $b ;
	$b = $t ;
}

//exemple avec tableau de deux éléments
//nous renvoie bien tout ce qu'il faut mais un peu lourde
function permutation4($tab){
	echo "permutation 4...\n" ;
	/*$t = $tab[0] ;
	$tab[0] = $tab[1] ;
	$tab[1] = $t ;
	return $tab;*/
	//plus optimisé
	return array($tab[1], $tab[0]);
}

$a = 12 ;
$b = 210 ;
echo "\$a = $a\n" ;
echo "\$b = $b\n" ;
permutation($a, $b) ;
echo "\$a = $a\n" ;
echo "\$b = $b\n" ;

$a = permutation2($a, $b);
echo "\$a = $a\n" ;
echo "\$b = $b\n" ;

$a = 12 ;
$b = 210 ;
permutation3() ;
echo "\$a = $a\n" ;
echo "\$b = $b\n" ;

$a = 12 ;
$b = 210 ;
$table = permutation4(array($a, $b));
print_r($table);