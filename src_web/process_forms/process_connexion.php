<?php

    //On demande l'insersion du ficher config de la bse de donnée.
    require_once('../config/config_bdd.php');

    //On vérifie si un formulaire à été envoyé.
    if(isset($_POST['envoyer'])){
        //Si le champ "login" n'est pas vide, on continue.
        if(!empty($_POST['email'])){
            //Si le champ "mdp" n'est pas vide, on continue.
            if(!empty($_POST['password'])){
                //On transforme les caractère en caractères spéciaux.
                $login = htmlspecialchars($_POST['email']);
                $mdp = htmlspecialchars($_POST['password']);
                //On selectionnne le login et le type d'utilisateur si une ligne correspond au "login" entrée et si le mot de passe entrée puis crypté corespond à celui existant pour ce "login".
                //On prépare la requête avec des valeurs indéfinies.
                $verif = "SELECT nom_u FROM users WHERE email_u = ?";
                //On prépare la requete avec des valeurs indéfinie.
                $verifp = mysqli_prepare($connexion,$verif);
                //On définit le type de valeur à entrer et on execute la requete.
                mysqli_stmt_bind_param($verifp,'s', $login);
                //On l'execute.
                mysqli_stmt_execute($verifp);
                // On récupère l'objet renvoyé par la requête préparée
                $result = mysqli_stmt_get_result($verifp);

                //Si la requête n'est pas vide.
                if(mysqli_num_rows($result) != 0){
                    //On selectionnne le login et le type d'utilisateur si une ligne correspond au "login" entrée et si le mot de passe entrée puis crypté corespond à celui existant pour ce "login".
                    //On prépare la requête avec des valeurs indéfinies.
                    $verif2 = "SELECT * FROM users WHERE email_u = ? AND passwd_u = ?";
                    //On prépare la requete avec des valeurs indéfinie.
                    $verifp2 = mysqli_prepare($connexion,$verif2);
                    //On crypte le mot de passe.
                    $mdpfin = md5($mdp);
                    //On définit le type de valeur à entrer et on execute la requete.
                    mysqli_stmt_bind_param($verifp2,'ss', $login, $mdpfin);
                    //On l'execute.
                    mysqli_stmt_execute($verifp2);
                    // On récupère l'objet renvoyé par la requête préparée
                    $result2 = mysqli_stmt_get_result($verifp2);

                    if(mysqli_num_rows($result2) != 0){
                        //On crée une session qui contien son "login" et son type d'utilisateur.
                        session_start();

                        //On récupere les valeurs de la requete.
                        $data2 = $result2->fetch_assoc();

                        $_SESSION["user"] = ["login"=>$data2['nom_u'],"type_user"=>$data2['type_u']];
                        //Si l'utilisateur n'est pas un simple utilisateur.
                        if ($data2['type_u'] != 'user'){
                            //On le redirige vers le panel "admin" et on ferme la page.
                            header('Location: ../admin.php');
                            die();
                        //Si l'utilisateur est un utilisateur simple
                        } else {  
                            //On le redirige vers la page d'acceuil
                            header('Location: ../index.php');
                            die();
                        }
                    }else{
                        //Si le champ "mdp" ne correspond pas au login de la base de donnée, on le redirige vers la page de connection avec une erreur et on ferme la page.
                        header('Location: ../connexion.php?err=u_ou_mdp_faux');
                        die();
                    }
                }else{
                    //Si le champ "login" est introuvable dans la base de donnée, on le redirige vers la page de connection avec une erreur et on ferme la page.
                    header('Location: ../connexion.php?err=u_ou_mdp_faux');
                    die();
            }
            }else{
                //Si le champ "mdp" est vide, on le redirige vers la page de connection avec une erreur et on ferme la page.
                header('Location: ../connexion.php?err=mdp_vide');
                die();
            }
        }else{
            //Si le champ "mdp" est vide, on le redirige vers la page de connection avec une erreur et on ferme la page.
            header('Location: ../connexion.php?err=login_vide');
            die();
        }
    }

?>