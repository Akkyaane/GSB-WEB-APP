<?php

session_start();
require("../../../assets/tools.php");
require("../../../models/db.php");
require("../../../models/functionalities/ManageExpenseSheet.php");

$data = get_expense_sheet_data($_GET["id"]);

require("../../../views/functionalities/ExpenseSheet/ManageExpenseSheet.php");
