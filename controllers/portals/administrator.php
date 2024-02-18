<?php

session_start();
require("../../assets/tools.php");
require("../../models/db.php");
require("../../models/functionalities/Users/ManageUser.php");
require("../../models/functionalities/KilometerCosts/ManageKilometerCosts.php");

$data = get_users_data();

if (isset($_GET['logout'])) {
    header("Location: ../authentication/logout.php");
}
if (isset($_GET['data'])) {
    header("Location: ../functionalities/UpdateData.php");
}
if (isset($_GET['settings'])) {
    header("Location: ../functionalities/UpdateSettings.php");
}

if (isset($_GET['readKilometerCosts'])) {
    header("Location: ../functionalities/KilometerCosts/readKilometerCosts.php");
}

require("../../views/portals/administrator.php");