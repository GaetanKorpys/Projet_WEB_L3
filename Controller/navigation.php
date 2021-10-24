<?php  include("../Data/Donnee/Donnees.inc.php")?> 

<nav>

    <label>Aliment Courant</label>

    <a href="#">Aliment</a>

    <label>Sous-catégories :</label>
    <!-- debut de generation PHP -->
    <?php

    echo "<ul>";
    foreach($Hierarchie['Aliment'] as $TabIngr)
    {
        foreach($TabIngr as $ingr)
        {
            echo "<li>";
            echo "<a href='alimentcourant=$ingr'>$ingr</a>";
            echo "</li>";
        }
    }
    echo "</ul>";
    ?>
    <!-- fin de generation PHP -->
</nav>


