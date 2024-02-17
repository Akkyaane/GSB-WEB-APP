<?php

session_start();
require("../../assets/tools.php");
require("../../models/db.php");
require("../../models/functionalities/visitor/displaySpecificExpenseSheets.php");

$data = displaySpecificExpenseSheets();

if (isset($_GET['logout'])) {
    header("Location: ../authentication/logout.php");
}

require("../../views/portals/visitor.php");
