<?php

function get_kilometer_costs_data()
{
    try {
        $sql = "SELECT * FROM kilometer_costs";
        $request = dbConnection()->prepare($sql);
        $request->execute();
        $data = $request->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    } catch (Exception $e) {
        $error = "Erreur : " . $e->getMessage();
        return $error;
    }
}

function get_kilometer_cost_data()
{
    try {
        $sql = "SELECT * FROM kilometer_costs kc WHERE kc.kilometer_cost_id = ?";
        $request = dbConnection()->prepare($sql);
        $request->bindParam(1, $_SESSION["horsepower"], PDO::PARAM_INT);
        $request->execute();
        $data = $request->fetch(PDO::FETCH_ASSOC);
        return $data;
    } catch (Exception $e) {
        $error = "Erreur : " . $e->getMessage();
        return $error;
    }
}

function update_kilometer_costs_data($h, $c)
{
    try {
        $sql = 'UPDATE kilometer_costs SET horsepower = :h, cost = :c WHERE kilometer_cost_id = :id';
        $request = dbConnection()->prepare($sql);

        for ($i = 0; $i < count($h); $i++) {
            $horsepower = $h[$i];
            $cost = $c[$i];
            $id = $i + 1;

            $request->bindParam(':h', $horsepower);
            $request->bindParam(':c', $cost);
            $request->bindParam(':id', $id);

            $request->execute();
        }
    } catch (Exception $e) {
        $error = "Erreur : " . $e->getMessage();
        return $error;
    }
}