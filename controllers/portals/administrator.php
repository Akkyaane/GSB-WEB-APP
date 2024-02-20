<?php

session_start();
require("../../assets/tools.php");
require("../../models/db.php");
require("../../models/functionalities/ManageUser.php");

$data = get_users_data();

$accountants = 0;
$administrators = 0;
$visitors = 0;
$activated_accounts = 0;
$deactivated_accounts = 0;

foreach ($data as $row) {
    if ($row["role_id"] == 1) {
        $administrators += 1;
    } else if ($row["role_id"] == 2) {
        $accountants += 1;
    } else {
        $visitors += 1;
    }

    if ($row["status"] == 1) {
        $activated_accounts += 1;
    } else {
        $deactivated_accounts += 1;
    }
}

if (isset($_GET["data"])) {
    header("Location: ../functionalities/UpdateData.php");
}

if (isset($_GET["settings"])) {
    header("Location: ../functionalities/UpdateSettings.php");
}

if (isset($_GET["logout"])) {
    header("Location: ../authentication/logout.php");
}

if (isset($_GET["createUser"])) {
    header("Location: ../functionalities/User/CreateUser.php");
}

if (isset($_GET["updateKilometerCosts"])) {
    header("Location: ../functionalities/KilometerCosts/UpdateKilometerCosts.php");
}

if (isset($_GET["manageUser"])) {
    header("Location: ../functionalities/Users/ManageUser.php?id=" . $_GET["id"]);
}

require("../../views/portals/administrator.php");