<?php

        include '../connection/connection.php';
// session_start();
?>

<!doctype html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Calender</title>
<head>
        <!-- Fullcalender CSS -->
        <link rel='stylesheet' href='../vendor/fullcalendar/core/main.css' />
        <link rel='stylesheet' href='../vendor/fullcalendar/daygrid/main.css' />
        <link rel='stylesheet' href='../vendor/fullcalendar/timegrid/main.css' />
        <link rel='stylesheet' href='../vendor/fullcalendar/list/main.css' />
</head>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function(){
        // Initially hide all buttons
        $("#punch_in").show();
        $("#break_in").hide();
        $("#break_out").hide();
        $("#punch_out").hide();

        // Function to handle Punch In button click
        function Punch_in() {
            $("#punch_in").hide();
            $("#break_in").show();
            $("#break_out").show();
            $("#punch_out").show();
        }

        // Function to handle Break In button click
        function Break_in() {
            $("#punch_in").hide();
            $("#break_in").hide();
            $("#break_out").show();
            $("#punch_out").show();
        }

        // Function to handle Break Out button click
        function Break_out() {
            $("#punch_in").hide();
            $("#break_in").hide();
            $("#break_out").hide();
            $("#punch_out").show();
        }

        // Function to handle Punch Out button click
        function Punch_out() {
            $("#punch_in").hide();
            $("#break_in").hide();
            $("#break_out").hide();
            $("#punch_out").hide();
        }

        // Attach event handlers to buttons
        $(document).on("click", "#punch_in", Punch_in);
        $(document).on("click", "#break_in", Break_in);
        $(document).on("click", "#break_out", Break_out);
        $(document).on("click", "#punch_out", Punch_out);
    });
</script>

<?php
// Fetch Employee Data
$uid = $_SESSION['user_id'];

$qry = "SELECT * FROM employee WHERE id='".$uid."'";
$data = mysqli_query($conn, $qry);
$emp_row = mysqli_fetch_array($data);

$qry = "SELECT * FROM attendance WHERE emp_id='".$uid."'";
$attendance_data = mysqli_query($conn, $qry);
$attendance_emp_row = mysqli_fetch_array($attendance_data);

// if (empty($attendance_emp_row['punchin_time'])) {
    if (isset($_POST['punch_in'])) {
        $punchin_time = date("Y-m-d H:i:s");

        $q = "INSERT INTO attendance(`id`, `emp_id`, `punchin_time`) VALUES (NULL, '".$uid."', '".$punchin_time."')";
        
        $insert = mysqli_query($conn, $q);

        if ($insert) {
            // Redirect to the dashboard on successful insertion
            echo '<script type="text/javascript">window.location.href="../dashboard/dashboard.php";</script>';
        } else {
            // Handle the case where the insertion fails
            echo "Error: " . mysqli_error($conn);
        }
    }
// } else {
//     // If the user has already punched in, show an alert
//     echo '<script>alert("You are already punched in.");</script>';
// }
?>

                
<body>
    <main class="main-content">
        <div class="conatiner-fluid content-inner mt-n5 py-0">
            <div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body d-flex justify-content-between align-items-center">
                                <div class="card-title mb-0">
                                    <h4 class="mb-3">Calender</h4>
                                    <form method="POST" action="" enctype="multipart/form-data">
                                    <?php   
                                        if ($_SESSION['e_role'] == "user") {
                                            // Check if the user has already punched in
                                            if (empty($attendance_emp_row['punchin_time'])) {
                                                ?>
                                                <input type="submit" id="punch_in" name="punch_in" value="Punch In" class="btn btn-primary">
                                                <?php
                                            } elseif (empty($attendance_emp_row['breakin_time']) && $attendance_emp_row['breakout_time'] == NULL) {
                                                ?>
                                                <input type="submit" id="break_in" name="break_in" value="Break In" class="btn btn-primary">
                                                <?php
                                            } elseif ($attendance_emp_row['breakout_time'] == NULL) {
                                                ?>
                                                <input type="submit" id="break_out" name="break_out" value="Break out" class="btn btn-primary">
                                                <?php
                                            } else {
                                                // User has already punched in, taken a break, and probably punched out
                                                // Display a message or other actions
                                                // echo '<p>You are already punched in and took a break.</p>';
                                            }
                                        }
                                        ?>

                                        </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>            
                <!-- <input type="submit" id="break_in" value="break_in" class="btn btn-primary" onclick="Break_in()" name="Break-in">
                <input type="submit" id="punch_out" value="punch_out" class="btn btn-primary" onclick="Punch_out()" name="Punch-out"> -->
                
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card  ">
                                    <div class="card-body">
                                        <div id="calendar1" class="calendar-s"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
        <!-- Fullcalender Javascript -->
        <script src='../vendor/fullcalendar/core/main.js'></script>
        <script src='../vendor/fullcalendar/daygrid/main.js'></script>
        <script src='../vendor/fullcalendar/timegrid/main.js'></script>
        <script src='../vendor/fullcalendar/list/main.js'></script>
        <script src='../vendor/fullcalendar/interaction/main.js'></script>
        <script src='../vendor/moment.min.js'></script>
        <script src='../js/plugins/calender.js'></script>
</body>
</html>
