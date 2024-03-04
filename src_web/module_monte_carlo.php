<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>LTM | Monte Carlo</title>
        <link href="img/logo_ltm_w_mini.svg" rel="icon">

        <?php 
        include("imports/header.html");
        ?>

        <script type="text/javascript" async
            src="https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.7/MathJax.js?config=TeX-MML-AM_CHTML">
        </script>

    </head>

    <body>

        <header>
        </header>

        <?php 
            include("imports/navbar.php");
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
                        <h2>Explication de la méthode Monte Carlo</h2>
                    </div>
                    <div class="explication-main">
                        <div class="main-introduction">
                            <p>La méthode de Monte Carlo est une méthode utilisé pour calculer des valeurs approchés. En effet, la méthode ne permettra pas de calculer la valeur exacte
                                d'un résultat, mais elle fournit des estimations basées sur un très grand nombre d'échantillons aléatoires. Ici l'objectif est de calculer la valeur
                                approchée du nombre Pi.
                            </p>
                            <p>
                                Le principe de la méthode de Monte Carlo est d'utiliser un quart de cercle qui se situe dans un carré de 1X1.
                            </p> 
                            <p>L'objectif est de tirer un grand nombre de points aléatoirement entre la position (0, 0) et (1, 1) et d'étudier ce qui sont 
                                dans le quart de cercle.
                            </p>
                        </div>
                        <div class="main-graphique">
                            <img src="img/monte_carlo.png" alt="Graphique du principe de Monte Carlo">
                            <p>Schéma : Représentation graphique d'un lancé aléatoire de N échantillons</p>
                        </div>
                        <div class="main-formules">
                            <div class="main-formules-1">
                                <p>On sait que  : </p><p id="formule">\( A_{1/4d} = \frac{\pi r^2}{4} = \frac{\pi}{4} \)</p><p> avec r = 1</p>
                            </div>
                            <div class="main-formules-2">
                                <p>Ici, on cherche à selectionner seulement les points présent sur le quart de cercle. On a donc : </p>
                                <p id="formule">\( P = \frac{A_{1/4d}}{A_c} = \frac{\frac{\pi}{4}}{1} = \frac{\pi}{4} \)</p>
                            </div>
                            <div class="main-formules-3">
                                <p>De plus, pour savoir si notre point est dans zone du quart de cercle, on compare la distance de l'origine (0, 0)
                                    jusqu'au point actuel à celle de l'origine jusqu'au bord du quart de cercle. Cela nous permettra de connaitre
                                    <i>nQuart</i> ainsi que <i>nTotal</i>. Ce qui nous donne :
                                </p>
                                <p id="formule">\( \sqrt{x^2p + y^2p} < 1 = x^2p + y^2p < 1 \)</p>
                            </div>
                            <div class="main-formules-3">
                                <p>Enfin, avec <i>n_quart</i> et <i>n_total</i> connus, nous pouvons touver \( \pi \) :
                                </p>
                                <p id="formule">\( \pi = 4 * \frac{nQuart}{nTotal} \)</p>
                            </div>
                        </div>
                    </div>

                    <?php include("imports/popup_calcul_distribue.html"); ?>
                </div>

                <div class="simulation-monte-carlo-container">
                    <div class="simulation-title">
                        <h2>Simulation de la méthode Monte Carlo</h2>
                    </div>
                    <div class="simulation-main">
                        <div class="simulation-main-container">
                            <div class="simulation-form-container">
                                <form action="php/traitement_pi.php" method="post">
                                    <div class="main-form">
                                        <div class="form-container-title">
                                            <h2>Paramètres</h2>
                                        </div>
                                        <div class="form-inputs">
                                            <div class="form-number-nodes">
                                                <label for="workers">Workers</label>
                                                <input type="number" name="workers" id="workers" placeholder="nombres de workers (1 à 4)" min="1" max="4" required>
                                            </div>
                                            <div class="form-iterations">
                                                <label for="iterations">N</label>
                                                <input type="number" name="iterations" id="iterations" placeholder="iterations" required>
                                            </div>
                                            <div class="form-submit">
                                                <input type="submit" name="envoyer" id="envoyer" value="Lancer la simulation">
                                            </div>
                                        </div>
                                        <div class="simulation-monteCarloPi-res-container" id="resultat">
                                            <div class="simulation-monteCarloPi-res-main">
                                                <?php
                                                if (isset($_GET["N"])){

                                                    $file = "php/resultat.txt";
                                                    $data = file($file);
                                                    $line = $data[count($data)-1];
                                                    //echo $line;

                                                    echo "<hr></hr>";
                                                    echo "<h2>Résultat</h2>";
                                                    
                                                    echo "<p>Nombre d'itérations : ".$_GET["N"]."</p>";

                                                    echo "<p id='res'><b>".round($line,8)."</b></p>";
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </form>
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