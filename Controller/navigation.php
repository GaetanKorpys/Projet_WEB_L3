<?php  include("../Data/Donnee/Donnees.inc.php") ?> 

<?php
//extraction d'un argument voulu depuis l'url
function extraire_arg($arg_voulu)
{
    $arg="";
   if(isset($_GET[$arg_voulu])) {
        $arg = $_GET[$arg_voulu];
   }
   return $arg;
}

?>

<nav>

    <label>Aliment Courant</label>

    <a href=".#">Aliment</a>

    <label>Sous-catégories :</label>
    <!-- debut de generation PHP -->
    <?php

    //on prend soit l'aliment de l'url soit l'aliment par defaut (Aliment) si pas défini
    $aliment = extraire_arg("alimentcourant");
    if($aliment == "") {
        $aliment = "Aliment";
    }

    echo "<ul>";
    
    //pour chaque ingredient associé a notre aliment courant, si celui-ci fait bien parti d'une sous-categorie
    foreach($Hierarchie[$aliment] as $key => $categorie)
    {
        if($key == "sous-categorie") {
            foreach($categorie as $ingr)
            {
                echo "<li>";
                echo "<a href='?alimentcourant=$ingr'>$ingr</a>";
                echo "</li>";
            }
        }
    }
    echo "</ul>";
    ?>
    <!-- fin de generation PHP -->
</nav>


