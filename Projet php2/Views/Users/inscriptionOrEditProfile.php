
<div class="flex space-evenly wrap">
<form method="post" action="">
    <fieldset>
        <legend>Inscription</legend>
        <div class="mb-3">
            <label for="Nom" class="form-label">Nom</label>
            <input type="text" placeholder="Nom" class="form-control" id="nom" name="nom" required <?php if (isset($_SESSION['user'])) : ?>value="<?= $_SESSION['user']->nomUser ?>" <?php endif ?>>
        </div>
        <div class="mb-3">
            <label for="Prenom" class="form-label">Prénom</label>
            <input type="text" placeholder="Prénom" class="form-control" id="prenom" name="prenom" required <?php if (isset($_SESSION['user'])) : ?>value="<?= $_SESSION['user']->nomUser ?>" <?php endif ?>>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" placeholder="Email" class="form-control" id="email" name="email" required <?php if (isset($_SESSION['user'])) : ?>value="<?= $_SESSION['user']->prenomUser ?>" <?php endif ?>>
        </div>
        <div class="mb-3">
            <label for="Login" class="form-label">Login</label>
            <input type="text" placeholder="Login" class="form-control" id="login" name="login" required <?php if (isset($_SESSION['user'])) : ?>value="<?= $_SESSION['user']->loginUser ?>" <?php endif ?>>
        </div>
        <div class="mb-3">
            <label for="Password" class="form-label">Mot de passe</label>
            <input type="password" placeholder="Mot de passe" class="form-control" id="mot_de_passe" name="mot_de_passe" required <?php if (isset($_SESSION['user'])) : ?>value="<?= $_SESSION['user']->passWordUser ?>" <?php endif ?>>
        </div>
        <div>
            <button name="btnEnvoi" class="btn btn-primary">Envoyer</button>
        </div>
    </fieldset>
</form>
</div>
<?php
/*
FONCTION verifEmptyData
BUT : remplir et renvoyer un tableau associatif $messageError dont les clés sont les noms des champs avec un message rappelant que le champs concerné est vide,
        ou renvoyer False si on n'a pas recontré d'erreur.
*/
function verifEmptyData()
{
    //Parcours du tableau $_POST en recherchant les éléments vides ou munis d'espaces
    foreach ($_POST as $key => $value) {
        // str-replace remplace une chaine par une chaine par une autre dans chaune de caractère donnée , ici un espace par le dans la $value
        if (empty(str_replace('', '', $value ))) {
            $messageError[$key] = "Votre" . $key. "est vide";
        }
        
    }
    // si le tableau $messageError est vide, on renverra false, sinon , on renvoie que le tableau
    if (isset($messageError)) {
        return $messageError;

    }else {
        return false;
    }
}