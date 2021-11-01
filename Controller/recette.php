<?php
require_once "../Modele/modele.php";



/**
 * Parse la chaine de caractère qui correspond à $cocktail["ingredients"] et stock
 * chaque sous-chaine dans un Tableau
 * 
 * Chaque élément représente une quantité/indication concernant un ingrédient situé
 * dans le Tableau $cocktail["index"].
 * 
 * 
 * @param array $cocktail Cocktail à traiter
 * 
 * @return array $tab_quantite Tableau de chaine de caractère.
 * 
 */
function get_quantite($cocktail){
    $tab_quantite=array();
    $tab_quantite = explode("|",$cocktail["ingredients"]);
    return $tab_quantite;
}


function recette($id_cocktail){

    $cocktail = get_coktail($id_cocktail);
    $tab_quantite = get_quantite($cocktail);

    //Gestion de la Vue de la page Cocktail
    require_once "../Vue/recette.php";
}