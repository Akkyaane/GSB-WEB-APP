<?php

session_start();
require("../../assets/tools.php");
require("../../models/db.php");
require("../../models/functionalities/ExpenseSheet/displayExpenseSheet.php");
require("../../models/functionalities/Statistics/displayExpenses.php");

$data = display_user_expense_sheet();

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
