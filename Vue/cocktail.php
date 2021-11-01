<?php $titre = "Bar à cocktail - Liste de cocktail "; ?>

<?php ob_start(); ?>

<?php require_once "Include/navigation.inc.php" ?>
<?= $nav ?>


<main class="flex flex-wrap ">
        <?php foreach($tab_cocktail_valide as $cocktail): ?>
            <div class=" w-52 flex flex-col justify-around p-3 m-6 rounded-lg border-2 border-white border-opacity-75 bg-gray-900 focus:ring-4">
                <div class="flex justify-evenly">
                    <span class="text-gray-400"><?=$cocktail["titre"] ?></span>
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
                <a href="<?="../Vue/index.php?page=recette&alimentcourant=$aliment&ariane=$new_path&cocktail="?><?=$id=get_id($cocktail)?>" class="mx-auto p-2 mt-4 ease-out duration-700 bg-blue-600  hover:bg-blue-700 rounded transform hover:-translate-y-1 hover:scale-110">
                    <span>Recette</span>
                </a>
            </div>
        <?php endforeach ?>
</main>

<?php $contenu = ob_get_clean(); ?>

<?php require_once '/Include/template.inc.php'; ?>

