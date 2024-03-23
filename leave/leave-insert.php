<?php 
   include '../sidebar/sidebar.php';
   include '../connection/connection.php';
?>
<?php  
    if(isset($_POST['sub_btn1']))
    {
        // $emp_id = $_SESSION['user_id'];    
        //  $emp_id = $_SESSION['user_id']; 

       $emp_name = $_POST['emp_name'];
       $s_date = $_POST['s_date'];
        $e_date = $_POST['e_date'];
        $l_type = $_POST['l_type'];
        $reason = $_POST['reason'];
        $status = $_POST['status'];
 
        $q = "INSERT INTO leaves( emp_name ,   s_date,    e_date,    leave_type, reason , status) 
                          VALUES ('$emp_name', '$s_date', '$e_date', '$l_type', '$reason', '$status')";

        $insert = mysqli_query($conn, $q);

        echo '<script type="text/javascript">window.location.href="leave-display.php";</script>';
    }
?>
<html>  
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>leaves</title>
        <link rel="stylesheet" href="../css/main.min.css">
        <script src="../js/jquery/3.7.1.min.js" type="text/javascript"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    </head>  
    <body>
        <main class="main-content">
            <div class="iq-navbar-header">
            </div>
            <div class="conatiner-fluid content-inner mt-n5 py-0">
                <div class="row">
                    <div class="col-xl-12 col-lg-8">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <div class="header-title">
                                    <h3 class="card-title">
                                       Leaves page
                                    </h3>
                                <hr>
                                </div>
                                <a href="leave-display.php"><button class="btn btn-primary" style="margin:10 10 10 10 "> back</button></a>

                            </div>
                            <div class="card-body">
                                <div class="new-employee-info">
                                    <form method="POST" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <div class="profile-img-edit position-relative">
                                            </div>
                                        </div>
                                        <div class="row">
                                             <div class="form-group">
                                                <label class="form-label">Employee Name:</label>
                                                <select class="selectpicker form-control" name="emp_name" data-style="py-0" required>
                                                    
                                                    <?php
                                                    // Assuming $conn is your database connection object
                                                    $query = "SELECT e_fname, e_status FROM employee";
                                                    $result = mysqli_query($conn, $query);
                                                    if(mysqli_num_rows($result) > 0) {
                                                        while($row = mysqli_fetch_assoc($result)) {
                                                            if($row['e_status'] == "active" || $row['e_status'] == "Active") {
                                                                echo "<option>".$row['e_fname'] ."</option>";
                                                            }
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label class="form-label" for="sdate">
                                                    Start date:
                                                </label>
                                                <input type="date" class="form-control" name="s_date" id="sdate" placeholder="Enter your Start date" required>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label class="form-label" for="edate">
                                                    End date:
                                                </label>
                                                <input type="date" class="form-control" name="e_date" id="edate" placeholder="Enter your End date" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">
                                                    Types:
                                                </label>
                                                <select class="selectpicker form-control" name="l_type" data-style="py-0" required>
                                                    <option value="fullday">fullday</option>
                                                    <option value="halfday">halfday</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label class="form-label" for="dric">
                                                    Reason:
                                                </label>
                                                <input type="textarea" class="form-control" id="reason" name="reason" placeholder="reason" required>
                                            </div>
                                            <legend>
                                                Status:
                                            </legend>
                                            <div class="form-check">
                                                <input type="radio" name="status" class="form-check-input" value="active" id="Active" checked>
                                                <label class="form-check-label" for="Active">
                                                    Active
                                                </label>
                                            </div>
                                            <div class="mb-3 form-check">
                                                <input type="radio" name="status"  class="form-check-input" value="inactive" id="Inactive" >
                                                <label class="form-check-label" for="Inactive">
                                                    Inactive
                                                </label>
                                            </div>
                                        </div>
                                        <input type="submit" value="submit" class="btn btn-primary" name="sub_btn1">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </body>
</html>       