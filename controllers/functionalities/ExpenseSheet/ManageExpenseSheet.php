<?php 

session_start();
require('../../../assets/tools.php');
require('../../../models/db.php');
require('../../../models/functionalities/ManageExpenseSheet.php');

$data = read_expense_sheet_data();

require("../../../views/functionalities/ExpenseSheet/ManageExpenseSheet.php");

