<?php $titre = "Bar à cocktail - Liste de cocktail "; ?>

<?php ob_start(); ?>

<div class="flex flex-grow ">


    <?php require_once "Include/navigation.inc.php" ?>
    <?= $nav ?>


    <main class="flex flex-wrap justify-center">
        <?php foreach($tab_cocktail_valide as $cocktail): ?>
            <div class=" w-60 flex flex-col justify-around p-3 m-6 rounded-lg border-2 border-gray-500 bg-white transition duration-300 transform hover:scale-105 hover:border-black">
                <div class="flex justify-evenly">
                    <span class="font-semibold text-black"><?=$cocktail["titre"] ?></span>
                    <svg xmlns="http://www.w3.org/2000/svg" class=" ml-3 h-6 w-6 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
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
                <a href="<?="../Vue/index.php?page=recette&alimentcourant=$aliment&ariane=$new_path&cocktail="?><?=$id=get_id($cocktail)?>" class="mx-auto p-2 mt-4 ease-out duration-700 hover:bg-red-300 rounded transform hover:-translate-y-1 hover:scale-110 ring-2 ring-red-200 ring-offset-2 hover:text-black">
                    Recette
                </a>
            </div>
        <?php endforeach ?>
    </main>
</div>

<?php $contenu = ob_get_clean(); ?>

<?php require_once '/Include/template.inc.php'; ?>

