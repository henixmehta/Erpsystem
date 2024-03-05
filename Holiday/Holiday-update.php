<?php
include '../sidebar/sidebar.php';
include '../connection/connection.php';

// Check if the holiday ID is provided
if (isset($_GET['id'])) {
    $holiday_id = $_GET['id'];

    // Retrieve existing holiday information for editing
    $query = "SELECT * FROM holiday WHERE id='$holiday_id'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $holiday_data = mysqli_fetch_assoc($result);
    } else {
        // Redirect to Holiday-list.php if the holiday ID is invalid
        header("Location: Holiday-list.php");
        exit();
    }
} else {
    // Redirect to Holiday-list.php if no holiday ID is provided
    header("Location: Holiday-list.php");
    exit();
}

// Handle the form submission
if (isset($_POST['sub_btn1'])) {
    $hname = $_POST['hname'];
    $s_date = $_POST['s_date'];
    $e_date = $_POST['e_date'];
    $h_type = $_POST['h_type'];
    $dric = $_POST['dric'];
    $status = $_POST['status'];

    // Update existing holiday
    $q = "UPDATE holiday SET hname='$hname', sdate='$s_date', edate='$e_date', types='$h_type', dric='$dric', status='$status' WHERE id='$holiday_id'";

    $update = mysqli_query($conn, $q);

    if ($update) {
        echo '<script type="text/javascript">window.location.href="Holiday-list.php";</script>';
    } else {
        echo "Update failed: " . mysqli_error($conn);
    }
}
?>

<html>

<head>
    <!-- ... (your existing head content) ... -->
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
                                        Holiday
                                    </h3>
                                <hr>
                                    <h5 class="card-title">
                                        Send your  Holiday Request Form to us
                                    </h5>
                                </div>
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
                                                <label class="form-label" for=" Holiday Name">
                                                Holiday Name
                                                </label>
                                                <input type="text" class="form-control" id="hname" name="hname" value="<?php echo $holiday_data['hname']; ?>" placeholder=" Holiday Name" required>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label class="form-label" for="sdate">
                                                    Start date:
                                                </label>
                                                <input type="date" class="form-control" name="s_date" id="sdate"  value="<?php echo $holiday_data['sdate']; ?>" placeholder="Enter your Start date" required>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label class="form-label" for="edate">
                                                    End date:
                                                </label>
                                                <input type="date" class="form-control" name="e_date" id="edate"  value="<?php echo $holiday_data['edate']; ?>"  placeholder="Enter your End date" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">
                                                    Types:
                                                </label>
                                                <select class="selectpicker form-control" name="h_type"  value="<?php echo $holiday_data['types']; ?>"  data-style="py-0" required>
                                                    <option value="sick">Sick Leave</option>
                                                    <option value="medical">Medical Leave</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label class="form-label" for="dric">
                                                    Latter:
                                                </label>
                                                <input type="textarea" class="form-control" id="dric" name="dric" placeholder="Latter"  value="<?php echo $holiday_data['dric']; ?>"  required>
                                            </div>
                                            <legend>
                                                Status:
                                            </legend>
                                            <div class="form-check" style="padding-left:40px">
                                                <input type="radio" name="status" class="form-check-input"  value="active" id="Active" checked>
                                                <label class="form-check-label" for="Active">
                                                    Active
                                                </label>
                                            </div>
                                            <div class="mb-3 form-check"  style="padding-left:40px">
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
