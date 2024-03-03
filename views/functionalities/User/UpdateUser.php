<?php

displayAlerts();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>GSB - Modifier un utilisateur</title>
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
      <h2 class="mb-3 fs-4 fw-bold">Modifier l'utilisateur n°
        <?php echo $_GET["id"] ?>
      </h2>
      <div class="container p-0">
        <form action="../../../controllers/functionalities/user/UpdateUser.php?updateid=<?php echo $_GET["id"] ?>" method="post">
          <table class="table">
            <thead>
              <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>E-mail</th>
                <th>Rôle</th>
                <th>Chevaux</th>
              </tr>
            </thead>
            <tbody>
              <?php
              echo "<tr>
                      <td>
                        <input type='text' class='form-control input' name='last_name' id='last_name' value='" . $data["last_name"] . "' required>
                      </td>
                      <td>
                        <input type='text' class='form-control input' name='first_name' id='first_name' value='" . $data["first_name"] . "' required>
                        </td>
                      <td>
                        <input type='text' class='form-control input' name='email' id='email' value='" . $data["email"] . "' required>
                      </td>
                      <td>
                        <select class='form-select input' name='role' id='role' required>
                        <option selected hidden>Sélectionnez une fonction</option>
                        <option value='1' " . (($data["role_id"] == "1") ? "selected" : "") . ">Administrateur</option>
                        <option value='2' " . (($data["role_id"] == "2") ? "selected" : "") . ">Comptable</option>
                        <option value='3' " . (($data["role_id"] == "3") ? "selected" : "") . ">Visiteur médical</option>
                        </select>
                      </td>
                      <td>
                        <input type='number' class='form-control input' name='horsepower' id='horsepower' value='" . $data["kilometer_costs_id"] . "'>
                      </td></tr>";
              ?>
            </tbody>
          </table>
          <button type="submit" class="btn btn-primary c-link" name="submit" id="submit">Soumettre</button>
          <a class="btn btn-primary c-link" href="../../../controllers/portals/administrator.php?manageUser&id=<?php echo $data["user_id"] ?>">Retour</a>
        </form>
      </div>
    </div>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
  </script>
</body>

</html>