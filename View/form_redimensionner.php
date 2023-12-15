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
    <style type="text/css">
    	.titleRedimensionner{
    		padding: 10px 0 0 0;
    		color: #198754;
    	}
    	.buttonRedimensionner button {
    		width: 150px;
    		border: 2px solid #198754;
    		border-radius: 12px;
    		height: 2rem;
    		background-color: white;
    		font-weight: bold;
    	}
    	.buttonRedimensionner {
    		display: flex;
    		padding-left: 120px;
    	}
    	#containerredime {
    		width: 600px;
    	}
    	.redimensionner {
    		margin-right: 3px;
    	}
    	.cancel {
    		margin-left: 3px;
    	}
    </style>
</head>
<body>
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
        </div>
    </form>
   	</div>
</body>
</html>