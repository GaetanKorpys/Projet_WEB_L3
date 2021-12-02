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
        //si non, pour chaque ingredient de la sous categorie de l'aliment, on compare l'ingredient à un des ingredients des cocktails, et si il y match, on enregistre le cocktail avec comme index son titre puis on descend dans l'arbre
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
        //si oui on compare l'ingredient à un des ingredients des cocktails, et si il y match, on enregistre le cocktail avec comme index son titre
        foreach($cocktail['index'] as $ingredient_recette) {
            if($ingredient_recette == $aliment) {
                $cocktail_valide[$cocktail['titre']] = $cocktail;
            }
        }         
    }
    return $cocktail_valide;
}

/**
 * Pemret d'obtenir un Tableau de cocktail.
 * Chaque cocktail possède l'aliment passé en paramètre.
 * 
 * Algo :
 * On parcours $Recettes et on vérifie pour chaque élément (cocktail) si
 * celui-ci contient $aliment. 
 * 
 * Si c'est le cas, on ajoute ce cocktail dans $tab_cocktail_valide.
 *
 * @param string $aliment Nom de l'aliment 
 *               Ex: Fruit à noyau, Pistache ...
 * 
 * 
 * @return array $tab_cocktail_valide Tableau de cocktail
 */
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



/**
 * Renvoie le l'identifiant du cocktail (qui se trouve dans Donnees.inc.php) passé en paramètre 
 *
 * @param array $cocktail_recherche Cocktail 
 * @return int $id Identifiant du cocktail passé en paramètre
 */
function get_id($cocktail_recherche){
    global $Recettes;
    $id = array_search($cocktail_recherche,$Recettes);
    return $id;
}


/**
 * Renvoie le cocktail situé à la position $id du Tableau $Recettes
 *
 * @param int $id identifiant (position) du cocktail 
 * @return array Renvoie un cocktail
 */
function get_coktail($id){
    global $Recettes;
    return($Recettes[$id]);
}

/**
 * Recherche dans le fichier Donnes.inc.php les elemnts feuilles qui vérifient cette propriété : 
 *      - ils ils font partie d''un aliment ou sous-aliment de celui donné en paramètre
 * 
 * Pour cela, on parcours la hierarchie depuis l'aliment donné en paramètre jusqu'au feuilles, 
 * en recursif, et renvoie le tableau des aliments descendants associés à l'aliment
 *
 * @param string $aliment Nom de l'aliment 
 *               Ex: Fruit à noyau, Pistache ...
 * 
 * @return array $abre_aliment Tableau d'aliments etant element feuille de l'aliment donné en paramètre
 */

function descendant_aliment($aliment)
{
    //parcours la hierarchie depuis l'aliment donné en argument jusqu'au feuilles, en recursif, et renvoie les aliments descendants
    global $Hierarchie;
 
    $arbre_aliment = array();
    //on verifie si l'aliment donné est une feuille(donc pas de sous categorie) ou non
    if(array_key_exists("sous-categorie", $Hierarchie[$aliment])) {
        //si non, pour chaque ingredient de la sous categorie de l'aliment, on descend dans l'arbre pour recuperer les feuilles
        foreach($Hierarchie[$aliment] as $key => $categorie) {
            if($key == "sous-categorie") {
                foreach($categorie as $sous_aliment)
                {
                    $arbre_aliment = array_merge(descendant_aliment($sous_aliment),$arbre_aliment);
                }
            }
        }
    }
    else {
        //si oui on enregiste l'aliment dans les descsendants
        $arbre_aliment[] = $aliment;        
    }
    return $arbre_aliment;
}

/**
 * Renvoie une liste d'aliments voulu, non voulu et non reconnus en fonction de la recherche
 *
 * @param tab_string $search_string_tab liste contenant les chaines de caractère à étudier
 * @return array Renvoie une liste contenant une liste des aliments voulu, une liste des aliments non voulu et une liste des aliments non reconnus
 */
function search_string_result($search_string_tab){

    global $Hierarchie;

    $tab_aliment = array();
    $aliment_a_trier = array();
    $aliment_voulu = array();
    $aliment_non_voulu = array();
    $aliment_voulu_reconnu = array();
    $aliment_non_voulu_reconnu = array();
    $aliment_non_reconnu = array();
    //on separe les aliments composés des aliments voulus et non voulus et on enleve les doubles quotes
    foreach($search_string_tab as $string) {
        if(strpos($string, '*') !== false || strpos($string, "-") !== false) {  //selection des aliments avec un + ou - devant
            if(strpos($string, '"') != 0) {                                     //avec des doubles quotes
                $aliment = substr_replace($string,"",1,1);
                $aliment = substr_replace($aliment,"",strlen($aliment)-1,1); // -"jus de fruit" -> -jus de fruit
                $aliment_a_trier[] = $aliment;
            }
            else {
                $aliment_a_trier = array_merge(explode(' ',$string),$aliment_a_trier);      //aliment sans double quotes à trier entre voulu et non voulu
            }
        }
        else {
            if(strpos($string, '"') !== false) {                                //selection des aliments simplement entre double quotes (donc voulu)
                $aliment = substr_replace($string,"",0,1);
                $aliment = substr_replace($aliment,"",strlen($aliment)-1,1); // "jus de fruit" -> jus de fruit
                $aliment_voulu[] = $aliment;
            }
            else {
                $aliment_voulu[] = $string;                                     //sans + ni - ni double quotes donc aliment voulu
            }
        }
    }

    //on trie les aliments voulus et non voulus, et on enleve les + et -
    foreach($aliment_a_trier as $string) {
        if(strpos($string, "*") !== false) {
            if(substr($string, 0, 1)=="*") {
                $aliment = substr_replace($string,"",0,1);  // *pomme -> pomme
                $aliment_voulu[] = $aliment;
            }
            else {
                $aliment_non_voulu[] = $string;
            }
        }
        else if(strpos($string, '-') !== false) {
            if(substr($string, 0, 1)=="-") {
                $aliment = substr_replace($string,"",0,1);  // -pomme -> pomme
                $aliment_non_voulu[] = $aliment;
            }
            else {
                $aliment_non_voulu[] = $string;
            }
        }
        else {
            $aliment_voulu[] = $string;
        }
    }

    foreach($aliment_voulu as $aliment) {
        //on verifie si l'aliment donné existe
        if(array_key_exists($aliment, $Hierarchie)) {
            $aliment_voulu_reconnu[] = $aliment;
        }
        else {
            $aliment_non_reconnu[] = $aliment;
        }
    }

    foreach($aliment_non_voulu as $aliment) {
        //on verifie si l'aliment donné existe
        if(array_key_exists($aliment, $Hierarchie)) {
            $aliment_non_voulu_reconnu[] = $aliment;
        }
        else {
            $aliment_non_reconnu[] = $aliment;
        }
    }

    $tab_aliment["voulu"] = $aliment_voulu_reconnu;
    $tab_aliment["non_voulu"] = $aliment_non_voulu_reconnu;
    $tab_aliment["non_reconnu"] = $aliment_non_reconnu;

    return $tab_aliment;
}

/**
 * Renvoie la liste des cocktails trié en fonction des paramètres de la recherche
 *
 * @param array $tableau_cocktail liste contenant les cocktails ayant dans sa recette des aliments voulu et non voulus 
 * @param array $tab_voulu liste contenant les aliments voulu 
 * @param array $tab_non_voulu liste contenant les aliments non voulus
 *
 * @return array Renvoie une liste contenant les coktails trié en fonctions des aliments voulus ou non voulus
 */

function satisfactionCocktail($tableau_cocktail, $tab_voulu, $tab_non_voulu) {
    $classement_cocktails = array();
    $classement_cocktail_trié = array();
    $satisfaction = array();
    //on crée une liste assoiant les cocktails à des degrés de satisfaction pour la recherche
    foreach($tableau_cocktail as $cocktail) {
        $classement_cocktails[$cocktail["titre"]] = array("cocktail" => $cocktail, "satisfaction" => 0);
    }
    //pour chaque aliment voulu, on augmente le degré de satisfaction
    foreach($tab_voulu as $aliment) {
        foreach($classement_cocktails as &$cocktail_and_satisfaction) {
            foreach($cocktail_and_satisfaction as $key => $cocktail) {
                foreach((array)$cocktail['index'] as $key => $ingredient_recette) {
                    if($ingredient_recette == $aliment) {
                        $cocktail_and_satisfaction['satisfaction'] += 1;
                    }
                }
            }
        }
    }
    //on effectue l'inverse pour les aliments non voulus
    foreach($tab_non_voulu as $aliment) {
        foreach($classement_cocktails as &$cocktail_and_satisfaction) {
            foreach($cocktail_and_satisfaction as $key => $cocktail) {
                foreach((array)$cocktail['index'] as $key => $ingredient_recette) {
                    if($ingredient_recette == $aliment) {
                        $cocktail_and_satisfaction['satisfaction'] -= 1;
                    }
                }
            }
        }
    }
    //on extrait les degrés de satisfaction des cocktails
    foreach ($classement_cocktails as $key => $row) {
        $satisfaction[$key]  = $row['satisfaction'];
    }
    //on se sert des degrés de satisfaction pour trier les cocktails par la suite (le tri des degrés de satisfation trie les cocktails)
    array_multisort($satisfaction, SORT_DESC, $classement_cocktails);
    foreach ($classement_cocktails as $key => $row) {
        $classement_cocktail_trié[]  = $row['cocktail'];
    }
    return $classement_cocktail_trié;
}
