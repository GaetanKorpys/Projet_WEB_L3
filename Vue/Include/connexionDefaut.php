<?php ob_start(); ?>

<form class="flex space-x-3 min-w-max mr-3" action="" method="post">
    <div>
        <label>Login</label>
        <input class="border-2 border-gray-300 rounded p-2 focus:outline-none w-20 text-sm hover:border-gray-400 focus:border-black focus:bg-gray-100" type="text" name="loginConnexion">
    </div>
    <div>
        <label>Mot de passe</label>
        <input class="border-2 border-gray-300 rounded p-2 focus:outline-none w-20 text-sm hover:border-gray-400 focus:border-black focus:bg-gray-100" type="password" name="motdepasseConnexion">
    </div>
    <button class="border-2 border-gray-300 px-1 rounded hover:border-black" type="submit">Connexion</button>
</form>
<a href="../Vue/index.php?page=inscription">
    <button class="border-2 border-gray-300 p-1 h-10 rounded hover:border-black">S'inscrire</button>
</a>
<?php $connexionDynamique = ob_get_clean(); ?>
