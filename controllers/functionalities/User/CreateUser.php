<?php

session_start();
require('../../../assets/tools.php');
require('../../../models/db.php');
require('../../../models/functionalities/ManageUser.php');

if (isset($_POST['submit'])) {
    $user = [':ri' => $_POST['role'], ':fn' => $_POST['first_name'], ':ln' => $_POST['last_name'], ':e' => $_POST['email'], 's' => 1];

    if ((count($user) != 5) || empty($_POST['password']) || empty($_POST['password_match'])) {
        $_SESSION['http_status'] = 400;
        $_SESSION['message'] = "Un ou plusieurs champs sont vides. Veuillez recommencer.";
        header('Location: CreateUser.php');
    } elseif ($_POST['password'] != $_POST['password_match']) {
        $_SESSION['http_status'] = 400;
        $_SESSION['message'] = "Les mots de passe ne correspondent pas. Veuillez recommencer.";
        header('Location: CreateUser.php');
    } else {
        $hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $user[':p'] = $hash;

        if (!$_POST['horsepower']) {
            $user['kci'] = NULL;
        } else {
            if ($_POST['horsepower'] < 3) {
                $user['kci'] = 3;
            } else if ($_POST['horsepower'] > 7) {
                $user['kci'] = 7;
            } else {
                $user['kci'] = $_POST['horsepower'];
            }
        }

        $result = insert_user_data($user);

        if (!$result) {
            $_SESSION['http_status'] = 200;
            $_SESSION['message'] = "L'utilisateur a été inscrit.";
            header('Location: ../../portals/administrator.php');
        } else {
            $_SESSION['http_status'] = 400;
            $_SESSION['message'] = "Un problème est survenu. Veuillez recommencer.";
            header('Location: CreateUser.php');
        }
    }
}

require("../../../views/functionalities/user/CreateUser.php");
