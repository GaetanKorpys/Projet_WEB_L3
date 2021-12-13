<?php

function inscription(){

    $message=array();

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
    

    if(isset($_POST["submit"])) {
        if( !est_vide($_POST["login"]) && !est_vide($_POST["motdepasse"]) ){
            if(preg_match("/^[a-z0-9]+$/i",$_POST["login"]) && loginUnique($_POST["login"]))
            {
                $user = array('login'=>$_POST['login'],'hash'=>password_hash($_POST["motdepasse"],PASSWORD_DEFAULT));
                if(!est_vide($_POST["nom"]) &&  preg_match("/^[a-z '-]+$/i",$_POST["nom"])){
                    $user['nom']=$_POST["nom"];
                }else{
                    if(!est_vide($_POST["nom"])) array_push($message,"Erreur : nom incorrect");
                }
                if(!est_vide($_POST["prenom"]) &&  preg_match("/^[a-z '-]+$/i",$_POST["nom"])){
                    $user['prenom']=$_POST["prenom"];
                }else{
                    if(!est_vide($_POST["prenom"])) array_push($message,"Erreur : prenom incorrect");
                }  
                if(isset($_POST["sexe"])) $user['sexe']=$_POST["sexe"];
                if(!est_vide($_POST["datenaissance"]) && getAge($_POST["datenaissance"])>=18){
                    $user['datenaissance']=$_POST["datenaissance"];
                }else{
                    if(!est_vide($_POST["datenaissance"])) array_push($message,"Erreur : vous n'etes pas majeur(e)");   
                }
                if(!est_vide($_POST["mail"])) $user['mail']=$_POST["mail"];
                if(!est_vide($_POST["telephone"]) && preg_match("/^(?:(?:\+|00)33|0)\s*[1-9](?:[\s.-]*\d{2}){4}$/",$_POST["telephone"])){
                    $user['telephone']=$_POST["telephone"];
                }else{
                    if(!est_vide($_POST["telephone"])) array_push($message,"Erreur : numéro de télépone incorrect");
                }
                if(!est_vide($_POST["adresse"])) $user['adresse']=$_POST["adresse"];
                if(!est_vide($_POST["codepostale"])) $user['codepostale']=$_POST["codepostale"];
                if(!est_vide($_POST["ville"])) $user['ville']=$_POST["ville"];       

                if(empty($message)){
                    array_push($message,"Inscription terminée avec succès !");
                    addUserJson($user);
                }
            }
            else{
                array_push($message,"Erreur : login incorrect");
            }
        }else{
            array_push($message,"Vous devez remplir obligatoirement les champs Login et Mot de passe.");
        }
    }

    require_once "../Vue/inscription.php";
    require_once '/Include/template.inc.php';
}