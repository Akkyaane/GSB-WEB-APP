<?php

displayAlerts();
$_SESSION["message"] = NULL;

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>GSB - Connexion</title>
  <link rel="stylesheet" href="../../assets/style.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
  <script defer src="../../assets/script.js"></script>
</head>

<body class="vw-100 vh-100">
  <div class="container d-flex flex-column justify-content-center align-items-center w-100 h-75">
    <img class="img-fluid" style="width: 200px;" src="../../assets/content/logo.png" alt="logo">
    <div class="container d-flex justify-content-center">
      <form action="../../controllers/authentication/login.php" method="post">
        <div class="d-flex flex-column justify-content-center">
          <h2 class="fs-4">Bienvenue sur l'intranet GSB</h2>
          <p>Veuillez vous connecter pour accéder à votre compte.</p>
        </div>
        <div>
          <input type="email" class="form-control bg-body-tertiary input" name="email" id="email" placeholder="E-mail" required />
        </div>
        <div class="mt-3">
          <input type="password" class="form-control bg-body-tertiary input" name="password" id="password" placeholder="Mot de passe" required />
        </div>
        <div class="mt-3">
          <button type="submit" class="btn btn-primary c-link" name="submit" id="submit">
            Connexion
          </button>
        </div>
      </form>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
  </script>
</body>

</html>