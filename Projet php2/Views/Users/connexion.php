<div class="flex space-evenly wrap">
            <form method="post" action="">
                <fieldset>
                    <legend>Se connecter</legend>
                    <div class="mb-3">
                        <label for="Login" class="form-label">Login</label>
                        <input type="text" placeholder="Login" class="form-control" id="login" aria-describedby="emailHelp" name="login" required>
                    </div>
                    <div class="mb-3">
                        <label for="Password" class="form-label">Mot de passe</label>
                        <input type="password" placeholder="Mot de passe" class="form-control" id="mot_de_passe" name="mot_de_passe" required>
                    </div>
                    <div>
                        <button name="btnEnvoi" class="btn btn-primary">Envoi</button>
                    </div>
                </fieldset>
                <div>
                    <h4 class="text-danger">Pas encore inscrit ?</h4>
                    <a href="inscriptionOrEditProfil.php" class="btn btn-secondary">Cliquez ici !</a>
                </div>
            </form>
  
        </div>

<?php
/*
FONCTION verifEmptyData
BUT : remplir  et renvoyer un bleau associatif $messageError dont les clés sont les noms des champs avec un message rappelant que le champs concerné est vide,
        ou renvoyer false si on n'a pas rencontré d'erreur.
*/
function verifEmptyData()
{
    // Parcours du tableau $_POST en recherchant les éléments vides ou munis d'espaces
    foreach ($_POST as $key => $value) {
        // str-replace remplace une chaine par une autre chaine de caractères donnée , ici un espace par le vide dans $value.
        if (empty(str_replace('','',$value))) {
            // on rempli un tableau associatif $messageError dont les clés sont les noms des champs avec un message reappelant que le champs concerné est vide.
            $messageError[$key] = "Votre" .$key." est vide.";
            
        }

    }
    // si le tableau $messageError est vide , on reverra false , sinon , on renvoie le tableau
    if (isset($messageError)){
        return $messageError;

    } else {
        return false;
    }
}