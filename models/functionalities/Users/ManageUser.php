<?php
function get_users_data() {
    try {
        $sql = 'SELECT u.*, kc.*, r.* FROM users u LEFT JOIN kilometer_costs kc ON u.kilometer_costs_id = kc.kilometer_cost_id INNER JOIN role r ON u.role_id = r.role_id';
        $request = dbConnection()->prepare($sql);
        $request->execute();
        $data = $request->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    } catch (Exception $e) {
        $error = 'Erreur : ' . $e->getMessage();
        return $error;
    }
}