<?php
// classe représentant les nourritures stockées à but de consommation par les animaux

class Nourriture {
        protected $type;
        protected $quantite; //quantité en stock
        static $listeNourriture = array();

        function __construct ($type,$q = 0){
            $this->type = $type;
            $this->quantite = $q;
            $recherche = self::indiceNourriture ($type);
            if ($recherche == -1){
                self::$listeNourriture[] = $this; 
            }else{
                self::$listeNourriture[$recherch] ->quantite += $q;
                //
            }
            
        }

        // getter/setteur - magique pour gagner du temps
        public function __get($attr){
            return $this->$attr;
        }
        public function __set($attr,$value){
            return $this->$attr = $value;
        }

        public static function indicNourriture($nom){
            foreach ( self::$listeNourriture as $indice=>$Nourriture){
                if ($Nourriture == $nom){
                    return $indice;
                }
            }
        }


}