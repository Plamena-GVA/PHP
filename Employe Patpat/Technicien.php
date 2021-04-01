<?php

require_once "Employe.php";

class Technicien extends Employe
{
    var $grade;

    function __construct($Nom, $Prenom, $Age, $Salaire, $NumeroSecu, $Grade)
    {
        parent::__construct($Nom, $Prenom, $Age, $Salaire, $NumeroSecu);
        $this->grade = $Grade;
    }
    function Prime()
    {
        switch($this->grade)
        {
            case "C";
                return(100);
                break;
            case "B";
                return(200);
                break;
            case "A";
                return(300);
                break;
            default;
                return(0);
                break;
        }
    }
    function toString()
    {
        $Chaine = parent::toString();
        if ($this->grade != "")
        {
            $Chaine .= ":Grade=" . $this->grade;
        }
        return($Chaine);
    }
    function Afficher()
    {
        $Chaine  = parent::afficher(); 
        if ($this->grade != "")
        {
            $Chaine .= "  Grade ..... : " . $this->grade . " ==> Prime : " . $this->Prime() . "\n";
        }
        return($Chaine);        
    }
    function calculerSalaire()
    {
        return($this->salaire + $this->Prime);
    }
}
