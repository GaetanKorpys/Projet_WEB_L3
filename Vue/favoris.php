<?php $titre = "Bar à cocktail - Liste de favoris "; ?>

<?php ob_start(); ?>

<div class="flex flex-grow ">

    <main class="flex justify-center mx-auto flex-wrap">
        <?php foreach($tab_cocktail_valide as $id => $cocktail): ?>
            <?php if (in_array($id,$tab_IdCockatil_favoris)): ?>
                <div class=" w-60 flex flex-col justify-around p-3 m-6 rounded-lg border-2 border-gray-500 bg-white transition duration-300 transform hover:scale-105 hover:border-black">
                    <div class="flex justify-evenly">
                        <span class="font-semibold text-black"><?=$cocktail["titre"] ?></span>
                        <svg xmlns="http://www.w3.org/2000/svg" class=" ml-3 h-6 w-6 flex-shrink-0" fill="red" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                        </svg>
                    </div>
                    <img src="<?=$image=get_image($cocktail["titre"])?>" class="mx-auto w-20 h-20 my-2 rounded">
                    <div>
                        <ul>
                            <?php foreach($cocktail["index"] as $ingredient): ?>
                                <li>
                                    <span><?=$ingredient ?></span>
                                </li>
                            <?php endforeach ?>
                        </ul>
                    </div> 
                </div>
            <?php endif?>
        <?php endforeach ?>
    </main>
</div>

<?php $contenu = ob_get_clean(); ?>

<?php require_once '/Include/template.inc.php'; ?>