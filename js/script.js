
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

      function ajoutUser() {
         //event.preventDefault();
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

      function updateUserForm(event, userId) {
         event.preventDefault(); 

         /*let updateButton = event.target;
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
         document.getElementById('iduser-a-editer').value = idValue;*/

             let updateButton = event.target;
    let row = updateButton.closest('tr');
    let cells = row.getElementsByTagName('td');

    let username = cells[0].textContent.trim();
    let nom = cells[1].textContent.trim();
    let prenom = cells[2].textContent.trim();
    let email = cells[3].textContent.trim();

    // Assurez-vous que les champs existent avant de définir leurs valeurs
    let nomField = document.getElementById("form_nom");
    if (nomField) nomField.value = nom;

    let prenomField = document.getElementById("form_prenom");
    if (prenomField) prenomField.value = prenom;

    let usernameField = document.getElementById("form_username");
    if (usernameField) usernameField.value = username;

    let emailField = document.getElementById("form_email");
    if (emailField) emailField.value = email;

    let idField = document.getElementById('iduser-a-editer');
    if (idField) idField.value = userId;
         


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
function retourn(){
   if (confirm("Voulez-vous vraiment annuler ?")) {
      window.history.back();
   }
 }

