<?php

session_start();
require("../../assets/tools.php");
require("../../models/db.php");
require("../../models/functionalities/ExpenseSheet/displayExpenseSheet.php");

$data = display_user_expense_sheet();

if (isset($_GET['logout'])) {
    header("Location: ../authentication/logout.php");
}
if (isset($_GET['data'])) {
    header("Location: ../functionalities/UpdateData.php");
}
if (isset($_GET['settings'])) {
    header("Location: ../functionalities/UpdateSettings.php");
}
if (isset($_GET['createExpenseSheet'])) {
    header("Location: ../functionalities/ExpenseSheet/CreateExpenseSheet.php");
}
if (isset($_GET['readExpenseSheet'])) {
    header("Location: ../functionalities/ExpenseSheet/ReadExpenseSheet.php?readid=" . $_GET['readid']);
}
if (isset($_GET['updateExpenseSheet'])) {
    header("Location: ../functionalities/ExpenseSheet/UpdateExpenseSheet.php?updateid=" . $_GET['updateid']);
}
if (isset($_GET['deleteExpenseSheet'])) {
    header("Location: ../functionalities/ExpenseSheet/DeleteExpenseSheet.php?deleteid=" . $_GET['deleteid']);
}

require("../../views/portals/visitor.php");
