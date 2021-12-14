<?php
require_once "../Modele/modele.php";


/**
 * Permet la gestion des cocktails
 * On r�cup�re les informations n�c�ssaires pour la Vue gr�ce aux fonctions du Mod�le  
 * 
 * La fonction/proc�dure "renvoie" un require. En loccurence ici, il s'agit de l'affichage de la Vue
 * 
 * @param string $aliment Nom de l'aliment � recherch� dans le Mod�le
 * 
 */
function recherche($aliment){
    
    if(!empty($_POST['loginConnexion']) && !empty($_POST['motdepasseConnexion'])){
        if(connexionUser($_POST['loginConnexion'],$_POST['motdepasseConnexion'])){
            session_start();
            $_SESSION["connecte"]=$_POST['loginConnexion'];
        }
    }

    if(est_connecte()){
        $login = $_SESSION["connecte"];
        $tab_IdCockatil_favoris=getTabFav($login);
        require_once "../Vue/Include/connexionMembre.php";
    }
    else{
        require_once "../Vue/Include/connexionDefaut.php";
    }

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
    //si le nombre de double quotes est pair, on remplace les espaces suivi des symboles par des "_'symbole'" et on separe chaque element (desormais s�par�s par des "_")
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
        $reponse = 'Probleme de syntaxe dans votre requete : nombre impair de double-quotes';
    }
    
    $sous_categorie = recherche_sous_categorie_aliment($aliment_courant);

    //Gestion de la navigation
    require_once "Include/nav.inc.php";

    //Gestion de la Vue de la page Cocktail
    require_once "../Vue/recherche.php";
}