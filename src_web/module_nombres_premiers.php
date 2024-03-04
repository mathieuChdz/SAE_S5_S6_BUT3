<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>LTM | nombres premiers</title>
        <link href="img/logo_ltm_w_mini.svg" rel="icon">

        <?php 
        include("imports/header.html");
        ?>
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
                <div class="np-container">
                    <div class="np-main-explication">
                        <div class="main-explication-titre">
                            <h2>Les nombres premiers</h2>
                        </div>

                        <div class="np-explication-main">
                            <p>Ce module permet de calculer les nombres premiers de 2 jusqu'à un nombre N choisi. Un nombre premier est 
                                un entier naturel qui ne peut être divisé que par 1 ou lui même. Plus précisément, un nombre premier n'est 
                                divisible par aucune valeurs si on enlève 1 et lui même (car tous les nombres sont divisibles par 1 et lui même).
                            </p>
                            <p>On ne considère pas le chiffre 1 car un nombre premier est défini comme >= 1</p>
                        </div>

                        <?php include("imports/popup_calcul_distribue.html"); ?>
                        
                    </div>
                    <div class="np-main-simulation">
                        <div class="main-simulation-titre">
                            <h2>Calcul des nombres premiers</h2>
                        </div>
                        <div class="simulation-form-container">
                                <form action="php/traitement_nombres_premiers.php" method="post">
                                    <div class="main-form">
                                        <div class="form-container-title">
                                            <h2>Paramètres</h2>
                                        </div>
                                        <div class="form-inputs">
                                            <div class="form-number-nodes">
                                                <label for="workers">Workers</label>
                                                <input type="number" name="workers" id="workers" placeholder="nombres de workers (1 à 4)" min="1" max="4" required>
                                            </div>
                                            <div class="form-number">
                                                <label for="number">N</label>
                                                <input type="number" name="number" id="number" placeholder="nombre" required>
                                            </div>
                                            <div class="form-submit">
                                                <input type="submit" name="envoyer" id="envoyer" value="Lancer la simulation">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                    </div>
                    <div class="simulation-np-res-container" id="resultat">
                        <div class="simulation-np-res-main">
                            <?php
                            if (isset($_GET["N"])){

                                $file = "php/resultat.txt";
                                $data = file($file);
                                $line = $data[count($data)-1];
                                //echo $line;

                                $res_json = json_decode($line, true);
                                $lenght = count($res_json);
                                $pourcentage = (100*$lenght)/($_GET["N"]-1);

                                function isMobile() {
                                    $userAgent = $_SERVER['HTTP_USER_AGENT'];
                                    return preg_match("/(android|avantgo|blackberry|iemobile|nokia|phone|mobile)/i", $userAgent) && !preg_match("/(tablet)/i", $userAgent);
                                }

                                if (isMobile()) {
                                    $nb_cells_row = 4;
                                }else {
                                    $nb_cells_row = 10;
                                }

                                echo "<table>";
                                echo "<tr>";
                                    echo "<th colspan='10'>Nombres premiers de 2 à ".$_GET["N"]." : ".$lenght." | ".round($pourcentage,2)."%</th>";
                                echo "</tr>";
                                $cpt=0;
                                foreach ($res_json as $value) {
                                    if ($cpt%$nb_cells_row == 0){
                                        echo "<tr>";
                                            echo "<td>".$value."</td>";
                                    }
                                    elseif ($cpt+1%$nb_cells_row == 0){
                                        echo "</tr>";
                                    }
                                    else{
                                        echo "<td>".$value."</td>";
                                    }
                                    $cpt++;
                                }
                            echo "</table>";
                            }
                            ?>
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