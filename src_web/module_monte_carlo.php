<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>LTM | Monte Carlo</title>
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
                <div class="explication-monte-carlo-container">
                    <div class="explication-title">
                        <h2>Explication de la méthode Monte Carlo :</h2>
                    </div>
                    <div class="explication-main">
                        <div class="main-introduction">
                            <p>La méthode de Monte Carlo est une méthode utilisé pour calculer des valeurs approchés. En effet, la méthode ne permettra pas de calculer la valeur exacte
                                d'un résultat, mais elle fournit des estimations basées sur un très grand nombre d'échantillons aléatoires. Ici l'objectif est de calculer la valeur
                                approchée du nombre Pi.
                            </p>
                        </div>
                        <div class="main-graphique">
                            <img src="img/monte_carlo.png" alt="Graphique du principe de Monte Carlo">
                            <p>Schéma : Représentation graphique d'un lancé aléatoire de N échantillons</p>
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