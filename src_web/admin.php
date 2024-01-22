<!DOCTYPE html>
<html lang="fr">
<head>
    <title>LTM | Administration</title>
    <link href="img/logo_ltm_w_mini.svg" rel="icon">
    <?php include("imports/header.html"); ?>
    <!-- Inclure la bibliothèque Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <header></header>
    <?php include("imports/navbar.php"); ?>
    <main>
        <div class="container-background">
            <div class="background">
                <div class="circle1"></div>
                <div class="circle2"></div>
            </div>
        </div>
        <div class="main-container">
            <div class="admin-panel-monitor-hardware">
                <h1>System Monitoring</h1>
                <p>Ici, vous pouvez consulter les statistiques d'utilisation du RPI Pi 4B. Vous pouvez consulter l'utilisation du CPU et de la mémoire en temps réel sur une minute et depuis combien de temps celui-ci est allumé.</p>
                <div id="monitoring-data-list" class="monitoring-data-list"></div>
                <!-- Ajouter un canvas pour le graphique -->
                <div class="admin-pan-container-chart">
                    <canvas id="cpuChart" class="chart-canva"></canvas>
                    <canvas id="memChart" class="chart-canva"></canvas> 
                </div>
                
                <script>
                    // Initialiser une liste pour stocker les données CPU
                    var cpuData = Array(60).fill(0);

                    // Obtenir la référence du canvas et créer le graphique
                    var ctx = document.getElementById("cpuChart").getContext("2d");
                    var cpuChart = new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: Array.from({length: 60}, (_, i) => (i + 1).toString()), // Labels pour les 60 dernières secondes
                            datasets: [{
                                label: 'CPU Usage',
                                data: cpuData,
                                fill: true,
                                borderColor: 'rgb(255, 255, 255)',
                                tension: 0.1
                            }]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true,
                                    max: 100
                                }
                            }
                        }
                    });


                    // Initialiser une liste pour stocker les données MEMOIRE
                    var memData = Array(60).fill(0);

                    // Obtenir la référence du canvas et créer le graphique
                    var ctx2 = document.getElementById("memChart").getContext("2d");
                    var memChart = new Chart(ctx2, {
                        type: 'line',
                        data: {
                            labels: Array.from({length: 60}, (_, i) => (i + 1).toString()), // Labels pour les 60 dernières secondes
                            datasets: [{
                                label: 'Memory Usage',
                                data: memData,
                                fill: false,
                                borderColor: 'rgb(255, 255, 255)',
                                tension: 0.1
                            }]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true,
                                    max: 100
                                }
                            }
                        }
                    });

                    function fetchData() {
                        var xhr = new XMLHttpRequest();
                        xhr.open("GET", "/cgi-bin/monitor_cgi.py", true);
                        xhr.onreadystatechange = function () {
                            if (xhr.readyState === 4 && xhr.status === 200) {
                                var data = JSON.parse(xhr.responseText);
                                
                                // Ajouter les nouvelles valeurs de CPU et mémoire aux listes
                                cpuData.shift();
                                cpuData.push(data.cpu_percent);

                                memData.shift();
                                memData.push(data.mem_percent);

                                // Mettre à jour les graphiques
                                cpuChart.update();
                                memChart.update();

                                if(data.cpu_percent >= 85){
                                    var color_txt = "moni-col-red";
                                }else if(data.cpu_percent >= 60 && data.cpu_percent < 85){
                                    var color_txt = "moni-col-orange";
                                }else{
                                    var color_txt = "moni-col-green";
                                }

                                if(data.mem_percent >= 85){
                                    var color_txt_m = "moni-col-red";
                                }else if(data.mem_percent >= 60 && data.mem_percent < 85){
                                    var color_txt_m = "moni-col-orange";
                                }else{
                                    var color_txt_m = "moni-col-green";
                                }

                                // Mettre à jour les autres données sur la page
                                document.getElementById("monitoring-data-list").innerHTML =
                                    '<p class="'+ color_txt +'">CPU Usage: ' + data.cpu_percent + '%</p>' +
                                    '<p class="'+ color_txt_m +'">Memory Usage: ' + data.mem_percent + '%</p>' +
                                    '<p class="moni-col-green">Uptime: ' + data.uptime + ' seconds</p>' +
                                    '<p class="moni-col-green">Boot Time: ' + data.boot_time + '</p>';
                            }
                        };
                        xhr.send();
                    }

                    setInterval(fetchData, 1000);
                    fetchData(); // Appeler fetchData une fois au chargement de la page
                </script>
            </div>

            <?php
                //Affiche l'entierete de la table choisi selon les paramètres "table" et "texte" si un texte est entrée.
                function recherche($texte,$table): void{
                    //On ajoute la configuration d'accès à la base de données.
                    $connexion=mysqli_connect("localhost","root","");
                    $bd=mysqli_select_db($connexion,"bd_sae");

                    //Si la table est user.
                    if ($table == "users") {
                        //On récupère toutes les information dont ont à besoin.
                        $requete = mysqli_query($connexion,"SELECT id_u, nom_u, email_u, register_at_u, type_u from $table where nom_u like '".$texte."%'");
                    }
                    affichage_requete($table, $requete);
                }

                function affichage_requete($table, $requete){

                    //On affiche la base d'un tableau.
                    echo "<table class='admin-tab-users'>";

                        //On affiche les titres du tableau selon la table sélectionné.
                        if ($table == "users") {
                            echo "<tr id='titre_tab'><th>ID User</th><th>Nom</th><th>Email</th><th>Créer le/à</th><th>Type</th><th>Action</th></tr>";
                        }

                        while ($ligne = mysqli_fetch_row($requete)) {
                            echo "<tr>";
                            foreach ($ligne as $v) { //parcours tableau de mysqli_fetch_row
                                echo "<td>" . $v . "</td>";
                            }
                            if ($table == "users" && ($ligne[4] != "admin") ) {
                            //si table users, alors on peut supprimer les utilsateurs
                                echo " <td>
                                    <form action='delete_user.php' method='post' >
                                    <input type='hidden' name='id_user_suppr' value='$ligne[0]'>
                                    <input type='hidden' name='login_suppr' value='$ligne[1]'>
                                    <button class='admin-btn-suppr' id='suppresion' type='submit'>Delete</button>
                                    </form>
                                </td>";
                            }
                            echo "</tr>";
                        }
                        echo "</table>";

                }

            ?>

            <div class="admin-panel-users">
                <div class="recherche">
                    <h1>User Managment</h1>
                    <p>Ici, vous pouvez consulter et gérer l'ensemble des utilisateur de la platforme.</p>
                    <br>
                    <p>Rechercher un utilisateur avec son login</p>

                    <div class="admin-container-research">
                        <form method="post" id='post-admin-up'>
                            <input class='admin-btn global-navbar-links-connexion' id='users' type='submit' name="users" value="Afficher tous les utilisateurs">
                        </form>

                       <form method="post" class="form-search-user">
                            <input class="admin-input-research" aria-label="input-research" id='researched' type='text' name="text" placeholder="ex : demba404">
                            <input class='admin-btn global-navbar-links-connexion' id='search' type='submit' name='action' value='Rechercher'>
                        </form>
                    </div>
                </div>

                <div class="affichage">
                    <?php
                        //On inclus la configuration d'accès à la base de donnée avant de commencer.
                        require_once('config/config_bdd.php');

                        //Si on appuie sur le bouton utilisateur, alors on récupère la table, on la met le nom de la table
                        //dans un cookie pour la stocker et on appel la fonction avec le nom de la table en paramètre.
                        if (isset($_POST["users"])) {
                            $table = "users";
                            setcookie("table", $table);
                            $requete1 = "SELECT id_u, nom_u, email_u, register_at_u, type_u from $table";
                            $requete2 = mysqli_query($connexion, $requete1);
                            affichage_requete($table, $requete2);
                        }

                        //Si une recherche a été demandé.
                        if (isset($_POST["text"]) && $_POST["action"] == "Rechercher") {
                            // On appelle la fonction recherche avec le nom de la table et le texte entré.
                            recherche("admin", "users");
                        }
                    ?>
                </div>
            </div>

        </div>
    </main>
    <?php include("imports/footer.html"); ?>
</body>
</html>
