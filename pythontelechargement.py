import os
import pandas as pd
import requests
from io import BytesIO
from PIL import Image

# Obtenez le répertoire du script
script_directory = os.path.dirname(os.path.abspath(__file__))

# Imprimez le répertoire
print(f"Le script est dans le répertoire : {script_directory}")

# Continuez avec le reste de votre script...


def download_images_from_csv(csv_file_path, output_folder):
    # Charger le fichier CSV
    try:
        df = pd.read_csv(csv_file_path, encoding='latin-1')
    except FileNotFoundError:
        print(f"Le fichier {csv_file_path} n'a pas été trouvé.")
        return
    except pd.errors.EmptyDataError:
        print(f"Le fichier {csv_file_path} est vide.")
        return

    # Assurez-vous que le dossier de sortie existe
    if not os.path.exists(output_folder):
        os.makedirs(output_folder)

    # Parcourir chaque ligne du dataframe
    for index, row in df.iterrows():
        # Récupérer le lien de l'image depuis la colonne correspondante dans le CSV
        image_url = row['URL']

        try:
            # Vérifier l'extension du fichier
            if image_url.lower().endswith(('.png', '.jpg', '.jpeg', '.gif')):
                # Télécharger l'image
                response = requests.get(image_url)
                img = Image.open(BytesIO(response.content))

                # Utiliser la valeur de la colonne 'REFCIAL' comme nom de fichier unique
                unique_name = f"image_{row['REFCIAL']}.jpg"
                
                # Sauvegarder l'image dans le dossier de sortie avec le nom unique
                image_path = os.path.join(output_folder, unique_name)
                img.save(image_path)
                
                print(f"Image {index} téléchargée avec succès.")
            else:
                print(f"Ignorée : Lien PDF trouvé dans la ligne {index}.")
        except Exception as e:
            print(f"Erreur lors du téléchargement de l'image {index}: {str(e)}")

# Exemple d'utilisation
csv_file_path = "TESTE.csv"
output_folder = "./images/"
download_images_from_csv(csv_file_path, output_folder)
