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
        				<input type="submit" value="Enregistrer" class="btn">
        				<button class="cancel btn">
        					<a href="/index.php">Annuler</a>
        				</button>
        			</div>
        		</div>
        	</div>
    	</form>
    	<form method="post" action="" id="FormEdition" style="display:none;" >
         <input type="hidden" name="iduser-a-editer" id="iduser-a-editer" value="">
    		<div class="container-bloc">
    			<div class="inscrip">
    				<div class="content d-x-flex">
    					<label class="col-sm-1 col-form-label">Nom</label>
    					<div class="col">	 
    						<input type="text" name="nom" id="form_nom">
    					</div>
    				</div>
        			<div class="content">
        				<label class="col-sm-1 col-form-label">Prénom</label>
        				<div class="col"> 
        					<input type="text" name="prenom" id="form_prenom">
        				</div>
        			</div>
        			<div class="content">
        				<label class="col-sm-1 col-form-label">Username</label>
        				<div class="col">
        					<input type="text" name="username" id="form_username">
        				</div> 
        			</div>
        			<div class="content">
        				<label class="col-sm-1 col-form-label">E-mail</label>
        				<div class="col">
        					<input type="email" name="email" id="form_email">
        				</div>
        			</div>
        			<div class="content-btn">
        				<input type="submit" value="Modifier" class="btn">
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

      $(document).ready(function(){

         function VoirBloc( activeBlockIdForm, blockIdActive ){

            $(".bloc-add, .bloc-modif, .bloc-liste").removeClass("active-btn");

            $(blockIdActive).addClass("active-btn");

            $("#FormInscription, #FormEdition, .listeUser").hide().removeClass("active-block");

            $(activeBlockIdForm).show().addClass("active-block");


         }

         $("#btnAddUser").click(function (event) {
            event.preventDefault();
            VoirBloc("#FormInscription", ".bloc-add");
         });

         $("#btnEditUser").click(function (event) {
            event.preventDefault();
            VoirBloc("#FormEdition", ".bloc-modif");
         });

         $("#btnListeUser").click(function (event) {
            event.preventDefault();
            VoirBloc(".listeUser", ".bloc-liste");
         });

         $("#btn-edit-user").click(function(event){
            event.preventDefault();
            VoirBloc("#FormEdition", ".bloc-modif");
         });

         VoirBloc(".listeUser", ".bloc-liste");

      });

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
        		success: function(responseText) {
        			if (!responseText == '1') {
        				alert('Utilisateur ajouté avec succès!');
        				location.reload();
        			}		
        		},
        		error: function(error) {
            		console.error('Erreur:', error);
        		}
    		});
		}

		function deleteUser(idUser) {
    		confirm('Voulez-vous supprimer cette utilisateur');
    		$.ajax({
        		url: '/form_inscription.php',
        		type: 'POST',
        		data: `ajax=deleteuser&idUser=${idUser}`,
        		success: function() {
            		document.querySelector(`#id_user_${idUser}`).closest('tr').remove();
            		location.reload();
        		},
        		error: function(error) {
            		console.error("Erreur lors de la suppression :", error);
        		}
    		});
		}

      function updateUserForm(idUser) {

         let updateButton = event.target;
         let row = updateButton.closest('tr');
         let cells = row.getElementsByTagName('td');
         let td = event.target.closest('td');
         let idValue = td.getAttribute('value');

         let username = cells[0].textContent.trim();
         let nom = cells[1].textContent.trim();
         let prenom = cells[2].textContent.trim();
         let email = cells[3].textContent.trim();
          

         document.getElementById("form_nom").value = nom;
         document.getElementById("form_prenom").value = prenom;
         document.getElementById("form_username").value = username;
         document.getElementById("form_email").value = email;
         document.getElementById('iduser-a-editer').value = idValue;
         


         $.ajax({
            url: '/form_inscription.php',
            type: 'POST',
            data: `ajax=updateUserForm&idUser=${idUser}&userName=${username}&Nom=${nom}&Prenom=${prenom}&Email=${email}`,
            success: function() {
               document.querySelector(`#id_user_${idUser}`).closest('tr').remove();
               location.reload();
            },
            error: function(error) {
               console.error("Erreur :", error);
            }

         });
      }

      function btnUpdateUser(){

         let nom = document.querySelector('input[name="nom"]').value;
         let prenom = document.querySelector('input[name="prenom"]').value;
         let username = document.querySelector('input[name=""]').value;
         let email = document.querySelector('input[name=""]').value;
         let idUser = document.querySelector('input[type="hidden"][name="iduser-a-editer"]').value;

         $.ajax({
            url: '/form_inscription.php',
            type: 'POST',
            data: `ajax=updateUser&idUser=${idUser}&Nom=${nom}&Prenom=${prenom}&Username=${username}&Email=${email}`,
            success: function(responseText) {
               if (responseText = "1") {
                  location.reload();
               }  
            },
            error: function(error) {
               console.error("Erreur lors de modification :", error);
            }
         });
      }

   </script>
</body>
</html>