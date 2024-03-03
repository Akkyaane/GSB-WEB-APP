<?php

displayAlerts();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>GSB - Créer un utilisateur</title>
  <link rel="stylesheet" href="../../../assets/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
  <script defer src="../../../assets/script.js"></script>
</head>

<body>
  <header class="d-flex flex-column
    justify-content-center align-items-center">
    <img class="img-fluid" style="width: 150px;" src="../../../assets/content/logo.png" alt="logo">
    <nav class="navbar">
      <ul class="nav fw-medium border-bottom border-1">
        <li class="nav-item px-1"><a class="nav-link text-black c-nav-link" href="../../../controllers/portals/administrator.php?manageAccount">Mon compte</a></li>
        <li class="nav-item px-1"><a class="nav-link text-black c-nav-link" href="../../../controllers/portals/administrator.php?logout">Déconnexion</a></li>
      </ul>
    </nav>
  </header>

  <main>
    <div class="container p-2">
      <h2 class="mb-3 fs-4 fw-bold">Créer un utilisateur</h2>
      <div class="container p-0">
        <form action="../../../controllers/functionalities/user/CreateUser.php" method="post">
          <div class="my-3">
            <input type="text" class="form-control input" name="first_name" id="first_name" placeholder="Prénom" required />
          </div>
          <div class="my-3">
            <input type="text" class="form-control input" name="last_name" id="last_name" placeholder="Nom" required />
          </div>
          <div class="my-3">
            <input type="email" class="form-control input" name="email" id="email" placeholder="E-mail" required />
          </div>
          <div class="my-3">
            <input type="password" class="form-control input" name="password" id="password" placeholder="Mot de passe" required />
          </div>
          <div class="my-3">
            <input type="password" class="form-control input" name="password_match" id="password_match" placeholder="Vérification du mot de passe" required />
          </div>
          <div class="my-3">
            <select class="form-select input" name="role" id="role" onchange="showDiv(this)" required>
              <option selected hidden>Sélectionnez la fonction</option>
              <option value="1">Administrateur</option>
              <option value="2">Comptable</option>
              <option value="3">Visiteur médical</option>
            </select>
          </div>
          <div class="my-3" id="horsepower">
            <input type="number" class="form-control input" name="horsepower" placeholder="Nombre de chevaux" />
          </div>
          <div class="my-3">
            <button type="submit" class="btn btn-primary c-link" name="submit" id="submit">Soumettre</button>
            <a class="btn btn-primary c-link" href="../../../controllers/portals/administrator.php">Retour</a>
          </div>
        </form>
      </div>
    </div>
  </main>

  <script>
    function showDiv(category) {
      let value = category.value;
      let horsepower = document.getElementById("horsepower");

      horsepower.style.display = "none";

      if (value != "3") {
        horsepower.style.display = "none";
      } else {
        horsepower.style.display = "block";
      }
    }
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
  </script>
</body>

</html>