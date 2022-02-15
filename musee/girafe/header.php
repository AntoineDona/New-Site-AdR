<header>
    <nav>
        <div class="logo">
            <a href="/"><img src="/images/logo.png" alt=""></a>
        </div>
        <ul class="nav-links">
            <li class="nav-item">
                <a href="/musee/girafe/index.php" class="nav-link <?php if ($page == 'ajout girafe') {
                                                                echo "current";
                                                            } ?>">Ajouter girafe</a>
            </li>
            <li class="nav-item">
                <a href="/musee/girafe/tableau_chasse.php" class="nav-link <?php if ($page == 'tableau') {
                                                                echo "current";
                                                            } ?>">Tableau de chasse</a>
            </li>
            <li class="nav-item">
                <a href="/musee/girafe/mes_girafes.php" class="nav-link <?php if ($page == 'mes girafes') {
                                                                echo "current";
                                                            } ?>">Mes girafes</a>
            </li>
            <?php if (isset($_SESSION['is_connected']) and $_SESSION['is_connected']):?>
                <li class="espace_adr">
                <a href="/musee/girafe/logout.php" class="nav-link">Déconnexion</a>
            </li>
            <?php else:?>
                <li class="espace_adr">
                <a href="/musee/connexion.php" class="nav-link <?php if ($page == 'connexion') {
                                                                    echo "current";
                                                                } ?>">Connexion</a>
            </li>
            <?php endif;?>
            
        </ul>
        </ul>
        <div class="burger">
            <div class="line1"></div>
            <div class="line2"></div>
            <div class="line3"></div>
        </div>
    </nav>
</header>