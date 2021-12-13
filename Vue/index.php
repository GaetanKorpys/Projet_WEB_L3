<?php
require_once "../Controller/accueil.php";
require_once "../Controller/cocktail.php";
require_once "../Controller/recette.php";
require_once "../Controller/recherche.php";
require_once "../Controller/inscription.php";
require_once "../Controller/deconnexion.php";
require_once "../Controller/profil.php";
require_once "../Ressources/DonneesPerso/Utilitaire/fonction.inc.php";
require_once "../Ressources/DonneesPerso/Authentification/auth.php";

/**
 * Centralise la gestion de la redirection des pages.
 * 
 * Tous les liens renvoient vers la page index.php qui se charge de
 * rediriger correctement l'utilisateur selon les valeurs de l'url.
 * On appel ensuite le Controller adéquat qui se charge de gérer la vue dynamique d'une page.
 * 
 */
function routerRequete(){

  //Si l'url ne contient aucun argument alors on affiche l'accueil
  if (!isset($_GET["page"])) {
    accueil();
  } else {
    switch ($_GET["page"]) {
      case "cocktail":
        cocktail("alimentcourant");
        break;

      case "recette":
        if(isset($_GET["cocktail"])){
          recette($_GET["cocktail"]);
        }else{
          echo"erreur 404";
        }
        break;

      case "recherche":
        recherche("alimentcourant");
        break;

      case "inscription":
        inscription();
        break;

      case "deconnexion":
        deconnexion();
        break;

      case "profil":
        profil();
        break;

      case "favoris":
        //favoris();
    }
  }
}

routerRequete();

?>