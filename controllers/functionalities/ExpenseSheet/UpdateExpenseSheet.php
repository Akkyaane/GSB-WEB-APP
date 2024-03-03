<?php

session_start();
require("../../../assets/tools.php");
require("../../../models/db.php");
require("../../../models/functionalities/ManageExpenseSheet.php");
require("../../../models/functionalities/ManageKilometerCosts.php");

$data = get_expense_sheet_data();

if (isset($_GET['updateid'])) {
  $kilometer_costs_data = get_kilometer_cost_data();
  $expense_sheet = [":ui" => $_SESSION["id"], ":ri" => $_GET['updateid'], ":rd" => $_POST["request_date"], ":sd" => $_POST["start_date"], ":ed" => $_POST["end_date"]];
  $receipts = [];
  $target_dir = "../../../../GSB-WEB-APP/assets/uploads/";
  $uploadOk = NULL;

  if (!empty($_POST["transport_category"])) {
    $expense_sheet[":tc"] = $_POST["transport_category"];

    if ($expense_sheet[":tc"] != 4) {
      if (!empty($_POST["transport_expense"])) {
        $expense_sheet[":te"] = $_POST["transport_expense"];

        if (!empty($_FILES["transport_expense_file"]["name"])) {
          $receipts[":tef"] = $target_dir . "transport/" . $_GET['updateid'] . "_" . basename($_FILES["transport_expense_file"]["name"]);
        } else {
          $_SESSION["http_status"] = 400;
          $_SESSION["message"] = "Vous avez sélectionné un mode de transport mais n'avez fourni aucun justificatif. Veuillez recommencer.";
          header("Location: UpdateExpenseSheet.php?updateid=" . $_GET['updateid']);
        }

        if ($expense_sheet[":te"] > 2500) {
          $expense_sheet[":teu"] = $expense_sheet[":te"] - 2500;
          $expense_sheet[":ter"] = 2500;
        } else {
          $expense_sheet[":teu"] = NULL;
          $expense_sheet[":ter"] = $expense_sheet[":te"];
        }

        $expense_sheet[":kn"] = NULL;
        $expense_sheet[":ke"] = NULL;
        $expense_sheet[":keu"] = NULL;
        $expense_sheet[":ker"] = NULL;
      } else {
        $_SESSION["http_status"] = 400;
        $_SESSION["message"] = "Vous avez sélectionné un mode de transport mais n'avez saisi aucun montant. Veuillez recommencer.";
        header("Location: UpdateExpenseSheet.php?updateid=" . $_GET['updateid']);
      }
    } else {
      if (!empty($_POST["kilometers_number"])) {
        $expense_sheet[":kn"] = $_POST["kilometers_number"];
        $expense_sheet[":ke"] = $kilometer_costs_data["cost"] * $expense_sheet[":kn"];

        if ($expense_sheet[":ke"] > 2500) {
          $expense_sheet[":keu"] = $expense_sheet[":ke"] - 2500;
          $expense_sheet[":ker"] = 2500;
        } else {
          $expense_sheet[":keu"] = NULL;
          $expense_sheet[":ker"] = $expense_sheet[":ke"];
        }

        $expense_sheet[":te"] = NULL;
        $receipts[":tef"] = NULL;
        $expense_sheet[":teu"] = NULL;
        $expense_sheet[":ter"] = NULL;
      } else {
        $_SESSION["http_status"] = 400;
        $_SESSION["message"] = "Vous avez sélectionné le mode de transport 'Voiture' mais n'avez saisi aucun nombre de kilomètres. Veuillez recommencer.";
        header("Location: UpdateExpenseSheet.php?id=" . $_GET['updateid']);
      }
    }
  } else {
    $expense_sheet[":tc"] = NULL;
  }
  if (!empty($_POST["accommodation_expense"])) {
    $expense_sheet[":ae"] = $_POST["accommodation_expense"];

    if (!empty($_POST["nights_number"])) {
      $expense_sheet[":nn"] = $_POST["nights_number"];
    } else {
      $_SESSION["http_status"] = 400;
      $_SESSION["message"] = "Vous avez saisi un montant concernant les frais d'hébergement mais n'avez saisi aucun nombre de nuitées. Veuillez recommencer.";
      header("Location: UpdateExpenseSheet.php?id=" . $_GET['updateid']);
    }

    if (!empty($_FILES["accommodation_expense_file"]["name"])) {
      $receipts[":aef"] = $target_dir . "accommodation/" . $_GET['updateid'] . "_" . basename($_FILES["accommodation_expense_file"]["name"]);
    } else {
      $_SESSION["http_status"] = 400;
      $_SESSION["message"] = "Vous avez saisi un montant concernant les frais d'hébergement mais n'avez fourni aucun justificatif. Veuillez recommencer.";
      header("Location: UpdateExpenseSheet.php?id=" . $_GET['updateid']);
    }

    if (($expense_sheet[":ae"] / $expense_sheet[":nn"]) > 250) {
      $expense_sheet[":aeu"] = (($expense_sheet[":ae"] / $expense_sheet[":nn"]) - 250) * $expense_sheet[":nn"];;
      $expense_sheet[":aer"] = 250 * $expense_sheet[":nn"];
    } else {
      $expense_sheet[":aeu"] = NULL;
      $expense_sheet[":aer"] = $expense_sheet[":ae"];
    }
  } else {
    $expense_sheet[":nn"] = NULL;
    $expense_sheet[":ae"] = NULL;
    $receipts[":aef"] = NULL;
    $expense_sheet[":aeu"] = NULL;
    $expense_sheet[":aer"] = NULL;
  }
  if (!empty($_POST["food_expense"])) {
    $expense_sheet[":fe"] = $_POST["food_expense"];

    if (!empty($_FILES["food_expense_file"]["name"])) {
      $receipts[":fef"] = $target_dir . "food/" . $_GET['updateid'] . "_" . basename($_FILES["food_expense_file"]["name"]);
    } else {
      $_SESSION["http_status"] = 400;
      $_SESSION["message"] = "Vous avez saisi un montant concernant les frais d'alimentation mais n'avez fourni aucun justificatif. Veuillez recommencer.";
      header("Location: UpdateExpenseSheet.php?id=" . $_GET['updateid']);
    }

    if ($expense_sheet[":fe"] > 300) {
      $expense_sheet[":feu"] = $expense_sheet[":fe"] - 300;
      $expense_sheet[":fer"] = 300;
    } else {
      $expense_sheet[":feu"] = NULL;
      $expense_sheet[":fer"] = $expense_sheet[":fe"];
    }
  } else {
    $expense_sheet[":fe"] = NULL;
    $receipts[":fef"] = NULL;
    $expense_sheet[":feu"] = NULL;
    $expense_sheet[":fer"] = NULL;
  }
  if (!empty($_POST["other_expense"])) {
    $expense_sheet[":oe"] = $_POST["other_expense"];

    if (!empty($_FILES["other_expense_file"]["name"])) {
      $receipts[":oef"] = $target_dir . "other/" . $_GET['updateid'] . "_" . basename($_FILES["other_expense_file"]["name"]);
    } else {
      $_SESSION["http_status"] = 400;
      $_SESSION["message"] = "Vous avez saisi un montant concernant des frais autres mais n'avez fourni aucun justificatif. Veuillez recommencer.";
      header("Location: UpdateExpenseSheet.php?id=" . $_GET['updateid']);
    }

    if (!empty($_POST["message"])) {
      $expense_sheet[":m"] = $_POST["message"];
    } else {
      $_SESSION["http_status"] = 400;
      $_SESSION["message"] = "Vous avez saisi un montant concernant des frais autres mais aucun message. Veuillez recommencer.";
      header("Location: UpdateExpenseSheet.php?id=" . $_GET['updateid']);
    }

    if ($expense_sheet[":oe"] > 200) {
      $expense_sheet[":oeu"] = $expense_sheet[":oe"] - 200;
      $expense_sheet[":oer"] = 200;
    } else {
      $expense_sheet[":oeu"] = NULL;
      $expense_sheet[":oer"] = $expense_sheet[":oe"];
    }
  } else {
    $expense_sheet[":oe"] = NULL;
    $receipts[":oef"] = NULL;
    $expense_sheet[":m"] = NULL;
    $expense_sheet[":oeu"] = NULL;
    $expense_sheet[":oer"] = NULL;
  }
  if (!empty($receipts[":tef"])) {
    $fileToUpload = $_FILES["transport_expense_file"]["tmp_name"];

    if (upload_files($receipts[":tef"], $fileToUpload) == FALSE) {
      $uploadOk = FALSE;
    } else {
      $uploadOk = TRUE;
    }
  }
  if (!empty($receipts[":aef"])) {
    $fileToUpload = $_FILES["accommodation_expense_file"]["tmp_name"];

    if (upload_files($receipts[":aef"], $fileToUpload) == FALSE) {
      $uploadOk = FALSE;
    } else {
      $uploadOk = TRUE;
    }
  }
  if (!empty($receipts[":fef"])) {
    $fileToUpload = $_FILES["food_expense_file"]["tmp_name"];

    if (upload_files($receipts[":fef"], $fileToUpload) == FALSE) {
      $uploadOk = FALSE;
    } else {
      $uploadOk = TRUE;
    }
  }
  if (!empty($receipts[":oef"])) {
    $fileToUpload = $_FILES["other_expense_file"]["tmp_name"];

    if (upload_files($receipts[":oef"], $fileToUpload) == FALSE) {
      $uploadOk = FALSE;
    } else {
      $uploadOk = TRUE;
    }
  }
  if ($uploadOk == NULL || $uploadOk != FALSE) {
    if (empty($expense_sheet[":kn"]) && empty($expense_sheet[":te"]) && empty($expense_sheet[":ae"]) && empty($expense_sheet[":fe"]) && empty($expense_sheet[":oe"])) {
      $_SESSION["http_status"] = 400;
      $_SESSION["message"] = "Vous devez saisir un montant. Veuillez recommencer.";
      header("Location: UpdateExpenseSheet.php?id=" . $_GET['updateid']);
    } else {
      $expense_sheet[":ta"] = $expense_sheet[":ke"] + $expense_sheet[":te"] + $expense_sheet[":ae"] + $expense_sheet[":fe"] + $expense_sheet[":oe"];
      $expense_sheet[":ta"] = round($expense_sheet[":ta"], 2);
      $expense_sheet[":tar"] = $expense_sheet[":ker"] + $expense_sheet[":ter"] + $expense_sheet[":aer"] + $expense_sheet[":fer"] + $expense_sheet[":oer"];
      $expense_sheet[":tar"] = round($expense_sheet[":tar"], 2);
      $expense_sheet[":tau"] = $expense_sheet[":keu"] + $expense_sheet[":teu"] + $expense_sheet[":aeu"] + $expense_sheet[":feu"] + $expense_sheet[":oeu"];
      $expense_sheet[":tau"] = round($expense_sheet[":tau"], 2);
      $result = update_receipts_data($receipts, $receipts_id);

      if (!$result) {
        $result = update_expense_sheet_data($expense_sheet);

        if (!$result) {
          $_SESSION["http_status"] = 200;
          $_SESSION["message"] = "La fiche de frais a été modifiée.";
          header("Location: ../../portals/visitor.php");
        } else {
          $_SESSION["http_status"] = 400;
          $_SESSION["message"] = "Un problème est survenu.";
          header("Location: UpdateExpenseSheet.php?updateid=" . $_GET['updateid']);
        }
      } else {
        $_SESSION["http_status"] = 400;
        $_SESSION["message"] = "Un problème est survenu.";
        header("Location: UpdateExpenseSheet.php?id=" . $_GET['updateid']);
      }
    }
  } else {
    $_SESSION["http_status"] = 400;
    $_SESSION["message"] = "Un problème est survenu lors du téléchargement des fichiers. Veuillez recommencer.";
    header("Location: UpdateExpenseSheet.php?id=" . $_GET['updateid']);
  }
}

require("../../../views/functionalities/ExpenseSheet/UpdateExpenseSheet.php");
