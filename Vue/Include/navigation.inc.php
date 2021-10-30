<?php ob_start(); ?>

<nav class=" min-w-max bg-gray-900 p-3 mt-6 rounded-lg border-2 border-white border-opacity-75 ">
    <div>
        <h1 class="mb-3">Aliment Courant</h1>
        <a href=<?="../Vue/index.php?page=cocktail&alimentcourant=Aliment"?> ><?="Aliment"?></a>
        <?php foreach(array_unique($ariane) as $etape ): ?>
            <?php $new_path = $new_path."_".$etape; ?>
            <a href=<?="../Vue/index.php?page=cocktail&alimentcourant=$etape&ariane=$new_path"?>><?=$etape?></a>
        <?php endforeach ?>
        <h2 class="mt-2">Sous-catégories :</h2>
    </div>    
    <div>
        <ul>
            <?php foreach($sous_categorie as $aliment ): ?>
                <li>
                    <a href="<?= "../Vue/index.php?page=cocktail&alimentcourant=$aliment&ariane=$new_path"."_"."$aliment" ?>"><?=$aliment?></a>
                </li>
            <?php endforeach ?>
        </ul>
    </div>
</nav>

<?php $nav = ob_get_clean(); ?>
