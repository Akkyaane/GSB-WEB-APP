<?php

session_start();
require("../../assets/tools.php");
require("../../models/db.php");
require("../../models/functionalities/ExpenseSheet/displayExpenseSheet.php");
require("../../models/functionalities/ExpenseSheet/ManageExpenseSheet.php");
require("../../models/functionalities/KilometerCosts/ManageKilometerCosts.php");

$data = display_expense_sheets();

$kilometer_expense_refund = 0;
$kilometer_expense_unrefund = 0;
$transport_expense_refund = 0;
$transport_expense_unrefund = 0;
$accommodation_expense_refund = 0;
$accommodation_expense_unrefund = 0;
$food_expense_refund = 0;
$food_expense_unrefund = 0;
$other_expense_refund = 0;
$other_expense_unrefund = 0;
$total_amount_refund = 0;
$total_amount_unrefund = 0;

foreach ($data as $row) {
    $kilometer_expense_refund += $row['kilometer_expense_refund'];
    $kilometer_expense_unrefund += $row['kilometer_expense_unrefund'];
    $transport_expense_refund += $row['transport_expense_refund'];
    $transport_expense_unrefund += $row['transport_expense_unrefund'];
    $accommodation_expense_refund += $row['accommodation_expense_refund'];
    $accommodation_expense_unrefund += $row['accommodation_expense_unrefund'];
    $food_expense_refund += $row['food_expense_refund'];
    $food_expense_unrefund += $row['food_expense_unrefund'];
    $other_expense_refund += $row['other_expense_refund'];
    $other_expense_unrefund += $row['other_expense_unrefund'];
    $total_amount_refund += $row['total_amount_refund'];
    $total_amount_unrefund += $row['total_amount_unrefund'];

    $start_date = new DateTime($row['start_date']);
    $end_date = new DateTime($row['end_date']);
    $request_date = new DateTime($row['request_date']);
}

$transport_expense_refund = $kilometer_expense_refund + $transport_expense_refund;
$transport_expense_unrefund = $kilometer_expense_unrefund + $transport_expense_unrefund;

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