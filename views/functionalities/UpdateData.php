<?php

displayAlerts();
$_SESSION['message'] = NULL;

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>GSB - Portail Visiteur</title>
  <link rel="stylesheet" href="../../assets/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
  <script defer src="../../assets/script.js"></script>
</head>

<body class="d-flex flex-column
  justify-center align-items-center">
  <header class="d-flex flex-column
  justify-center align-items-center h-auto border-3 border-bottom" style="width: 85%;"">
    <img class=" img-visitor" src="../../assets/content/logo.png" alt="logo">
    <nav class="navbar">
      <ul class="nav">
        <li class="nav-item"><a class="nav-link text-black my-2 a-visitor"
            href="../../controllers/portals/visitor.php?data">Mon
            compte</a></li>
        <li class="nav-item"><a class="nav-link text-black my-2 a-visitor"
            href="../../controllers/portals/visitor.php?settings">Paramètres</a></li>
        <li class="nav-item"><a class="nav-link text-black my-2 a-visitor"
            href="../../controllers/portals/visitor.php?logout">Déconnexion</a></li>
      </ul>
    </nav>
  </header>

  <main class="d-flex justify-center" style="width: 85%;">
    <div class="d-flex flex-column justify-center align-center m-2 w-100">
      <h2 class="text-center my-3 fs-3">Mes informations</h2>
      <table class="table w-auto fs-6">
        <thead>
          <tr>
            <th>Prénom(s)</th>
            <th>Nom(s)</th>
            <th>E-mail</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <?php
          echo '<tr>
                  <td>' . $data['first_name'] . '</td>
                  <td>' . $data['last_name'] . '</td>
                  <td>' . $data['email'] . '</td>';
          echo '
                  <td>
                    <button class="btn btn-sm btn-primary" style="background-color: #00c9ff; border-color: #00c9ff"><a href="../../controllers/portals/visitor.php?readExpenseSheet&readid=" 
                    style="color: white; text-decoration: none">Consulter</a></button>
                    <button class="btn btn-sm btn-primary" style="background-color: #00c9ff; border-color: #00c9ff"><a href="../../controllers/portals/visitor.php?updateExpenseSheet&updateid="  style="color: white; text-decoration: none">Modifier</a></button>
                    <button class="btn btn-sm btn-danger"><a href="../../controllers/portals/visitor.php?deleteExpenseSheet&deleteid=" style="color: white; text-decoration: none">Supprimer</a></button>
                  </td>';
          ?>
        </tbody>
      </table>
    </div>
  </main>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
</body>

</html>