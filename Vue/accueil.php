<?php $titre = "Bar à cocktail"; ?>

<?php ob_start(); ?>
<main class="flex flex-col flex-grow items-center mt-10 ">
  <h1 class="text-5xl pb-2"> Hey, bienvenue sur notre site ! </h1>
  <h2 class="text-3xl">Envie d'un petit rafraichissement ?</h2>
</main>

<?php $contenu = ob_get_clean(); ?>
<?php require_once '/Include/template.inc.php'; ?>