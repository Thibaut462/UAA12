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