<?php
function login()
{
  try {
    $sql = "SELECT * FROM users WHERE email = ?";
    $request = dbConnection()->prepare($sql);
    $request->bindParam(1, $_POST["email"], PDO::PARAM_STR);
    $request->execute();
    $data = $request->fetch(PDO::FETCH_ASSOC);
    return $data;
  } catch (Exception $e) {
    $error = "Erreur : " . $e->getMessage();
    return $error;
  }
}
