<?php

/**
 * Extraction d'un argument voulu depuis l'url
 * 
 * @param string $arg_url Nom de l'argument recherché
 * @return string $valeur_arg Renvoie la valeur de $arg_url ou une chaine vide si arg_url n'existe pas dans l'url
 */
function get_valeur_arg_url($arg_url)
{
    $valeur_arg="";
    if(isset($_GET[$arg_url])) {
        $valeur_arg = $_GET[$arg_url];
    }
    return $valeur_arg;
}

/**
 * Affecte la valeur par défaut "Aliment" à une clé de l'url si sa valeur est "" (une chaine vide) 
 * 
 * @param string $arg_url Nom de l'argument recherché
 * @return string $valeur_arg Renvoie la valeur de $arg_url qui vaut soit :
 *                          - Aliment
 *                          - $_GET[$arg_url]
 */
function affecte_valeur_defaut_aliment($arg_url){
    $valeur_arg = get_valeur_arg_url($arg_url);
    if ($valeur_arg == "") {
        $valeur_arg = "Aliment";
    }
    return $valeur_arg;
}
/**
 * Vérifie si le titre parsé d'un cocktail correspond à une image.
 * Si ce n'est pas le cas, on associe alors une image par défaut au cocktail.
 * 
 * @param string $nom_image_parser Nom de l'image déjà parsé (remplacement des " " par "_", "ï" par "i" ect)
 * @param string $chemin Chemin relatif pour accéder aux images (se termine par "/")
 *               Ex : "../Ressources/DonneesProjet/Photos/"
 * 
 * @return string $nom_image Renvoie le nom de l'image
 */
function verif_nom_image($nom_image_parser,$chemin){

    if(file_exists($chemin.$nom_image_parser.".jpg")){
        $nom_image = $chemin.$nom_image_parser.".jpg";
    }else{
        $nom_image = $chemin."cocktail.png";
    }
    
    return $nom_image;
}

/**
 * Permet d'obtenir le nom (le lien) de l'image qui correspond à un cocktail
 * passé en paramètre.
 * 2 étapes :
 *      - Parsage du titre du cocktail
 *      - Vérification pour savoir si on match ou non une image (si non alors on assigne une image par défaut)
 * 
 * @param string $titre_cocktail Titre du cocktail
 *
 * @return string $nom_image Renvoie le nom de l'image qui correspond au titre du cocktail
 */
function get_image($titre_cocktail){
    $nom_parse=str_replace(" ", "_",$titre_cocktail );
    $nom_parse=str_replace("'","",$nom_parse);
    $nom_parse=str_replace("ï","i",$nom_parse);
    $nom_parse=str_replace("ñ","n",$nom_parse);

    $nom_image = verif_nom_image($nom_parse,"../Ressources/DonneesProjet/Photos/");
    return $nom_image;
}
