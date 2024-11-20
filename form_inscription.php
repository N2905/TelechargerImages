<?php
	require_once 'config.php';
	if (isset($_POST['ajax']) && $_POST['ajax'] == 'adduser') {
		$nom = $_POST['nom'];
		$prenom = $_POST['prenom'];
		$surnom = $_POST['surnom'];
		$mail = $_POST['mail'];
		$mdp = $_POST['mdp'];

		$requete = "INSERT INTO `users` (`username`, `nom`, `prenom`, `email`, `password`) VALUES ('$surnom', '$nom', '$prenom', '$mail', '$mdp')";
		$res = $pdo->query($requete);

		return;	
	}
?>