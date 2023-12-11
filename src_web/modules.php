<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>LTM | Modules</title>
        <link href="img/logo_ltm_w_mini.svg" rel="icon">

        <?php 
        include("imports/header.html");
        ?>
    </head>

    <body>

        <header>
        </header>

        <?php 
            include("imports/navbar.html");
        ?>
        
        <main>
            <div class="container-background">
                <div class="background">
                    <div class="circle1"></div>
                    <div class="circle2"></div>
                </div>
            </div>

            <div class="main-container">
                <div class="main-explication">
                    <div class="main-explication-title">
                        <h2>Modules disponibles</h2>
                    </div>
                    <div class="main-explication-texte">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                        Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore.</p>
                    </div>
                </div>

                <div class="main-items-container">
                    <div class="main-items">
                        <div class="main-items-item" id="1">
                            <div class="item-main">
                                <div class="item-main-title">
                                    <h3>Monte Carlo</h3>
                                </div>
                                <div class="item-main-texte">
                                    <p>Ce module de <b>calcul distribué</b> permet de calculer, à l'aide de la méthode de Monte Carlo, le nombre Pi. L'objectif ici est l'optimisation du temps d'execution
                                        par la répartition de cette même execution sur différentes machines.
                                    </p>
                                </div>
                                <div class="item-main-link">
                                    <a href="module_monte_carlo.php">En savoir plus -></a>
                                </div>
                            </div>
                        </div>
                        <div class="main-items-item" id="2">
                            <div class="item-main">
                                <div class="item-main-title">
                                    <h3>Module 2</h3>
                                </div>
                                <div class="item-main-texte">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                </div>
                                <div class="item-main-link">
                                    <a href="#">En savoir plus -></a>
                                </div>
                            </div>
                        </div>
                        <div class="main-items-item" id="3">
                            <div class="item-main">
                                <div class="item-main-title">
                                    <h3>Module 3</h3>
                                </div>
                                <div class="item-main-texte">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                </div>
                                <div class="item-main-link">
                                    <a href="#">En savoir plus -></a>
                                </div>
                            </div>
                        </div>
                        <div class="main-items-item" id="4">
                            <div class="item-main">
                                <div class="item-main-title">
                                    <h3>Module 4</h3>
                                </div>
                                <div class="item-main-texte">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                </div>
                                <div class="item-main-link">
                                    <a href="#">En savoir plus -></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <?php 
            include("imports/footer.html");
        ?>

    </body>

</html>