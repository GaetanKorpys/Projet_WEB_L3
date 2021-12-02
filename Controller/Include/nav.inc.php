<?php

//on prend soit l'aliment de l'url soit l'aliment par defaut (Aliment) si pas défini
$aliment = get_valeur_arg_url("alimentcourant");

//on extrait le chemin depuis l'url, si pas de chemin, on part de aliment, sinon on rajoute l'ingredient choisi au chemin actuel
$path = get_valeur_arg_url("ariane");

//on extrait du chemin chaque aliment et on enlève "Aliment" pour éviter le doublon avec celui existant. On crée un nouveau chemin pour l'utiliser plus tard
$ariane = explode("_",$path);
unset($ariane[0]);
$new_path ="Aliment";

require_once "../Vue/Include/navigation.inc.php";