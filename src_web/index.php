<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Learn To Me</title>
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
                <div class="pres-index-container">
                    <h1 class="pres-index-title">Learn To Me !</h1>
                    <h4>Prédire vos calculs simplement, en quelques cliques !</h4>

                    <div class="pres-index-links">
                        <div class="pres-index-discover-link-container">
                            <a class="pres-index-discover-link" href="modules.php">Découvrir comment !</a>
                        </div>

                        <div class="pres-index-about-link-container">
                            <a class="pres-index-about-link" href="apropos.php">A propos</a>
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