<?php

session_start();
require("../../../assets/tools.php");
require("../../../models/db.php");
require("../../../models/functionalities/ManageAccount.php");

$data = get_account_data();

if (isset($_GET["updateid"])) {
  $user = [":fn" => $_POST["first_name"], ":ln" => $_POST["last_name"], ":e" => $_POST["email"]];

  if ((count($user) != 3)) {
    $_SESSION["http_status"] = 400;
    $_SESSION["message"] = "Un ou plusieurs champs sont vides. Veuillez recommencer.";

    if ($_SESSION["role"] == 1) {
      header("Location: ../../portals/administrator.php?manageAccount");
    } else if ($_SESSION["role"] == 2) {
      header("Location: ../../portals/accountant.php?manageAccount");
    } else {
      header("Location: ../../portals/visitor.php?manageAccount");
    }
  } else {
    $result = update_account_data($user);

    if (!$result) {
      $_SESSION["http_status"] = 200;
      $_SESSION["message"] = "Vos informations ont été modifiées.";

      if ($_SESSION["role"] == 1) {
        header("Location: ../../portals/administrator.php");
      } else if ($_SESSION["role"] == 2) {
        header("Location: ../../portals/accountant.php");
      } else {
        header("Location: ../../portals/visitor.php");
      }
    } else {
      $_SESSION["http_status"] = 400;
      $_SESSION["message"] = "Un problème est survenu. Veuillez recommencer.";

      if ($_SESSION["role"] == 1) {
        header("Location: ../../portals/administrator.php?manageAccount");
      } else if ($_SESSION["role"] == 2) {
        header("Location: ../../portals/accountant.php?manageAccount");
      } else {
        header("Location: ../../portals/visitor.php?manageAccount");
      }
    }
  }
}

require("../../../views/functionalities/account/UpdateAccount.php");
