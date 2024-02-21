<?php

session_start();
require('../../assets/tools.php');
require('../../models/db.php');
require('../../models/functionalities/ManageData.php');

$data = get_data();

if (isset($_GET['updateid'])) {
    $user = [':fn' => $_POST['first_name'], ':ln' => $_POST['last_name'], ':e' => $_POST['email']];

    if ((count($user) != 3)) {
        $_SESSION['http_status'] = 400;
        $_SESSION['message'] = "Un ou plusieurs champs sont vides. Veuillez recommencer.";
        if ($_SESSION['role'] == 1) {
            header("Location: ../portals/administrator.php?data");
        } else if ($_SESSION['role'] == 2) {
            header("Location: ../portals/accountant.php?data");
        } else {
            header("Location: ../portals/visitor.php?data");
        }
    } else {
        $result = update_data($user);

        if (!$result) {
            $_SESSION['http_status'] = 200;
            $_SESSION['message'] = "Vos données ont été modifiées.";
            if ($_SESSION['role'] == 1) {
                header("Location: ../portals/administrator.php");
            } else if ($_SESSION['role'] == 2) {
                header("Location: ../portals/accountant.php");
            } else {
                header("Location: ../portals/visitor.php");
            }
        } else {
            $_SESSION['http_status'] = 400;
            $_SESSION['message'] = "Un problème est survenu. Veuillez recommencer.";
            if ($_SESSION['role'] == 1) {
                header("Location: ../portals/administrator.php?data");
            } else if ($_SESSION['role'] == 2) {
                header("Location: ../portals/accountant.php?data");
            } else {
                header("Location: ../portals/visitor.php?data");
            }
        }
    }
}

require("../../views/functionalities/UpdateData.php");