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
                    <div class="simulation-web-scraping-res-container" id="resultat">
                        <div class="simulation-web-scraping-res-main">
                            <?php
                            if (isset($_SESSION["output"], $_GET["btn"])){
                                echo "<hr></hr>";
                                echo "<h2>Résultat</h2>";
                                if ($_GET["btn"] == "titre_fr"){
                                    $table_titre = "Titre des articles en français";
                                }

                                else if($_GET["btn"] == "resultat_fr"){
                                    echo "<h3>Résultat des statistiques de 'positivité' des articles en français</h3>";
                                }

                                else if($_GET["btn"] == "titre_en"){
                                    $table_titre = "Titre des articles en anglais";
                                }
                                
                                else if($_GET["btn"] == "resultat_en"){
                                    echo "<h3>Résultat des statistiques de 'positivité' des articles en anglais</h3>";
                                }
                                // echo "<p id='res'>".utf8_encode($_SESSION["output"])."</p>";

                                if ($_GET["btn"] == "titre_fr" or $_GET["btn"] == "titre_en"){
                                    echo "<table>";
                                        echo "<tr>";
                                            echo "<th>Titre des articles en français</th>";
                                        echo "</tr>";

                                        $resultat = str_replace(["['", "']",'\xa0', '«', '»'], '', utf8_encode($_SESSION["output"]));
                                        $resultat = explode("', '", $resultat);

                                        foreach ($resultat as $value) {
                                            echo "<tr><td>".$value."</td></tr>";
                                        }
                                    echo "</table>";
                                }
                                else if($_GET["btn"] == "resultat_fr" or $_GET["btn"] == "resultat_en"){
                                    
                                    // echo "<p id='res'>".$_SESSION["output"]."</p>";
                                    $resultat = str_replace(["(", ")"], '', $_SESSION["output"]);
                                    $resultat = explode(",", $resultat);
                                    $resultat_positif = floatval($resultat[0]);
                                    $resultat_negatif = floatval($resultat[1]);
                                    ?>
                                    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

                                    <div>
                                        <canvas id="PieChart"></canvas>
                                    </div>

                                    <script>

                                        // Récupérer le contexte du canvas
                                            var ctx = document.getElementById('PieChart').getContext('2d');

                                            // Données du graphique (exemple)
                                            var data = {
                                            labels: ['Positif','Négatif'],
                                            datasets: [{
                                                data: [<?= $resultat_positif ?>, <?= $resultat_negatif ?>], // Les pourcentages ou les valeurs numériques pour chaque secteur
                                                backgroundColor: ['red', 'green'], // Couleurs pour chaque secteur
                                            }]
                                            };

                                            // Configuration du graphique
                                            var options = {
                                            responsive: true,
                                            maintainAspectRatio: false,
                                            };

                                            // Création du graphique en secteurs
                                            var myPieChart = new Chart(ctx, {
                                            type: 'pie',
                                            data: data,
                                            options: options
                                            });

                                    </script>
                                    <?php
                                }

                                
                            }
                            ?>
                        </div>
                    </div>
                </div>
        </main>

        <?php 
            include("imports/footer.html");
        ?>


    </body>

</html>