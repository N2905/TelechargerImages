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
	if (isset($_POST['ajax']) && $_POST['ajax'] == 'deleteuser') {
		$iduser = $_POST['idUser'];
		$requete = "DELETE FROM users WHERE id = $iduser";
		$res = $pdo->query($requete);
		return;
	}

	function listeUser(){
		global $pdo;
		$requete = "SELECT id,username, nom, prenom, email from users";
		$res = $pdo->query($requete);
		$result = $res->fetchAll(PDO::FETCH_ASSOC);
		$html = '<table border="1">
                <thead>
                    <tr class="tr_titre">
                        <th>Username</th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>';

    	foreach ($result as $user) {
        	$html .= '<tr class="result_user" id="id_user_'.$user['id'].'">
                    <td>' . htmlspecialchars($user['username']) . '</td>
                    <td>' . htmlspecialchars($user['nom']) . '</td>
                    <td>' . htmlspecialchars($user['prenom']) . '</td>
                    <td>' . htmlspecialchars($user['email']) . '</td>
                    <td>
                    	<a href="#" onclick="deleteUser(' . htmlspecialchars($user['id']) . ');" title="Clique ici pour supprimer">
    						<img src="/images/corbeille.jpg" data-id="' . htmlspecialchars($user['id']) . '">
						</a>
                    </td>
                    <td value= "' . htmlspecialchars($user['id']) . '">
                    	<a href="#" onclick="updateUserForm(' .htmlspecialchars($user['id']) .');" id="btn-edit-user" title="Clique ici pour modifier">
                    		<img src="/images/edit.png">
                    	</a>
                    </td>
                  </tr>';
    	}

    	$html .= '</tbody></table>';

    	return $html;
	}

	if (isset($_POST['ajax']) && $_POST['ajax'] == "updateUser") {
		echo "blio";
	}
?>