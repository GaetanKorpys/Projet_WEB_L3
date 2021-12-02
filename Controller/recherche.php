<?php
require_once "../Modele/modele.php";


/**
 * Permet la gestion des cocktails
 * On récupère les informations nécéssaires pour la Vue grâce aux fonctions du Modèle  
 * 
 * La fonction/procédure "renvoie" un require. En loccurence ici, il s'agit de l'affichage de la Vue
 * 
 * @param string $aliment Nom de l'aliment à recherché dans le Modèle
 * 
 */
function recherche($aliment){
    

    $aliment_courant = affecte_valeur_defaut_aliment($aliment);

    $tab_aliment = array("voulu" => "", "non_voulu" => "", "non_reconnu" => "");
    $tab_aliment_voulu = array();
    $tab_aliment_non_voulu = array();
    $tab_cocktail_voulu = array();
    $tab_cocktail_non_voulu = array();
    $tab_cocktail_non_reconnu = array();
    $classement_cocktail = array();
    $reponse ='';

    $search = trim(get_valeur_arg_url("search"));
    //si le nombre de double quotes est pair, on remplace les espaces suivi des symboles par des "_'symbole'" et on separe chaque element (desormais séparés par des "_")
    if(fmod(substr_count($search,'"'), 2) == 0) {
        $search=strtr($search,array(" -" => "_-", " *" => "_*"));
        $tab_search = explode('_',$search);
        $tab_aliment = search_string_result($tab_search);
        //on  recupere tous les aliments descendants des aliments de la recherche
        foreach($tab_aliment["voulu"] as $aliment) {
            $tab_aliment_voulu = array_unique(array_merge(descendant_aliment($aliment),$tab_aliment_voulu));
        }
        foreach($tab_aliment["non_voulu"] as $aliment) {
            $tab_aliment_non_voulu = array_unique(array_merge(descendant_aliment($aliment),$tab_aliment_non_voulu));
        }
        //on recherche les cocktails contenant les aliments de la recherche
        foreach($tab_aliment_voulu as $aliment) {
            $tab_cocktail_voulu = array_merge(recherche_cocktail($aliment),$tab_cocktail_voulu);
        }
        foreach($tab_aliment_non_voulu as $aliment) {
            $tab_cocktail_non_voulu = array_merge(recherche_cocktail($aliment),$tab_cocktail_non_voulu);
        }
        //on elimine les cocktails en trop et on trie les cocktails
        $classement_cocktail = array_unique(array_merge($tab_cocktail_voulu,$tab_cocktail_non_voulu), SORT_REGULAR);
        $classement_cocktail = satisfactionCocktail($classement_cocktail,$tab_aliment_voulu, $tab_aliment_non_voulu);
        // a faire : recuperation de la recherche depuis la barre avec remplacement des + par des *
    }
    else {
        $reponse = 'Problème de syntaxe dans votre requête : nombre impair de double-quotes';
    }
    
    $sous_categorie = recherche_sous_categorie_aliment($aliment_courant);

    //Gestion de la navigation
    require_once "Include/nav.inc.php";

    //Gestion de la Vue de la page Cocktail
    require_once "../Vue/recherche.php";
}