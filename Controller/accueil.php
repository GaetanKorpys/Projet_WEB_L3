<?php
require_once "../Modele/modele.php";

/**
 * Permet d'afficher la Vue de l'accueil
 * 
 */
function accueil(){
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

    require_once '../Vue/accueil.php';
    require_once '/Include/template.inc.php';
}