<?php

displayAlerts();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>GSB - Mon compte</title>
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
        <?php
        if ($_SESSION["role"] == 1) {
          echo "<li class='nav-item px-1'><a class='nav-link text-black c-nav-link'
                  href='../../../controllers/portals/administrator.php?manageAccount'>Mon compte</a></li>
                  <li class='nav-item px-1'><a class='nav-link text-black c-nav-link'
                  href='../../../controllers/portals/administrator.php?logout'>Déconnexion</a></li>";
        } else if ($_SESSION["role"] == 2) {
          echo "<li class='nav-item px-1'><a class='nav-link text-black c-nav-link'
                  href='../../../controllers/portals/accountant.php?manageAccount'>Mon compte</a></li>
                  <li class='nav-item px-1'><a class='nav-link text-black c-nav-link'
                  href='../../../controllers/portals/accountant.php?logout'>Déconnexion</a></li>";
        } else {
          echo "<li class='nav-item px-1'><a class='nav-link text-black c-nav-link'
                  href='../../../controllers/portals/visitor.php?manageAccount'>Mon compte</a></li>
                  <li class='nav-item px-1'><a class='nav-link text-black c-nav-link'
                  href='../../../controllers/portals/visitor.php?logout'>Déconnexion</a></li>";
        }
        ?>
      </ul>
    </nav>
  </header>

  <main>
    <div class="container p-2">
      <h2 class="mb-3 fs-4 fw-bold">Mes informations</h2>
      <div class="container p-0">
        <table class="table">
          <thead>
            <tr>
              <th>Nom</th>
              <th>Prénom</th>
              <th>E-mail</th>
            </tr>
          </thead>
          <tbody>
            <?php
            echo "<tr>
                    <td>" . $data["last_name"] . "</td>
                    <td>" . $data["first_name"] . "</td>
                    <td>" . $data["email"] . "</td></tr>";
            ?>
          </tbody>
        </table>
      </div>
      <div class="d-flex gap-1">
        <div>
          <a class="btn btn-primary c-link" href="../../../controllers/functionalities/account/UpdateAccount.php">Modifier</a>
        </div>
        <div>
          <?php
          if ($_SESSION["role"] == 1) {
            echo "<a class='btn btn-primary c-link' href='../../../controllers/portals/administrator.php'>Retour</a>";
          } else if ($_SESSION['role'] == 2) {
            echo "<a class='btn btn-primary c-link' href='../../../controllers/portals/accountant.php'>Retour</a>";
          } else {
            echo "<a class='btn btn-primary c-link' href='../../../controllers/portals/visitor.php'>Retour</a>";
          }
          ?>
        </div>
      </div>
    </div>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
  </script>
</body>

</html>