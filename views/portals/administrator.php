<?php

displayAlerts();
$_SESSION["message"] = NULL;

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>GSB - Portail Administrateur</title>
  <link rel="stylesheet" href="../../assets/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
  <script defer src="../../assets/script.js"></script>
</head>

<body>
  <header class="d-flex flex-column
  justify-content-center align-items-center">
    <img class="img-fluid" style="width: 150px;" src="../../assets/content/logo.png" alt="logo">
    <nav class="navbar">
      <ul class="nav fw-medium border-bottom border-1">
        <li class="nav-item px-1"><a class="nav-link text-black c-nav-link" href="../../controllers/portals/administrator.php?manageAccount">Mon compte</a></li>
        <li class="nav-item px-1"><a class="nav-link text-black c-nav-link" href="../../controllers/portals/administrator.php?logout">Déconnexion</a></li>
      </ul>
    </nav>
  </header>

  <main>
    <div class="container p-2">
      <h2 class="mb-3 fs-4 fw-bold">Récapitulatif des utilisateurs enregistrés</h2>
      <div class="container mb-3 p-0 overflow-auto" style="max-height: 40vh;">
        <table class="table">
          <thead>
            <tr>
              <th>Nom</th>
              <th>Prénom</th>
              <th>Email</th>
              <th>Rôle</th>
              <th>Statut</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <?php
            foreach ($data as $row) {
              echo "<tr>
                      <td>" . $row["last_name"] . "</td>
                      <td>" . $row["first_name"] . "</td>
                      <td>" . $row["email"] . "</td>";

              if ($row["role_id"] == "1") {
                echo "<td>Administrateur</td>";
              } else if ($row["role_id"] == "2") {
                echo "<td>Comptable</td>";
              } else {
                echo "<td>Visiteur</td>";
              }

              if ($row["status"] == "1") {
                echo "<td>Activé</td>";
              } else {
                echo "<td>Désactivé</td>";
              }

              echo "<td>
                      <a class='btn btn-primary c-link' href='../../controllers/portals/administrator.php?manageUser&id=" . $row["user_id"] . "'>Gérer</a>
                      </td>";
            }

            if (!$data) {
              echo "
            <td>Aucun résulat</td></tr>";
            }
            ?>
          </tbody>
        </table>
      </div>
      <a class="btn btn-primary c-link" href="../../controllers/portals/administrator.php?createUser">Créer
        un utilisateur</a>
      <a class="btn btn-primary c-link" href="../../controllers/portals/administrator.php?manageKilometerCosts">Gérer
        les frais kilométriques</a>
    </div>
    <div class="container d-flex p-4">
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 justify-content-center align-items-center w-100">
        <div class="col m-2" style="max-width: 800px;">
          <canvas id="administrator-chart-1"></canvas>
        </div>
        <div class="col mx-2" style="max-width: 400px;">
          <canvas id="administrator-chart-2"></canvas>
        </div>
      </div>
    </div>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
    const ctx_1 = document.getElementById("administrator-chart-1");
    const ctx_2 = document.getElementById("administrator-chart-2");

    new Chart(ctx_1, {
      type: "bar",
      data: {
        labels: ["Administrateurs", "Comptables", "Visiteurs"],
        datasets: [{
          label: "Total utilisateurs par rôle",
          data: [<?php echo $administrators ?>, <?php echo $accountants ?>,
            <?php echo $visitors ?>
          ],
          backgroundColor: [
            "rgba(54, 162, 235, 0.5)",
            "rgba(255, 159, 64, 0.5)",
            "rgba(255, 99, 132, 0.5)",
          ],
          borderColor: [
            "rgb(54, 162, 235)",
            "rgb(255, 159, 64)",
            "rgb(255, 99, 132)",
          ],
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });

    new Chart(ctx_2, {
      type: "pie",
      data: {
        labels: ["Total comptes activés", "Total comptes désactivés"],
        datasets: [{
          data: [<?php echo $activated_accounts ?>, <?php echo $deactivated_accounts ?>],
          backgroundColor: [
            "rgba(54, 162, 235, 0.25)",
            "rgba(54, 162, 235, 0.5)",
          ],
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
  </script>
</body>

</html>