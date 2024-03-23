<?php
include '../sidebar/sidebar.php';
include '../connection/connection.php';

// Check if the holiday ID is provided
if (isset($_GET['id'])) {
    $leave_id = $_GET['id'];

    // Retrieve existing holiday information for editing
    $query = "SELECT * FROM leaves WHERE id='$leave_id'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $leaves_data = mysqli_fetch_assoc($result);
    } else {
        header("Location: leave-display.php");
        exit();
    }
} else {
    header("Location: leave-display.php");
    exit();
}

// Handle the form submission
if (isset($_POST['sub_btn1'])) {
    // $emp_id = $_SESSION['user_id']; 
    $emp_name = $_POST['emp_name'];

       $s_date = $_POST['s_date'];
        $e_date = $_POST['e_date'];
        $l_type = $_POST['l_type'];
        $reason = $_POST['reason'];
        $status = $_POST['status'];

    // Update existing holiday
    $q = "UPDATE leaves SET emp_name='$emp_name', s_date='$s_date', e_date='$e_date', leave_type='$l_type', reason='$reason', status='$status' WHERE id='$leave_id'";

    $update = mysqli_query($conn, $q);

    if ($update) {
        echo '<script type="text/javascript">window.location.href="leave-display.php";</script>';
    } else {
        echo "Update failed: " . mysqli_error($conn);
    }
}
?>

<html>

<head>
   <title>Leaves</title>
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
                                        Leaves
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
                                                                echo "<option>".$row['e_fname']."</option>";
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
                                                <input type="date" class="form-control" name="s_date" id="sdate" value="<?php echo $leaves_data['s_date'];?>" placeholder="Enter your Start date" required>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label class="form-label" for="edate">
                                                    End date:
                                                </label>
                                                <input type="date" class="form-control" name="e_date" id="edate" value="<?php echo $leaves_data['e_date'];?>" placeholder="Enter your End date" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">
                                                    Types:
                                                </label>
                                                <select class="selectpicker form-control" name="l_type" value="<?php echo $leaves_data['leave_type'];?>" data-style="py-0" required>
                                                    <option value="fullday">fullday</option>
                                                    <option value="halfday">halfday</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label class="form-label" for="dric">
                                                    Latter:
                                                </label>
                                                <input type="textarea" class="form-control" id="reason" name="reason" value="<?php echo $leaves_data['reason'];?>" placeholder="reason" required>
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
                                        <input type="submit" value="Update" class="btn btn-primary" name="sub_btn1">
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
