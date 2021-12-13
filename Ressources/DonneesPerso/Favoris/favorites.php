<?php

function creationfavorites(){
   if (!isset($_SESSION['favorites']))
   {
      $_SESSION['favorites']=array();
   }
   return true;
}

/* function ajouterArticleSupprimerArticle($cocktail){

   //Si le panier existe
   if (creationPanier())
   {
      $positionProduit = array_search($cocktail,  $_SESSION['favorites']);

      if ($positionProduit !== false)
      {
        $suppression = false;
        $temporary_favorites = array();
        $nb_articles = count($_SESSION['favorites']);
        for($i = 0; $i < $nb_articles; $i++)
        {
            if($_SESSION['favorites'][$i] != $coktail)
            {
                array_push($temporary_favorites['Name'],$_SESSION['temporary_favorites'][$i]);
            }
        }

        $_SESSION['favorites'] = $temporary_favorites;

        unset($temporary_favorites);
        $suppression = true;
        return $suppression;
      }
      else
      {
         //Sinon on ajoute le produit
         array_push( $_SESSION['favorites'],$cocktail);
      }
   }
   else
   echo "Un problÃ¨me est survenu veuillez contacter l'administrateur du site.";
} */
?>