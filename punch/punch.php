<?php
// session_start();

// Database connection
include '../connection/connection.php';
$uid = $_SESSION['user_id'];
$tz = 'Asia/Kolkata';
 $now=date_default_timezone_set($tz); 

class Employee
{
    private $name;
    private $db;

    public function __construct($name)
    {
        $this->name = $name;
        $this->db = new mysqli("localhost", "root", "", "erpsystem");

        if ($this->db->connect_error) {
            die("Connection failed: " . $this->db->connect_error);
        }
    }

    public function punchIn()
    {
        $uid = $_SESSION['user_id'];
        $today_date = date("Y-m-d");
        // Check if the user has already punched in for today
        $check_query = "SELECT * FROM attendance WHERE emp_id = '$uid' AND DATE(punchin_time) = '$today_date'";
        $result = $this->db->query($check_query);

        if ($result->num_rows > 0) {
            // User has already punched in today
            echo "You have already punched in for today.";
        } else {
            // User hasn't punched in today, proceed with insertion
            $punchin_time = date("Y-m-d H:i:s");
            $insert_query = "INSERT INTO attendance(`id`, `emp_id`, `c_date`, `punchin_time`) VALUES (NULL, '$uid', '$today_date', '$punchin_time')";
            $insert = $this->db->query($insert_query);

            if ($insert) {
                echo "Punch in successful.";
            } else {
                echo "Error: " . $this->db->error;
            }
        }
    }

    public function punchOut($punchout_message)
    {
        $uid = $_SESSION['user_id'];
        // Update the punch out time in the database
        $punchout_time = date("Y-m-d H:i:s");
        $update_query = "UPDATE attendance SET punchout_time = '$punchout_time', punchout_message ='$punchout_message' WHERE emp_id = '$uid' AND DATE(punchin_time) = CURDATE()";
        $update_result = $this->db->query($update_query);

        if ($update_result) {
            echo "Punch out successful.";
        } else {
            echo "Error: " . $this->db->error;
        }
    }

    public function printPunches()
    {
        $uid = $_SESSION['user_id'];
        $today_date = date("Y-m-d");
        $sql = "SELECT * FROM attendance WHERE emp_id='$uid' AND DATE(punchin_time) = '$today_date' ORDER BY punchin_time DESC";
        $result = $this->db->query($sql);

        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "Punch Type: " . ($row["punch_type"] ?? "") . ", Punch Time: " . ($row["punch_time"] ?? "") . "<br>";
            }
        } else {
            echo "No punches recorded for today.";
        }
    }
}

// Example usage
$employee = new Employee("John Doe");

if (isset($_POST['punch_in'])) {
    $employee->punchIn();
} elseif (isset($_POST['punch_out'])) {
    $punchout_message = $_POST['punchout_message'];
    $employee->punchOut($punchout_message);
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Punch In/Out</title>
</head>

<body>
    <main class="main-content">
        <div class="conatiner-fluid content-inner mt-n5 py-0">
            <div>
                <?php
                if ($_SESSION['e_role'] == "user") {
                ?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body d-flex justify-content-between align-items-center">
                                    <div class="card-title mb-0">
                                        <h4 class="mb-3">Punch In/Out</h4>
                                        <?php
                                        // Check if the user has already punched in for the same date
                                        $check_query = "SELECT * FROM attendance WHERE emp_id = '$uid' AND DATE(punchin_time) = CURDATE()";
                                        $result = mysqli_query($conn, $check_query);

                                        if (mysqli_num_rows($result) == 0) {
                                            // User hasn't punched in for the same date, display the punch-in button
                                            echo '<form method="post" action="">
                                                    <input type="submit" class="btn btn-primary" name="punch_in" value="Punch In">
                                                </form>';
                                        } else {
                                            // User has already punched in for the same date
                                            $row = mysqli_fetch_assoc($result);
                                            if ($row['punchout_time'] === NULL) {
                                                // User has punched in but not punched out yet, display punch-out form
                                                echo '<form method="post" action="">
                                                        <input type="text" class="form-control" name="punchout_message" placeholder="Enter message about today\'s work" required>
                                                        <input type="submit" class="btn btn-primary"  name="punch_out" value="Punch Out">
                                                    </form>';
                                            } else {
                                                // User has already punched out for the same date, display a message
                                                echo "You have already punched out for today.";
                                            }
                                        }
                                        ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                } elseif($_SESSION['e_role'] == "admin" || $_SESSION['e_role'] == "Manager" ) {
                ?>
                    <div class="row">
                        <div class="col-lg-3">

                            <div class="card h-70">
                                <div class="card-body">
                                    <img src="../pictures/team-svgrepo-com.svg" class="mb-2" alt="Team image" height="50px" width="50px">
                                    <div class="progress-detail">
                                        <?php
                                        // Assuming $conn is your database connection
                                        $qry_employee = "SELECT COUNT(*) AS total_employees FROM employee";
                                        $data_employee = mysqli_query($conn, $qry_employee);
                                        $row_employee_data = mysqli_fetch_assoc($data_employee);
                                        $total_employees = $row_employee_data['total_employees'];
                                        ?>
                                        <p class="mb-2">Total Employees</p>
                                        <h4 class="counter"><?php echo $total_employees; ?></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">

                            <div class="card h-70">
                                <div class="card-body">
                                    <img src="../pictures/teamwork-svgrepo-com.svg" class="mb-2" alt="Team image" height="50px" width="50px">
                                    <div class="progress-detail">
                                        <?php
                                        // Assuming $conn is your database connection
                                        $qry_team = "SELECT COUNT(*) AS total_teams FROM team";
                                        $data_team = mysqli_query($conn, $qry_team);
                                        $row_team_data = mysqli_fetch_assoc($data_team);
                                        $total_teams = $row_team_data['total_teams'];
                                        ?>
                                        <p class="mb-2">Total Teams</p>
                                        <h4 class="counter"><?php echo $total_teams; ?></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card h-70">
                                <div class="card-body">
                                    <img src="../pictures/file-done-2-svgrepo-com.svg" class="mb-2" alt="Team image" height="50px" width="50px">
                                    <div class="progress-detail">
                                        <?php
                                        // Assuming $conn is your database connection
                                        $qry_projects = "SELECT COUNT(*) AS total_projects FROM project";
                                        $data_projects = mysqli_query($conn, $qry_projects);
                                        $row_projects_data = mysqli_fetch_assoc($data_projects);
                                        $total_projects = $row_projects_data['total_projects'];
                                        ?>
                                        <p class="mb-2">Total Projects</p>
                                        <h4 class="counter"><?php echo $total_projects; ?></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </main>
</body>

</html>