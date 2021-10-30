<?php
require_once "../Controller/accueil.php";
require_once "../Controller/cocktail.php";
require_once "../Ressources/DonneesPerso/Utilitaire/fonction.inc.php";

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
        //recette();
        break;
    }
  }
}

/**
 * Reste à gérer cette partie 
 * 
* foreach(array_unique($ariane) as $etape) {
*   if(!in_array($etape, array_keys($Hierarchie))) {
*     echo "Mauvais URL\n";
*       echo"<a href=".">Accueil</a>";
*         exit();
*    }
* }
*
*  foreach(array_unique($ariane) as $etape) {
*    $new_path = $new_path."_".$etape;
*       echo "<a href='?alimentcourant=$etape&ariane=$new_path'>$etape</a>"."\n";
*    }
*/

routerRequete();

?>