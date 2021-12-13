<?php

function deconnexion(){
    session_start();
    unset($_SESSION["connecte"]);
    header('Location: ../Vue/index.php');
}