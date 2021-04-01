<?php

/*require_once "Employe.php";
require_once "Technicien.php";*/
/*===========================================================*/
/*
/*  Cette classe definie les methodes génériques pour gerer
/*          tous les elements 'metier' dans un tableau
/*                  (ici la classe Technicien)
/*
/*===========================================================*/
//require_once "OutilSaisie.php";

require_once " Autoloader.php";
Autoloader::register();


class GestionElement
{
    private $LstElement = array();
    
/*===========================================================*/
/*  Cette fonction initialiser toutes les saisies
/*      en fonction de l'action
/*===========================================================*/
    private function InitialiserEcranSaisie($action) 
    {
        //  Initialisation des saisies
        $taille = 16;
        $lstSaisie = array();
        $lstSaisie[]  = new OutilSaisie("A","  Nom",0,1,$taille);
        $lstSaisie[]  = new OutilSaisie("A","  Prenom",0,1,$taille);
        switch($action)
        {
            case "AjoutE";
                $lstSaisie[]  = new OutilSaisie("I","  Age",0,1,$taille,array("16","80"));
                $lstSaisie[]  = new OutilSaisie("N","  Salaire",0,1,$taille);
                $lstSaisie[]  = new OutilSaisie("N","  N. Secu",0,1,$taille);
                break;
            case "AjoutT";
                $lstSaisie[]  = new OutilSaisie("I","  Age",0,1,$taille,array("16","80"));
                $lstSaisie[]  = new OutilSaisie("N","  Salaire",0,1,$taille);
                $lstSaisie[]  = new OutilSaisie("N","  N. Secu",0,1,$taille);
                $lstSaisie[]  = new OutilSaisie("T","  Grade",1,1,$taille,array("A","B","C"));
                break;
            case "Modif";
                $lstSaisie[]  = new OutilSaisie("%","  Augmen.",0,1,$taille);
            break;
        }
        return($lstSaisie);
    }
/*===========================================================*/
/*  Cette fonction ajoute un element dans le tableau
/*      S'il manque des parametres, ils seront saisie automatiquement
/*===========================================================*/
    function AjouterElement($buffer, $param)
    {
        echo "Ajout d'un salarié.\n";
        $valeur = explode("/", $buffer . "/////");
        //  Initialisation des saisies
        //$lstSaisie = array();
        $lstSaisie = $this->InitialiserEcranSaisie("Ajout" . $param);
        if ($param != "T")
        {
            $valeur[5] = "";
        }

        //  Boucle pour le controle et la saisie de toutes les données du salarié
        for ($x = 0; $x < count($lstSaisie); $x++)
        {
            $valeur[$x] = $lstSaisie[$x]->Saisir($valeur[$x]);
            if ($valeur[$x] == "")
            {
                echo "    La saisie sera annulée !!\n";
                return(-1);
            }
            if ($x == 1)
            {
                if ($this->IndiceElement($valeur[0], $valeur[1]) >= 0)
                {
                    echo "    Le salarié est déjà renseigné !!\n";
                    return(-1);
                }
            }
        }
        $this->LstElement[] = new Technicien($valeur[0], $valeur[1], $valeur[2], 
                                                $valeur[3], $valeur[4], $valeur[5]);
        return(1);
    }
/*===========================================================*/
/*  Cette fonction modifie l'element 
/*===========================================================*/
    function ModifierElement($buffer)
    {
        echo "Augmentation du salarié.\n";
        $valeur = explode("/", $buffer . "////////");
        //  Initialisation des saisies
        $lstSaisie = $this->InitialiserEcranSaisie("Modif");
        if (is_numeric($valeur[0]))
        {
            //  L'indice du salarié est passé en parametre
            if (($valeur[0] < 0) || ($valeur[0] >= count($this->LstElement)))
            {
                echo "    L'indice est incorrect !!\n";
                return(-1);
            }
            $indice = $valeur[0];
            $valeur[2] = $valeur[1];
        }
        else
        {
            $valeur[0] = $lstSaisie[0]->Saisir($valeur[0]);
            $valeur[1] = $lstSaisie[1]->Saisir($valeur[1]);
            $indice = $this->IndiceElement($valeur[0], $valeur[1]);
            if ($indice < 0)
            {
                echo "    Le salarié n'est pas renseigné !!\n";
                return(-1);
            }
        }
        echo $this->LstElement[$indice]->toString() . "\n";
        $valeur[2] = $lstSaisie[2]->Saisir($valeur[2]);
        $this->LstElement[$indice]->Augmentation($valeur[2]);
        echo $this->LstElement[$indice]->afficher();
    }
/*===========================================================*/
/*      Methode generique pour l'affichage d'un element
/*===========================================================*/
    function AfficherElement($buffer)
    {
        echo "Affichage du salarié.\n";
        $valeur = explode("/", $buffer . "////////");
        if (is_numeric($valeur[0]))
        {
            //  L'indice du salarié est passé en parametre
            if (($valeur[0] < 0) || ($valeur[0] >= count($this->LstElement)))
            {
                echo "    L'indice est incorrect !!\n";
                return(-1);
            }
            $indice = $valeur[0];
        }
        else
        {
            //  Initialisation des saisies
            $lstSaisie = $this->InitialiserEcranSaisie("Afficher");
            $valeur[0] = $lstSaisie[0]->Saisir($valeur[0]);
            $valeur[1] = $lstSaisie[1]->Saisir($valeur[1]);
            $indice = $this->IndiceElement($valeur[0], $valeur[1]);
            if ($indice < 0)
            {
                echo "    Le salarié n'est pas renseigné !!\n";
                return(-1);
            }
        }

        echo "Indice ...... : " . sprintf("[%2d] ", $indice);
        if ($this->LstElement[$indice]->grade == "")           
        {
            echo "Employé\n";
        }
        else
        {
            echo "Technicien\n";
        }
        echo $this->LstElement[$indice]->afficher();
    }
/*===========================================================*/
    private function IndiceElement($Cle1, $Cle2)
    {
        for ($x = 0; $x < count($this->LstElement); $x++)
        {
            if ($this->LstElement[$x]->nom == $Cle1)
            {
                if ($Cle2 == "")
                {
                    return($x);
                }
                if ($this->LstElement[$x]->prenom == $Cle2)
                {
                    return($x);
                }
            }
        }
        return(-1);
    }
/*===========================================================*/
    function ListerElement()
    {
        echo "Liste de vos salariés.\n";
        for ($x = 0; $x < count($this->LstElement); $x++)
        {
            echo (sprintf(" [%2d] ", $x)) . $this->LstElement[$x]->toString() . "\n";
        }
        if (count($this->LstElement) == 0)
        {
            echo "  La liste est vide.\n";
        }
    }
/*===========================================================*/
}
