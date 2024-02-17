<?php

session_start();

if (!$_SESSION) {
    header("Location: authentication/login.php");
} else {
    if ($_SESSION['status'] == 1) {
        if ($_SESSION['role'] == 1) {
            $_SESSION['http_status'] = 200;
            $_SESSION['message'] = "Connecté en tant que " . $_SESSION['first_name'] . " " . $_SESSION['last_name'] . " (Administrateur)";
            header("Location: portals/administrator.php");
            exit();
        } elseif ($_SESSION['role'] == 2) {
            $_SESSION['http_status'] = 200;
            $_SESSION['message'] = "Connecté en tant que " . $_SESSION['first_name'] . " " . $_SESSION['last_name'] . " (Comptable)";
            header("Location: portals/accountant.php");
            exit();
        } elseif ($_SESSION['role'] == 3) {
            $_SESSION['http_status'] = 200;
            $_SESSION['message'] = "Connecté en tant que " . $_SESSION['first_name'] . " " . $_SESSION['last_name'] . " (Visiteur médical)";
            header("Location: portals/visitor.php");
            exit();
        }
    } else {
        $_SESSION['http_status'] = 400;
        $_SESSION['message'] = "Votre compte a été bloqué. Veuillez contacter un administrateur.";
        header("Location: authentication/login.php");
        exit();
    }
}