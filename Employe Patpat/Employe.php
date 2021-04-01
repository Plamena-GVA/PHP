<?php

class Employe
{
    var $nom;
    var $prenom;
    var $age;
    var $salaire;
    var $numeroSecu;

    function __construct($Nom, $Prenom, $Age, $Salaire, $NumeroSecu)
    {
        $this->nom = $Nom;
        $this->prenom = $Prenom;
        $this->age = $Age;
        $this->salaire = $Salaire;
        $this->numeroSecu = $NumeroSecu;
    }
    function Augmentation($Montant)
    {
        $valeur = explode("%", $Montant);
        if (is_numeric($valeur[0]))
        {
            if (count($valeur) == 1)
            {
                $this->salaire += $valeur[0];
            }
            else
            {
                $this->salaire += (($this->salaire * $valeur[0]) / 100);
            }
        }
    }

    function toString()
    {
        $Chaine =  "Nom=" . $this->nom;
        $Chaine .= ":Prenom=" . $this->prenom;
        $Chaine .= ":Age=" . $this->age;
        $Chaine .= ":Salaire=" . $this->salaire;
        $Chaine .= ":N°Secu=" . $this->numeroSecu;
        return($Chaine);
    }
    function Afficher()
    {
        $Chaine  = "  Nom ....... : " . $this->nom . "\n";
        $Chaine .= "  Prenom .... : " . $this->prenom . "\n";
        $Chaine .= "  Age ....... : " . $this->age . "\n";
        $Chaine .= "  Salaire ... : " . $this->salaire . "\n";
        $Chaine .= "  N° Secu ... : " . $this->numeroSecu . "\n";
        return($Chaine);        
    }
    function calculeSalaire()
    {
        return($this->salaire);
    }
}

