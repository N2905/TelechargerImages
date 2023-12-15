<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérez les données du formulaire (destination, taille de lot, délai, etc.).
    // Commencez le téléchargement du premier lot.

    $_SESSION['download_state'] = [
        'destination' => $_POST['destination'],
        'batch_size' => $_POST['batchSize'],
        'delay' => $_POST['delay'],
        'csv_file' => $_FILES['csvFile']['tmp_name'],
        'current_index' => 2, // Indice pour suivre la progression.
    ];
    // Commencez le téléchargement du premier lot ici.
}

if (isset($_GET['continue_download'])) {
    // Résumez le téléchargement à partir de l'endroit où il s'était arrêté.
    $download_state = $_SESSION['download_state'];

    // Reprenez le téléchargement depuis $download_state['current_index'].
    $current_index = $download_state['current_index'];
    $batch_size = $download_state['batch_size'];
    
    $csv_lines = file($download_state['csv_file']);
    
    for ($i = $current_index; $i < min($current_index + $batch_size, count($csv_lines)); $i++) {
        $line = $csv_lines[$i];
        // Traitez et téléchargez l'image depuis $line.
        // Mettez à jour $download_state['current_index'] pour le prochain lot.
    }

    // Mettez à jour $download_state['current_index'] pour le prochain lot.
    $_SESSION['download_state'] = $download_state;

    // Indiquez au client que la première partie a été téléchargée.
    echo "La première partie a été téléchargée avec succès.";
}

// Affichez le message indiquant que la première partie a été téléchargée
// et invitez l'utilisateur à actualiser pour continuer.
// Incluez un lien vers cette même page avec ?continue_download=1 pour déclencher la reprise.

session_write_close();
?>