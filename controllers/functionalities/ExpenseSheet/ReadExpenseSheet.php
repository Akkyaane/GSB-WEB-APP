<?php 

session_start();
require('../../../assets/tools.php');
require('../../../models/db.php');
require('../../../models/functionalities/ExpenseSheet/ManageExpenseSheet.php');

if (isset($_GET['readid'])) {
    $data = read_expense_sheet_data();

    $startDate = new DateTime($data['start_date']);
    $endDate = new DateTime($data['end_date']);
    $requestDate = new DateTime($data['request_date']);
}

require("../../../views/functionalities/ExpenseSheet/ReadExpenseSheet.php");


