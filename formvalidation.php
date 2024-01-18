<?php
    // Initialize error variables
    $e_fname = $e_lname = $e_email = $e_pass = $e_rpass = "";

    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // Validate first name
        if (empty($_POST["fname"])) {
            $e_fname = "First name is required";
        } else {
            $fname = test_input($_POST["fname"]);
        }

        // Validate last name
        if (empty($_POST["lname"])) {
            $e_lname = "Last name is required";
        } else {
            $lname = test_input($_POST["lname"]);
        }

        // Validate email
        if (empty($_POST["email"])) {
            $e_email = "Email is required";
        } else {
            $email = test_input($_POST["email"]);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $e_email = "Invalid email format";
            }
        }

        // Validate password
        if (empty($_POST["pass"])) {
            $e_pass = "Password is required";
        } else {
            $pass = test_input($_POST["pass"]);
        }

        // Validate repeat password
        if (empty($_POST["rpass"])) {
            $e_rpass = "Repeat Password is required";
        } else {
            $rpass = test_input($_POST["rpass"]);
            if ($pass != $rpass) {
                $e_rpass = "Passwords do not match";
            }
        }

        // Other form fields validation can be added here

    }

    // Function to clean input data
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>