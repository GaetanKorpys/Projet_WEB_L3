<?php
require_once "../Modele/modele.php";

function recette($id_cocktail){

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

    $cocktail = get_coktail($id_cocktail);
    $tab_quantite = get_quantite($cocktail);

    //Gestion de la Vue de la page Cocktail
    require_once "../Vue/recette.php";

    //Gestion de la Vue du header + footer
    require_once '/Include/template.inc.php';
}