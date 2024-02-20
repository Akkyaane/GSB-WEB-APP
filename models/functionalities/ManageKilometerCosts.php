<?php

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

function read_kilometer_costs_data()
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

// if (isset($_POST["submit"])) {
//     $horsepowers = $_POST["horsepower"];
//     $costs = $_POST["cost"];
//     $id = 0;
//     if (count($horsepowers) === count($costs)) {
//         $count = count($horsepowers);
//         for ($i = 0; $i < $count; $i++) {
//             $h = $horsepowers[$i];
//             $c = $costs[$i];
//             $id++;
//             $sql = "UPDATE kilometercosts SET horsepower = :h, cost = :c WHERE id = :id";
//             $result = $dbConnect->prepare($sql);
//             $result->bindParam(":h", $h);
//             $result->bindParam(":c", $c);
//             $result->bindParam(":id", $id);
//             $result->execute();
//         }
//         echo "Le tableau a été modifié.";
//         echo "<br><br><button><a href="../../../views/administrator/ad-home/ad-home.php">Retour</a></button>";
//     } else {
//         echo "Un des champs est vide.";
//         echo "<br><button><a href="../../../views/administrator/ad-functionalities/ad-KilometerCostsArray/ad-UpdateKilometerCostsArray.php">Retour</a></button>";
//     }
// } else {
//     echo "Un problème est survenu. Veuillez recommencer.";
//     echo "<br><button><a href="../../../views/administrator/ad-functionalities/ad-KilometerCostsArray/ad-UpdateKilometerCostsArray.php">Retour</a></button>";
// }