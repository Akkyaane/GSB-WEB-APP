<?php 

session_start();
require('../../../assets/tools.php');
require('../../../models/db.php');
require('../../../models/functionalities/ExpenseSheet/DisplayExpenseSheet.php');
require('../../../models/functionalities/ExpenseSheet/ManageExpenseSheet.php');

if (isset($_GET['readid'])) {
    $data = display_expense_sheet();

    $startDate = new DateTime($data['start_date']);
    $endDate = new DateTime($data['end_date']);
    $requestDate = new DateTime($data['request_date']);
}

if (isset($_GET['processid'])) {
    if (isset($_POST['validate_submit'])) {
        $treatment = [':ti' => $_GET['processid'], ':ts' => 1, ':r' => NULL];
        $result = process_expense_sheet_data($treatment);
        var_dump($result);
    
        if (!$result) {
            $_SESSION['http_status'] = 200;
            $_SESSION['message'] = "La fiche de frais a été traitée.";
            header('Location: ../../portals/accountant.php');
        } else {
            $_SESSION['http_status'] = 400;
            $_SESSION['message'] = "Un problème est survenu. Veuillez recommencer.";
            header('Location: ../../portals/accountant.php');
        }
    }
    
    if (isset($_POST['disprove_submit'])) {
        if (empty($_POST['remark'])) {
            $_SESSION['http_status'] = 400;
            $_SESSION['message'] = "Vous devez fournir les détails du refus.";
            header('Location: ../../portals/accountant.php');
        } else {
            $treatment = [[':ti' => $_GET['processid'], ':ts' => 2, ':r' => $_POST['remark']]];
            $result = process_expense_sheet_data($treatment);
    
            if (!$result) {
                $_SESSION['http_status'] = 200;
                $_SESSION['message'] = "La fiche de frais a été traitée.";
                header('Location: ../../portals/accountant.php');
            } else {
                $_SESSION['http_status'] = 400;
                $_SESSION['message'] = "Un problème est survenu. Veuillez recommencer.";
                header('Location: ../../portals/accountant.php');
            }
        }
    }
}

require("../../../views/functionalities/ExpenseSheet/ProcessExpenseSheet.php");
