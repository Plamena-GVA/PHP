<?php

/*===================================================================*/
/*          Ce fichier permet de test la classe Gestion.
/*===================================================================*/
function AfficherAide()
{
    echo "\n******************************************************************\n";
    echo "*                      Gestion des salariés                      *\n";
    echo "******************************************************************\n\n";
    echo "Voici la liste des commandes pour la gestion de vos salariés :\n";
    echo "  E+ => Ajout un employé dans la liste des salariés.\n";
    echo "     Parametres optionnels :\n";
    echo "        Nom        => Nom du salarié.\n";
    echo "        /Prenom    => Prenom du salarié.\n";
    echo "        //Age      => Aged du salarié.\n";
    echo "        ///Salaire => Salaire du salarié.\n";
    echo "        ////N°Secu => Numéro de securite social.\n";
    echo "_________________________________________________________________\n";
    echo "  T+ => Ajout d'un technicien dans la liste des salariés.\n";
    echo "     Parametres optionnels :\n";
    echo "        Nom        => Nom du salarié.\n";
    echo "        /Prenom    => Prenom du salarié.\n";
    echo "        //Age      => Aged du salarié.\n";
    echo "        ///Salaire => Salaire du salarié.\n";
    echo "        ////N°Secu => Numéro de securite social.\n";
    echo "        /////Grade => Grade du Technicien.\n";
    echo "_________________________________________________________________\n";
    echo "  A+Nom/Prenom/Valeur => Augmentation du salaire d'un salarié.\n";
    echo "  A+Indice/Valeur\n";
    echo "        Valeur peut être fixe ou un pourcentage.\n";
    echo "_________________________________________________________________\n";
    echo "  L => Liste de tous les salariés.\n";
    echo "  L+Indice     => Affichage d'un salarié.\n";
    echo "  L+Nom/Prenom => Affichage d'un salarié.\n";
    echo "_________________________________________________________________\n";
    echo "  ? => Affiche l'aide de l'application.\n";
    echo "  FIN => Permet de sortir du programme.\n";
}

//  Ajout de la classe de gestion et definition de la variable gstElement
require_once "GestionElement.php";
$gstElement = new GestionElement();

//  Affichage de l'interface
AfficherAide();

/*===================================================================*/
// Pour la mise au point, on ajoute 1 employe et 1 Technicien
$gstElement->AjouterElement("Bob/Eponge/21/1000/123456789/C", "E");
$gstElement->AjouterElement("Bibi/Patou/55/3000/66666666666/A", "T");
/*===================================================================*/

/*===================================================================*/
//  Boucle principale pour la saisie des commandes
/*===================================================================*/
do 
{
    echo "\n";
    $reponse=readline("Votre requete : ");
    echo "\n";
    TraiterRequete($reponse);
}while($reponse	!= "");
echo "***********************************\n";
Echo "*    Au revoir et a bientot !!    *\n";
echo "***********************************\n";

//  Traitement des differentes commandes
function TraiterRequete(&$requete)
{
    global $gstElement;
    //  On recupere les 2 premiers caracteres en MAJUSCULE
    $cmds = substr(strtoupper($requete),0,2);
    switch($cmds)
    {
        case "E+";  // Ajouter un element (Type : Employé)
            $gstElement->AjouterElement(substr($requete,2,50), "E");
            break;
        case "T+";  // Ajouter un element (Type : Technicien)
            $gstElement->AjouterElement(substr($requete,2,50), "T");
            break;
        case "A+";  // Effectuer une augmentation
            $gstElement->ModifierElement(substr($requete,2,50));
            break;
        case "L";   // Listes des elements
        case "L ";
            $gstElement->ListerElement();
            break;
        case "L+";  // Afficher un element
            $gstElement->AfficherElement(substr($requete,2,50));
            break;
        case "? ";
        case "?";
            AfficherAide();
            break;
        case 'FI';
            $requete="";
        case "";
            break;
        default;
            echo "  COMMANDE <" . $cmds . "> NON RECONNUE !!\n";
    }
}








/*==================================================================================*/
/*
/*      PROCEDURE POUR LA GESTION DES EMPLOYES
/*
/*==================================================================================*/
function AugmenterEmploye($Buffer)
{
    echo "  AUGMENTATION DU SALAIRE\n";
}
