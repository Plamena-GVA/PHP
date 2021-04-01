<?php
require_once "Autoloader.php";
Autoloader::register();

$nourritureChat = new Nourriture("Croquettes Miaou", 50);
$misstigri = new Chat ( "Misstigri", 100, $nourritureChat, 1, "persan");
Animal::acheter($misstigri);
var_dump 
