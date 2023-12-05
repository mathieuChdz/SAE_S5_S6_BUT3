<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Learn To Me</title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="img/logo_ltm_w_mini.svg" rel="icon">
        <link href="css/css.css" rel="stylesheet">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Archivo:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Krona+One&display=swap" rel="stylesheet">
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
                <div class="pres-index-container">
                    <h1 class="pres-index-title">Learn To Me !</h1>
                    <h4>Prédire vos calculs simplement, en quelques cliques !</h4>

                    <div class="pres-index-links">
                        <div class="pres-index-discover-link-container">
                            <a class="pres-index-discover-link" href="#">Découvrir comment !</a>
                        </div>

                        <div class="pres-index-about-link-container">
                            <a class="pres-index-about-link" href="#">A propos</a>
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