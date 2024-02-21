<?php

displayAlerts();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>GSB - Frais kilométriques</title>
    <link rel="stylesheet" href="../../../assets/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <script defer src="../../../assets/script.js"></script>
</head>

<body>
    <header class="d-flex flex-column
    justify-center align-items-center">
        <img class="img-fluid" style="width: 150px;" src="../../../assets/content/logo.png" alt="logo">
        <nav class="navbar">
            <ul class="nav my-2 fw-medium border-bottom border-1">
                <li class="nav-item px-1"><a class="nav-link text-black c-nav-link"
                        href="../../../controllers/portals/visitor.php?data">Compte</a></li>
                <li class="nav-item px-1"><a class="nav-link text-black c-nav-link"
                        href="../../../controllers/portals/visitor.php?settings">Paramètres</a></li>
                <li class="nav-item px-1"><a class="nav-link text-black c-nav-link"
                        href="../../../controllers/portals/visitor.php?logout">Déconnexion</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <div class="container p-3">
            <h2 class="mb-3 fs-4 fw-bold">Modifier le tableau des frais kilométriques
            </h2>
            <form action="../../../controllers/functionalities/KilometerCosts/UpdateKilometerCosts.php" method="post">
                <div class="container mb-3 p-0 overflow-auto" style="max-height: 35vh;">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nombre de chevaux</th>
                                <th>Prix au kilomètre</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach ($data as $row) {
                                    echo "<tr>
                                        <td><input type='number' step=0.01 class='form-control input' name='horsepower[]' id='horsepower'
                                                value='" . $row['horsepower'] . "'></td>
                                        <td><input type='float' step=0.01 class='form-control input' name='cost[]' id='cost'
                                                value='" . $row['cost'] ."'></td>
                                        </tr>";
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
                <button type="submit" class="btn btn-primary c-link" name="submit" id="submit">Soumettre</button>
                <a class="btn btn-primary c-link" href="../../../controllers/portals/administrator.php">Retour</a>
            </form>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>