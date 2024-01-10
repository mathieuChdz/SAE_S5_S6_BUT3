<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>LTM | chiffrement</title>
        <link href="img/logo_ltm_w_mini.svg" rel="icon">

        <?php 
        include("imports/header.html");
        ?>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
        
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
                <div class="chiffrement-container">
                    <div class="chiffrement-main-explication">
                        <div class="main-explication-titre">
                            <h2>Les chiffrement RC4</h2>
                        </div>

                        <div class="chiffrement-explication-main">
                            <p>Le module de chiffrement permet de chiffrer et déchiffrer des mots entrés par un utilisateur en utilisant le chiffrement RC4.
                                 Pour ce faire, le module fonctionne notamment grâce à deux fonctions python principales qui suivent les principes du chiffrement RC4, une fonction qui sert à chiffrer un mot
                                 entré et une autre qui sert à déchiffrer un mot entré.
                            </p>
                            <p>Le module de chiffrement a été développé en python</p>
                        </div>    
                    </div>

                    <div class="chiffrement-main-simulation">
                        <div class="main-simulation-titre">
                            <h2>Chiffrement d'un message</h2>
                        </div>
                        <div class="simulation-form-container">
                                <form action="php/traitement_chiffrement.php" method="post">
                                    <div class="main-form">
                                        <div class="form-container-title">
                                            <h2>Paramètres</h2>
                                        </div>
                                        <div class="form-inputs">
                                            <div class="form-key">
                                                <label for="key">Clé</label>
                                                <input type="text" name="key" id="key" placeholder="nombre" required>
                                            </div>
                                            <div class="form-word">
                                                <label for="word">Message</label>
                                                <input type="text" name="word" id="word" placeholder="nombre" required>
                                            </div>
                                            <div class="form-submits">
                                                <div class="submit-chiffrer">
                                                    <input type="submit" name="chiffrer" id="envoyer" value="Chiffrer">
                                                </div>
                                                <div class="submit-dechiffrer">
                                                    <input type="submit" name="dechiffrer" id="envoyer" value="Déchiffrer">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="simulation-chiffrement-res-container">
                                            <div class="simulation-chiffrement-res-main">
                                                <?php
                                                if (isset($_GET["res"])){
                                                    echo "<hr></hr>";
                                                    echo "<h2>Résultat</h2>";
                                                    echo "<div class='res-p-span'>";
                                                    echo "<p id='res-copy'>".$_GET["res"]."</p> <span class='material-symbols-outlined' data-target='#res-copy'>content_copy</span>";
                                                    echo "</div>";
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                    </div>
                </div>
            </div>

        </main>

        <?php 
            include("imports/footer.html");
        ?>

        <?php
        if (isset($_GET["res"])){
        ?>
        <script>
            /**Copier un message dans le presse-papier */
            var btncopy = document.querySelector('.material-symbols-outlined');
            if(btncopy) {
                btncopy.addEventListener('click', docopy);
            }

            function docopy() {

                // Cible de l'élément qui doit être copié
                var target = this.dataset.target;
                var fromElement = document.querySelector(target);
                if(!fromElement) return;

                // Sélection des caractères concernés
                var range = document.createRange();
                var selection = window.getSelection();
                range.selectNode(fromElement);
                selection.removeAllRanges();
                selection.addRange(range);

                try {
                    // Exécution de la commande de copie
                    var result = document.execCommand('copy');
                    if (result) {
                        setTimeout(() => {
                            btncopy.style.opacity = "0.5";
                            btncopy.style.transition = "opacity 0.1s";
                        }, 100);
                    }
                }
                catch(err) {
                    // Une erreur est surevnue lors de la tentative de copie
                    alert(err);
                }

                // Fin de l'opération
                selection = window.getSelection();
                if (typeof selection.removeRange === 'function') {
                    selection.removeRange(range);
                } else if (typeof selection.removeAllRanges === 'function') {
                    selection.removeAllRanges();
                }
            }
        </script>
        <?php
        }
        ?>


    </body>

</html>