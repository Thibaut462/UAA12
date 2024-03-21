<?php

// appel au modèle pour la gestion des écoles
require_once "Models/schoolModel.php";

//récupération du chemin désiré
$uri = $_SERVER ["REQUEST_URI"];

if ($uri === "/mesEcoles") {
    //rappel de la page d'accueil adaptée avec vérification de l'était de connexion"
    $schools = selectMySchools($pdo);

    $time = "Mes écoles";       //titre à afficher dans l'onglet de la page du navigateur
    $template = "Views/pageAccueil.php";        //chemin vers la vue demandée
    require_once("Views/base.php");     //appel de la page de base qui sera remplue avec la vue demandée
}
elseif ($uri === "/createSchool"){
    // si on a rempli le formulaire et qu'on l'a validé
    if (isset($_POSRT['btnEnvoi'])) {
        createSchool($pdo);
        //récupération du numéro de la dernière ligne insérée dans la table des écoles
        $schoolId = $pdo->lastInsertId();
        //ajout des options liées à l'école dans ta table des options
        // ne pas oublier que $_POST["options"] est un tableau !=> le parcourir et faire une écritues pour chaque élément trouvé
        for ($i = 0; $i < count($_POST["options"]); $i++){
            $optionScolaireId = $_POST["options"] [$i]; // récupération de l'optionId en position $i dans $_POST["options"]
                // écriture dans la table des options
                ajouterOptionEcole($pdo, $schoolId, $optionScolaireId);
        }
        header("location:/mesEcoles");
    }
    // récupérer les options disponibles
    $options = selectAllOptions($pdo);
    $title = "ajout d'une école";
    $template = "Views/Schools/editOrCreateSchool.php";
    require_once("Views/base.php");
//viendront ensuite les opération sur une école : voir , modifier , supprimmer
}