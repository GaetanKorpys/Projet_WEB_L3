<?php
require_once "../Modele/modele.php";


/**
 * Permet la gestion des cocktails
 * On récupère les informations nécéssaires pour la Vue grâce aux fonctions du Modèle  
 * 
 * La fonction "renvoie" un require. En loccurence ici, il s'agit de l'affichage de la Vue
 * 
 * @param string $aliment Nom de l'aliment à recherché dans le Modèle
 * 
 */
function cocktail($aliment){
    

    $aliment_courant = affecte_valeur_defaut_aliment($aliment);
    $tab_cocktail_valide = recherche_cocktail($aliment_courant);
    $sous_categorie = recherche_sous_categorie_aliment($aliment_courant);

    //Gestion de la navigation
    require_once "Include/nav.inc.php";

    //Gestion de la Vue de la page Cocktail
    require_once "../Vue/cocktail.php";
}


