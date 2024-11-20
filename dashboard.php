<?php
// Commencer la session
session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION["users_id"])) {
    header("Location: Login.php");
    exit();
}

// Le reste de votre code pour la page sécurisée va ici

// Vous pouvez également afficher les informations de l'utilisateur, par exemple :
echo "Bienvenue, Utilisateur ID: " . $_SESSION["users_id"];
?>
