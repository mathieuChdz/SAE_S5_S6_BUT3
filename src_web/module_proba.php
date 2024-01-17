<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>LTM | probabilité</title>
        <link href="img/logo_ltm_w_mini.svg" rel="icon">

        <?php 
        include("imports/header.html");
        ?>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
        
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
                <div class="proba-container">
                    <div class="proba-main-explication">
                        <div class="main-explication-titre">
                            <h2>Le calcul d'intégrales</h2>
                        </div>

                        <div class="proba-explication-main">
                            <p>Ce module à pour objectif de calculer une probabilité suivant une <b>loi normale</b>. L’utilisateur pourra choisir la méthode à utilisée (méthode des rectangles médians, méthode des trapèzes, méthode de Simpson) ainsi que les paramètres <b>m</b> (moyenne), <b>σ</b>(écart type) et T. Pour cela, différentes fonctions sont développées :
                            </p>
                            <ul>
                                <li><b>loi_normale (m,s,x)</b> : calcul une loi de probabilité avec des paramètres (m,s,x) donnés.</li>
                                <li><b>rectangle médian (n,a,b,m,s)</b> : calcul une probabilité suivant une loi normale grâce à la méthode des rectangles médian.</li>
                                <li><b>trapèze (n,a,b,m,s)</b> : calcul une probabilité suivant une loi normale grâce à la méthode des trapèzes.</li>
                                <li><b>simpson (n,a,b,m,s)</b> : calcul une probabilité suivant une loi normale grâce à la méthode de Simpson.</li>
                            </ul>
                            <p>Le module de proba a été développé en python</p>
                        </div>    
                    </div>

                    <div class="proba-main-simulation">
                        <div class="main-simulation-titre">
                            <h2>Calcul d'une intégrale</h2>
                        </div>
                        <div class="simulation-form-container">
                                <form action="php/traitement_proba.php" method="post">
                                    <div class="main-form">
                                        <div class="form-container-title">
                                            <h2>Paramètres</h2>
                                        </div>
                                        <h3>Méthode choisie</h3>
                                        <div class="form-inputs">
                                            <div  class="form-choix">
                                                <div class="form-radio-item">
                                                    <input type="radio" id="methode1" name="choix" value="r_m" required>
                                                    <label for="methode1">Rectangles médians</label>
                                                </div>
                                                <div class="form-radio-item">
                                                    <input type="radio" id="methode2" name="choix" value="trapezes" required>
                                                    <label for="methode2">Trapèzes</label>
                                                </div>
                                                <div class="form-radio-item">
                                                    <input type="radio" id="methode3" name="choix" value="simpson" required>
                                                    <label for="methode3">Simpson</label>
                                                </div>
                                            </div>
                                            <div class="form-m">
                                                <label for="m">M</label>
                                                <input type="number" id="m" name="m" placeholder="valeur de m" required="required">
                                            </div>
                                            <div class="form-e_t">
                                                <label for="e_t">σ</label>
                                                <input type="number" id="e_t" name="e_t" placeholder="valeur de σ" required="required">
                                            </div>
                                            <div class="form-t">
                                                <label for="t">T</label>
                                                <input type="number" id="t" name="t" placeholder="valeur de t" required="required">
                                            </div>
                                            <div class="form-submit">
                                                <input type="submit" name="envoyer" id="envoyer" value="Lancer la simulation">
                                            </div>
                                        </div>
                                        <div class="simulation-proba-res-container" id="resultat">
                                            <div class="simulation-proba-res-main">
                                                <?php
                                                if (isset($_GET["res"], $_GET["methode"])){
                                                    echo "<hr></hr>";
                                                    echo "<h2>Résultat</h2>";
                                                    if ($_GET["methode"] == 1){
                                                        echo "<h3>Méthodes des rectangles médians</h3>";
                                                    }

                                                    else if($_GET["methode"] == 2){
                                                        echo "<h3>Méthodes des trapèzes</h3>";
                                                    }

                                                    else if($_GET["methode"] == 3){
                                                        echo "<h3>Méthodes de Simpson</h3>";
                                                    }

                                                    echo "<p id='res'>".$_GET["res"]."</p>";
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

        </main>

        <?php 
            include("imports/footer.html");
        ?>

    </body>

</html>