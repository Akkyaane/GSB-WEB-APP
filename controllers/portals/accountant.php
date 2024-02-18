<?php

session_start();
require("../../assets/tools.php");
require("../../models/db.php");
require("../../models/functionalities/ExpenseSheet/displayExpenseSheet.php");
require("../../models/functionalities/ExpenseSheet/ManageExpenseSheet.php");
require("../../models/functionalities/KilometerCosts/ManageKilometerCosts.php");

$data = display_expense_sheets();

if (isset($_GET['logout'])) {
    header("Location: ../authentication/logout.php");
}
if (isset($_GET['data'])) {
    header("Location: ../functionalities/UpdateData.php");
}
if (isset($_GET['settings'])) {
    header("Location: ../functionalities/UpdateSettings.php");
}
if (isset($_GET['readExpenseSheet'])) {
    header("Location: ../functionalities/ExpenseSheet/ReadExpenseSheet?readid=" . $_GET['readid']);
}
if (isset($_GET['processExpenseSheet'])) {
    header("Location: ../functionalities/ExpenseSheet/ProcessExpenseSheet.php?readid=" . $_GET['readid'] . "&processid=" . $_GET['processid']);
}
if (isset($_GET['readKilometerCosts'])) {
    header("Location: ../functionalities/KilometerCosts/readKilometerCosts.php");
}

require("../../views/portals/accountant.php");