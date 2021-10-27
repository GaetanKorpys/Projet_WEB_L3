<?php 

function parcours_ingredient($aliment)
{
    //parcours la hierarchie depuis l'aliment donné en argument jusqu'au feuilles, en recursif, et renvoie le tableau des cocktails associés à l'aliment
    global $Hierarchie;
    global $cocktail;
    $cocktail_valide = array();
    //on verifie si l'aliment donné est une feuille(donc pas de sous categorie) ou non
    if(array_key_exists("sous-categorie", $Hierarchie[$aliment])) {
        //si oui, pour chaque ingredient de la sous categorie de l'aliment, on compare l'ingredient à un des ingredients des cocktails, et si il y match, on enregistre le cocktail avec comme index son titre puis on descend dans l'arbre
        foreach($Hierarchie[$aliment] as $key => $categorie) {
            if($key == "sous-categorie") {
                foreach($categorie as $ingredient)
                {
                    foreach($cocktail['index'] as $ingredient_recette) {
                        if($ingredient_recette == $ingredient) {
                            $cocktail_valide[$cocktail['titre']] = $cocktail;
                        }
                    }
                    $cocktail_valide = array_merge(parcours_ingredient($ingredient),$cocktail_valide);
                }
            }
        }
    }
    else {
        //si non on compare l'ingredient à un des ingredients des cocktails, et si il y match, on enregistre le cocktail avec comme index son titre
        foreach($cocktail['index'] as $ingredient_recette) {
            if($ingredient_recette == $aliment) {
                $cocktail_valide[$cocktail['titre']] = $cocktail;
                }
            }         
    }
    return $cocktail_valide;
}

?>

<?php  

    $cocktail_valide = array();
    include("../Data/Donnee/Donnees.inc.php");
    $path = "../Data/Donnee/Photos/";
    foreach($Recettes as $cocktail)
    {
        $aliment = extraire_arg("alimentcourant");
        if($aliment == "") {
            $aliment = "Aliment";
        }

        $cocktail_valide = parcours_ingredient($aliment);
        //pour chaque index (donc titre de cocktail) unique du tableau de cocktail associé à l'aliment courant
        foreach(array_unique($cocktail_valide) as $cocktail_selection) {
            echo $cocktail['titre'];
            echo "</br>";
      
            $img=str_replace(" ", "_",$cocktail['titre'] );
            $img=str_replace("'","",$img);
            $img=str_replace("ï","i",$img);
            $img=str_replace("ñ","n",$img);
      
            if(file_exists($path.$img.".jpg"))
            {
                $image=$path.$img.".jpg";
            }
            else
            {
                $image="../Data/DonneePerso/cocktail.png";
            }

            print"<img src='$image'/>";

            echo "</br>";
            echo'<div id="Ingrédients"';
            foreach($cocktail['index'] as $index)
            {
                echo "$index";
                echo "</br>";
            }
            echo"</div>";
            echo "</br>";
        }
    }
?>
