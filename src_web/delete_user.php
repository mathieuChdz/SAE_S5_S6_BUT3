<?php
	//On inclus la barre de navigation.
	require("config/config_bdd.php");

	// Récupération de l'identifiant de l'enregistrement à supprimer
	$id_user = $_POST['id_user_suppr'];
	$login = $_POST['login_suppr'];

	//Requete de suppressions utilisateurs
	$requete1 = mysqli_query($connexion, "DELETE FROM users where id_u = '".$id_user."'");

	//Redirection vers la page d'affichage des enregistrements
	header('Location: admin.php');
	die();
?>