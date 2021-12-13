<?php $titre = "Bar à cocktail - Profil"; ?>

<?php ob_start(); ?>
<main class="flex flex-grow items-center justify-center">
  <div class="bg-white rounded p-4 border-2 border-black w-1/2">
    <form action="" method="post" class="flex flex-col space-y-5">

    <div class="flex justify-around ">
      <label>Login :</label>
      <label><?=isset($userModif["login"])?$userModif["login"]:"" ?></label>
    </div>

    <div class="flex justify-around ">
      <label>Mot de passe :</label>
      <label><?=isset($userModif["motdepasse"])?$userModif["motdepasse"]:"" ?></label>
      <input type="password" name="motdepasse" class="focus:outline-none px-2 bg-gray-200 rounded border-2 hover:border-gray-400" required>
    </div>

    <div class="flex justify-around ">
      <label>Nom :</label>
      <label><?=isset($userModif["nom"])?$userModif["nom"]:"" ?></label>
      <input type="text" name="nom" class="focus:outline-none px-2 bg-gray-200 rounded border-2 hover:border-gray-400">
    </div>
      
    <div class="flex justify-around ">
      <label>Prénom :</label>
      <label><?=isset($userModif["prenom"])?$userModif["prenom"]:"" ?></label>
      <input type="text" name="prenom" class="focus:outline-none px-2 bg-gray-200 rounded border-2 hover:border-gray-400">
    </div>
      
    <div class="flex justify-around ">
      <label>Sexe :</label>
      <label><?=isset($userModif["sexe"])?$userModif["sexe"]:"" ?></label>
      <div class="space-x-2 mr-5">
        <span>Femme</span><input type="radio"  name="sexe" >
        <span>Homme</span><input type="radio" name="sexe"> 
      </div>
    </div>

    <div class="flex justify-around ">
      <label>Date de naissance :</label>
      <label><?=isset($userModif["datenaissance"])?$userModif["datenaissance"]:"" ?></label>
      <input type="date" name="datenaissance" class="focus:outline-none px-2 bg-gray-200 rounded border-2 hover:border-gray-400">
    </div>
    
    <div class="flex justify-around ">
      <label>Adresse Mail :</label>
      <label><?=isset($userModif["mail"])?$userModif["mail"]:"" ?></label>
      <input type="email" name="mail" class="focus:outline-none px-2 bg-gray-200 rounded border-2 hover:border-gray-400">
    </div>
      
    <div class="flex justify-around ">
      <label>Téléphone :</label>
      <label><?=isset($userModif["telephone"])?$userModif["telephone"]:"" ?></label>
      <input type="text" name="telephone" class="focus:outline-none px-2 bg-gray-200 rounded border-2 hover:border-gray-400">
    </div>

    <div class="flex justify-around ">
      <label>Adresse Postale :</label>
      <label><?=isset($userModif["adresse"])?$userModif["adresse"]:"" ?></label>
      <input type="text" name="adresse" class="focus:outline-none px-2 bg-gray-200 rounded border-2 hover:border-gray-400">
    </div>
    
    <div class="flex justify-around ">
      <label>Code Postale :</label>
      <label><?=isset($userModif["codepostale"])?$userModif["codepostale"]:"" ?></label>
      <input type="number" name="codepostale" class="focus:outline-none px-2 bg-gray-200 rounded border-2 hover:border-gray-400">
    </div>

    <div class="flex justify-around "> 
      <label>Ville :</label>
      <label><?=isset($userModif["ville"])?$userModif["ville"]:"" ?></label>
      <input type="text" name="ville" class="focus:outline-none px-2 bg-gray-200 rounded border-2 hover:border-gray-400">
    </div>
      
    <button type="submit" name="submit" class="border-2 mx-auto p-2 rounded bg-red-200 hover:bg-red-300 hover:border-black">Modifier</button>

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