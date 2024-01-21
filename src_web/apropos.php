<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>LTM | À Propos</title>
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
                <div class="explication-sae-container">
                    <div class="explication-sae-intro">
                        <div class="explication-sae-titre">
                            <h2>Notre projet</h2>
                        </div>
                        <div class="explication-sae-main">
                            <p>Le projet vise à mettre en place une plateforme permettant l'exécution de différents modules reflétant les
                                enseignements acquis durant nos années de BUT. Les différents modules sont :
                            </p>
                            <ul>
                                <li>Calcul du nombre pi avec la méthode de Monte Carlo <b><i>(Calcul distribué)</i></b></li>
                                <li>Calcul des nombres premiers de 2 à N <b><i>(Calcul distribué)</i></b></li>
                                <li>Web scrapping sur le taux de safisfaction d'une video youtube (selon ses commentaires)</li>
                                <li>Chiffrement de mot de passe</li>
                                <li>Simulation de probalités</li>
                                <li>Simulation de probalités avec la méthode de Monte Carlo (Calcul distribué)</li>
                            </ul>
                        </div>
                    </div>
                    <div class="explication-sea-archi">
                        <div class="explication-sea-archi-titre">
                            <h2>L'architecture utilisée</h2>
                        </div>
                        <div class="explication-sea-archi-main">
                            <p>l'architecture utilisée est un Kit Cluster hat. Ce dernier est composé de :</p>
                            <ul>
                                <li>1 Rpi 4 Modèle B d'une capacité mémoire de 4 Go. Il s'agit du cœur de notre système. Le Raspberry Pi 4 est un ordinateur monocarte doté de suffisamment de puissance de calcul pour l’utilisation que nous souhaitons en faire.</li>
                                <li>1 Pimoroni Cluster HAT v2.5 pour Raspberry Pi 0. C'est l'élément clé de notre cluster informatique. Cette carte d'extension permet de connecter jusqu'à quatre Raspberry Pi Zero W, créant ainsi un cluster de calcul distribué.</li>
                                <li>4 Rpi 0 W. Ces mini-ordinateurs, dotés de capacités de connectivité sans fil, sont les nœuds du cluster. Bien que compacts, les Raspberry Pi Zero W sont capables d'exécuter des tâches légères et de contribuer à la puissance de calcul globale du cluster.</li>
                                <li>5 Carte Micro SD de 16 Go. Les cartes microSD sont les supports de stockage pour nos Raspberry Pi. Avec une capacité de stockage de 16 Go chacune, elles fournissent l'espace nécessaire pour les systèmes d'exploitation, les applications et les données nécessaires au bon fonctionnement de notre cluster.</li>
                            </ul>
                            <p>Ce cluster ou regroupement, permet la réalisation de notre projet sans se soucier des spécifications techniques et sans être bridés.</p>
                            <div class="archi-img">
                                <img src="img/schema_archi_rpi.png" alt="schéma architecture rpi"/>
                                <p>Figure : architecture Rpi 4 B Cluster Hat</p>
                            </div>
                        </div>
                    </div>
                    <div class="explication-sea-team">
                        <div class="explication-sea-team-titre">
                            <h2>Notre équipe projet</h2>
                        </div>
                        <div class="explication-sea-team-main">
                            <div class="sae-team-items">
                                <div class="sae-team-item" id="one">
                                    <div class="team-item-img">
                                        <img src="img/mate1.jpg" alt="photo du mate 1">
                                    </div>
                                    <div class="team-item-main">
                                        <h3>Renouf Ugo</h3>
                                        <p>Vivamus semper urna in mauris pretium gravida. Donec ac enim quam. Sed viverra purus quis ultricies auctor. 
                                            Etiam ac aliquam ipsum. Proin gravida laoreet nisi, at egestas quam dapibus ac. Aenean iaculis fermentum tellus sed convallis. 
                                            Etiam vitae leo eu dui suscipit feugiat. Proin porta justo urna, in tincidunt nunc aliquam pharetra. Integer in magna in mi semper tristique.
                                        </p>
                                    </div>
                                </div>
                                <div class="sae-team-item" id="two">
                                    <div class="team-item-img">
                                        <img src="img/mate2.jpg" alt="photo du mate 2">
                                    </div>
                                    <div class="team-item-main">
                                        <h3>Belaidi Elyas</h3>
                                        <p>"Le travail individuel permet de gagner un match mais c'est l'esprit d'équipe et l'intelligence collective qui permet de gagner les trophées."</p>
                                    </div>
                                </div>                                
                                <div class="sae-team-item" id="tree">
                                    <div class="team-item-img">
                                        <img src="img/mate3.jpg" alt="photo du mate 3">
                                    </div>
                                    <div class="team-item-main">
                                        <h3>Bullock Patrick</h3>
                                        <p>Vivamus semper urna in mauris pretium gravida. Donec ac enim quam. Sed viverra purus quis ultricies auctor. 
                                            Etiam ac aliquam ipsum. Proin gravida laoreet nisi, at egestas quam dapibus ac. Aenean iaculis fermentum tellus sed convallis. 
                                            Etiam vitae leo eu dui suscipit feugiat. Proin porta justo urna, in tincidunt nunc aliquam pharetra. Integer in magna in mi semper tristique.
                                        </p>
                                    </div>
                                </div>                                
                                <div class="sae-team-item" id="four">
                                    <div class="team-item-img">
                                        <img src="img/mate4.jpg" alt="photo du mate 4">
                                    </div>
                                    <div class="team-item-main">
                                        <h3>Guenfici Rayane</h3>
                                        <p>Vivamus semper urna in mauris pretium gravida. Donec ac enim quam. Sed viverra purus quis ultricies auctor. 
                                            Etiam ac aliquam ipsum. Proin gravida laoreet nisi, at egestas quam dapibus ac. Aenean iaculis fermentum tellus sed convallis. 
                                            Etiam vitae leo eu dui suscipit feugiat. Proin porta justo urna, in tincidunt nunc aliquam pharetra. Integer in magna in mi semper tristique.
                                        </p>
                                    </div>
                                </div>                                
                                <div class="sae-team-item" id="five">
                                    <div class="team-item-img">
                                        <img src="img/mate5.jpg" alt="photo du mate 5">
                                    </div>
                                    <div class="team-item-main">
                                        <h3>Chedozeau Mathieu</h3>
                                        <p>"Certains veulent que ça arrive, d'autres aimeraient que ça arrive et quelques-uns font que ça arrive."</p>
                                    </div>
                                </div>
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