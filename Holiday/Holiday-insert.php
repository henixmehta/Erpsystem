<?php 
   include '../sidebar/sidebar.php';
   include '../connection/connection.php';
?>
<?php  
    if(isset($_POST['sub_btn1']))
    {
        $hname = $_POST['hname'];
        $s_date = $_POST['s_date'];
        $e_date = $_POST['e_date'];
        $h_type = $_POST['h_type'];
        $dric = $_POST['dric'];
        $status = $_POST['status'];
 
        $q = "INSERT INTO holiday( hname, sdate, edate, types, dric, status) 
        VALUES ('$hname', '$s_date', '$e_date', '$h_type', '$dric', '$status')";

        $insert = mysqli_query($conn, $q);

        echo '<script type="text/javascript">window.location.href="Holiday-list.php";</script>';
    }
?>
<html>  
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Holiday</title>
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
                                        Holiday
                                    </h3>
                                <hr>
                                    <h5 class="card-title">
                                        Send your  Holiday Request Form to us
                                    </h5>
                                </div>
                                <a href="Holiday-list.php"><button class="btn btn-primary" style="margin:10 10 10 10 "> back</button></a>

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
                                                <input type="text" class="form-control" id="hname" name="hname" placeholder=" Holiday Name" required>
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
                                                <select class="selectpicker form-control" name="h_type" data-style="py-0" required>
                                                    <option value="sick">Sick Leave</option>
                                                    <option value="medical">Medical Leave</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label class="form-label" for="dric">
                                                    Latter:
                                                </label>
                                                <input type="textarea" class="form-control" id="dric" name="dric" placeholder="Latter" required>
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