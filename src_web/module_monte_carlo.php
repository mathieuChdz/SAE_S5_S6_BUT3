<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Learn To Me</title>
    <link href="img/logo_ltm_w_mini.svg" rel="icon">
    <link href="css/css.css" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Krona+One&display=swap" rel="stylesheet">

    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>

    <header>
    </header>
    

    <!-- <div class="container-background">
        <div class="background">
            <div class="circle1"></div>
            <div class="circle2"></div>
        </div>
    </div> -->

    <?php 
        include("imports/navbar.html");
    ?>

    <main>

    <div class="explication-monte-carlo-container">
        <div class="explication-title">
            <h2>Explication de la méthode Monte Carlo :</h2>
        </div>
        <div class="explication-main">
            <div class="main-introduction">
                <p>La méthode de Monte Carlo est une méthode utilisé pour calculer des valeurs approchés. En effet, la méthode ne permettra pas de calculer la valeur exacte
                    d'un résultat, mais elle fournit des estimations basées sur un très grand nombre d'échantillons aléatoires. Ici l'objectif est de calculer la valeur
                    approchée du nombre Pi.
                </p>
            </div>
            <div class="main-graphique">
                <img src="img/monte_carlo.png" alt="Graphique du principe de Monte Carlo">
                <p>Schéma : Représentation graphique d'un lancé aléatoire de N échantillons</p>
            </div>
        </div>
    </div>

    </main>

    <?php 
        include("imports/footer.html");
    ?>

</body>

</html>