<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>LTM | Connexion</title>
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
                <div class="main-form-container">
                    <form action="process_forms/process_connexion.php" method="post">
                        <div class="main-form">
                            <div class="form-container-title">
                                <h2>Connexion</h2>
                            </div>
                            <?php 
                            //On verifie si lors du chargment de la page, une erreur à été envoyé.
                            if(isset($_GET['err'])){
                                //Si oui on cherche à quelle erreur elle correspond pour l'afficher.
                                switch($_GET['err']){

                                    case "u_ou_mdp_faux" :
                                    echo "<p class='err'>Erreur : Utilisateur ou mot de passe erroné.</p>";
                                    break;

                                    case "mdp_vide" :
                                    echo "<p class='err'>Erreur : Mot de passe vide.</p>";
                                    break;

                                    case "login_vide" :
                                    echo "<p class='err'>Erreur : Identifiant vide.</p>";
                                    break;
                                }
                            } ?>
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
                                        <a href="inscription.php">Cliquez Ici !</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </main>

        <?php 
            include("imports/footer.html");
        ?>

    </body>
</html>