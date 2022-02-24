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
                <a href="/musee/apropos.php" class="nav-link <?php if ($page == 'apropos') {
                                                                    echo "current";
                                                                } ?>">A propos</a>
            </li>
            <?php if (isset($_SESSION['is_connected']) and $_SESSION['is_connected']):?>
                <li class="espace_adr">
                <a href="/musee/girafe/index.php" class="nav-link">Girafe</a>
            </li>
            <?php else:?>
                <li class="espace_adr">
                <a href="/musee/connexion.php" class="nav-link <?php if ($page == 'connexion') {
                                                                    echo "current";
                                                                } ?>">Connexion</a>
            </li>
            <?php endif;?>
        </ul>
        <div class="burger">
            <div class="line1"></div>
            <div class="line2"></div>
            <div class="line3"></div>
        </div>
    </nav>
</header>