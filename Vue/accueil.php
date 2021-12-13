<?php $titre = "Bar à cocktail"; ?>

<?php ob_start(); ?>
<main class="flex flex-grow items-center justify-center">
  <div class="bg-white rounded p-2 border-2 border-black ">
    <h1 class="hidden md:flex text-center text-xl md:text-3xl">Hey, bienvenue sur notre site ! </h1>
    <h1 class="md:hidden text-center text-md">Hey, bienvenue ! </h1>
    <h2 class="hidden md:flex text-center text-md md:text-2xl">Envie d'un petit rafraichissement ?</h2>
    <h2 class="md:hidden text-center text-sm ">Envie d'un verre ?</h2>
  </div>
</main>

<?php $contenu = ob_get_clean(); ?>