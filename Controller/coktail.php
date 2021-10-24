<?php  
    include("../Data/Donnee/Donnees.inc.php");
    $path = "../Data/Donnee/Photos/";
    foreach($Recettes as $coktail)
    {
      echo $coktail['titre'];
      echo "</br>";
      
      $img=str_replace(" ", "_",$coktail['titre'] );
      $img=str_replace("'","",$img);
      $img=str_replace("ï","i",$img);
      $img=str_replace("ñ","n",$img);
      
      if(file_exists($path.$img.".jpg"))
      {
        $image=$path.$img.".jpg";
      }
      else
      {
        $image="../Data/DonneePerso/cocktail.png";
      }

      
      print"<img src='$image'/>";

      echo "</br>";
      echo'<div id="Ingrédients"';
      foreach($coktail['index'] as $index)
      {
        echo "$index";
        echo "</br>";
      }
      echo"</div>";
      echo "</br>";
    }
?>
