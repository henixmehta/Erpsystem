
        function validateFields() {
            var email_check = document.getElementById('email').value;
            var com_email_check = document.getElementById('c_email').value;
            var phone_check = document.getElementById('phone').value;
            var alt_phone_check = document.getElementById('alt_phone').value;

            // AJAX request to check email, company email, phone, and alternative phone on the server
            $.ajax({
                type: 'POST',
                url: 'employee.php',
                data: {
                    email: email_check,
                    c_email: com_email_check,
                    phone: phone_check,
                    alt_phone: alt_phone_check
                },
                success: function(response) {
                    if (response === "exists_email") {
                        alert("Email already registered. Please choose a different email.");
                    } else if (response === "exists_phone") {
                        alert("Phone number already registered. Please choose a different phone number.");
                    } else {
                        alert("Emails and Phone numbers are valid. Proceed with the form submission.");
                        // You can submit the form or perform additional actions here
                    }
                },
                error: function() {
                    alert("An error occurred during validation.");
                }
            });
        }
    
