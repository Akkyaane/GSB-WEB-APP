<?php 

function display_data()
{
    try {
        $sql = 'SELECT * FROM users u where u.user_id = ?';
        $request = dbConnection()->prepare($sql);
        $request->bindParam(1, $_SESSION['id'], PDO::PARAM_INT);
        $request->execute();
        $data = $request->fetch(PDO::FETCH_ASSOC);
        return $data;
    } catch (Exception $e) {
        $error = 'Erreur : ' . $e->getMessage();
        return $error;
    }
}