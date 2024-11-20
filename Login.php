<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css">

    <!-- Inclure jQuery (nécessaire pour certaines fonctionnalités Bootstrap) -->
    <script src="vendor/components/jquery/jquery.min.js"></script>

    <!-- Inclure le fichier JavaScript Bootstrap -->
    <script src="vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>
</head>
<body>

<?php
        $serveur = "localhost";
        $utilisateur = "root";
        $mot_de_passe = "riri";
        $nom_base_de_donnees = "telechargementimages";

        $connexion = new mysqli($serveur, $utilisateur, $mot_de_passe, $nom_base_de_donnees);

        // Vérifier la connexion
        if ($connexion->connect_error) {
            die("La connexion à la base de données a échoué : " . $connexion->connect_error);
        }

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les valeurs du formulaire
    $username = $_POST["username"];
    $password = $_POST["password"];

    $req_login = "SELECT * FROM users WHERE username = $username";
    $req_login_resultat = $connexion->query($req_login);

    // Vérifier les informations d'identification

    if ($req_login_resultat && $req_login_resultat->num_rows > 0) {
        $utilisateur = $req_login_resultat->fetch_assoc();

        // Vérifier le mot de passe
        if (password_verify($password, $utilisateur["password"])) {
            echo "<p>Connexion réussie. Bienvenue, {$utilisateur['prenom']}!</p>";

            // Définir la variable de session pour l'utilisateur connecté
            session_start();
            $_SESSION["users"] = $utilisateur["id"];

            // Rediriger vers la page de gestion des sessions (dashboard.php) ou une autre page sécurisée
            header("Location: dashboard.php");
            exit();
        } else {
            echo "<p>Mot de passe incorrect.</p>";
        }
    } else {
        echo "<p>Aucun utilisateur trouvé avec cet username.</p>";
    }
}
?>

<!-- Formulaire de connexion -->
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card bg-dark text-white" style="border-radius: 1rem;">
                <div class="card-body p-5 text-center">

                    <div class="mb-md-5 mt-md-4 pb-5">

                    <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                    <p class="text-white-50 mb-5">Veuillez entrer votre identifiant et votre mot de passe !</p>

                    <div class="form-outline form-white mb-4">
                        <input type="text" id="username" class="form-control form-control-lg" />
                        <label class="form-label" for="username">User name</label>
                    </div>

                    <div class="form-outline form-white mb-4">
                        <input type="password" id="password" class="form-control form-control-lg" />
                        <label class="form-label" for="password">Password</label>
                    </div>

                    <p class="small mb-5 pb-lg-2"><a class="text-white-50" href="#!">Forgot password?</a></p>

                    <button class="btn btn-outline-light btn-lg px-5" type="submit">Login</button>

                    </div>

                    <div>
                    <p class="mb-0">Vous n'avez pas de compte ?<a href="#!" class="text-white-50 fw-bold"> S'inscrire</a>
                    </p>
                    </div>

                </div>
                </div>
            </div>
            </div>
        </div>
    </section>
</form>
</body>
</html>