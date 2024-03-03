<?php
function get_users_data()
{
  try {
    $sql = "SELECT u.*, kc.*, r.* FROM users u LEFT JOIN kilometer_costs kc ON u.kilometer_costs_id = kc.kilometer_cost_id INNER JOIN role r ON u.role_id = r.role_id";
    $request = dbConnection()->prepare($sql);
    $request->execute();
    $data = $request->fetchAll(PDO::FETCH_ASSOC);
    return $data;
  } catch (Exception $e) {
    $error = "Erreur : " . $e->getMessage();
    return $error;
  }
}

function get_user_data()
{
  try {
    $sql = "SELECT u.*, kc.*, r.* FROM users u LEFT JOIN kilometer_costs kc ON u.kilometer_costs_id = kc.kilometer_cost_id INNER JOIN role r ON u.role_id = r.role_id where user_id = ?";
    $request = dbConnection()->prepare($sql);
    $request->bindParam(1, $_GET["id"], PDO::PARAM_INT);
    $request->execute();
    $data = $request->fetch(PDO::FETCH_ASSOC);
    return $data;
  } catch (Exception $e) {
    $error = "Erreur : " . $e->getMessage();
    return $error;
  }
}

function insert_user_data($user)
{
  try {
    $sql = 'INSERT INTO users (kilometer_costs_id, role_id, first_name, last_name, email, password, status) VALUES (:kci, :ri, :fn, :ln, :e, :p, :s)';
    $request = dbConnection()->prepare($sql);
    $request->execute($user);
  } catch (Exception $e) {
    $error = "Erreur : " . $e->getMessage();
    return $error;
  }
}

function update_user_data($user)
{
  try {
    $sql = 'UPDATE users SET kilometer_costs_id=:kci, role_id=:ri, first_name=:fn, last_name=:ln, email=:e WHERE user_id=:id';
    $request = dbConnection()->prepare($sql);
    $request->bindParam(':kci', $user[':kci']);
    $request->bindParam(':ri', $user[':ri']);
    $request->bindParam(':fn', $user[':fn']);
    $request->bindParam(':ln', $user[':ln']);
    $request->bindParam(':e', $user[':e']);
    $request->bindParam(':id', $_GET["updateid"]);
    $request->execute();
  } catch (Exception $e) {
    $error = "Erreur : " . $e->getMessage();
    return $error;
  }
}

function deactivate_user()
{
  try {
    $sql = "UPDATE users SET status = 0 WHERE user_id=?";
    $request = dbConnection()->prepare($sql);
    $request->bindParam(1, $_GET["deactivateid"], PDO::PARAM_INT);
    $request->execute();
  } catch (Exception $e) {
    $error = "Erreur : " . $e->getMessage();
    return $error;
  }
}

function reactivate_user()
{
  try {
    $sql = "UPDATE users SET status = 1 WHERE user_id=?";
    $request = dbConnection()->prepare($sql);
    $request->bindParam(1, $_GET["reactivateid"], PDO::PARAM_INT);
    $request->execute();
  } catch (Exception $e) {
    $error = "Erreur : " . $e->getMessage();
    return $error;
  }
}
