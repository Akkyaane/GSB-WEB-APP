<?php 

session_start();
require('../../../assets/tools.php');
require('../../../models/db.php');
require('../../../models/functionalities/ManageKilometerCosts.php');

$data = read_kilometer_costs_data();

require("../../../views/functionalities/KilometerCosts/ManageKilometerCosts.php");