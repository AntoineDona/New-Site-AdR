<header>
    <nav>
        <div class="logo">
            <a href="/musee/index.php"><img src="/musee/img/logo_musee_b.png" alt=""></a>
        </div>
        <h1>Le Musée</h1>
        <ul class="nav-links">
            <li class="nav-item">
                <a href="/musee/index.php" class="nav-link <?php if ($page == 'home') {
                                                                echo "current";
                                                            } ?>">Accueil</a>
            </li>
            <li class="nav-item">
                <a href="/musee/menu" class="nav-link <?php if ($page == 'menu') {
                                                            echo "current";
                                                        } ?>" >Menu</a>
            </li>
            <li class="nav-item">
                <a href="/musee/commander.php" class="nav-link <?php if ($page == 'commander') {
                                                                    echo "current";
                                                                } ?>">Commander</a>
            </li>
            <li class="nav-item">
                <a href="/musee/apropos.php" class="nav-link <?php if ($page == 'apropos') {
                                                                    echo "current";
                                                                } ?>">A propos</a>
            </li>
            <li class="espace_adr">
                <a href="/musee/connexion.php" class="nav-link <?php if ($page == 'connexion') {
                                                                    echo "current";
                                                                } ?>">Connexion</a>
            </li>
        </ul>
        <!-- <div class="espace_adr">
                <a href="/musee/espace_adr.php" class="nav-link">Connexion</a>
            </div> -->
        <div class="burger">
            <div class="line1"></div>
            <div class="line2"></div>
            <div class="line3"></div>
        </div>
    </nav>
</header>