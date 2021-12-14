<?php
function addFavorisJson($username,$id_coocktail){
   $filename = "../Ressources/DonneesPerso/Utilisateurs/".$username."Favoris.json";
   $index = 0;
   if(getTabFav($username)==null){
      if($file = fopen($filename, 'a+')){
         $tab_id_cocktail = array($index=>$id_coocktail);
         fputs($file, json_encode($tab_id_cocktail));
         fclose($file);
         return true;
      }else{
         return false;
      }   
   }else{
      $tab_id_cocktail = getTabFav($username);
      $index = count($tab_id_cocktail);
      if($file = fopen($filename, 'w+')){

         $tab_id_cocktail[$index] = $id_coocktail;
         fputs($file, json_encode($tab_id_cocktail));
         fclose($file);
         return true;
      }else{
         return false;
      }   
   }
   
}


function getTabFav($username){
   if(file_exists("../Ressources/DonneesPerso/Utilisateurs/".$username."Favoris.json")){
      $contents = file_get_contents("../Ressources/DonneesPerso/Utilisateurs/".$username."Favoris.json");
      $data = json_decode($contents,true);
      return $data;
   }else{
      return array();
   }
}

?>