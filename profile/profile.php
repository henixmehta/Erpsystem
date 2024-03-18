<?php

include '../sidebar/sidebar.php';
include '../connection/connection.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="../css/main.min.css"> -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script src="../js/location/location.js"></script>
    <script>
        // Make sure to load the initial values
        $(document).ready(function() {
            loadCountry();
            loadState(<?php echo $row['country_id']; ?>);
            loadCity(<?php echo $row['state_id']; ?>);
        });
    </script>


    <title>Profile</title>
    <style>
        .error {
            color: red;
        }
    </style>

    <script>
        function validateEmails() {
            var email_check = document.getElementById('email').value;
            var e_com_email_check = document.getElementById('c_email').value;

            // AJAX request to check if the email exists on the server
            $.ajax({
                type: 'POST',
                url: '../employee/employee.php',
                data: {
                    email: email_check,
                    c_email: e_com_email_check
                },
                success: function(response) {
                    if (response === "exists") {
                        alert("Email already registered. Please choose a different email.");
                    } else {
                        alert("Emails are valid. Proceed with the form submission.");
                        // You can submit the form or perform additional actions here
                    }
                },
                error: function() {}
            });

        }
    </script>
    <?php
    $pid = $_GET['id'];


    if (isset($_GET['id'])) {
        $qry = "select * from employee where id='" . $pid . "'";
        $data = mysqli_query($conn, $qry);

        if ($data) {
            $row = mysqli_fetch_array($data);
        } else {
            echo "Error in fetching data from the database: " . mysqli_error($conn);
            // handle the database query error
        }
    } else {
        echo "ID not set in the URL";
        // handle the case where ID is not set
    }



    if (isset($_POST['sub_btn_update'])) {
        // Update text fields in the database



        $q = "UPDATE employee SET  
                      e_mob='" . $_POST['mono'] . "', e_alt_mob='" . $_POST['alte_mono'] . "', e_email='" . $_POST['email'] . "',  
                      e_pwd='" . $_POST['c_pass'] . "' 
                      WHERE id='" . $pid . "'";
        mysqli_query($conn, $q);


        // header("location: employee-list.php");
        echo '<script type="text/javascript">window.location.href="../dashboard/dashboard.php";</script>';

        exit();
    }

    ?>

<body>
    <main class="main-content">

        <div class="conatiner-fluid content-inner mt-n5 py-0">
            <div class="row">
                <div class="col-xl-12 col-lg-8">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">Employee Profile</h4>
                            </div>
                            <a href="../dashboard/dashboard.php"><button class="btn btn-primary" style="margin:10 10 10 10 "> back</button></a>

                        </div>
                        <div class="card-body">
                            <div class="new-employee-info">
                                <form method="POST" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <div class="profile-img-edit position-relative">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <h4>
                                            <label class="form-label" for="fname">First Name:</label>
                                                <?php echo $row['e_fname']; ?>
                                                <?php echo $row['e_lname']; ?>
                                            </h4>
                                        </div>

                                        
                                        <div class="form-group">
                                            <h4>
                                                <label class="form-label">Team Name:</label>
                                                <?php
                                                echo $row_id['e_team_name'];
                                                ?>
                                            </h4>
                                        </div>
                                        <div class="form-group">
                                            <h4>
                                            <label class="form-label">Salary:</label>
                                                <?php
                                                echo $row_id['e_salary'];
                                                ?>
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-8">
                                        <label class="form-label" for="mobno">Mobile Number:</label>
                                        <input type="text" class="form-control" id="mobno" name="mono" placeholder="Mobile Number" pattern="^\d{10}$" title="Please enter a 10-digit mobile number " value=<?php echo $row['e_mob']; ?> required>
                                    </div>
                                    <div class="form-group col-md-8">
                                        <label class="form-label" for="altconno">Alternate Contact:</label>
                                        <input type="text" class="form-control" id="altconno" name="alte_mono" placeholder="Alternate Contact" pattern="^\d{10}$" title="Please enter a 10-digit mobile number " value=<?php echo $row['e_alt_mob']; ?> required>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="form-label" for="email"> Email:</label>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" value=<?php echo $row['e_email']; ?> required>
                                    </div>
                                    <hr>
                                    <h2 class="mb-3">Security</h2>
                                    <hr>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label class="form-label" for="c_email">Employee Company Email:</label>
                                            <b>
                                                <?php echo   $row['e_com_email']; ?>
                                            </b>
                                        </div>
                                        <div class="form-group ">
                                            <label class="form-label" for="pass">Password: <?php
                                                                                            echo $row_id['e_pwd'];
                                                                                            ?></label>
                                            <input type="password" class="form-control" id="pass" name="c_pass" placeholder="Employe Compney Password" value="<?php echo isset($row['e_pwd']) ? $row['e_pwd'] : ''; ?>" required>
                                        </div>
                                    </div>
                                    <input type="submit" value="Update" class="btn btn-primary" onclick="validateEmails()" name="sub_btn_update">
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </main>
    </div>

</body>

</html>