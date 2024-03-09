<?php

session_start();
require("../../../assets/tools.php");
require("../../../models/db.php");
require("../../../models/functionalities/ManageUser.php");

if ($_GET["reactivateid"]) {
  $result = reactivate_user($_GET["reactivateid"]);

  if (!$result) {
    $_SESSION["http_status"] = 200;
    $_SESSION["message"] = "Le compte a été réactivé.";
    header("Location: ../../portals/administrator.php");
  } else {
    $_SESSION["http_status"] = 400;
    $_SESSION["message"] = "Le compte a déjà été réactivé.";
    header("Location: ManageUser?id=" . $_GET["reactivateid"]);
  }
}
