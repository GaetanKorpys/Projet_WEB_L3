<?php $titre = "Bar à cocktail - Inscription"; ?>

<?php ob_start(); ?>
<main class="flex flex-grow items-center justify-center">
  <div class="bg-white rounded p-4 border-2 border-black w-96">
    <form action="" method="post" class="flex flex-col space-y-5">

    <div class="flex justify-between">
      <label>Login :</label>
      <input type="text" name="login" class="focus:outline-none px-2 bg-gray-200 rounded border-2 hover:border-gray-400" required>
    </div>
      
    <div class="flex justify-between">
      <label>Mot de passe :</label>
      <input type="password" name="motdepasse" class="focus:outline-none px-2 bg-gray-200 rounded border-2 hover:border-gray-400" required>
    </div>

    <div class="flex justify-between">
      <label>Nom :</label>
      <input type="text" name="nom" class="focus:outline-none px-2 bg-gray-200 rounded border-2 hover:border-gray-400">
    </div>
      
    <div class="flex justify-between">
      <label>Prénom :</label>
      <input type="text" name="prenom" class="focus:outline-none px-2 bg-gray-200 rounded border-2 hover:border-gray-400">
    </div>
      
    <div class="flex justify-between">
      <label>Sexe :</label>
      <div class="space-x-2 mr-5">
        <span>Femme</span><input type="radio"  name="sexe" value="femme">
        <span>Homme</span><input type="radio" name="sexe" value="homme" checked> 
      </div>
    </div>

    <div class="flex justify-between">
      <label>Date de naissance :</label>
      <input type="date" name="datenaissance" class="focus:outline-none px-2 bg-gray-200 rounded border-2 hover:border-gray-400">
    </div>
    
    <div class="flex justify-between">
      <label>Adresse Mail :</label>
      <input type="email" name="mail" class="focus:outline-none px-2 bg-gray-200 rounded border-2 hover:border-gray-400">
    </div>
      
    <div class="flex justify-between">
      <label>Téléphone :</label>
      <input type="text" name="telephone" class="focus:outline-none px-2 bg-gray-200 rounded border-2 hover:border-gray-400">
    </div>

    <div class="flex justify-between">
      <label>Adresse Postale :</label>
      <input type="text" name="adresse" class="focus:outline-none px-2 bg-gray-200 rounded border-2 hover:border-gray-400">
    </div>
    
    <div class="flex justify-between">
      <label>Code Postale :</label>
      <input type="number" name="codepostale" class="focus:outline-none px-2 bg-gray-200 rounded border-2 hover:border-gray-400">
    </div>

    <div class="flex justify-between"> 
      <label>Ville :</label>
      <input type="text" name="ville" class="focus:outline-none px-2 bg-gray-200 rounded border-2 hover:border-gray-400">
    </div>
      
    <button type="submit" name="submit" class="border-2 mx-auto p-2 rounded bg-red-200 hover:bg-red-300 hover:border-black">S'inscrire</button>

    </form>

    <div class="my-2">
      <ul>
          <?php foreach($message as $mess): ?>
              <li>
                  <span><?=$mess ?></span>
              </li>
          <?php endforeach ?>
      </ul>
    </div>

  </div>
</main>

<?php $contenu = ob_get_clean(); ?>