<?php

//pour pouvoir utiliser la classe Produit depuis ce fichier :
require_once "Produit.php";
require_once "ListeCourses.php";
function AfficherAide()
{
    echo "Liste des commandes :\n";
    echo "  M+Nom => Ajout d'un nouveau magasin,\n";
    echo "  P+Nom => Ajout d'un nouveau produit,\n";
    echo "  C+XX/YY => Ajout d'un produit dans une liste de course\n";
    echo "       XX => Nom ou numero du magasin,\n";
    echo "       YY => Nom ou numero du produit,\n";
    echo "  LM => Liste des magasins\n";
    echo "  LP => Liste des produits\n";
    echo "  LCXX => Liste de course pour le magasin numero XX\n";
    echo "  LCNom => Liste de course pour le magasin Nom\n";
    echo "  ? => Affiche l'aide\n";
    echo "  FIN => Fin du programme\n";
}

echo "Saisie de vos listes de courses : \n";
AfficherAide();
// Le premier indice servira a stocker la liste des produits
$LstMagasin[] =  new ListeCourses("");

//  Boucle pour la saisie des commandes
do 
{
    $reponse=readline("\nVotre requete : ");
    TraiterRequete($reponse);
}while($reponse	!= "");
Echo "\n  Au revoir et a bientot !!\n";

//  Traitement des differentes commandes
function TraiterRequete(&$requete)
{
    $cmds = substr(strtoupper($requete),0,2);
    switch($cmds)
    {
        case "M+";  // Ajouter un magasin
            AjouterMagasin(substr($requete,2,50));
            break;
        case "LM";  // Liste des magasins
            AfficherListeMagasin();
            break;
        case "P+";  // Ajouter un produit en general
            AjouterProduit(substr($requete,2,50));
            break;
        case "C+";  // Ajouter un produit dans une course
            AjouterCourse(substr($requete,2,50));
            break;
        case "LP";  // Liste des produits de la lsite generale
            AfficherListeProduit();
            break;
        case "LC";  // Liste d'une course por un magasin
            AfficherCourse(substr($requete,2,50));
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
/*      PROCEDURE POUR LA GESTION DES MAGASINS
/*
/*==================================================================================*/
function AjouterMagasin($Nom)
{
    global $LstMagasin;
    if ($Nom != "")
    {
        // Le nom n'est pas une chaine vide
        // On recherche l'indice du magasin
        $indice = IndiceMagasin($Nom);
        if ($indice < 0 )
        {
            $LstMagasin[] =  new ListeCourses($Nom);
            return(count($LstMagasin) - 1);
        }
        else
        {
            echo "  Le magasin a déjà été ajouté\n";
        }
    }
    else
    {
        echo "  Vous devez saisir un nom de magasin\n";
    }
}
function IndiceMagasin($Nom)
{
    // Retourne l'indice du nom dans la liste des magasins
    global $LstMagasin;
	foreach($LstMagasin as $indice=>$Element)
    {
        //si on trouve un produit qui a le nom recherché, on renvoie sa position
        if($Element->magasin == $Nom)
        {
            return $indice;
        }
    }
    //si on a pas trouvé le bon nom on renvoie -1
    return -1;
}
function AfficherListeMagasin()
{
    global $LstMagasin;
    echo "Liste des magasins\n";
	foreach($LstMagasin as $indice=>$Ptr)
    {
        if ($indice > 0 )
        {
            echo sprintf(" %2d ", $indice) . " " . $Ptr->magasin . "\n";
        }
    }
}
/*==================================================================================*/
/*
/*      PROCEDURE POUR LA GESTION DES PRODUITES 
/*          A partir de la liste generale (IndiceMagasin = 0)
/*
/*==================================================================================*/
function AjouterProduit($Nom)
{
    global $LstMagasin;
    if ($Nom != "")
    {
        // Recherche de l'indice du produit par son nom dans la liste du magasin[0]
        $LstProduit = $LstMagasin[0];
        $indice = $LstProduit->indiceProduit($Nom);
        if ($indice < 0 )
        {
            // On ajoute ce nouveau produit dans la liste du magasin [0]
            $Element = new  Produit($Nom,0,0);
            $LstProduit->AjouterProduit($Element);
        }
        else
        {
            echo "  Le produit a déjà été ajouté\n";
        }
    }
    else
    {
        echo "  Vous devez saisir un nom de produit\n";
    }
}
function AfficherListeProduit()
{
    global $LstMagasin;
    $LstProduit = $LstMagasin[0];
    $indice=0;
    echo "Liste générale des produits\n";
    foreach($LstProduit->tableauProduit as $produit)
    {
        echo sprintf(" %2d ", $indice) . " " . $produit->nom . "\n";
        $indice++;
    }
}
/*==================================================================================*/
/*
/*      PROCEDURES POUR LA GESTION DES PRODUITS d'une course definie
/*          Verification du magasin xx/
/*          Puis verification du produit /yy
/*
/*==================================================================================*/
function AjouterCourse($Course)
{
    global $LstMagasin;
    $Valeur = explode("/", $Course);
    //  Recherche de l'indice du magasin en focntion de son nom ou indice
    $NbMag = IndiceCourse($Valeur[0]);
    if (($NbMag < 0) && (!is_numeric($Valeur[0])))
    {
        // xx n'est pas reconnu et ce n'est pas un numerique
        if ($Valeur[0] == "")
        {
            echo "  Vous devez saisir un nom de magasin correct !";
            return(-1);
        }
        //  On recherche par nom du magasin
        $NbMag = IndiceMagasin($Valeur[0]);
        if ($NbMag < 0)
        {
            $NbMag = AjouterMagasin($Valeur[0]);
        }
    }
    if ($NbMag < 1)
    {
        echo "  Vous devez saisir un indice ou un nom de magasin correct !";
        return(-1);
    }

    // Traitement de l'indice ou nom du produit /yy
    if (is_numeric($Valeur[1]))
    {
        $NbPro = $Valeur[1];
        if (($NbPro >=0) && ($NbPro < count($LstMagasin[0]->tableauProduit)))
        {
            $Nom = $LstMagasin[0]->tableauProduit[$NbPro]->nom;
        }
        else
        {
            echo "  Vous devez saisir un indice de produit correct !";
            return(-1);
        }
    }
    else
    {
        if ($Valeur[1] == "")
        {
            echo "  Vous devez saisir un nom de produit correct !";
            return(-1);
        }
        $Nom = $Valeur[1];
        if ($LstMagasin[0]->indiceProduit($Nom) < 0 )
        {
            // Nouveau produit, on l'ajoute dans la liste des produits general 
            $LstMagasin[0]->AjouterProduit(new Produit($Nom, 0, 0));
        }
        $NbPro = $LstMagasin[$NbMag]->indiceProduit($Nom);
    }

    // Si c'est un nouveau produit dans la liste du magasin
    //    ==> Il faudra saisir le prix unitaire dans le magasin
    if ($NbPro < 0)
    {
        echo "  C'est un nouveau produit pour le magasin <" . $LstMagasin[$NbMag]->magasin . ">\n";
        do
        {
            $Prix = readline("Le prix unitaire de <" . $Nom . "> : ");
        }while(!is_numeric($Prix));
    }

    // On saisie la quantite pour le produit
    do 
    {
        $Quantite = readline("La quantite de <" . $Nom . "> : ");
    }while(!is_numeric($Quantite));

    // Ajout du produit dans le magasin xx/
    $Ptr = new Produit($Nom, $Quantite, $Prix);
    $LstMagasin[$NbMag]->AjouterProduit($Ptr);
}
function IndiceCourse($indice)
{
    global $LstMagasin;
    // Controle si l'indice de la liste de course est correcte
    if (is_numeric($indice))
    {
        if ($indice < count($LstMagasin) && ($indice > 0))
        {
            return($indice);
        }
    }
    return(-1);
}
/*==================================================================================*/
/*
/*      PROCEDURE POUR LA Liste des courses pour un magasin
/*
/*==================================================================================*/
function AfficherCourse($Nom)
{
    global $LstMagasin;
    $indice = IndiceCourse($Nom);
    if ($indice < 0 )
    {
        $indice = IndiceMagasin($Nom);
    }

    if ($indice > 0)
    {
        echo "\n" . $LstMagasin[$indice]->toString();
    }
    else
    {
        echo "  Vous devez saisir un code ou un nom de magasin valide !!\n";
    }
}