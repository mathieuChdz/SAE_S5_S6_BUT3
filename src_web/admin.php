<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>LTM | Administration</title>
        <link href="img/logo_ltm_w_mini.svg" rel="icon">

        <?php 
        include("imports/header.html");
        ?>
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
                <div class="main-explication">
                    <div class="main-explication-title">
                        <h2>Panel Administrateur</h2>
                    </div>
                    <div class="main-explication-texte">
                        <p>Ce panel est <strong>strictement</strong> réservé au personnel autorisé.</p>
                    </div>
                </div>

                <div class="admin-panel-monitor-hardware">
                    <ul>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                    </ul>
                    <h1>System Monitoring</h1>
                    <div id="monitoring-data"></div>

                    <script>
                        function fetchData() {
                            // Effectuer une requête AJAX vers le script CGI
                            var xhr = new XMLHttpRequest();
                            xhr.open("GET", "/cgi-bin/monitor_cgi.py", true);
                            xhr.onreadystatechange = function () {
                                if (xhr.readyState === 4 && xhr.status === 200) {
                                    // Mettre à jour les données sur la page
                                    var data = JSON.parse(xhr.responseText);
                                    document.getElementById("monitoring-data").innerHTML =
                                        '<p>CPU Usage: ' + data.cpu_percent + '%</p>' +
                                        '<p>Memory Usage: ' + data.mem_percent + '%</p>';
                                }
                            };
                            xhr.send();
                        }

                        // Mettre à jour les données toutes les 10 secondes (10000 millisecondes)
                        setInterval(fetchData, 10000);

                        // Appeler fetchData une fois au chargement de la page
                        fetchData();
                    </script>
                </div>
            </div>
        </main>

        <?php 
            include("imports/footer.html");
        ?>

    </body>

</html>