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
            <div class="main-explication">
                
            </div>
            <div class="admin-panel-monitor-hardware">
                <h1>System Monitoring</h1>
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
        </div>
    </main>
    <?php include("imports/footer.html"); ?>
</body>
</html>
