<?php
include '../connection/connection.php';
// session_start();

// Fetch Employee Data
$uid = $_SESSION['user_id'];

$qry = "SELECT * FROM employee WHERE id='".$uid."'";
$data = mysqli_query($conn, $qry);
$emp_row = mysqli_fetch_array($data);

$qry = "SELECT * FROM attendance WHERE emp_id='".$uid."'";
$attendance_data = mysqli_query($conn, $qry);
$attendance_emp_row = mysqli_fetch_array($attendance_data);

if (isset($_POST['punch_in'])) {
    $today_date = date("Y-m-d");
    
    // Check if the user has already punched in for today
    $check_query = "SELECT * FROM attendance WHERE emp_id = '$uid' AND DATE(punchin_time) = '$today_date'";
    $result = mysqli_query($conn, $check_query);

    if (mysqli_num_rows($result) > 0) {
        // User has already punched in today
        echo "You have already punched in for today.";
    } else {
        // User hasn't punched in today, proceed with insertion
        $punchin_time = date("Y-m-d H:i:s");
        $insert_query = "INSERT INTO attendance(`id`, `emp_id`, `punchin_time`) VALUES (NULL, '$uid', '$punchin_time')";
        $insert = mysqli_query($conn, $insert_query);

        if ($insert) {
            echo "Punch in successful.";
            // Update the attendance_emp_row variable to reflect the new punch in time
            $attendance_emp_row['punchin_time'] = $punchin_time;
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
}

// if (isset($_POST['break_in'])) {
//     // Update the break in time in the database
//     $breakin_time = date("Y-m-d H:i:s");
//     $update_query = "UPDATE attendance SET breakin_time = '$breakin_time' WHERE emp_id = '$uid' AND DATE(punchin_time) = CURDATE()";
//     $update_result = mysqli_query($conn, $update_query);

//     if ($update_result) {
//         echo "Break In time updated successfully.";
//         // Update the attendance_emp_row variable to reflect the new break in time
//         $attendance_emp_row['breakin_time'] = $breakin_time;
//     } else {
//         echo "Error: " . mysqli_error($conn);
//     }
// }

// if (isset($_POST['break_out'])) {
//     // Update the break out time in the database
//     $breakout_time = date("Y-m-d H:i:s");
//     $update_query = "UPDATE attendance SET breakout_time = '$breakout_time' WHERE emp_id = '$uid' AND DATE(punchin_time) = CURDATE()";
//     $update_result = mysqli_query($conn, $update_query);

//     if ($update_result) {
//         echo "Break Out time updated successfully.";
//         // Update the attendance_emp_row variable to reflect the new break out time
//         $attendance_emp_row['breakout_time'] = $breakout_time;
//     } else {
//         echo "Error: " . mysqli_error($conn);
//     }
// }

if (isset($_POST['punch_out'])) {
    // Update the punch out time in the database
    $punchout_message= $_POST['punchout_message'];
    $punchout_time = date("Y-m-d H:i:s");
    $update_query = "UPDATE attendance SET punchout_time = '$punchout_time' , punchout_message ='$punchout_message' WHERE emp_id = '$uid' AND DATE(punchin_time) = CURDATE()";
    $update_result = mysqli_query($conn, $update_query);

    if ($update_result) {
        echo "Punch Out time updated successfully.";
        // Update the attendance_emp_row variable to reflect the new punch out time
        $attendance_emp_row['punchout_time'] = $punchout_time;
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Calender</title>
    <!-- Fullcalender CSS -->
    <link rel='stylesheet' href='../vendor/fullcalendar/core/main.css' />
    <link rel='stylesheet' href='../vendor/fullcalendar/daygrid/main.css' />
    <link rel='stylesheet' href='../vendor/fullcalendar/timegrid/main.css' />
    <link rel='stylesheet' href='../vendor/fullcalendar/list/main.css' />
</head>
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
                                    <?php   
                                    if ($_SESSION['e_role'] == "user") {
                                        // Check if the user has already punched in
                                        if (empty($attendance_emp_row['punchin_time']) && time() >= strtotime(date('Y-m-d') . ' 07:00:00')) {
                                            ?>
                                            <form method="POST" action="" enctype="multipart/form-data">
                                                <input type="submit" id="punch_in" name="punch_in" value="Punch In" class="btn btn-primary">
                                            </form>
                                            <?php
                                        }
                                         elseif (empty($attendance_emp_row['punchout_time']))  {
                                            ?>
                                            <form method="POST" action="" enctype="multipart/form-data">
                                                <input type="text" class="form-control" name="punchout_message" id="punchout_message" placeholder="Enter message  about today work" required >
                                                <input type="submit" id="punch_out" name="punch_out" value="Punch Out" class="btn btn-primary">
                                            </form>
                                            <?php
                                        }
                                    }
                                    elseif ($_SESSION['e_role'] == "admin"){
                                        echo "";
                                    }
                                    ?>
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
