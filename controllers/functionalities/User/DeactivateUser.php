<?php

session_start();
require("../../../assets/tools.php");
require("../../../models/db.php");
require("../../../models/functionalities/ManageUser.php");

if ($_GET["deactivateid"]) {
  $result = deactivate_user($_GET["deactivateid"]);

  if (!$result) {
    $_SESSION["http_status"] = 200;
    $_SESSION["message"] = "Le compte a été désactivé.";
    header("Location: ../../portals/administrator.php");
  } else {
    $_SESSION["http_status"] = 400;
    $_SESSION["message"] = "Le compte a déjà été désactivé.";
    header("Location: ManageUser?id=" . $_GET["deactivateid"]);
  }
}
