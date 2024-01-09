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

                        <div class="popup-titre">
                            <div class="warning-popup" id="1">
                                <p>En savoir plus sur le <b>calcul distribué</b></p>
                                <span class="material-symbols-outlined" id="1">expand_content</span>
                            </div>
                        </div>
                        <div class="popup-content" id="popup-content">
                            <div class="popup-content-item" id="popup-content-item">
                                <div class="popup-header">
                                    <span class="close">&times;</span>
                                    <h1>no pages selected</h1>
                                </div>
                                <hr />
                                <div class="content-item-p" id="1">
                                    <h2>Qu'est-ce qu'est le calcul distribué ?</h2>
                                    <p>Le <b>calcul distribué</b> ou <b>partagé</b> ou <b>réparti</b> est une méthode de traitement qui repose sur la répartition de tâches 
                                    pour gagner que ce soit en performance et en gain de temps. Il y a ici plusieurs microprocesseurs qui sont utilisés et qui répondent à la même demande.
                                    Ces microprocesseurs peuvent être sur des ordinateurs uniques les uns des autres ou sur, parfois, une seule et même machine.
                                    On parle de système distribué.
                                     
                                    <br>
                                    <h2>Architecture</h2>
                                    <p>Les différents calculs utilisant la programmation distribué auront une l'architecture suivante :</p>
                                    <div class="archi-img">
                                        <img src="img/schema_archi_rpi.png" alt="schéma architecture rpi"/>
                                        <p>Figure : architecture Rpi 4 B Cluster Hat</p>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                    <div class="simulation-np-res-container">
                        <div class="simulation-np-res-main">
                            <?php
                            if (isset($_SESSION['resultat'])){

                                $file = "php/resultat.txt";
                                $data = file($file);
                                $line = $data[count($data)-1];
                                //echo $line;

                                $res_json = json_decode($line, true);
                                $lenght = count($res_json);
                                $pourcentage = (100*$lenght)/($_GET["N"]-1);

                                echo "<table>";
                                echo "<tr>";
                                    echo "<th colspan='10'>Nombres premiers de 2 à ".$_GET["N"]." : ".$lenght." | ".round($pourcentage,2)."%</th>";
                                echo "</tr>";
                                $cpt=0;
                                foreach ($res_json as $value) {
                                    if ($cpt%10 == 0){
                                        echo "<tr>";
                                            echo "<td>".$value."</td>";
                                    }
                                    elseif ($cpt+1%10 == 0){
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