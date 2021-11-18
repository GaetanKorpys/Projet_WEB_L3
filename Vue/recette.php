<?php $titre = "Bar à cocktail - Recette "; ?>

<?php ob_start(); ?>



<main class="flex flex-grow flex-col items-center mx-auto bg-white my-10 p-4 rounded-lg w-1/3 border-2 border-gray-600">
    <h1 class="uppercase font-semibold pb-10 pt-4">Informations</h1>
    <div class="space-y-10">
        <div>
            <h2 class="text-black font-semibold pb-4">Nom :</h2>
            <span><?=$cocktail["titre"]?></span>
        </div>

        <div>
            <h2 class="text-black font-semibold pb-4">Image :</h2>
            <img src="<?=$image=get_image($cocktail["titre"])?>" class="mx-auto w-44 h-44 my-2 rounded">
        </div>

        <div>
            <h2 class="text-black font-semibold pb-4">Ingrédients :</h2>
            <ul>
                <?php foreach($cocktail["index"] as $ingredient): ?>
                    <li><?=$ingredient?></li>
                <?php endforeach ?>    
            </ul>
        </div>
        
        <div>
            <h2 class="text-black font-semibold pb-4">Quantité :</h2>
            <ul>
                <?php foreach($tab_quantite as $quantite_ingr): ?>
                    <li><?=$quantite_ingr?></li>
                <?php endforeach ?>    
            </ul>
        </div>
        <div>
            <h2 class="text-black font-semibold pb-4">Préparation :</h2>
            <span class="break-words"><?=$cocktail["preparation"]?></span>
        </div>

        <div>
            <h2 class="text-black font-semibold pb-4">Favoris :</h2>
            <p>Vous pouvez ajouter ce cocktail à vos cocktails préférés.</p>
            <p>Pour les retrouver, rendez-vous dans la page <a href="../Vue/index.php" class="font-semibold hover:underline">Recettes</a>.</p>
            <a href="" class="flex mx-auto max-w-min p-2 mt-7 ease-out duration-700 hover:bg-red-300 rounded transform hover:-translate-y-1 hover:scale-110 ring-2 ring-red-200 ring-offset-2 hover:text-black">
                <span>Ajouter</span>
                <svg xmlns="http://www.w3.org/2000/svg" class=" ml-3 h-6 w-6 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                </svg>
            </a>
        </div>
    </div>
</main>

<?php $contenu = ob_get_clean(); ?>

<?php require_once '/Include/template.inc.php'; ?>