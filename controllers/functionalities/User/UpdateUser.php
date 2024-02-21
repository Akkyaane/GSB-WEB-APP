
<?php 

session_start();
require('../../../assets/tools.php');
require('../../../models/db.php');
require('../../../models/functionalities/ManageUser.php');

$data = get_user_data();

if (isset($_GET['updateid'])) {
    $user = [':ri' => intval($_POST['role']), ':fn' => $_POST['first_name'], ':ln' => $_POST['last_name'], ':e' => $_POST['email']];

    if (!$_POST['horsepower']) {
        $user[':kci'] = NULL;
    } else {
        if ($_POST['horsepower'] < 3) {
            $user[':kci'] = 3;
        } else if ($_POST['horsepower'] > 7) {
            $user[':kci'] = 7;
        } else {
            $user[':kci'] = $_POST['horsepower'];
        }
    }

    if ((count($user) != 5)) {
        $_SESSION['http_status'] = 400;
        $_SESSION['message'] = "Un ou plusieurs champs sont vides. Veuillez recommencer.";
        header("Location: ../../portals/administrator.php?manageUser&id=" . $_GET["updateid"]);
    } else {
        $result = update_user_data($user);

        if (!$result) {
            $_SESSION['http_status'] = 200;
            $_SESSION['message'] = "Les données de l'utilisateur ont été modifiées.";
            header('Location: ../../portals/administrator.php');
        } else {
            $_SESSION['http_status'] = 400;
            $_SESSION['message'] = "Un problème est survenu. Veuillez recommencer.";
            header("Location: ../../portals/administrator.php?manageUser&id=" . $_GET["updateid"]);
        }
    }
}

require("../../../views/functionalities/User/UpdateUser.php");