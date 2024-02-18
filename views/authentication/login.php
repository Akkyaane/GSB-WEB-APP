<?php

displayAlerts();
$_SESSION['message'] = NULL;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>GSB - Se connecter</title>
    <link rel="stylesheet" href="../../assets/style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <script defer src="../../assets/script.js"></script>
</head>

<body>
    <div class="container--fluid d-flex flex-column align-items-center">
        <img class="img-login" src="../../assets/content/logo.png" alt="logo" />
        <div class="container--fluid d-flex align-items-center justify-content-center">
            <form action="../../controllers/authentication/login.php" method="post">
                <div class="py-2">
                    <p class="h2 d-flex justify-content-center">Bienvenue</p>
                    <p>Veuillez vous connecter pour accéder à votre compte.</p>
                </div>
                <div class="py-2">
                    <input type="email" class="form-control input-login" name="email" id="email" placeholder="E-mail"
                        required />
                </div>
                <div class="py-2">
                    <input type="password" class="form-control input-login" name="password" id="password"
                        placeholder="Mot de passe" required />
                </div>
                <div class="py-2">
                    <a class="link-dark link-offset-2 link-underline-opacity-0 link-underline-opacity-100-hover"
                        href="#">Mot de passe oublié ?</a>
                </div>
                <div class="py-2">
                    <button type="submit" class="btn btn-primary d-grid gap-2 col-12 mx-auto button-login" name="submit"
                        id="submit">
                        Se connecter
                    </button>
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>