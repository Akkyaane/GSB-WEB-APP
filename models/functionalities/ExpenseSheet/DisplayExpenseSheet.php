<?php 

function display_user_expense_sheet()
{
    try {
        $sql = 'SELECT u.user_id, e.*, t.* FROM users u INNER JOIN expense_sheets e ON u.user_id = e.user_id LEFT JOIN treatment t ON e.treatment_id = t.treatment_id WHERE u.user_id = ?';
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

function display_expense_sheet() {
    try {
        $sql = 'SELECT * FROM expense_sheets where expense_sheet_id = ?';
        $request = dbConnection()->prepare($sql);
        $request->bindParam(1, $_GET['updateid'], PDO::PARAM_INT);
        $request->execute();
        $data = $request->fetch(PDO::FETCH_ASSOC);
        return $data;
    } catch (Exception $e) {
        $error = 'Erreur : ' . $e->getMessage();
        return $error;
    }
}



