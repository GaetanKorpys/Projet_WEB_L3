<?php 

require_once "../Ressources/DonneesProjet/Donnees.inc.php";
require_once "../Ressources/DonneesPerso/Utilitaire/fonction.inc.php";

/**
 * Recherche dans le fichier Donnes.inc.php les cockatils qui vérifient cette propriété : 
 *      - ils possèdent au moins un aliment ou sous-aliment de celui donné en paramètre
 * 
 * Pour cela, on parcours la hierarchie depuis l'aliment donné en paramètre jusqu'au feuilles, 
 * en recursif, et renvoie le tableau des cocktails associés à l'aliment
 *
 * @param string $aliment Nom de l'aliment 
 *               Ex: Fruit à noyau, Pistache ...
 * 
 * @return array $cocktail_valide Tableau de cocktails qui possèdent cet aliment ou les sous-aliments de ce dernier
 */
function match_cocktail($aliment,$cocktail)
{
    //parcours la hierarchie depuis l'aliment donné en argument jusqu'au feuilles, en recursif, et renvoie le tableau des cocktails associés à l'aliment
    global $Hierarchie;
 
    $cocktail_valide = array();
    //on verifie si l'aliment donné est une feuille(donc pas de sous categorie) ou non
    if(array_key_exists("sous-categorie", $Hierarchie[$aliment])) {
        //si oui, pour chaque ingredient de la sous categorie de l'aliment, on compare l'ingredient à un des ingredients des cocktails, et si il y match, on enregistre le cocktail avec comme index son titre puis on descend dans l'arbre
        foreach($Hierarchie[$aliment] as $key => $categorie) {
            if($key == "sous-categorie") {
                foreach($categorie as $sous_aliment)
                {
                    foreach($cocktail['index'] as $ingredient_recette) {
                        if($ingredient_recette == $sous_aliment) {
                            $cocktail_valide[$cocktail['titre']] = $cocktail;
                        }
                    }
                    $cocktail_valide = array_merge(match_cocktail($sous_aliment,$cocktail),$cocktail_valide);
                }
            }
        }
    }
    else {
        //si non on compare l'ingredient à un des ingredients des cocktails, et si il y match, on enregistre le cocktail avec comme index son titre
        foreach($cocktail['index'] as $ingredient_recette) {
            if($ingredient_recette == $aliment) {
                $cocktail_valide[$cocktail['titre']] = $cocktail;
            }
        }         
    }
    return $cocktail_valide;
}


function recherche_cocktail($aliment){

    global $Recettes;
    $tab_cocktail_valide = array();
    $cmp = 0;
    foreach($Recettes as $cocktail){
        $cocktail_valide = match_cocktail($aliment,$cocktail);
        if($cocktail_valide==true){
            $tab_cocktail_valide[$cmp] = $cocktail;
            $cmp ++;
        }
    }
    return $tab_cocktail_valide;
}

/**
 * Recherche les sous-catégorie d'un aliment donné
 *
 * @param string $aliment Nom de l'aliment 
 *               Ex: Fruit à noyau, Pistache ...
 * 
 * @param array $hierarchie_aliments Tableau d'aliment qui possède (ou non) une sous-catégorie d'éléments et une super-catégorie
 *              Ex: Voici un élément du Tableau
 *                  [Agrume]
 *                  ----> sous-catégorie = [Citron vert, Orange]
 *                  ----> super-catégorie = [Fruit]
 * 
 * @return array $sous_categorie Tableau d'aliments
 */
function recherche_sous_categorie_aliment($aliment){

    global $Hierarchie;
    $sous_categorie = array();
    $cmp = 0;
    foreach($Hierarchie[$aliment] as $key => $categorie)
    {
        if($key == "sous-categorie") {
            foreach($categorie as $ingr)
            {
                $sous_categorie[$cmp] = $ingr;
                $cmp ++;
            }
        }    
    }
    return $sous_categorie;
}


