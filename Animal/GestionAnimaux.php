<?php

interface GestionAnimaux {
    /*
    * l'achat par la boutique d'un animal, ajouter l'animal au stock de la boutique, mettre à jour les fonds selon le tarif de l'animal si on gérait l'aspect économique
    */

    static function acheter ( $nouvelAnimal);
    /*
    * fonction représentant la vente par la boutique de l'animal à un client, on supprime l'animal de la liste,
    */
    static function vendre();
    function manger();

}