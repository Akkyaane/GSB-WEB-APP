<?php

session_start();
require('../../assets/tools.php');
require('../../models/db.php');
require('../../models/functionalities/ManageData.php');

$data = display_data();

require("../../views/functionalities/UpdateData.php");