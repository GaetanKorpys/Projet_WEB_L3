<?php

function printFavoris(){

    if(!empty($_POST['loginConnexion']) && !empty($_POST['motdepasseConnexion'])){
        if(connexionUser($_POST['loginConnexion'],$_POST['motdepasseConnexion'])){
            session_start();
            $_SESSION["connecte"]=$_POST['loginConnexion'];
        }
    }
    $tab_cocktail_valide = recherche_cocktail("Aliment");
    if(est_connecte()){
        $login = $_SESSION["connecte"];
        require_once "../Vue/Include/connexionMembre.php";

        
        $tab_IdCockatil_favoris=getTabFav($login);
      
    }
    else{
        header("Location: ../Vue/index.php?page=inscription");
        require_once "../Vue/Include/connexionDefaut.php";
    }

    //Gestion de la Vue de la page Cocktail
    require_once "../Vue/favoris.php";

    //Gestion de la Vue du header + footer
    require_once '/Include/template.inc.php';
}


function addFavoris($id_cocktail){

    if(!empty($_POST['loginConnexion']) && !empty($_POST['motdepasseConnexion'])){
        if(connexionUser($_POST['loginConnexion'],$_POST['motdepasseConnexion'])){
            session_start();
            $_SESSION["connecte"]=$_POST['loginConnexion'];
        }
    }
 
    if(est_connecte()){
        $login = $_SESSION["connecte"];
        addFavorisJson($login,$id_cocktail);
        header("Location: ../Vue/index.php?page=favoris");
    }else{
        header("Location: ../Vue/index.php?page=inscription");
    }
    
}