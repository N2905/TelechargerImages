<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Téléchargement d'images</title>
    <!-- Inclure le fichier CSS Bootstrap -->
    <link rel="stylesheet" href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css">

    <!-- Inclure jQuery (nécessaire pour certaines fonctionnalités Bootstrap) -->
    <script src="vendor/components/jquery/jquery.min.js"></script>

    <!-- Inclure le fichier JavaScript Bootstrap -->
    <script src="vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>

    <style type="text/css">
        .titleDown{
            padding:10px 0 0 0;
            color: #198754;
        }
        .buttonDown button{
            border: 2px solid #198754;
            border-radius: 12px ;
            width: 150px;
            height: 2rem;
            background-color: white;
            font-weight: bold;
        }
        .buttonDown {
            display: flex;
        }
        .down {
            margin-right: 3px;
        }
        .cancel {
            margin-left: 3px;
        }
        #container-down {
            width: 600px;
        }
        .return {
            margin-left: 5px;
        }
    </style>
</head>
<body>
    <div class="container" id="container-down">
        <div class="titleDown">
            <h5>Téléchargement d'images à partir d'un fichier CSV</h5>
        </div>
        <form method="post" action="telecharger.php" enctype="multipart/form-data">
            <div class="row mb-3">
                <label for="destination" class="col-sm-4 col-form-label">Dossier de destination : </label>
                <div class="col-sm-6">
                    <input type="text" name="destination" id="destination" class="form-control form-control-sm" >
                </div>
            </div>
            <div class="row mb-3">
                <label for="batchSize" class="col-sm-4 col-form-label">Taille du lot : </label>
                <div class="col-sm-6">
                    <input type="number" name="batchSize" id="batchSize" class="form-control form-control-sm" >
                </div>
            </div>
            <div class="row mb-3">
                <label for="delay" class="col-sm-4 col-form-label">Délai entre les lots (en secondes) : </label>
                <div class="col-sm-6">
                    <input type="number" name="delay" id="delay" class="form-control form-control-sm" >
                </div>
            </div>
            <div class="row mb-3">
                <label for="linkColumn" class="col-sm-4 col-form-label">Numero du colonne qui a le lien images : </label>
                <div class="col-sm-6">
                    <input type="number" name="linkColumn" id="linkColumn" class="form-control form-control-sm" >
                </div>
            </div>
            <div class="row mb-3">
                <label for="nameColumn" class="col-sm-4 col-form-label">Numero du colonne qui a le nom spécifique : </label>
                <div class="col-sm-6">
                    <input type="number" name="nameColumn" id="nameColumn" class="form-control form-control-sm" >
                </div>
            </div>
            <div class="row mb-3">
                <label for="File" class="col-sm-4 col-form-label">Fichier CSV : </label>
                <div class="col-sm-6">
                    <input type="file" name="csvFile"  accept=".csv" class="form-control form-control-sm" > <!--csvFile-->
                </div>
            </div>
            <div class="buttonDown">
                <button class="down">Télécharger</button>
                <button class="cancel">Annuler</button>
                <button class="return"><a href="/accueil.php">Retour</a></button>
            </div>
        </form>
    </div> 
</body>
</html>
