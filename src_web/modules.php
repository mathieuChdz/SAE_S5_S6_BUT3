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
                    <div class="main-item" id="1">
                        <div class="item-main-title">
                            <h3>Trouvez PI</h3>
                            <p>Méthode de Monte Carlo</p>
                        </div>
                        <div class="item-main-texte">
                            <p>Ce module permet de calculer, à l'aide de la méthode de Monte Carlo, le nombre Pi. L'objectif ici est l'optimisation du temps d'execution par la répartition de cette même execution sur différentes machines.
                            </p>
                        </div>
                        <div class="item-main-link">
                            <a href="module_monte_carlo.php">En savoir plus -></a>
                        </div>
                    </div>

                    <div class="main-item" id="2">
                        <div class="item-main-title">
                            <h3>C'est qui les premiers ?</h3>
                            <p>Nombres premier</p>
                        </div>
                        <div class="item-main-texte">
                            <p>Ce module de calcul distribué offre la possibilité à l'utilisateur une expérience de calcul distribué en calculant tous les nombres premiers de 2 à N et en constatant la différence de temps d'exécution.</p>
                        </div>
                        <div class="item-main-link">
                            <a href="module_nombres_premiers.php">En savoir plus -></a>
                        </div>
                    </div>

                    <div class="main-item" id="3">
                        <div class="item-main-title">
                            <h3>Positif ou négatif</h3>
                            <p>Web scraping</p>
                        </div>
                        <div class="item-main-texte">
                            <p>Ce module permet à l'utilisateur de savoir si une vidéo a été appréciée ou non. L'objectif ici est de regarder plusieurs commentaires d'une vidéo (anglaise) donnée et de retourné le pourcentage de commentaires positif et négatif.</p>
                        </div>
                        <div class="item-main-link">
                            <a href="#">En savoir plus -></a>
                        </div>
                    </div>

                    <div class="main-item" id="4">
                        <div class="item-main-title">
                            <h3>Chiffrer un message</h3>
                            <p>Cryptographie</p>
                        </div>
                        <div class="item-main-texte">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                        </div>
                        <div class="item-main-link">
                            <a href="module_chiffrement.php">En savoir plus -></a>
                        </div>
                    </div>

                    <div class="main-item" id="5">
                        <div class="item-main-title">
                            <h3>Calcul d'intégrales</h3>
                            <p>Probabilité</p>
                        </div>
                        <div class="item-main-texte">
                            <p>Ce module permet à l'utilisateur de calculer une intégrale. Ce dernier peut choisir entre trois méthodes de calcul (méthode des rectangles médians, méthode des trapèzes, méthode de Simpson).</p>
                        </div>
                        <div class="item-main-link">
                            <a href="module_proba.php">En savoir plus -></a>
                        </div>
                    </div>

                    <div class="main-item" id="5">
                        <div class="item-main-title">
                            <h3>Calcul d'intégrales</h3>
                            <p>Méthode de Monte Carlo</p>
                        </div>
                        <div class="item-main-texte">
                            <p>Ce module permet à l'utilisateur de calculer une intégrale à l'aide de la méthode de Monte Carlo. A COMPLETER</p>
                        </div>
                        <div class="item-main-link">
                            <a href="module_proba_monte_carlo.php">En savoir plus -></a>
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