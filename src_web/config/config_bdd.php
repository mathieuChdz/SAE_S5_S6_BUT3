<?php 

    //On se connecte à la base de donnée.
    try {
        $connexion=mysqli_connect("localhost","root","");
        $bd=mysqli_select_db($connexion,"sae_s5");
    //Si la connecxion a échoué, on renvoie l'erreur.
    } catch(Exception $e) {
        die('Erreur : '.$e->getMessage());
    }

?>