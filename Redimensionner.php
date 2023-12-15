<?php
function redimensionnerImage($imagePath, $newWidth, $newHeight, $outputPath) {
    // Obtenez les dimensions de l'image d'origine
    list($width, $height) = getimagesize($imagePath);

    // Créez une nouvelle image avec les dimensions souhaitées
    $image_p = imagecreatetruecolor($newWidth, $newHeight);

    // Chargez l'image d'origine
    $image = imagecreatefromjpeg($imagePath);

    // Redimensionnez l'image d'origine vers la nouvelle image
    imagecopyresampled($image_p, $image, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

    // Enregistrez l'image redimensionnée
    imagejpeg($image_p, $outputPath);

    // Libérez la mémoire en détruisant les ressources d'image
    imagedestroy($image_p);
    imagedestroy($image);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Paramètres pour le redimensionnement
    $new_width = $_POST["new_width"];
    $new_height = $_POST["new_height"];

    // Dossier de destination
    $destination_folder = $_POST["destination_folder"];

    // Assurez-vous que le répertoire de destination existe, sinon créez-le
    if (!file_exists($destination_folder)) {
        mkdir($destination_folder, 0777, true);
    }

    // Vérifier si des fichiers ont été correctement téléchargés
    if (!empty($_FILES["images"]["name"][0])) {
        $files = $_FILES["images"];

        foreach ($files["tmp_name"] as $key => $file_temp) {
            $file_name = $files["name"][$key];
            $outputPath = $destination_folder . '/' . $file_name;

            // Redimensionner chaque image
            redimensionnerImage($file_temp, $new_width, $new_height, $outputPath);
        }
        
        echo "L'image ont été redimensionnées avec succès.";
    } else {
        echo "Aucun fichier sélectionné.";
    }
}
?>
