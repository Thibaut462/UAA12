<h1>Liste des école répertoriées</h1>

<div class="flexible wrap space around">
    <?php foreach ($school as $school) :?>
        <div class="border_card">
            <h2 class ="center"><?=$school ->schoolNOM ?></h2>
            <div>
                <div class="flexiblee blocImageEcole">
                    <img src="<?= $school->schoolImage ?> "alt="photo de l'école">
                </div>
                <div class="center">
                    <p><span><?=$s->schoolAdresse?> - </span><?= $schoolCodePostal."".$school->schoolViller ?></span></p>
                    <h3><?=$school->schoolNumero ?></h3>
                    <!--
                    <p><span>Rue de la pépinière 101</span> - <span>Namur</span></p>
                    <h3>081729011</h3>
                    -->
                    <a href="voirEcole.php" class="btn btn-age">Voir l'école</a>
                </div>
            </div>
        </div>
    <?php endforeach ?>
<div>