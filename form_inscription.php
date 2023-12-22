<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Inscription</title>
	<link rel="stylesheet" href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css">

    <!-- Inclure jQuery (nécessaire pour certaines fonctionnalités Bootstrap) -->
    <script src="vendor/components/jquery/jquery.min.js"></script>

    <!-- Inclure le fichier JavaScript Bootstrap -->
    <script src="vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>
</head>
<body>
	<?php
		// Remplacez ces informations par vos propres paramètres de base de données
		$serveur = "localhost";
		$utilisateur = "root";
		$mot_de_passe = "";
		$nom_base_de_donnees = "telechargementimages";

		// Créer une connexion à la base de données
		$connexion = new mysqli($serveur, $utilisateur, $mot_de_passe, $nom_base_de_donnees);

		// Vérifier la connexion
		if ($connexion->connect_error) {
	    	die("La connexion à la base de données a échoué : " . $connexion->connect_error);
		}

		// Vérifier si le formulaire a été soumis
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
    		// Récupérer les données du formulaire
    		$nom = $_POST["nom"];
    		$prenom = $_POST["prenom"];
    		$username = $_POST["username"];
   	 		$email = $_POST["email"];
    		$password = $_POST["password"];
    		$id_a_supprimer = $_POST["id_a_supprimer"];

    	//masque le mot de passe
    		$password_cache = password_hash($password, PASSWORD_DEFAULT); 

    	//Requete pour supprimer
    		$req_delete= "DELETE FROM users WHERE id = $id_a_supprimer";
    		if ($connexion->query($req_delete) === TRUE) {
    			echo "<p>Enregistrement supprimé avec succèes.</p>";
    		}else{
    			echo "Erreur lors de la suppression de l'enregistrement : " .$connexion->error;
    		}
    	
    	// Insérer les données dans la base de données
    	$requete = "INSERT INTO users (nom, prenom, username, email, password) VALUES ('$nom', '$prenom','$username', '$email', '$password_cache')";
    	$requete_select ="SELECT * FROM users";
    	$resultat = $connexion->query($requete_select);

    	if ($resultat) {
        	echo "<h4>Informations d'inscription:</h4>";
        	echo "<table border='1' class='table'";
        	echo "<tr><th scope='col'>Nom</th><th scope='col'>Prénom</th><th scope='col'>Username</th><th scope='col'>Email</th><th>Action</th></tr>";
        	//Parcourir les resultats de la requête
        	while ($row = $resultat->fetch_assoc()) {
        	echo "<tr>";
        	echo "<td>{$row['nom']}</td>";
        	echo "<td>{$row['prenom']}</td>";
        	echo "<td>{$row['username']}</td>";
        	echo "<td>{$row['email']}</td>";
        	echo "<td>
        			<form method='post' action='" .htmlspecialchars($_SERVER["PHP_SELF"]) . "'onsubmit='return confirm(\"Voulez-vous vraiment supprimer cet utilisateur?\")'>
        				<input type='hidden' name='id_a_supprimer' value='{$row['id']}'>
        				<input type='submit' value='Supprimer'>
        				</form>
        			</td>";
        	echo "</tr>";
        	}
        	echo "</table>";
    	} else {
        	echo "Erreur lors de l'inscription : " . $connexion->error;
    	}
    	// Fermer la connexion à la base de données
    	$connexion->close();
		} else {
    	// Afficher le formulaire
	?>
   
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    	<div class="container">
    		 <h2>Inscription</h2>
    		<div class="row">
    			<div class="mb-3">
    				<label class="col-sm-4 col-form-label">Nom</label>
    				<div class="col-sm-6">	 
    					<input type="text" name="nom" class="form-control" required>
    				</div>
    			</div>
        		<div class="mb-3">
        			<label class="col-sm-4 col-form-label">Prénom</label>
        			<div class="col-sm-6"> 
        				<input type="text" name="prenom" class="form-control" required>
        			</div>
        		</div>
        		<div class="mb-3">
        			<label class="col-sm-4 col-form-label">Username</label>
        			<div class="col-sm-6">
        				<input type="text" name="username" class="form-control">
        			</div> 
        		</div>
        		<div class="mb-3">
        			<label class="col-sm-4 col-form-label">E-mail</label>
        			<div class="col-sm-6">
        				<input type="email" name="email" class="form-control" required>
        			</div>
        		</div>
        		<div class="mb-3">
        			<label class="col-sm-4 col-form-label">Mot de passe</label> 
        			<div class="col-sm-6">
        				<input type="password" name="password" class="form-control" required>
        			</div>
        		</div>
        		<div class="mb-3">
        			<input type="submit" value="S'inscrire">
        		</div>
        	</div>
        </div>
    </form>
<?php
}
?>

</body>
</html>