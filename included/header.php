<div id="preload">
    <img src="/Musée/img/bgimage1.jpg" />
    <img src="/Musée/img/bgimage2.jpg" />
    <img src="/Musée/img/apropos.jpg" />
    <img src="/Musée/img/apropos_bg.jpg" />
</div>
<header>
    <nav>
        <div class="logo">
            <a href="#"><img src="/images/logo.png" alt=""></a>
        </div>
        <ul class="nav-links">
            <li class="nav-item">
                <a href="/index.php" class="nav-link <?php if ($page == 'Home') {
                                                                echo "current";
                                                            } ?>">Accueil</a>
            </li>
            <li class="nav-item">
                <a href="/Events/" class="nav-link <?php if ($page == 'Events') {
                                                                echo "current";
                                                            } ?>">Evènements</a>
            </li>
            <li class="nav-item">
                <a href="/Musée/" class="nav-link" >Le Musée</a>
            </li>
            <li class="nav-item">
                <a href="/Rez/" class="nav-link <?php if ($page == 'Rez') {
                                                                echo "current";
                                                            } ?>">Infos Rez</a>
            </li>
            <li class="nav-item">
                <a href="/Equipe/" class="nav-link <?php if ($page == 'Equipe') {
                                                                echo "current";
                                                            } ?>">L'équipe</a>
            </li>
            <!-- <li class="nav-item">
                <a href="/commande/" class="nav-link <?php if ($page == 'Commander') {
                                                                echo "current";
                                                            } ?>">Commander</a>
            </li> -->
            <li class="nav-item">
                <a href="/Apropos/" class="nav-link <?php if ($page == 'Apropos') {
                                                                echo "current";
                                                            } ?>">A propos</a>
            </li>
        </ul>
        <div class="burger">
            <div class="line1"></div>
            <div class="line2"></div>
            <div class="line3"></div>
        </div>
    </nav>
</header>