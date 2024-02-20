<?php
function get_users_data() {
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

// /* Create User */
// session_start();
// include "../../db/db.php";

// if (!$dbConnect) {
//     echo "Connexion échouée.";
//     echo "<br><button><a href="../../../views/authentication/signup/signup.php">Retour</a></button>";
// } else {
//     if (isset($_POST["submit"])) {
//         $user = [":fn" => $_POST["first_name"], ":ln" => $_POST["last_name"], ":e" => $_POST["email"], ":r" => $_POST["role"], ":h" => $_POST["horsepower"]];
//         if ((count($user) != 5) || empty($_POST["password"]) || empty($_POST["password_match"])) {
//             echo "Un ou plusieurs champs sont vides. Veuillez recommencer.";
//             echo "<br><button><a href="../../../views/authentication/signup/signup.php">Retour</a></button>";
//         } elseif ($_POST["password"] != $_POST["password_match"]) {
//             echo "Les mots de passe ne correspondent pas. Veuillez recommencer.";
//             echo "<br><button><a href="../../../views/authentication/signup/signup.php">Retour</a></button>";
//         } else {
//             $hash = password_hash($_POST["password"], PASSWORD_DEFAULT);
//             $user[":p"] = $hash;
//             $dbConnect->exec("SET FOREIGN_KEY_CHECKS = 0");
//             $sql = "INSERT INTO users (first_name, last_name, email, password, role, horsepower) VALUES (:fn, :ln, :e, :p, :r, :h)";
//             $request = $dbConnect->prepare($sql);
//             $request->execute($user);
//             $dbConnect->exec("SET FOREIGN_KEY_CHECKS = 1");
//             echo "L"utilisateur a été inscrit.";
//         }
//     } else {
//         echo "Un problème est survenu. Veuillez recommencer.";
//         echo "<br><button><a href="../../../views/authentication/signup/signup.php">Retour</a></button>";
//     }
// }

// /* Deactivate User */
// session_start();

// include "../../db/db.php";

//     $sql = "SELECT * FROM users WHERE id=?";
//     $request = $dbConnect->prepare($sql);
//     $request->bindParam(1, $_GET["updateid"], PDO::PARAM_INT);
//     $request->execute();
//     $data = $request->fetch(PDO::FETCH_ASSOC);
    
//     if($data){
//         $sql = "UPDATE users SET status = 0 WHERE id=?";
//         $request = $dbConnect->prepare($sql);
//         $request->bindParam(1, $_GET["updateid"], PDO::PARAM_INT);
//         $request->execute();
//         echo "Le compte a été bloqué.";
//         echo "<br><br><button><a href="../../../views/administrator/ad-home/ad-home.php">Retour</a></button>";
//     } else {
//         echo "Le compte est déjà désactivé.";
//         echo "<br><br><button><a href="../../../views/administrator/ad-home/ad-home.php">Retour</a></button>";
//     } 


// /* Manage User Data */
// session_start();
// $id = $_GET["updateid"];
// include "../../db/db.php";
// if (isset($_POST["edit_submit"])) {
//     $user = [];
//     $user = [":fn" => $_POST["first_name"], ":ln" => $_POST["last_name"], ":e" => $_POST["email"], ":r" => $_POST["role"], ":h" => $_POST["horsepower"]];

//     if (empty($user[":fn"]) || empty($user[":ln"]) || empty($user[":e"]) || empty($user[":r"]) || empty($user[":h"])) {
//         echo "Un des champs est vide.";
//         echo "<br><button><a href="../../../views/administrator/ad-functionalities/ad-UsersArray/ad-ManagePersonnalDataUser.php?updateid=$id">Retour</a></button>";
//     } else {
//         $sql = "UPDATE users SET first_name=:fn, last_name=:ln, email=:e, role=:r, horsepower=:h WHERE id=:id";
//         $result = $dbConnect->prepare($sql);
//         $result->bindParam(":fn", $user[":fn"]);
//         $result->bindParam(":ln", $user[":ln"]);
//         $result->bindParam(":e", $user[":e"]);
//         $result->bindParam(":r", $user[":r"]);
//         $result->bindParam(":h", $user[":h"]);
//         $result->bindParam(":id", $id, PDO::PARAM_INT);
//         $result->execute();
//         echo "Les données de l"utilisateur ont été modifiées.";
//         echo "<br><br><button><a href="../../../views/administrator/ad-home/ad-home.php">Retour</a></button>";
//     }
// } else {
//     echo "Un problème est survenu. Veuillez recommencer.";
//     echo "<br><button><a href="../../../views/administrator/ad-functionalities/ad-UsersArray/ad-ManagePersonnalDataUser.php?updateid=$id">Retour</a></button>";
// }





// /* Reactivate User */
// session_start();

// include "../../db/db.php";

//     $sql = "SELECT * FROM users WHERE id=?";
//     $request = $dbConnect->prepare($sql);
//     $request->bindParam(1, $_GET["updateid"], PDO::PARAM_INT);
//     $request->execute();
//     $data = $request->fetch(PDO::FETCH_ASSOC);
    
//     if($data){
//         $sql = "UPDATE users SET status = 1 WHERE id=?";
//         $request = $dbConnect->prepare($sql);
//         $request->bindParam(1, $_GET["updateid"], PDO::PARAM_INT);
//         $request->execute();
//         echo "Le compte a été réactivé.";
//         echo "<br><br><button><a href="../../../views/administrator/ad-home/ad-home.php">Retour</a></button>";
//     } else {
//         echo "Le compte a déjà été réactivé.";
//         echo "<br><br><button><a href="../../../views/administrator/ad-home/ad-home.php">Retour</a></button>";
//     } 