<?php


$uri = $_SERVER["REQUEST_URI"];

if ($uri === "/connexion") 
{    //vérifier si l'utilisateur a cliqué sur le bouton du formulaire
    if(isset($_POST['btnEnvoi'])){
        //ajout de l'utilisateru à la base de donées
        $erreur=false;
        // tentative de connexion et récupération des données de l'utilisateur et ouverture d'une session
        if(connectUser($pdo)){
            // redirection vers la page d'accueil
            header("location:/");
        }
        else {
                //cas d'erreur
                $erreur=true;
        }
    }
    $title = "Connexion";
    $template ="Views/Users/connexion.php";
    require_once("Views/base.php");
}
elseif ($uri ==="/deconnexion") {
    // nettoyage de la session et retour à l'accueil
    session_destroy();
    // redirection vers la page d'accueil
    header("location:/");
}
elseif ($uri ==="/inscription") 
{
    //vérifier si l'utilisateur a cliqué sur le bouton du formulaire
    if(isset($_POST['btnEnvoi'])){
        //vérifiaction des données encodées
        $messageError = verifEmptyData();
        // s'il n'y a pas d'erreur
        if(!$messageError){
                //ajout de l'utilisateru à la base de donées
        createUser($pdo);
        //redirection vers la page de connexion
        header("location:/connexion");

        }
    
    } $title = "Inscription";
    $template ="Views/Users/inscriptionOrEditProfile.php";
    require_once("Views/base.php");

}

elseif ($uri === "/updateProfil") 
{
    if (isset($_POST['btnEnvoir'])) 
    {
        // vérification des données encodées
        $messageError = verifEmptyData();
        // s'il n y a pas d'erreur
        if (!$messageError) {
            //  Modification des données de l'utilisateur dans la base de données
            updateUser($PDO);
            // Mise à jour de la variable session
            updateSession($PDO);
            //redirection vers la page de profil
            header('location:/profil');
            # code...
        }
    }
    $title ="Mise à jour du profil";    //titre à afficher dans l'onglet de la page du navigateur
    $template ="Views/Users/inscriptionOrEditProfile.php";      //chemin vers la vue demandée
    require_once("Views/base.php");     //appel de la page de base qui sera remplie avec la vue demandée
}
elseif ($uri === "/deleteProfil") {
    deleteAllSchoolsFromUser($pdo); //supprimer toutes les informations de la table école liées à l'utilisateur connecté
    deleUser($pdo);                     //supprimer l'utilisateur de la table des utilisateurs
    header("location:/deconnexion");//le déconnecter
}
   