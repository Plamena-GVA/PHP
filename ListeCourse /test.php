<?php

$chaine = "BonjOur tout le moNde";
echo "\n".compteur($chaine);

function compteur($ok){
    return strlen($ok);
    
}
echo $chaine."\n" ;

echo "\n".majuscule($chaine);

function majuscule($bibi){
    return ucwords($bibi);
}

$letab = array(
    "1" => array(1) {
        "A" => "true",
        "B" => "true",
        "C" => "true",
        "D" => "true",
        "E" => "true",
        "F" => "true",
        "G" => "true",
        "H" => "true",
        "I" => "true",
        "J" => "true",
    }
    "2" = array(2)[
        "A" => "true",
        "B" => "true",
        "C" => "true",
        "D" => "true",
        "E" => "true",
        "F" => "true",
        "G" => "true",
        "H" => "true",
        "I" => "true",
        "J" => "true",
 
    ]
    "3" = array(3)[
        "A" => "true",
        "B" => "true",
        "C" => "true",
        "D" => "true",
        "E" => "true",
        "F" => "false",
        "G" => "true",
        "H" => "true",
        "I" => "true",
        "J" => "true",
 
    ]
    "4" = array(4)[
        "A" => "true",
        "B" => "true",
        "C" => "true",
        "D" => "true",
        "E" => "true",
        "F" => "false",
        "G" => "true",
        "H" => "true",
        "I" => "true",
        "J" => "true",
 
    ]
    "5" = array(5)[
        "A" => "true",
        "B" => "true",
        "C" => "true",
        "D" => "true",
        "E" => "true",
        "F" => "false",
        "G" => "true",
        "H" => "true",
        "I" => "false",
        "J" => "true",
 
    ]
    "6" = array(6)[
        "A" => "true",
        "B" => "true",
        "C" => "true",
        "D" => "true",
        "E" => "true",
        "F" => "true",
        "G" => "true",
        "H" => "true",
        "I" => "false",
        "J" => "true",
 
    ]
    "7" = array(7)[
        "A" => "true",
        "B" => "true",
        "C" => "true",
        "D" => "true",
        "E" => "true",
        "F" => "true",
        "G" => "true",
        "H" => "true",
        "I" => "true",
        "J" => "true",
 
    ]
    "8" = array(8)[
        "A" => "true",
        "B" => "true",
        "C" => "true",
        "D" => "true",
        "E" => "true",
        "F" => "true",
        "G" => "true",
        "H" => "true",
        "I" => "true",
        "J" => "true",
 
    ]
    "9" = array(9)[
        "A" => "true",
        "B" => "true",
        "C" => "false",
        "D" => "false",
        "E" => "false",
        "F" => "false",
        "G" => "true",
        "H" => "true",
        "I" => "true",
        "J" => "true",
 
    ]
    "10" = array(10)[
        "A" => "true",
        "B" => "true",
        "C" => "true",
        "D" => "true",
        "E" => "true",
        "F" => "true",
        "G" => "true",
        "H" => "true",
        "I" => "true",
        "J" => "true",
 
    ]
}
function Lotterie($CHAR,$INT){
    global $macase;
    if (array_key_exists($INT,$macase) && array_key_exists($CHAR,$macase["1"])) {
        if ($macase[$INT][$CHAR]) == "false" {
            echo "\nTouché !";
        }else ($pmacase[$INT][$CHAR]) == "true" {
            echo "\nLoupé";
        }
    }else{
        echo "\nHors-jeu !";
    }
}

