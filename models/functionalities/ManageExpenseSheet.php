<?php

function get_expense_sheets_data()
{
    try {
        $sql = "SELECT u.*, e.*, t.* FROM users u INNER JOIN expense_sheets e ON u.user_id = e.user_id LEFT JOIN treatment t ON e.treatment_id = t.treatment_id";
        $request = dbConnection()->prepare($sql);
        $request->execute();
        $data = $request->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    } catch (Exception $e) {
        $error = "Erreur : " . $e->getMessage();
        return $error;
    }
}

function get_expense_sheet_data()
{
    try {
        $sql = "SELECT e.*, r.*, t.* FROM expense_sheets e LEFT JOIN receipts r ON e.receipts_id = r.receipts_id LEFT JOIN treatment t ON e.treatment_id = t.treatment_id WHERE e.expense_sheet_id = ?";
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

function get_user_expense_sheets_data()
{
    try {
        $sql = "SELECT u.user_id, e.*, t.* FROM users u INNER JOIN expense_sheets e ON u.user_id = e.user_id LEFT JOIN treatment t ON e.treatment_id = t.treatment_id WHERE u.user_id = ?";
        $request = dbConnection()->prepare($sql);
        $request->bindParam(1, $_SESSION["id"], PDO::PARAM_INT);
        $request->execute();
        $data = $request->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    } catch (Exception $e) {
        $error = "Erreur : " . $e->getMessage();
        return $error;
    }
}

function get_receipts_data()
{
    try {
        $sql = "SELECT e.*, r.* FROM expense_sheets e INNER JOIN receipts r ON e.receipts_id = r.receipts_id WHERE e.expense_sheet_id = ?";
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

function get_max_receipts_id_data()
{
    try {
        $sql = "SELECT MAX(receipts_id) AS max_id FROM receipts";
        $request = dbConnection()->prepare($sql);
        $request->execute();
        $data = $request->fetch(PDO::FETCH_ASSOC);
        return $data;
    } catch (Exception $e) {
        $error = "Erreur : " . $e->getMessage();
        return $error;
    }
}

function insert_expense_sheet_data($expense_sheet)
{
    try {
        $sql = "INSERT INTO expense_sheets (user_id, receipts_id, request_date, start_date, end_date, transport_category, kilometers_number, kilometer_expense, kilometer_expense_refund, kilometer_expense_unrefund, transport_expense, transport_expense_refund, transport_expense_unrefund, nights_number, accommodation_expense, accommodation_expense_refund, accommodation_expense_unrefund, food_expense, food_expense_refund, food_expense_unrefund, other_expense, other_expense_refund, other_expense_unrefund, message, total_amount, total_amount_refund, total_amount_unrefund) VALUES (:ui, :ri, :rd, :sd, :ed, :tc, :kn, :ke, :ker, :keu, :te, :ter, :teu, :nn, :ae, :aer, :aeu, :fe, :fer, :feu, :oe, :oer, :oeu, :m, :ta, :tar, :tau)";
        $request = dbConnection()->prepare($sql);
        $request->execute($expense_sheet);
    } catch (Exception $e) {
        $error = "Erreur : " . $e->getMessage();
        return $error;
    }
}

function update_expense_sheet_data($expense_sheet)
{
    try {
        $sql = "UPDATE expense_sheets SET user_id=:ui, receipts_id=:ri, request_date=:rd, start_date=:sd, end_date=:ed, transport_category=:tc, kilometers_number=:kn, kilometer_expense=:ke, kilometer_expense_refund=:ker, kilometer_expense_unrefund=:keu, transport_expense=:te, transport_expense_refund=:ter, transport_expense_unrefund=:teu, nights_number=:nn, accommodation_expense=:ae, accommodation_expense_refund=:aer, accommodation_expense_unrefund=:aeu, food_expense=:fe, food_expense_refund=:fer, food_expense_unrefund=:feu, other_expense=:oe, other_expense_refund=:oer, other_expense_unrefund=:oeu, message=:m, total_amount=:ta, total_amount_refund=:tar, total_amount_unrefund=:tau WHERE expense_sheet_id=:id";
        $request = dbConnection()->prepare($sql);
        $request->bindParam(":ui", $expense_sheet[":ui"]);
        $request->bindParam(":ri", $expense_sheet[":ri"]);
        $request->bindParam(":rd", $expense_sheet[":rd"]);
        $request->bindParam(":sd", $expense_sheet[":sd"]);
        $request->bindParam(":ed", $expense_sheet[":ed"]);
        $request->bindParam(":tc", $expense_sheet[":tc"]);
        $request->bindParam(":kn", $expense_sheet[":kn"]);
        $request->bindParam(":ke", $expense_sheet[":ke"]);
        $request->bindParam(":ker", $expense_sheet[":ker"]);
        $request->bindParam(":keu", $expense_sheet[":keu"]);
        $request->bindParam(":te", $expense_sheet[":te"]);
        $request->bindParam(":ter", $expense_sheet[":ter"]);
        $request->bindParam(":teu", $expense_sheet[":teu"]);
        $request->bindParam(":nn", $expense_sheet[":nn"]);
        $request->bindParam(":ae", $expense_sheet[":ae"]);
        $request->bindParam(":aer", $expense_sheet[":aer"]);
        $request->bindParam(":aeu", $expense_sheet[":aeu"]);
        $request->bindParam(":fe", $expense_sheet[":fe"]);
        $request->bindParam(":fer", $expense_sheet[":fer"]);
        $request->bindParam(":feu", $expense_sheet[":feu"]);
        $request->bindParam(":oe", $expense_sheet[":oe"]);
        $request->bindParam(":oer", $expense_sheet[":oer"]);
        $request->bindParam(":oeu", $expense_sheet[":oeu"]);
        $request->bindParam(":m", $expense_sheet[":m"]);
        $request->bindParam(":ta", $expense_sheet[":ta"]);
        $request->bindParam(":tar", $expense_sheet[":tar"]);
        $request->bindParam(":tau", $expense_sheet[":tau"]);
        $request->bindParam(":id", $_GET["updateid"]);
        $request->execute();
    } catch (Exception $e) {
        $error = "Erreur : " . $e->getMessage();
        return $error;
    }
}

function delete_expense_sheet_data()
{
    try {
        $sql = "DELETE FROM expense_sheets WHERE expense_sheet_id = ?";
        $request = dbConnection()->prepare($sql);
        $request->bindParam(1, $_GET["id"], PDO::PARAM_INT);
        $request->execute();
    } catch (Exception $e) {
        $error = "Erreur : " . $e->getMessage();
        return $error;
    }
}

function process_expense_sheet_data()
{
    try {
        $sql = "UPDATE expense_sheets SET treatment_id=:ti WHERE expense_sheet_id=:id";
        $request = dbConnection()->prepare($sql);
        $request->bindParam(":ti", $_GET["processid"]);
        $request->bindParam(":id", $_GET["processid"]);
        $request->execute();
    } catch (Exception $e) {
        $error = "Erreur : " . $e->getMessage();
        return $error;
    }
}

function insert_receipts_data($receipts)
{
    try {
        $sql = "INSERT INTO receipts (transport_expense_file, accommodation_expense_file, food_expense_file, other_expense_file) VALUES (:tef, :aef, :fef, :oef)";
        $request = dbConnection()->prepare($sql);
        $request->execute($receipts);
    } catch (Exception $e) {
        $error = "Erreur : " . $e->getMessage();
        return $error;
    }
}

function update_receipts_data($receipts, $receipts_id)
{
    try {
        $sql = "UPDATE receipts SET transport_expense_file=:tef, accommodation_expense_file=:aef, food_expense_file=:fef, other_expense_file=:oef WHERE receipts_id =:id";
        $request = dbConnection()->prepare($sql);
        $request->bindParam(":tef", $receipts[":tef"]);
        $request->bindParam(":aef", $receipts[":aef"]);
        $request->bindParam(":fef", $receipts[":fef"]);
        $request->bindParam(":oef", $receipts[":oef"]);
        $request->bindParam(":id", $receipts_id);
        $request->execute();
    } catch (Exception $e) {
        $error = "Erreur : " . $e->getMessage();
        return $error;
    }
}

function upload_files($target_file, $fileToUpload)
{
    try {
        $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $allowedImageTypes = array("jpg", "jpeg", "png", "webp");
        $uploadOk = false;

        if (!in_array($fileType, $allowedImageTypes) && $fileType != "pdf") {
            echo "Le fichier " . $target_file . " n'est pas dans le bon format. Seuls les formats JPG, JPEG, PNG, WEBP ou PDF sont acceptés.";
            $uploadOk = false;
        } else {
            if (move_uploaded_file($fileToUpload, $target_file)) {
                $uploadOk = true;
            } else {
                echo "Le fichier" . htmlspecialchars(basename($target_file)) . " n'a pas pu être téléchargé.";
                $uploadOk = false;
            }
        }
        return $uploadOk;
    } catch (Exception $e) {
        $error = "Erreur : " . $e->getMessage();
        return $error;
    }
}

function insert_treatment_data($treatment)
{
    try {
        $sql = "INSERT INTO treatment (treatment_id, treatment_status, remark) VALUES (:ti, :ts, :r)";
        $request = dbConnection()->prepare($sql);
        $request->execute($treatment);
    } catch (Exception $e) {
        $error = "Erreur : " . $e->getMessage();
        return $error;
    }
}