<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>LTM | prababilité</title>
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
                <div class="proba-container">
                    <div class="proba-main-explication">
                        <div class="main-explication-titre">
                            <h2>Le calcul d'intégrales</h2>
                        </div>

                        <div class="proba-explication-main">
                            <p>Le module de proba permet de chiffrer et déchiffrer des mots entrés par un utilisateur en utilisant le proba RC4.
                                 Pour ce faire, le module fonctionne notamment grâce à deux fonctions python principales qui suivent les principes du proba RC4, une fonction qui sert à chiffrer un mot
                                 entré et une autre qui sert à déchiffrer un mot entré.
                            </p>
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
                                        <div class="simulation-proba-res-container">
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