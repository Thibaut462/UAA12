<?php


$uri = $_SERVER["REQUEST_URI"];
var_dump($uri);

if ($uri === "/connexion") 
{
    var_dump("Thanksgiving");
    $title = "Connexion";
    $template ="Views/Users/connexion.php";
    require_once("Views/base.php");
}
elseif ($uri ==="/deconnexion") {
    # code...
}
elseif ($uri ==="/inscription") 
{
    $title = "Inscription";
    $template ="Views/Users/inscriptionOrEditProfile.php";
    require_once("Views/base.php");
}