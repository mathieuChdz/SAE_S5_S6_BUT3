<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>LTM | Inscription</title>
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
                    <form action='process_forms/process_inscription.php' method='post'>
                        <div class="main-form">
                            <div class="form-container-title">
                                <h2>Inscription</h2>
                            </div>
                            <?php
                            //On verifie si une erreur à été envoyé.
                            if(isset($_GET['err'])){
                                //On cherche à quoi elle correspond et on l'affiche.
                                switch($_GET['err']){
                                    case "mdp_non_identique" :
                                    echo "<p class='err'>Erreur : Mots de passe non identique.</p>";
                                    break;

                                    case "confirmation_vide" :
                                    echo "<p class='err>Erreur : La confirmation est vide.</p>";
                                    break;

                                    case "mdp_vide" :
                                    echo "<p class='err'>Erreur : Le mot de passe est vide.</p>";
                                    break;

                                    case "login_vide" :
                                    echo "<p class='err'>Erreur : Le login est vide.</p>";
                                    break;

                                     case "email_vide" :
                                    echo "<p class='err'>Erreur : L'e-mail est vide.</p>";
                                    break;

                                    case "captcha_vide" :
                                    echo "<p class='err'>Erreur : Le Captcha est vide.</p>";
                                    break;

                                    case "captcha_erroné" :
                                    echo "<p class='err'>Erreur : Le captcha est erroné.</p>";
                                    break;

                                    case "exist" :
                                    echo "<p class='err'>Erreur : Nom d'utilisateur déjà éxistant.</p>";
                                    break;

                                    case "bad_format" :
                                    echo "<p class='err'>Erreur : Le Login doit être compris entre 3 à 32 caractères </p>";
                                    break;
                                }
                            } ?>
                            <div class="form-inputs">
                                <div class="form-email">
                                    <label for="email">Nom</label>
                                    <input type="text" name="nom" id="nom" placeholder="Nom" required>
                                </div>

                                <div class="form-email">
                                    <label for="email">Email</label>
                                    <input type="text" name="email" id="email" placeholder="E-Mail" required>
                                </div>

                                <div class="form-password">
                                    <label for="password">Mot de passe</label>
                                    <input type="password" name="password" id="password" placeholder="Mot de passe" required>
                                </div>

                                <div class="form-password">
                                    <label for="password">Confirmez le mot de passe</label>
                                    <input type="password" name="mdp_retype" id="mdp_retype" placeholder="Mot de passe" required>
                                </div>

                                <div class="form-submit">
                                    <input type="submit" name="envoyer" id="envoyer" value="Se connecter">
                                    <div class="form-inscription">
                                        <p>Vous avez déjà un compte ?</p>
                                        <a href="connexion.php">Cliquez Ici !</a>
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