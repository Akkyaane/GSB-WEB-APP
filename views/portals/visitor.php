<?php

displayAlerts();
$_SESSION["message"] = NULL;

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

<body>
  <header class="d-flex flex-column
  justify-center align-items-center">
    <img class="img-fluid" style="width: 150px;" src="../../assets/content/logo.png" alt="logo">
    <nav class="navbar">
      <ul class="nav my-2 fw-medium border-bottom border-1">
        <li class="nav-item px-1"><a class="nav-link text-black c-nav-link"
            href="../../controllers/portals/visitor.php?data">Compte</a></li>
        <li class="nav-item px-1"><a class="nav-link text-black c-nav-link"
            href="../../controllers/portals/visitor.php?settings">Paramètres</a></li>
        <li class="nav-item px-1"><a class="nav-link text-black c-nav-link"
            href="../../controllers/portals/visitor.php?logout">Déconnexion</a></li>
      </ul>
    </nav>
  </header>

  <main>
    <div class="container p-3">
      <h2 class="mb-2 ps-2 fs-4 fw-bold">Récapitulatif des fiche de frais</h2>
      <div class="container mb-3 p-0 overflow-auto" style="max-height: 35vh;">
        <table class="table">
          <thead>
            <tr>
              <th>Période de référence</th>
              <th>Date de création</th>
              <th>Nbr. de nuitée(s)</th>
              <th>Mnt. total</th>
              <th>Mnt. remboursé</th>
              <th>Mnt. à payer</th>
              <th>Statut du traitement</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <?php
            foreach ($data as $row) {
              $start_date = new DateTime($row["start_date"]);
              $end_date = new DateTime($row["end_date"]);
              $request_date = new DateTime($row["request_date"]);

              if ($row["nights_number"] == NULL) {
                $row["nights_number"] = 0;
              }
              echo "<tr>
                  <td>Du " . $start_date->format("d/m/Y") . " au " . $end_date->format("d/m/Y") . "</></td>
                  <td>" . $request_date->format("d/m/Y") . "</td>
                  <td>" . $row["nights_number"] . "</td>
                  <td>" . $row["total_amount"] . "</td>
                  <td>" . $row["total_amount_refund"] . "</td>
                  <td>" . $row["total_amount_unrefund"] . "</td>";
              if ($row["treatment_status"] == 1) {
                echo "
                  <td>Validée</td>";
              } else if ($row["treatment_status"] == 2) {
                echo "
                  <td>Refusée</td>";
              } else {
                echo "
                  <td>En traitement</td>";
              }
              echo "<td>
                <a class='btn btn-primary c-link' href='../../controllers/portals/visitor.php?manageExpenseSheet&id=" . $row["expense_sheet_id"] . "'>Consulter</a>
              </td>";
            }
            if (!$data) {
              echo "
            <td>Aucun résulat</td><tr>";
            }
            ?>
          </tbody>
        </table>
      </div>
      <a class="btn btn-primary c-link" href="../../controllers/portals/visitor.php?createExpenseSheet">Créer
        une fiche</a>
    </div>
    <div class="container d-flex px-2 pt-2 pb-5">
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2  justify-content-center align-items-center w-100">
        <div class="col m-2" style="max-width: 800px;">
          <canvas id="visitor-chart-1"></canvas>
        </div>
        <div class="col mx-2" style="max-width: 400px;">
          <canvas id="visitor-chart-2"></canvas>
        </div>
      </div>
    </div>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
    const ctx_1 = document.getElementById("visitor-chart-1");
    const ctx_2 = document.getElementById("visitor-chart-2");

    new Chart(ctx_1, {
      type: "bar",
      data: {
        labels: ["Transport (p)", "Transport (r)", "Hébergement (p)", "Hébergement (r)", "Alimentation (p)", "Alimentation (r)", "Autres (p)", "Autres (r)"],
        datasets: [{
          label: "Total frais payés (p) et frais remboursés (r) par catégorie",
          data: [<?php echo $transport_expense_unrefund ?>, <?php echo $transport_expense_refund ?>, <?php echo $accommodation_expense_unrefund ?>, <?php echo $accommodation_expense_refund ?>, <?php echo $food_expense_unrefund ?>, <?php echo $food_expense_refund ?>, <?php echo $other_expense_unrefund ?>, <?php echo $other_expense_refund ?>],
          backgroundColor: [
            "rgba(54, 162, 235, 0.25)",
            "rgba(54, 162, 235, 0.5)",
            "rgba(255, 159, 64, 0.25)",
            "rgba(255, 159, 64, 0.5)",
            "rgba(255, 99, 132, 0.25)",
            "rgba(255, 99, 132, 0.5)",
            "rgba(153, 102, 255, 0.25)",
            "rgba(153, 102, 255, 0.5)",
          ],
          borderColor: [
            "rgb(54, 162, 235)",
            "rgb(54, 162, 235)",
            "rgb(255, 159, 64)",
            "rgb(255, 159, 64)",
            "rgb(255, 99, 132)",
            "rgb(255, 99, 132)",
            "rgb(153, 102, 255)",
            "rgb(153, 102, 255)",
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
        labels: ["Total frais payés", "Total frais remboursés"],
        datasets: [{
          data: [<?php echo $total_amount_unrefund ?>, <?php echo $total_amount_refund ?>],
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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
</body>

</html>