<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $username = $_POST["username"];
    $pwd      = $_POST["pwd"];

    try {
        require_once "dbh.inc.php";
        require_once "login_model.inc.php";
        require_once "login_controller.inc.php";

        // ERROR HANDLERS
        $errors = [];
        
        if (is_input_empty($username, $pwd)) {
            $errors["input_empty"] = "Fill in all fields!";
        }

        $result = get_user($pdo, $username);

        if (is_username_wrong($result)) {
            $errors["wrong_username"] = "Invalid username!";
        }
        if (!is_username_wrong($result) && is_password_wrong($pwd, $result["pwd"])) {
            $errors["wrong_pwd"] = "Invalid password!";
        }
        

        // Start a Session
        require_once "config_session.inc.php";

        // Sends error messages to index.php to print out below the form
        if ($errors) {
            $_SESSION["error_signup"] = $errors;
            header("Location: ../index.php");
            die();
        }


    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

}
else {
    header("Location: ../index.php");
    die();
}