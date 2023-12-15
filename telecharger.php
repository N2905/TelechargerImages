<?php
set_time_limit(60*10);
function telechargerImagesParLotsDepuisFormulaire($csvFilePath, $dossierDestination, $tailleLot, $delaiEntreImages, $ligneDeDepart= 2, $colonneLien = 6, $colonneNom = 1) {
    if (($handle = fopen($csvFilePath, "r")) !== FALSE) {
        $batchCounter = 0;
        $currentLine = 1; // Variable pour suivre le numéro de ligne

        while (($data = fgetcsv($handle, 0, ";")) !== FALSE) {
            if ($currentLine < $ligneDeDepart) {
                $currentLine++;
                continue; // Passe aux lignes suivantes jusqu'à la ligne de départ.
            }
            $lienImage = $data[$colonneLien - 1]; // Assurez-vous d'ajuster l'indice en fonction de votre fichier CSV.
            $nomFichierSpecifie = $data[$colonneNom - 1]; // Assurez-vous d'ajuster l'indice en fonction de votre fichier CSV.

            // Vérifiez si le lien pointe vers un fichier PDF et ignorez-le.
            $extension = pathinfo($lienImage, PATHINFO_EXTENSION);
            if (strtolower($extension) === 'pdf') {
                echo "Lien vers un fichier PDF : $lienImage (ignoré)<br>";
                continue; // Passe à la prochaine ligne du CSV.
            }

            // Utilisez le nom de fichier spécifié s'il existe, sinon utilisez le nom basé sur l'URL.
            $nomFichier = !empty($nomFichierSpecifie) ? $nomFichierSpecifie : basename($lienImage);
            $nomFichierAvecExtension = $nomFichier . '.' . $extension;

            $cheminFichierDestination = $dossierDestination . $nomFichierAvecExtension;
      
            $ch = curl_init($lienImage);
            $fp = fopen($cheminFichierDestination, 'wb');

            if ($ch !== FALSE && $fp !== FALSE) {
                curl_setopt($ch, CURLOPT_FILE, $fp);
                curl_setopt($ch, CURLOPT_HEADER, 0);

                if (curl_exec($ch) === false) {
                    echo "Erreur de téléchargement : " . curl_error($ch) . "<br>";
                } else {
                    echo "Image téléchargée : $nomFichier<br>";
                }

                curl_close($ch);
                fclose($fp);
            } else {
                echo "Échec du téléchargement de l'image : $lienImage<br>";
            }
        
        
            $batchCounter++;

            // Si le nombre d'images dans le lot atteint la taille définie, téléchargez le lot.
            if ($batchCounter >= $tailleLot) {
                echo "Téléchargement du lot de $tailleLot images...<br>";
                // Réinitialisez le compteur de lot.
                $batchCounter = 0;

                // Ajoutez un délai de sommeil entre les lots d'images.
                sleep($delaiEntreImages); // Attendez le délai spécifié en secondes.
            }
        }

        fclose($handle);
    }
}

// Vérifiez si le formulaire a été soumis.
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dossierDestination = $_POST["destination"];
    $tailleLot = intval($_POST["batchSize"]);
    $delaiEntreImages = intval($_POST["delay"]);
    $colonneLien = intval($_POST["linkColumn"]); // Indice 1-based
    $colonneNom = intval($_POST["nameColumn"]); // Indice 1-based

    if (isset($_FILES["csvFile"]) && $_FILES["csvFile"]["error"] == 0) {
        $csvFilePath = $_FILES["csvFile"]["tmp_name"];
        telechargerImagesParLotsDepuisFormulaire($csvFilePath, $dossierDestination, $tailleLot, $delaiEntreImages,2, $colonneLien, $colonneNom);
    } else {
        echo "Erreur lors du téléchargement du fichier CSV.";
    }
}
?>
