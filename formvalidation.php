<?php

function validateEmailWithDomain($email, $requiredDomain) {
    // Remove illegal characters from email
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);

    // Validate email using filter_var
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Extract the domain from the email address
        list($username, $domain) = explode('@', $email);

        // Check if the domain matches the required domain
        if ($domain === $requiredDomain) {
            return true; // Valid email with the correct domain
        }
    }

    return false; // Invalid email or incorrect domain
}

$e_fname = $e_lname = $e_add1 = $e_email = $e_mobno = $e_altconno = $e_pno = $e_uname = $e_pass = $e_rpass = "";

// Function to clear error messages if the field is not empty
// Function to clear error messages if the field is not empty
function clearError($field, &$error) {
    if (!empty($_POST[$field])) {
        $error = "";
    } else {
        // Set the error to an empty string if the field is empty
        $error = "";
    }
}

if (isset($_POST['sub_btn'])) {
    // Validate First Name
    if (empty($_POST['fname'])) {
        $e_fname = "<ul><li>Enter First Name</li></ul>";
    } else {
        clearError('fname', $e_fname);
    }

    // Validate Last Name
    if (empty($_POST['lname'])) {
        $e_lname = "Enter Last Name";
    } else {
        clearError('lname', $e_lname);
    }

    // Validate Address 1
    if (empty($_POST['add1'])) {
        $e_add1 = "Enter Address";
    } else {
        clearError('add1', $e_add1);
    }

    // Validate Email
    if (empty($_POST['email'])) {
        $e_email = "Enter Email";
    } else {
        $emailToValidate = $_POST['email'];
        $requiredDomain = "gmail.com";

        if (!validateEmailWithDomain($emailToValidate, $requiredDomain)) {
            $e_email = "Invalid email or doesn't have the required domain";
        } else {
            clearError('email', $e_email);
        }
    }

    // Validate Mobile Number
    if (empty($_POST['mobno'])) {
        $e_mobno = "Enter Mobile Number";
    } else {
        clearError('mobno', $e_mobno);
        // Additional validation for mobile number if needed
    }

    // Validate Alternate Contact
    if (empty($_POST['altconno'])) {
        $e_altconno = "Enter Alternate Contact";
    } else {
        clearError('altconno', $e_altconno);
        // Additional validation for alternate contact if needed
    }

    // Validate Pin Code
    if (empty($_POST['pno'])) {
        $e_pno = "Enter Pin Code";
    } else {
        clearError('pno', $e_pno);
        // Additional validation for pin code if needed
    }

    // Validate User Name
    if (empty($_POST['uname'])) {
        $e_uname = "Enter User Name";
    } else {
        clearError('uname', $e_uname);
        // Additional validation for user name if needed
    }

    // Validate Password
    if (empty($_POST['pass'])) {
        $e_pass = "Enter Password";
    } else {
        clearError('pass', $e_pass);
        // Additional validation for password if needed
    }

    // Validate Repeat Password
    if (empty($_POST['rpass'])) {
        $e_rpass = "Enter Repeat Password";
    } else {
        clearError('rpass', $e_rpass);
        // Additional validation for repeat password if needed
    }

    // Additional validations can be added as needed

    // If there are no errors, you can process the form data
    // For example, you might insert data into a database
}
?>
