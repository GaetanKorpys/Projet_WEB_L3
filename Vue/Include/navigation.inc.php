<?php ob_start(); ?>

<nav class=" flex flex-col h-full min-w-max bg-white p-4 space-y-10">
    <div>
        <h1 class="mb-3 font-bold pt-10">Aliment Courant :</h1>
        <a class="hover:underline" href=<?="../Vue/index.php?page=cocktail&alimentcourant=Aliment"?> ><?="Aliment"?></a>
        <?php foreach(array_unique($ariane) as $etape ): ?>
            <?php $new_path = $new_path."_".$etape; ?>
            <a class="hover:underline" href=<?="../Vue/index.php?page=cocktail&alimentcourant=$etape&ariane=$new_path"?>><?=$etape?></a>
        <?php endforeach ?>
    </div>    
    <div class="space-y-4">
        <h2 class="mb-2 mt-4 font-bold">Sous-catégories :</h2>
        <?php foreach($sous_categorie as $aliment ): ?>
            <a class="flex items-center bg-red-100 hover:bg-red-200 justify-between w-full p-2 rounded-lg cursor-pointer hover:backdrop-opacity-80 transition duration-300 ease-in-out transform  hover:-translate-y-0.5 hover:scale-105 hover:text-black" href="<?= "../Vue/index.php?page=cocktail&alimentcourant=$aliment&ariane=$new_path"."_"."$aliment" ?>"><?=$aliment?></a>
        <?php endforeach ?>    
    </div>
</nav>

<?php $nav = ob_get_clean(); ?>
