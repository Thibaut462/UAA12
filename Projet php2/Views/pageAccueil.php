<!-- corps de la page d'accueil qui p^rendra place dans le main de base -->
<!-- Selon la page (accueil ou mes écoles) on affiche le titre qui convient-->
<?php if ($uri === "/MesEcoles") : ?>
    <h1>Vos Ecoles </h1>
<?php else :?>
    <h1> Listes des écoles répertoriées</h,>
<?php endif ?>
<!-- Dans le cas où on est connecté, on affiche un lien permettant l'ajout d'une école -->
<?php if (isset($_SESSION["user"])) ;?>
    <a href="createSchool">Ajouter une école</a>


<div class="flexible wrap space around">
    <?php foreach ($schools as $school) :?>
        <div class="border_card">
            <h2 class ="center"><?=$school->schoolNom ?></h2>
            <div>
                <div class="flexiblee blocImageEcole">
                    <img src="<?= $school->schoolImage ?> "alt="photo de l'école">
                </div>
                <div class="center">
                    <p><span><?=$school->schoolAdresse?> - </span><?= $school->schoolCodePostal."".$school->schoolVille ?></span></p>
                    <h3><?=$school->schoolNumero ?></h3>
                    <!--
                    <p><span>Rue de la pépinière 101</span> - <span>Namur</span></p>
                    <h3>081729011</h3>
                    -->
                    <a href="voirEcole.php" class="btn btn-age">Voir l'école</a>
                    <!-- Dans le cas où on est connecé et qu'on a cliqu" sur 'mes écoles , on affiche les écoles de l'utilisateur -->
                    <?php if ($uri === "/mesEcoles") :?>
                        <p><a href="deleteEcole?schoolID=<?= $school ->schoolID ?>">Supprimer L'école</a></p>
                        <p><a href="updateEcole?schoolID=<?= $school ->schoolID ?>">Modifier L'école</a></p>
                    <?php endif ?>    
                </div>
            </div>
        </div>
    <?php endforeach ?>
<div>                                               