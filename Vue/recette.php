<?php $titre = "Bar à cocktail - Recette "; ?>

<?php ob_start(); ?>



<main class="flex flex-col items-center justify-center">
    <h1>Voici les informations du cocktail que vous avez selectionné</h1>
    <div>
        <h2><?=$cocktail["titre"]?></h2>
        <img src="<?=$image=get_image($cocktail["titre"])?>">
        <h3>Ingrédients</h3>
        <ul>
            <?php foreach($cocktail["index"] as $ingredient): ?>
                <li><?=$ingredient?></li>
            <?php endforeach ?>    
        </ul>
        <h3>Quantité</h3>
        <ul>
            <?php foreach($tab_quantite as $quantite_ingr): ?>
                <li><?=$quantite_ingr?></li>
            <?php endforeach ?>    
        </ul>
        <h3>Préparation</h3>
        <span><?=$cocktail["preparation"]?></span>
    </div>
    <div>
        <svg xmlns="http://www.w3.org/2000/svg" class=" ml-3 h-6 w-6 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
        </svg>
    </div>
</main>

<?php $contenu = ob_get_clean(); ?>

<?php require_once '/Include/template.inc.php'; ?>