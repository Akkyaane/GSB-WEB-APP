<?php

session_start();
require("../../../assets/tools.php");
require("../../../models/db.php");
require("../../../models/functionalities/ManageExpenseSheet.php");

$result = delete_expense_sheet_data();

if (!$result) {
    $_SESSION['http_status'] = 200;
    $_SESSION['message'] = "La fiche de frais a été supprimée.";
    header('Location: ../../portals/visitor.php');
} else {
    $_SESSION['http_status'] = 400;
    $_SESSION['message'] = "Un problème est survenu. Veuillez recommencer.";
    header("Location: ../../portals/visitor.php?manageExpenseSheet&id=" . $_GET["id"]);
}
