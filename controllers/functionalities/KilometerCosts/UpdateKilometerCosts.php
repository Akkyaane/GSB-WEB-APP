<?php 

session_start();
require('../../../assets/tools.php');
require('../../../models/db.php');
require('../../../models/functionalities/ManageKilometerCosts.php');

$data = get_kilometer_costs_data();

if (isset($_POST['submit'])) {
    $horsepowers = [$_POST['horsepower']];
    $costs = [$_POST['cost']];

    if (count($horsepowers) == count($costs)) {
        $count = count($horsepowers);

        for ($i = 0; $i < $count; $i++) {
            $h = $horsepowers[$i];
            $c = $costs[$i];

            $result = update_kilometer_costs_data($h, $c);

            var_dump($result);

        }
    }

    if (!$result) {
        $_SESSION['http_status'] = 200;
        $_SESSION['message'] = "Le tableau a été modifié.";
        header('Location: ../../portals/administrator.php');
    } else {
        $_SESSION['http_status'] = 400;
        $_SESSION['message'] = "Un problème est survenu. Veuillez recommencer.";
        header("Location: ../../portals/administrator.php?manageKilometerCosts");
    }
}

require("../../../views/functionalities/KilometerCosts/UpdateKilometerCosts.php");