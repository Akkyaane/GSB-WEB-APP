<?php

session_start();
require("../../../assets/tools.php");
require("../../../models/db.php");
require("../../../models/functionalities/ManageUser.php");

$data = get_user_data();

require("../../../views/functionalities/User/ManageUser.php");
