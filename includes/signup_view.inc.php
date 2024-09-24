<?php

declare(strict_types=1);

function signup_inputs() {
    if (isset($_SESSION["signup_data"]["username"]) && !isset($_SESSION["error_signup"]["username_taken"])) {
        echo '<input required type="text" name="username" placeholder="Username" value="' . $_SESSION["signup_data"]["username"] .'">';
    }
    else {
        echo '<input required type="text" name="username" placeholder="Username">';
    }

    if (isset($_SESSION["signup_data"]["email"]) && !isset($_SESSION["error_signup"]["email_registered"]) && !isset($_SESSION["error_signup"]["email_invalid"])) {
        echo '<input required type="text" name="email" placeholder="Email" value="'. $_SESSION["signup_data"]["email"] .'">';
    }
    else {
        echo '<input required type="text" name="email" placeholder="Email">';
    }

    echo '<input required type="password" name="pwd" placeholder="Password">';

}

function check_signup_errors() {
    if (isset($_SESSION["error_signup"])) {
        $errors = $_SESSION["error_signup"];

        echo "<br>";

        foreach ($errors as $error) {
            echo "<p class='form-error'>" . $error . "</p>";
        }

        unset($_SESSION["error_signup"]);
    }
    else if (isset($_GET["signup"]) && $_GET["signup"] === "success") {
        echo "<br>";
        echo "<p class='form-success'>Signed up Successfully!</p>";
    }
}