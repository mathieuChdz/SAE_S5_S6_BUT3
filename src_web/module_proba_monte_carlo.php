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
                            <p>Ce module a pour but de calculer des probabilités de loi normales grâce à la méthode de Monte-Carlo. <a href="module_monte_carlo.php">(cliquez ici pour en savoir plus sur la méthode de Monte Carlo)</a></p>
                            <p>Notre module permet d'effectuer différents calculs en suivant la loi Normale basée sur la moyenne (M) et l'écart-type (σ) </p>
                            <p>Les calculs que vous pouvez effectuer sont les suivants :</p>
                            <p>Si T1 est vide : Résultat = P(X < T2)</p>
                            <p>Si T2 est vide : Résultat = P(X > T1)</p>
                            <p>Si aucun est vide :Résultat = P(T1 < X < T2)</p>
                            
                            <div class="proba-monte-carlo-explication-warning">
                                <p><b>Précisions</b></p>
                                <p>Il est possible de ne rentrer qu'une seule valeure pour T1 et T2, les deux ne doivent pas être vide.</p>
                                <p>Vous devez obligatoirement completez les champs M et σ qui correspondent à la moyenne et l'écart-type.</p>
                            </div>
                        
                            <p>Le module de proba a été développé en python</p>
                        </div>
                        
                        <?php include("imports/popup_calcul_distribue.html"); ?>
                    </div>

                    <div class="proba-main-simulation">
                        <div class="main-simulation-titre">
                            <h2>Calcul d'une intégrale</h2>
                        </div>
                        <div class="simulation-form-container">
                                <form action="php/traitement_monte_carlo_proba.php" method="post">
                                    <div class="main-form">
                                        <div class="form-container-title">
                                            <h2>Paramètres</h2>
                                            <?php
                                            if (isset($_GET["err"])){
                                                if ($_GET["err"] == '1'){
                                                    echo "<p id='form-err'>Les paramètres T1 et T2 sont nulles !</p>";
                                                }          
                                            }
                                            ?>
                                        </div>
                                        <div class="form-inputs">
                                            <div class="form-m">
                                                <label for="m">M</label>
                                                <input type="number" id="m" name="m" placeholder="valeur de m" required="required">
                                            </div>
                                            <div class="form-e_t">
                                                <label for="e_t">σ</label>
                                                <input type="number" id="e_t" name="e_t" placeholder="valeur de σ" required="required">
                                            </div>
                                            <div class="form-t">
                                                <label for="t1">T1</label>
                                                <input type="number" id="t1" name="t1" placeholder="valeur de t1">
                                            </div>
                                            <div class="form-t">
                                                <label for="t2">T2</label>
                                                <input type="number" id="t2" name="t2" placeholder="valeur de t2">
                                            </div>
                                            <div class="form-submit">
                                                <input type="submit" name="envoyer" id="envoyer" value="Lancer la simulation">
                                            </div>
                                        </div>
                                        <div class="simulation-proba-res-container">
                                            <div class="simulation-proba-res-main">
                                                <?php
                                                if (isset($_GET["res"])){

                                                    $file = "php/resultat.txt";
                                                    $data = file($file);
                                                    $line = $data[count($data)-1];

                                                    echo "<hr></hr>";
                                                    echo "<h2>Résultat</h2>";
                                                    echo "<h3>Méthodes de Monte Carlo</h3>";
                                                    echo "<p id='res'>".round($line,6)."</p>";
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