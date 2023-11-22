<!DOCTYPE html>
<html lang="fr">
    <meta charset="utf-8">
    <title>Learn To Me</title>
    <link href="img/logo_ltm_w_mini.svg" rel="icon">
    <link href="css/charte_index.css" rel="stylesheet">
    <link href="css/connexion.css" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Krona+One&display=swap" rel="stylesheet">

    <meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body>
    <header>
    </header>

    <div class="container-background">
        <div class="background">
            <div class="circle1"></div>
            <div class="circle2"></div>
        </div>
    </div>

    <?php 
    include("imports/navbar.html");
    ?>

    <main>
        <div class="main-form-container">
            <form action="?" method="post">
                <div class="main-form">
                    <div class="form-container-title">
                        <h2>Connexion</h2>
                    </div>
                    <div class="form-inputs">
                        <div class="form-email">
                            <label for="email">Email</label>
                            <input type="text" name="email" id="email" placeholder="email">
                        </div>
                        <div class="form-password">
                            <label for="password">Mot de passe</label>
                            <input type="password" name="password" id="password" placeholder="mot de passe">
                        </div>
                        <div class="form-submit">
                            <input type="submit" name="envoyer" id="envoyer" value="Se connecter">
                            <div class="form-inscription">
                                <p>Vous n’avez pas de compte ?</p>
                                <a href="#">Cliquez Ici !</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </main>

    <?php 
        include("imports/footer.html");
    ?>

</body>
</html>