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
function cocktail($aliment){
    
    if(!empty($_POST['loginConnexion']) && !empty($_POST['motdepasseConnexion'])){
        if(connexionUser($_POST['loginConnexion'],$_POST['motdepasseConnexion'])){
            session_start();
            $_SESSION["connecte"]=$_POST['loginConnexion'];
        }
    }

    if(est_connecte()){
        $login = $_SESSION["connecte"];
        require_once "../Vue/Include/connexionMembre.php";
    }
    else{
        require_once "../Vue/Include/connexionDefaut.php";
    }

    $aliment_courant = affecte_valeur_defaut_aliment($aliment);
    $tab_cocktail_valide = recherche_cocktail($aliment_courant);

    /*$tab_aliment = array("voulu" => "", "non_voulu" => "", "non_reconnu" => "");
    $tab_cocktail_voulu = array();
    $tab_cocktail_non_voulu = array();
    $tab_cocktail_non_reconnu = array();
    $classement_cocktail = array();
    $reponse ='';

    $search = trim(get_valeur_arg_url("search"));
    if(fmod(substr_count($search,'"'), 2) == 0) {
        $tab_search = explode('"',$search);
        $tab_aliment = search_string_result($tab_search);
        foreach($tab_aliment["voulu"] as $aliment) {
            $tab_cocktail_voulu = recherche_cocktail($aliment);
        }
        foreach($tab_aliment["non_voulu"] as $aliment) {
            $tab_cocktail_non_voulu = recherche_cocktail($aliment);
        }
        $classement_cocktail = array_unique(array_merge($tab_cocktail_voulu,$tab_cocktail_non_voulu), SORT_REGULAR);
        $classement_cocktail = satisfactionCocktail($classement_cocktail,$tab_aliment["voulu"], $tab_aliment["non_voulu"]);
        // reconnaissance et affichage des cocktails avec degre de satisfaction
    }
    else {
        $reponse = 'Problème de syntaxe dans votre requête : nombre impair de double-quotes';
    }*/
    
    $sous_categorie = recherche_sous_categorie_aliment($aliment_courant);

    //Gestion de la navigation
    require_once "Include/nav.inc.php";

    //Gestion de la Vue de la page Cocktail
    require_once "../Vue/cocktail.php";

    //Gestion de la Vue du header + footer
    require_once '/Include/template.inc.php';
}


