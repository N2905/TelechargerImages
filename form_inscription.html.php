<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Inscription</title>
	<link rel="stylesheet" href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
    <script src="vendor/components/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="/js/script.js"></script>
    <script src="vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="/css/form.css">
</head>
<body>		
   <?php include_once 'head.html.twig';?>
    <form method="post" action="" >
    	<div class="container">
    		 <h2>Inscription</h2>
    		<div class="inscrip">
    			<div class="content_1 d-x-flex">
    				<label class="col-sm-4 col-form-label">Nom</label>
    				<div class="col">	 
    					<input type="text" name="nom">
    				</div>
    			</div>
        		<div class="content_2">
        			<label class="col-sm-4 col-form-label">Prénom</label>
        			<div class="col"> 
        				<input type="text" name="prenom">
        			</div>
        		</div>
        		<div class="content_3">
        			<label class="col-sm-4 col-form-label">Username</label>
        			<div class="col">
        				<input type="text" name="username">
        			</div> 
        		</div>
        		<div class="content_4">
        			<label class="col-sm-4 col-form-label">E-mail</label>
        			<div class="col">
        				<input type="email" name="email">
        			</div>
        		</div>
        		<div class="content_5">
        			<label class="col-sm-4 col-form-label">Mot de passe</label> 
        			<div class="col">
        				<input type="password" name="password">
        			</div>
        		</div>

        		<div class="content_6">
        			<input type="submit" value="S'inscrire" class="btn" onclick="ajoutUser(event);">
        			<span class="show_user btn">Voir liste user</span>
        			<button class="cancel btn">
        				<a href="/index.php">Annuler</a>
        			</button>
        		</div>
        	</div>
        	<div class="listeUser" style="display: none;">
        		
        	</div>
        </div>
    </form>
    <?php include_once 'footer.html.twig'; ?>
    <script type="text/javascript">
    	function ajoutUser(event) {
    		event.preventDefault();
    		let nom = document.querySelector('input[name="nom"]').value;
    		let prenom = document.querySelector('input[name="prenom"]').value;
    		let surnom = document.querySelector('input[name="username"]').value;
    		let mail = document.querySelector('input[name="email"]').value;
    		let mdp = document.querySelector('input[name="password"]').value;

    		$.ajax({
        		url: '/form_inscription.php',
        		type: 'POST',
        		data: `ajax=adduser&nom=${nom}&prenom=${prenom}&surnom=${surnom}&mail=${mail}&mdp=${mdp}`,
        		success: function (responseText) {
        			if (!responseText == '1') {
        				alert('Utilisateur ajouté avec succès:', responseText);
        				location.reload();
        			}		
        		},
        		error: function (error) {
            		console.error('Erreur:', error);
        		}
    		});
		}

		function listeUser() {
			$.ajax({

			});
		}

    </script>
</body>
</html>