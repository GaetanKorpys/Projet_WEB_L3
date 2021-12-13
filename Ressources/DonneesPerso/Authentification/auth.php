<?php

function connexionUser($login,$mdp){
    $connecte = false;
    $user = getUser($login);
    if(password_verify($mdp,$user["hash"])){
        $connecte = true;
    }
    return $connecte;
}


function getUser($login){       
    
    if(file_exists("../Ressources/DonneesPerso/Utilisateurs/".$login."User.json")){
        $contents = file_get_contents("../Ressources/DonneesPerso/Utilisateurs/".$login."User.json");
        $data = json_decode($contents,true);
        return $data;
    }else{
        return null;
    }
}


function addUserJson($data){
    if($data["login"] !== null){
        $filename = "../Ressources/DonneesPerso/Utilisateurs/".$data["login"]."User.json";
        $file = fopen($filename, 'a+');
        fputs($file, json_encode($data));
        fclose($file);
        return true;
    }
    else{
        return false;
    }
}

function modifUserJson($data,$login){
    if(file_exists("../Ressources/DonneesPerso/Utilisateurs/".$login."User.json")){
        $file = fopen("../Ressources/DonneesPerso/Utilisateurs/".$login."User.json", 'w');
        fputs($file, json_encode($data));
        fclose($file);
        
        return true;
    }else{
        return false;
    }
}

/**
 * Vérifie si un utilisateur est connecté.
 * 
 * @return bool 
 */
function est_connecte(){
    if(session_status() === PHP_SESSION_NONE){
        session_start();
    }
    return(!empty($_SESSION["connecte"]));
}

function est_vide($chaine)
{
  return (trim($chaine)=='');
}


function loginUnique($login){
    if(getUser($login)==null)return true;
    return false;
}