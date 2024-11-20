<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Redimensionner Images</title>
	 <!-- Inclure le fichier CSS Bootstrap -->
    <link rel="stylesheet" href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css">

    <!-- Inclure jQuery (nécessaire pour certaines fonctionnalités Bootstrap) -->
    <script src="vendor/components/jquery/jquery.min.js"></script>

    <!-- Inclure le fichier JavaScript Bootstrap -->
    <script src="vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/js/scripts.js"></script>
    <link rel="stylesheet" href="/css/form.css">
</head>
<body>
    <div class="bloc-head">
        <div class="bloc-logo">
            <img src="/images/Picto-Freeze4.png">
        </div>
        <div class="bloc-recherche">
            <input type="text" name="search" placeholder="Rechercher " class="input_cherche">
            <input type="submit" name="" class="sub_button">
        </div>
    </div>
	<div class="container" id="containerredime">
		<div class="titleRedimensionner">
			<h4>Redimensionner Images</h4>
		</div>
		<form action="Redimensionner.php" method="post" enctype="multipart/form-data">
        <div class="mb-3 row">
        	<label for="new_width" class="col-sm-4 col-form-label">Nouvelle largeur :</label>
        	<div class="col-sm-5">
        		<input type="text" name="new_width" id="new_width" class="form-control form-control-sm" required>
        	</div>
        </div>
        <div class="mb-3 row">
        	<label for="new_height" class="col-sm-4 col-form-label">Nouvelle hauteur :</label>
        	<div class="col-sm-5">
        		<input type="text" name="new_height" id="new_height" class="form-control form-control-sm" required>
        	</div>
        </div>
        <div class="mb-3 row">
        	<label for="destination_folder" class="col-sm-4 col-form-label">Dossier de destination :</label>
        	<div class="col-sm-5">
        		<input type="text" name="destination_folder" id="destination_folder" class="form-control form-control-sm" required>
        	</div>
        </div>
        <div class="mb-3 row">
        	<label for="images" class="col-sm-4 col-form-label">Sélectionnez image:</label>
        	<div class="col-sm-5">
        		<input type="file" name="images[]" id="images" accept="image/*" class="form-control form-control-sm" multiple required>
        	</div>
        </div>
        <div class="buttonRedimensionner">
        	<button class="redimensionner">Redimensionner</button>
        	<button class="cancel">Annuler</button>
            <button class="return"><a href="/index.php">Retour</a></button>
        </div>
    </form>
   	</div>
    <div class="bloc-footer">
        <div class="bloc-contact">
            <h5>A propos</h5>
            <p></p>
        </div>
    </div>
</body>
</html>