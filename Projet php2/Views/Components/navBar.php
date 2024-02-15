
<?php if (isset($_SESSION["user"])) :?>
    <li class="menu"><a href="/">Mes écoles</a></li>
    <li class="menu"><a href="inscription">Profil</a></li>
    <li class="menu"><a href="connexion">Déconnexion</a></li>
<?php else : ?>
    <li class="menu"><a href="inscription">Inscription</a></a>
    <li class ="menu"><a href="connexion">Connexion </a></li>
<?php endif ?>
    <!--Petit écran -->
    <li class="imageMenu"><a href="/"><ion-icon size="large" name="home-outline"></ion-icon></a></li>
    <li class="imageMenu"><a href="/"><ion-icon size="large" name="person-outline"></ion-icon></a></li>
    <li class="imageMenu"><a href="/"><ion-icon size="large" name="enter-outline"></ion-icon></a></li>
</ul>
