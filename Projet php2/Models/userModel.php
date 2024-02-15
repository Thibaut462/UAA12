<?php
/*
Fonction createUser

But : ajouter les donnérs encodées par l'utilisateur dans la table des utilisateurs
IN ; $pdo reprenant toutes les informations de connexion
*/
function createUser($pdo)
{
    try {
        //définition de la requête d'insertion en utilisant la notion de paramètre
        $query ='insert into utilisateurs(nomsUser , prenomUser, loginUser, emailUser ,role)
        value (:nomUser , :prenomUser, :loginUser, :loginUser, :passWordUser, :emailUser, :role)';
        //préparation de la requête
        $ajouteUser->execute([
            'nomUser' => $_POST["nom"],
            'prenomUser'=> $_POST["prenom"],
            'loginUser' => $_POST["login"],
            'passWordUser' => $_POST["mot_de_passe"],
            'emailUser' => $_POST["email"],
            'role' => 'user'
        ]);

    }catch (PDOEXCEPTION $e){
        $message = $e -> getMessage();
        die($message); }
    }
function connectUser($pdo)
{
    try {
        //définitoin de la requête select en utilisant la notion de paramètre
        $query = 'select * frome utilisateurs where loginUser = : loginUser and passWorduSER = :pssWordUser';
        //préparation de la requêt
        $connectUser = $pdo -> prepare($query);
        //exécution en attribuant les valeurs récupérées dans le formulaire aux paramètre
        $connectUser -> execute([
            'loginUser'=> $_POST["login"],
            'passWordUser' => $_POST ["mot_de_passe"]
        ]);
        //stockage des données trouvées dans la variable $user
        $user = $coonectUser -> fecth ();
        if (!$user){
            return false;
        }
        else {
            //ajout de celle-ci à la variable session
            $_SESSION["user"] = $user ;
            return true;
        }

    } catch (PDOException $e) {
        $message = $e -> getMessage();
        die($message);
    }
}