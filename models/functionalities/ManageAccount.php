<?php

function get_account_data($id)
{
  try {
    $sql = "SELECT * FROM users u where u.user_id = ?";
    $request = dbConnection()->prepare($sql);
    $request->bindParam(1, $id, PDO::PARAM_INT);
    $request->execute();
    $data = $request->fetch(PDO::FETCH_ASSOC);
    return $data;
  } catch (Exception $e) {
    $error = "Erreur : " . $e->getMessage();
    return $error;
  }
}

function update_account_data($user, $id)
{
  try {
    $sql = "UPDATE users SET first_name=:fn, last_name=:ln, email=:e WHERE user_id=:id";
    $request = dbConnection()->prepare($sql);
    $request->bindParam(":fn", $user[":fn"]);
    $request->bindParam(":ln", $user[":ln"]);
    $request->bindParam(":e", $user[":e"]);
    $request->bindParam(":id", $id);
    $request->execute();
  } catch (Exception $e) {
    $error = "Erreur : " . $e->getMessage();
    return $error;
  }
}
