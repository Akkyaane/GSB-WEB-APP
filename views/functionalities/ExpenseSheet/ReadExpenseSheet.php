<?php

displayAlerts()

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GSB - Consultation d'une fiche de frais</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <header class="bg-primary text-white text-center py-4">
        <h1 class="text-center">Consulter une fiche de frais</h1>
    </header>
    <main>
        <div class="container mt-4">
            <div class="mt-3">
                <h3>Informations générales</h3>
                <p>Demande effectuée le :
                    <?php echo $startDate->format('d/m/Y'); ?>
                </p>
                <p>Date de départ :
                    <?php echo $endDate->format('d/m/Y'); ?>
                </p>
                <p>Date de retour :
                    <?php echo $requestDate->format('d/m/Y'); ?>
                </p>
            </div>
            <div class="mt-3">
                <h3>Frais</h3>
                <h4>Transport</h4>
                <p>Type de transport :
                    <?php if ($data['transport_category'] == '1') {
                        echo "Avion";
                    } else if ($data['transport_category'] == '2') {
                        echo "Train";
                    } else if ($data['transport_category'] == '3') {
                        echo "Bus/Car/Taxi";
                    } else if ($data['transport_category'] == '4') {
                        echo "Voiture";
                    } else {
                        echo "N/A";
                    } ?>
                </p>
                <p>Nombre total de kilomètres :
                    <?php if (!(empty($data['kilometers_number']))) {
                        echo $data['kilometers_number'];
                    } else {
                        echo "N/A";
                    } ?>
                </p>
                <p>Montant total en euros :
                <?php if (!(empty($data['kilometers_number']))) {
                        echo $data['kilometer_expense'];
                    } else if (!(empty($data['transport_expense']))) {
                        echo $data['transport_expense'];
                    } else {
                        echo "N/A";
                    } ?>
                </p>
                <p>Montant à rembourser :
                <?php if (!(empty($data['kilometers_number']))) {
                        echo $data['kilometer_expense_refund'];
                    } else if (!(empty($data['transport_expense']))) {
                        echo $data['transport_expense_refund'];
                    } else {
                        echo "N/A";
                    } ?>
                </p>
                <p>Reste à payer :
                <?php if (!(empty($data['kilometers_number']))) {
                        if ($data['kilometer_expense_unrefund'] == NULL) {
                            echo '0';
                        } else {
                            echo $data['kilometer_expense_unrefund'];
                        };
                    } else if (!(empty($data['transport_expense']))) {
                        if ($data['transport_expense_unrefund'] == NULL) {
                            echo '0';
                        } else {
                            echo $data['transport_expense_unrefund'];
                        };
                    } else {
                        echo "N/A";
                    } ?>
                </p>
                <p>Justificatif :
                    <?php if (!(empty($data['transport_expense_file']))) {
                        echo "<a href=" . $data['transport_expense_file'] . ">Consulter</a>";
                    } else {
                        echo "N/A";
                    } ?>
                </p>
            </div>
            <div class="mt-3">
                <h4>Hébergement</h4>
                <p>Nombre de nuitées :
                    <?php if (!(empty($data['nights_number']))) {
                        echo $data['nights_number'];
                    } else {
                        echo "N/A";
                    } ?>
                </p>
                <p>Montant total en euros :
                    <?php if (!(empty($data['accommodation_expense']))) {
                        echo $data['accommodation_expense'];
                    } else {
                        echo "N/A";
                    } ?>
                </p>
                <p>Montant à rembourser :
                    <?php if (!(empty($data['accommodation_expense']))) {
                        echo $data['accommodation_expense_refund'];
                    } else {
                        echo "N/A";
                    } ?>
                </p>
                <p>Reste à payer :
                    <?php if (!(empty($data['accommodation_expense']))) {
                        if ($data['accommodation_expense_unrefund'] == NULL) {
                            echo '0';
                        } else {
                            echo $data['accommodation_expense_unrefund'];
                        };
                    } else {
                        echo "N/A";
                    } ?>
                </p>
                <p>Justificatif :
                    <?php if (!(empty($data['accommodation_expense_file']))) {
                        echo "<a href=" . $data['accommodation_expense_file'] . ">Consulter</a>";
                    } else {
                        echo "N/A";
                    } ?>
                </p>
            </div>
            <div class="mt-3">
                <h4>Alimentation</h4>
                <p>Montant total en euros :
                    <?php if (!(empty($data['food_expense']))) {
                        echo $data['food_expense'];
                    } else {
                        echo "N/A";
                    } ?>
                </p>
                <p>Montant à rembourser :
                    <?php if (!(empty($data['food_expense']))) {
                        echo $data['food_expense_refund'];
                    } else {
                        echo "N/A";
                    } ?>
                </p>
                <p>Reste à payer :
                    <?php if (!(empty($data['food_expense']))) {
                        if ($data['food_expense_unrefund'] == NULL) {
                            echo '0';
                        } else {
                            echo $data['food_expense_unrefund'];
                        };
                    } else {
                        echo "N/A";
                    } ?>
                </p>
                <p>Justificatif :
                    <?php if (!(empty($data['food_expense_file']))) {
                        echo "<a href=" . $data['food_expense_file'] . ">Consulter</a>";
                    } else {
                        echo "N/A";
                    } ?>
                </p>
            </div>
            <div class="mt-3">
                <h4>Autres</h4>
                <p>Montant total en euros :
                    <?php if (!(empty($data['other_expense']))) {
                        echo $data['other_expense'];
                    } else {
                        echo "N/A";
                    } ?>
                </p>
                <p>Montant à rembourser :
                    <?php if (!(empty($data['other_expense']))) {
                        echo $data['other_expense_refund'];
                    } else {
                        echo "N/A";
                    } ?>
                </p>
                <p>Reste à payer :
                    <?php if (!(empty($data['other_expense']))) {
                        if ($data['other_expense_unrefund'] == NULL) {
                            echo '0';
                        } else {
                            echo $data['other_expense_unrefund'];
                        };
                    } else {
                        echo "N/A";
                    } ?>
                </p>
                <p>Message :
                    <?php if (!(empty($data['message']))) {
                        echo $data['message'];
                    } else {
                        echo "N/A";
                    } ?>
                </p>
                <p>Justificatif :
                    <?php if (!(empty($data['other_expense_file']))) {
                        echo "<a href=" . $data['other_expense_file'] . ">Consulter</a>";
                    } else {
                        echo "N/A";
                    } ?>
                </p>
            </div>
            <div class="mt-3">
                <h3>Traitement</h3>
                <p>Statut :
                    <?php
                    if (!(empty($treatment_data['status']))) {
                        if ($treatment_data['status'] == 2) {
                            echo "Refusée";
                        }
                        if ($treatment_data['status'] == 1) {
                            echo "Validée";
                        }
                    } else {
                        echo "En attente de traitement";
                    } ?>
                </p>
                <p>Détails du refus :
                    <?php if (!(empty($treatment_data['remark']))) {
                        echo $treatment_data['remark'];
                    } else {
                        echo "N/A";
                    } ?>
                </p>
            </div>
            <div class="mt-3">
                <button class="btn btn-primary"><a href="../../v-home/v-home.php" style="color: white; text-decoration: none">Retour</a></button>
            </div>
        </div>
    </main>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>