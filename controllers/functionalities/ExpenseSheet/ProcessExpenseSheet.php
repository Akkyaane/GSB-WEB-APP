<?php

session_start();
require("../../../assets/tools.php");
require("../../../models/db.php");
require("../../../models/functionalities/ManageExpenseSheet.php");

$data = get_expense_sheet_data($_GET["id"]);

if (isset($_GET["processid"])) {
  if (isset($_POST["validate_submit"])) {
    $treatment = [":ti" => $_GET["processid"], ":ts" => 1, ":r" => NULL];
    $result = insert_treatment_data($treatment);

    if (!$result) {
      $result = process_expense_sheet_data($_GET["processid"]);

      if (!$result) {
        $_SESSION["http_status"] = 200;
        $_SESSION["message"] = "La fiche de frais a été traitée.";
        header("Location: ../../portals/accountant.php");
      } else {
        $_SESSION["http_status"] = 400;
        $_SESSION["message"] = "Un problème est survenu. Veuillez recommencer.";
        header("Location: ProcessExpenseSheet?processid=" . $_GET["processid"]);
      }
    } else {
      $_SESSION["http_status"] = 400;
      $_SESSION["message"] = "Un problème est survenu. Veuillez recommencer.";
      header("Location: ../../portals/accountant.php?manageExpenseSheet&id=" . $_GET["processid"]);
    }
  }

  if (isset($_POST["disprove_submit"])) {
    if (empty($_POST["remark"])) {
      $_SESSION["http_status"] = 400;
      $_SESSION["message"] = "Vous devez saisir le motif du rejet.";
      header("Location: ../../portals/accountant.php?manageExpenseSheet&id=" . $_GET["processid"]);
    } else {
      $treatment = [":ti" => $_GET["processid"], ":ts" => 2, ":r" => $_POST["remark"]];
      $result = insert_treatment_data($treatment);

      if (!$result) {
        $result = process_expense_sheet_data($_GET["processid"]);

        if (!$result) {
          $_SESSION["http_status"] = 200;
          $_SESSION["message"] = "La fiche de frais a été traitée.";
          header("Location: ../../portals/accountant.php");
        } else {
          $_SESSION["http_status"] = 400;
          $_SESSION["message"] = "Un problème est survenu. Veuillez recommencer.";
          header("Location: ProcessExpenseSheet?processid=" . $_GET["processid"]);
        }
      } else {
        $_SESSION["http_status"] = 400;
        $_SESSION["message"] = "Un problème est survenu. Veuillez recommencer.";
        header("Location: ProcessExpenseSheet?processid=" . $_GET["processid"]);
      }
    }
  }
}

require("../../../views/functionalities/ExpenseSheet/ProcessExpenseSheet.php");
