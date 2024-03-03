<?php

session_start();
require("../../assets/tools.php");
require("../../models/db.php");
require("../../models/authentication/login.php");

if (isset($_POST['submit'])) {
  $data = login();

  if (empty($_POST['email']) || empty($_POST['password'])) {
    $_SESSION['http_status'] = 400;
    $_SESSION['message'] = "Un ou plusieurs champs sont vides. Veuillez recommencer.";
  } else if (!$data) {
    $_SESSION['http_status'] = 400;
    $_SESSION['message'] = "Aucun utilisateur trouvé avec cet adresse e-mail. Veuillez recommencer.";
  } else if (!password_verify($_POST['password'], $data['password'])) {
    $_SESSION['http_status'] = 400;
    $_SESSION['message'] = "Le mot de passe est incorrect. Veuillez recommencer.";
  } else {
    $_SESSION = ['id' => $data['user_id'], 'horsepower' => $data['kilometer_costs_id'], 'role' => $data['role_id'], 'first_name' => $data['first_name'], 'last_name' => $data['last_name'], 'email' => $data['email'], 'status' => $data['status']];
    header("Location: ../index.php");
  }
}

require("../../views/authentication/login.php");
