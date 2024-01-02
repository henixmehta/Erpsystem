<?php
$e_fname = $e_lname = $e_add1 = $e_email = $e_mobno = $e_altconno = $e_pno = $e_uname = $e_pass = $e_rpass = "";

if (isset($_POST['sub_btn'])) {
    // Validate First Name
    if (empty($_POST['fname'])) {
        $e_fname .= "<ul><li>Enter First Name</li></ul>";
    }

    // Validate Last Name
    if (empty($_POST['lname'])) {
        $e_lname .= "Enter Last Name";
    }

    // Validate Address 1
    if (empty($_POST['add1'])) {
        $e_add1 .= "Enter Address";
    }

    // Validate Email
    if (empty($_POST['email'])) {
        $e_email .= "Enter Email";
    } else {
        $emailToValidate = $_POST['email'];
        $requiredDomain = "gmail.com";

        if (!validateEmailWithDomain($emailToValidate, $requiredDomain)) {
            $e_email .= "Invalid email or doesn't have the required domain";
        }
    }

    // Validate Mobile Number
    if (empty($_POST['mobno'])) {
        $e_mobno .= "Enter Mobile Number";
    } else {
        // Additional validation for mobile number if needed
    }

    // Validate Alternate Contact
    if (empty($_POST['altconno'])) {
        $e_altconno .= "Enter Alternate Contact";
    } else {
        // Additional validation for alternate contact if needed
    }

    // Validate Pin Code
    if (empty($_POST['pno'])) {
        $e_pno .= "Enter Pin Code";
    } else {
        // Additional validation for pin code if needed
    }

    // Validate User Name
    if (empty($_POST['uname'])) {
        $e_uname .= "Enter User Name";
    } else {
        // Additional validation for user name if needed
    }

    // Validate Password
    if (empty($_POST['pass'])) {
        $e_pass .= "Enter Password";
    } else {
        // Additional validation for password if needed
    }

    // Validate Repeat Password
    if (empty($_POST['rpass'])) {
        $e_rpass .= "Enter Repeat Password";
    } else {
        // Additional validation for repeat password if needed
    }

    // Additional validations can be added as needed

    // If there are no errors, you can process the form data
    // For example, you might insert data into a database
}
?>
