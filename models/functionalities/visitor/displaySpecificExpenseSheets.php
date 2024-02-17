<?php

function displaySpecificExpenseSheets()
{
    try {
        $sql = 'SELECT u.id, e.*, t.* FROM users u INNER JOIN expense_sheets e ON u.id = e.user_id INNER JOIN treatment t ON e.treatment_id = t.id WHERE u.id = ?';
        $request = dbConnection()->prepare($sql);
        $request->bindParam(1, $_SESSION['id'], PDO::PARAM_INT);
        $request->execute();
        $data = $request->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    } catch (Exception $e) {
        $error = 'Erreur : ' . $e->getMessage();
        return $error;
    }
}