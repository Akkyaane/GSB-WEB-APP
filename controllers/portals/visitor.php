<?php

session_start();
require("../../assets/tools.php");
require("../../models/db.php");
require("../../models/functionalities/ManageExpenseSheet.php");

$data = get_user_expense_sheets_data();
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
    $kilometer_expense_refund += $row["kilometer_expense_refund"];
    $kilometer_expense_unrefund += $row["kilometer_expense_unrefund"];
    $transport_expense_refund += $row["transport_expense_refund"];
    $transport_expense_unrefund += $row["transport_expense_unrefund"];
    $accommodation_expense_refund += $row["accommodation_expense_refund"];
    $accommodation_expense_unrefund += $row["accommodation_expense_unrefund"];
    $food_expense_refund += $row["food_expense_refund"];
    $food_expense_unrefund += $row["food_expense_unrefund"];
    $other_expense_refund += $row["other_expense_refund"];
    $other_expense_unrefund += $row["other_expense_unrefund"];
    $total_amount_refund += $row["total_amount_refund"];
    $total_amount_unrefund += $row["total_amount_unrefund"];
}
$transport_expense_refund = $kilometer_expense_refund + $transport_expense_refund;
$transport_expense_unrefund = $kilometer_expense_unrefund + $transport_expense_unrefund;
if (isset($_GET["manageAccount"])) {
    header("Location: ../functionalities/account/ManageAccount.php");
}
if (isset($_GET["logout"])) {
    header("Location: ../authentication/logout.php");
}
if (isset($_GET["createExpenseSheet"])) {
    header("Location: ../functionalities/ExpenseSheet/CreateExpenseSheet.php");
}
if (isset($_GET["manageExpenseSheet"])) {
    header("Location: ../functionalities/ExpenseSheet/ManageExpenseSheet.php?id=" . $_GET["id"]);
}

require("../../views/portals/visitor.php");
