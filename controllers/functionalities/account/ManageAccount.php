<?php

session_start();
require("../../../assets/tools.php");
require("../../../models/db.php");
require("../../../models/functionalities/ManageAccount.php");

$data = get_account_data($_SESSION["id"]);

require("../../../views/functionalities/account/ManageAccount.php");
