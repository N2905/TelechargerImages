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
// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les valeurs du formulaire
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Vérifier les informations de connexion (à des fins de démonstration, utilisez des méthodes de hachage sécurisées dans un environnement réel)
    $valid_username = "utilisateur"; // Remplacez ceci par le nom d'utilisateur réel
    $valid_password = "motdepasse"; // Remplacez ceci par le mot de passe réel

    // Vérifier les informations d'identification
    if ($username === $valid_username && $password === $valid_password) {
        echo "<p>Connexion réussie !</p>";
    } else {
        echo "<p>Identifiants incorrects. Veuillez réessayer.</p>";
    }
}
?>

<!-- Formulaire de connexion -->
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
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