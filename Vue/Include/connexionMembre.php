<?php ob_start(); ?>

<div class="flex space-x-2">

    <span class="flex items-center">
        <?=$login ?>
    </span>

    <a href="../Vue/index.php?page=profil">
        <button class="border-2 border-gray-300 p-1 h-10 rounded hover:border-black">Profil</button>
    </a>

    <a href="../Vue/index.php?page=deconnexion">
        <button class="border-2 border-gray-300 p-1 h-10 rounded hover:border-black">Déconnexion</button>
    </a>
</div>

<?php $connexionDynamique = ob_get_clean(); ?>