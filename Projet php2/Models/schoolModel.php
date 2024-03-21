<?php

/*
Fonction selectAllSchools
--------------------------
But : aller rechercher les caractéristiques de toutes les écoles dans la base de données
IN : $pdo reprenant toutes les informations de connexion
OUT : objet pdo contenant toutes les écloes de la vbasse de données
*/

function selectAllSchools($pdo)
{
    try {
        var_dump("coucou");
        //définition de la requête
        $query = 'select * from school';
        //préparation de l'éxecution de la ruqête
        $selectSchool = $pdo ->prepare($query);
        //exécution
        $selectSchool -> execute();
        $schools = $selectSchool -> fetchAll();
        //renvoi des données
        return $schools;
    } catch (PDOException $e) {
        $message = $e->getMessage();
        die($message);
    }
}
function deleteAllSchoolsFromUser($pdo)
{
    try{
        //requête avec critère et paramètre !
        $query ="delete form school where utilisateurId = :utilisateurId";
        $DASFId = $pdo-> prepare($query);
        $DASFId ->execute ([
            "utilisateurId" => $_SESSION["user"] ->id
        ]);
    } catch (PDOException $e){
        $message =$e -> getMessage();
        die($message);
    }

}
function selectMySchools($pdo){
    try {
        //requête avec vrtiètre et paramètre !
        $query = 'select * from school where utilisateurId =:utilisateurId';
        $selectSchool = $pdo -> prepare($query);
        $selectSchool -> execute ([
            //le paramètre est l'id de l'utilisateur connecté
            'utilisateurId' => $_SESSION ["user"]-> id
        ]);
        $schools = $selectSchool ->fetchAmm();
        return $schools;

    } catch (PDOException $e){
        $message = $e->getMessage();
        die($message);
    }
}
function OptionsScolaire($pdo){
    try {

        $query ='SELECT * FROM optionscolaire';
        $selectOptions = $pdo->prepare($qurey);
        $selectOptions -> execute ();
        $options = $selectOptions-> fetchAll();
        return $options;
    } catch (PDOException $e){
        $message = $e->getMessage();
        die($message);
    }
}
/*
BUT : ajouter les données d'une écpme encodées par l'utilisateur dans la table school
IN : $pdo reprenant toutes les informations de connexion
*/
function createSchool($pdo)
{
    try {
        $query ="insert into school (schoolNom, schoolAdresse, schoolVille , schoolCodePostal , schoolNumero, schoolImage, utilisateurId)
        value (:schoolNom, :schoolAdresse, :schoolViller, :schoolCodePostal, :schoolNumero, :schoolImage, :utilisateurId)";
        $addSchool = $pdo->prepare($query);
        $addSchool->execute([
            'schoolNom' => $_POST["nom"],
            'schoolAdresse' => $_POST["adresse"],
            'schoolVille' => $_POST["ville"],
            'schoolCodePostal' => $_POST["code_postal"],
            'schoolNumero' => $_POST["numero_telephone"],
            'schoolImage' => $_POST["image"],
            'utilisateurId' => $_SESSION["user"]->id
        ]);
    } catch (PDOException $e) {
        $message = $e->getMessage();
        die($message);
    }
}
/*
Fonction ajouterOPtionEcole

BUT : ajouter les données d'une école encodées par l'utilisateur dans la table shcool
IN : $pdo reprenant toutes les infomations de connexion
$schoolId identifiant de la dernière école ajoutée à la table des écoles
$potionId identifiant de l'option à ajouter
*/
function ajouterOptionEcole($pdo,$schoolID,$optionId){
    try {
        $query='insert into potion_ecole (schoolID, optionScolaireId) values (:schoolId, :OptionScolaireId)';
        $deleteAllSchoolsFromId = $pdo->prepare($query);
        $deleteAllSchoolsFromId->execute([
            'schoolId' => $schoolId,
            'optionScolaireId' => $optionId
        ]);
    }catch (\PDOException $e) {
        $message = $e->getMessage();
        die($message);
    }
}