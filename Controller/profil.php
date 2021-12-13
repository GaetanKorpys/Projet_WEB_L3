<?php

function profil(){
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

    $userModif = getUser($login);
    $message=array();
    if(isset($_POST["submit"])) {
                    
        if(!est_vide($_POST["motdepasse"])) $userModif['hash']=password_hash($_POST["motdepasse"],PASSWORD_DEFAULT);
        
        if(!est_vide($_POST["nom"]) &&  preg_match("/^[a-z '-]+$/i",$_POST["nom"])){
            $userModif['nom']=$_POST["nom"];
        }else{
            if(!est_vide($_POST["nom"])) array_push($message,"Erreur : nom incorrect");
        }
        if(!est_vide($_POST["prenom"]) &&  preg_match("/^[a-z '-]+$/i",$_POST["nom"])){
            $userModif['prenom']=$_POST["prenom"];
        }else{
            if(!est_vide($_POST["prenom"])) array_push($message,"Erreur : prenom incorrect");
        }  
        if(isset($_POST["sexe"])) $userModif['sexe']=$_POST["sexe"];
        if(!est_vide($_POST["datenaissance"]) && getAge($_POST["datenaissance"])>=18){
            $userModif['datenaissance']=$_POST["datenaissance"];
        }else{
            if(!est_vide($_POST["datenaissance"])) array_push($message,"Erreur : vous n'etes pas majeur(e)");   
        }
        if(!est_vide($_POST["mail"])) $userModif['mail']=$_POST["mail"];
        if(!est_vide($_POST["telephone"]) && preg_match("/^(?:(?:\+|00)33|0)\s*[1-9](?:[\s.-]*\d{2}){4}$/",$_POST["telephone"])){
            $userModif['telephone']=$_POST["telephone"];
        }else{
            if(!est_vide($_POST["telephone"])) array_push($message,"Erreur : numéro de télépone incorrect");
        }
        if(!est_vide($_POST["adresse"])) $userModif['adresse']=$_POST["adresse"];
        if(!est_vide($_POST["codepostale"])) $userModif['codepostale']=$_POST["codepostale"];
        if(!est_vide($_POST["ville"])) $userModif['ville']=$_POST["ville"];       

        if(empty($message)){
            array_push($message,"Modification terminée avec succès !");
            modifUserJson($userModif,$login);
        }
    }

    //Gestion de la Vue de la page Profil
    require_once "../Vue/profil.php";

    //Gestion de la Vue du header + footer
    require_once '/Include/template.inc.php';
}