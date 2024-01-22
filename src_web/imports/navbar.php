<nav>
    <div class="global-navbar-content">
        <div class="global-navbar-logo">
            <a href="index.php"><img src="img/logo_ltm_w.svg" alt="logo LTM white"></a>
        </div>

        <div class="global-navbar">
            <div class="global-navbar-links">

                <?php

                    //On regarde si une cession existe.
                    if(isset($_SESSION)){
                        //Si oui on fais rien.
                    }else{
                        //Si non, on la démarre.
                        session_start(); 
                    }
                    //On attribus les bon boutons au bonnes personnes.
                    if(isset($_SESSION['user'])) {
                        if($_SESSION['user']['type_user'] != 'user'){
                            // Compte admin ou != à user
                            echo"
                            <a class='nav-links' href='index.php'>Accueil</a>
                            <a class='nav-links' href='modules.php'>Modules</a>
                            <a class='nav-links' href='apropos.php'>A propos</a>
                            <a class='global-navbar-links-connexion nav-links' href='404.php'>Mon espace</a>
                            <a class='global-navbar-links-connexion nav-links' href='admin.php'>Admin</a>
                            <a class='global-navbar-links-connexion nav-links' href='deconnexion.php'>Se déconnecter</a>
                            <img class='nav-resp-menu' src='img/menu_resp.png' onclick='toggleMenu()'>
                            ";
                        }else{
                            // Compte utilisateur
                            echo "
                            <a class='nav-links' href='index.php'>Accueil</a>
                            <a class='nav-links' href='modules.php'>Modules</a>
                            <a class='nav-links' href='apropos.php'>A propos</a>
                            <a class='global-navbar-links-connexion nav-links' href='404.php'>Mon espace</a>
                            <a class='global-navbar-links-connexion nav-links' href='deconnexion.php'>Se déconnecter</a>
                            <img class='nav-resp-menu' src='img/menu_resp.png' onclick='toggleMenu()'>
                            ";
                        }
                    }else{
                        // Visiteur sans compte
                        echo "
                        <a class='nav-links' href='index.php'>Accueil</a>
                        <a class='nav-links' href='modules.php'>Modules</a>
                        <a class='nav-links' href='apropos.php'>A propos</a>
                        <a class='global-navbar-links-connexion nav-links' href='connexion.php'>Se connecter</a>
                        <img class='nav-resp-menu' src='img/menu_resp.png' onclick='toggleMenu()'>
                        ";
                    }
                ?>
            </div>

            <div class="responsive-menu display-none">

                <?php

                    //On regarde si une cession existe.
                    if(isset($_SESSION)){
                        //Si oui on fais rien.
                    }else{
                        //Si non, on la démarre.
                        session_start(); 
                    }
                    //On attribus les bon boutons au bonnes personnes.
                    if(isset($_SESSION['user'])) {
                        if($_SESSION['user']['type_user'] != 'user'){
                            echo"
                            <a class='nav-links-responsive' href='index.php'>Accueil</a>
                            <a class='nav-links-responsive' href='modules.php'>Modules</a>
                            <a class='nav-links-responsive' href='apropos.php'>A propos</a>
                            <a class='global-navbar-links-connexion nav-links-responsive' href='admin.php'>Admin</a>
                            <a class='global-navbar-links-connexion nav-links-responsive' href='404.php'>Mon espace</a>
                            <a class='global-navbar-links-connexion nav-links-responsive' href='deconnexion.php'>Se déconnecter</a>
                            ";
                        }else{
                            echo "
                            <a class='nav-links-responsive' href='index.php'>Accueil</a>
                            <a class='nav-links-responsive' href='modules.php'>Modules</a>
                            <a class='nav-links-responsive' href='apropos.php'>A propos</a>
                            <a class='global-navbar-links-connexion nav-links-responsive' href='404.php'>Mon espace</a>
                            <a class='global-navbar-links-connexion nav-links-responsive' href='deconnexion.php'>Se déconnecter</a>
                            ";
                        }
                    }else{
                        echo "
                        <a class='nav-links-responsive' href='index.php'>Accueil</a>
                        <a class='nav-links-responsive' href='modules.php'>Modules</a>
                        <a class='nav-links-responsive' href='apropos.php'>A propos</a>
                        <a class='global-navbar-links-connexion nav-links-responsive' href='connexion.php'>Se connecter</a>
                        ";
                    }
                ?>
            </div>
        </div>

    </div>

    <script type="text/javascript">
        function toggleMenu() {
            var menu = document.querySelector('.responsive-menu');
            menu.classList.toggle('display-none');

            var body = document.body;
            body.classList.toggle('no-scroll');
        }
    </script>
</nav>