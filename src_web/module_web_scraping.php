<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>LTM | web scraping</title>
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
                <div class="web-scraping-container">
                    <div class="web-scraping-main-explication">
                        <div class="main-explication-titre">
                            <h2>Web scraping</h2>
                        </div>

                        <div class="web-scraping-explication-main">
                            <p>Le module de Web scraping est une amélioration de celui qu’on a fait l’année dernière lors de la SAE au S4. 
                                L’objectif ici est de récupérer les principaux titres d’articles sur un site francophone (<a href="https://www.lemonde.fr/" target="blank">Le Monde</a>) et un site anglophone (<a href="https://www.washingtonpost.com/" target="blank">Washington Post</a>)
                                et de prédire si les titres des articles sont plutôt des informations négatives ou neutres ou alors positives.
                                A l’aide des 4 boutons ci-dessous, vous pouvez consulter les titres des articles et leur rapport de positivité.
                            </p>
                            <p>Le module de web scraping a été développé en python</p>
                        </div>
                    </div>

                    <div class="web-scraping-main-simulation">
                        <div class="main-simulation-titre">
                            <h2>Simulation web scraping</h2>
                        </div>
                        <div class="simulation-form-container">
                            <form id="web-scraping-form" action="php/traitement_web_scraping.php" method="post">
                            </form>
                            <button type="submit" form="web-scraping-form" name="send" value="titre_fr">Afficher les titres en français</button>
                            <button type="submit" form="web-scraping-form" name="send" value="resultat_fr">Résultat des statistiques en français</button>
                            <button type="submit" form="web-scraping-form" name="send" value="titre_en">Afficher les titres en anglais</button>
                            <button type="submit" form="web-scraping-form" name="send" value="resultat_en">Résultat des statistiques en anglais</button>
                        </div>
                    </div>
                </div>

                <div class="simulation-web-scraping-res-container">
                    <div class="simulation-web-scraping-res-main">
                        <?php
                        if (isset($_SESSION["output"], $_GET["btn"])){
                            echo "<hr></hr>";
                            echo "<h2>Résultat</h2>";
                            if ($_GET["btn"] == "titre_fr"){
                                echo "<h3>Titre des articles en français</h3>";
                            }

                            else if($_GET["btn"] == "resultat_fr"){
                                echo "<h3>Résultat des statistiques de 'positivité' des articles en français</h3>";
                            }

                            else if($_GET["btn"] == "titre_en"){
                                echo "<h3>Titre des articles en anglais</h3>";
                            }
                            
                            else if($_GET["btn"] == "resultat_en"){
                                echo "<h3>Résultat des statistiques de 'positivité' des articles en anglais</h3>";
                            }
                            echo "<p id='res'>".utf8_encode($_SESSION["output"])."</p>";
                        }
                        ?>
                    </div>
                </div>

        </main>

        <?php 
            include("imports/footer.html");
        ?>


    </body>

</html>