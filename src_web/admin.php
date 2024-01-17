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
                <!-- ... (votre code existant) ... -->
            </div>
            <div class="admin-panel-monitor-hardware">
                <h1>System Monitoring</h1>
                <!-- Ajouter un canvas pour le graphique -->
                <canvas id="cpuChart" width="400" height="200"></canvas>
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
                                fill: false,
                                borderColor: 'rgb(75, 192, 192)',
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
                                
                                // Ajouter la nouvelle valeur de CPU à la liste (enlever le premier élément et ajouter le nouveau)
                                cpuData.shift();
                                cpuData.push(data.cpu_percent);

                                // Mettre à jour le graphique
                                cpuChart.update();

                                // Mettre à jour les autres données sur la page
                                document.getElementById("monitoring-data").innerHTML =
                                    '<p>CPU Usage: ' + data.cpu_percent + '%</p>' +
                                    '<p>Memory Usage: ' + data.mem_percent + '%</p>' +
                                    '<p>Uptime: ' + data.uptime + ' seconds</p>' +
                                    '<p>Boot Time: ' + data.boot_time + '</p>';
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
