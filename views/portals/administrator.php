<?php

displayAlerts();
$_SESSION['message'] = NULL;

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>GSB - Portail Administrateur</title>
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
            href="../../controllers/portals/accountant.php?data">Mon
            compte</a></li>
        <li class="nav-item"><a class="nav-link text-black my-2 a-visitor"
            href="../../controllers/portals/accountant.php?settings">Paramètres</a></li>
        <li class="nav-item"><a class="nav-link text-black my-2 a-visitor"
            href="../../controllers/portals/accountant.php?logout">Déconnexion</a></li>
      </ul>
    </nav>
  </header>
  <main class="d-flex justify-center" style="width: 85%;">
    <div class="d-flex flex-column justify-center align-center m-2 w-100">
      <h2 class="text-center my-3 fs-3">Récapitulatif des fiches de frais</h2>
      <table class="table w-auto fs-6">
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
                if ($row['role_id'] == "1") {
                  $row['role_id'] = "Administrateur";
                }
                else if ($row['role_id'] == "2") {
                  $row['role_id'] = "Comptable";
                } else {
                  $row['role_id'] = "Visiteur";
                }
                if ($row['status'] == "1") {
                  $row['status'] = "Activé";
                } else {
                  $row['status'] = "Désactivé";
                }
                echo '
                          <tr>
                            <td>'.$row['last_name'].'</td>
                            <td>' .$row['first_name']. '</td>
                            <td>' .$row['email']. '</td>
                            <td>'.$row['role_id'].'</td>
                            <td>'.$row['status'].'</td>
                            <td>
                              <button class="btn btn-sm btn-primary"><a href="../ad-functionalities/ad-UsersArray/ad-ManagePersonnalDataUser.php?updateid=' . $row['user_id'] . '" style="color: white">Gérer</a></button>
                            </td>';
              }
           if (!$data) {
            echo '
                        <tr>
                          <td>Aucun utilisateur</td>
                        </tr>
                        ';
          }
          ?>
        </tbody>
      </table>
      <div class="container mt-5" style="display: flex; justify-content: left">
    <button class="btn btn-primary mb-2"><a href="../ad-functionalities/ad-UsersArray/ad-AddUser.php" style="color: white; text-decoration: none">Créer un nouvel utilisateur</a></button>
      <button class="btn btn-primary mb-2" style="margin-left: 5px"><a href="../ad-functionalities/ad-KilometerCostsArray/ad-ReadKilometerCostsArray.php" style="color: white; text-decoration: none">Consulter le tableau des frais kilométriques</a></button>
    </div>
    </div>
  </main>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
</body>

</html>


