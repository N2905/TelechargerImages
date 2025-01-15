<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Inscription</title>
	<link rel="stylesheet" href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
    <script src="vendor/components/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
    <script src="vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="/css/form.css">
    <?php include_once'form_inscription.php';?>
</head>
<body>		
   <?php include_once 'head.html.twig';?>
    	<div class="container-user">
    		<div class="bloc-parametre">
            <div class="bloc-liste bg-color">
               <a href="#" id="btnListeUser">
                  <span>Liste utilisateur</span>
               </a>
            </div>
    			<div class="bloc-add bg-color">
    				<a href="#" id="btnAddUser">
    					<span>Ajouter utilisateur</span>
    				</a>
    			</div>
    			<div class="bloc-modif bg-color">
    				<a href="#" id="btnEditUser">
    					<span>Modification utilisateur</span>
    				</a>
    			</div>
    		</div>
    	</div>
    	<form method="post" action="" id="FormInscription" style="display:none;">
    		<div class="container-bloc">
    			<div class="inscrip">
    				<div class="content d-x-flex">
    					<label class="col-sm-1 col-form-label">Nom</label>
    					<div class="col">	 
    						<input type="text" name="nom">
    					</div>
    				</div>
        			<div class="content">
        				<label class="col-sm-1 col-form-label">Prénom</label>
        				<div class="col"> 
        					<input type="text" name="prenom">
        				</div>
        			</div>
        			<div class="content">
        				<label class="col-sm-1 col-form-label">Username</label>
        				<div class="col">
        					<input type="text" name="username">
        				</div> 
        			</div>
        			<div class="content">
        				<label class="col-sm-1 col-form-label">E-mail</label>
        				<div class="col">
        					<input type="email" name="email">
        				</div>
        			</div>
        			<div class="content">
        				<label class="col-sm-1 col-form-label">Mot de passe</label> 
        				<div class="col">
        					<input type="password" name="password">
        				</div>
        			</div>
        			<div class="content-btn">
        				<input type="button" value="Enregistrer" class="btn" onclick="ajoutUser();return false;">
        				<button class="cancel btn">
        					<a href="/index.php">Annuler</a>
        				</button>
        			</div>
        		</div>
        	</div>
    	</form>

    	<div class="listeUser" style="display: block;">
        	<?php echo listeUser();?>
      </div>
   <?php include_once 'footer.html.twig'; ?>
   <script type="text/javascript">

      

   </script>
</body>
</html>