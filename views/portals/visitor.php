<?php

displayAlerts();

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
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
  <header class="d-flex flex-column align-items-center">
    <img class="img-visitor" src="../../assets/content/logo.png" alt="logo">
    <nav class="navbar d-flex align-items-center justify-content-center">
      <ul class="nav">
        <li class="nav-item"><a class="nav-link a-visitor" href="">Mon compte</a></li>
        <li class="nav-item"><a class="nav-link a-visitor" href="">Paramètres</a></li>
        <li class="nav-item"><a class="nav-link a-visitor"
            href="../../controllers/portals/visitor.php?logout">Déconnexion</a></li>
      </ul>
    </nav>
  </header>

  <main>
    <div class="container d-flex justify-content-evenly py-4">
      <div class="container div1-visitor">
        <h2 class="d-flex justify-content-center py-2 h2-visitor">Récapitulatif des fiches de frais</h2>
        <table class="table">
          <thead>
            <tr>
              <th>Période</th>
              <th>Création</th>
              <th>Nuitée(s)</th>
              <th>Total</th>
              <th>À rembourser</th>
              <th>À payer</th>
              <th>Traitement</th>
              <th></th>
            </tr>
          </thead>
          <tbody class="table-group-divider">
            <?php
            foreach ($data as $row) {
              // $startDate = new DateTime($row['start_date']);
              // $endDate = new DateTime($row['end_date']);
              // $requestDate = new DateTime($row['request_date']);
              echo '<tr>
                  <td>Du <strong>' . $row['start_date']->format('d/m/Y') . '</strong> au <strong>' . $row['end_date']->format('d/m/Y') . '</strong></td>
                  <td>' . $row['request_date']->format('d/m/Y') . '</td>';
              if ($row['nights_number'] == NULL) {
                $row['nights_number'] = 0;
                echo '<td>' . $row['nights_number'] . '</td>';
              } else {
                echo '<td>' . $row['nights_number'] . '</td>';
              }
              echo '
                  <td>' . $row['total_amount'] . '</td>
                  <td>' . $row['total_amount_refund'] . '</td>
                  <td>' . $row['total_amount_unrefund'] . '</td>';
              if ($row['status'] == 1) {
                echo '
                  <td>Validée</td>
                  <td>
                    <button class="btn btn-sm btn-primary button-visitor"><a href="../v-functionalities/v-ExpenseSheet/v-ReadExpenseSheet.php?readid=' . $row['id'] . '" style="color: white; text-decoration: none">Consulter</a></button>
                  </td>';
              } else if ($row['status'] == 2) {
                echo '
                  <td>Refusée</td>
                  <td>
                    <button class="btn btn-sm btn-primary"><a href="../v-functionalities/v-ExpenseSheet/v-ReadExpenseSheet.php?readid=' . $row['id'] . '" style="color: white; text-decoration: none">Consulter</a></button>
                  </td>';
              } else {
                echo '
                  <td>En traitement</td>
                  <td>
                    <button class="btn btn-sm btn-primary"><a href="../v-functionalities/v-ExpenseSheet/v-ReadExpenseSheet.php?readid=' . $row['id'] . '" style="color: white; text-decoration: none">Consulter</a></button>
                    <button class="btn btn-sm btn-primary"><a href="../v-functionalities/v-ExpenseSheet/v-UpdateExpenseSheet.php?updateid=' . $row['id'] . '" style="color: white; text-decoration: none">Modifier</a></button>
                    <button class="btn btn-sm btn-danger"><a href="../../../models/visitor/v-ExpenseSheet/v-DeleteExpenseSheet.php?deleteid=' . $row['id'] . '" style="color: white; text-decoration: none">Supprimer</a></button>
                  </td>';
              }
            }
            ;
            ?>
          </tbody>
        </table>
        <a href="../../views/functionalities/visitor/CreateExpenseSheets.php"
          class="btn btn-primary button-visitor">Créer une nouvelle fiche</a>
      </div>
    </div>
  </main>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
</body>

</html>