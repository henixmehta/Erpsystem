<?php
include 'connection/connection.php';
session_start();

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <script src="/Erpsystem/js/jquery/3.7.1.min.js"></script>
  <link rel="stylesheet" href="css/login.css">
  <title>Loginn page</title>
  <!-- Fontawesome CDN Link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>



<?php

if (!empty($_SESSION['e_role'])) {
  echo '<script type="text/javascript">window.location.href="dashboard/dashboard.php";</script>';
} else {

  //Login Script Start
  if (isset($_POST['sub_btn'])) {
    if ($_POST['email'] == "superadmin@gmail.com") {

      if ($_POST['pass'] == "superadmin") {
        $_SESSION['e_role'] = "admin";
        $_SESSION['login_time'] = time();
        $_SESSION['user_id'] = "";
        echo '<script type="text/javascript">window.location.href="dashboard/dashboard.php";</script>';
        // header('location:employee.php');
      } else {
        echo '<script>alert("enter valid email & password")</script>';
      }
    } else {


      $q = "select * from employee where e_com_email='" . $_POST['email'] . "' and e_pwd='" . $_POST['pass'] . "'";
      $data = mysqli_query($conn, $q);
      $row_check_login = mysqli_num_rows($data);

      if ($row_check_login > 0) {
        $row_id = mysqli_fetch_array($data);

        if ($row_id['e_role'] == 'admin' || $row_id['e_role'] == 'Admin') {

          $_SESSION['e_role'] = "admin";
          $_SESSION['login_time'] = time();

          $_SESSION['user_id'] = $row_id['id'];

          echo '<script type="text/javascript">window.location.href="dashboard/dashboard.php";</script>';
          // header('location:employee.php');
        }


        if ($row_id['e_role'] == 'employee' || $row_id['e_role'] == 'Employee' || $row_id['e_role'] == 'user' || $row_id['e_role'] == 'User') {
          $_SESSION['e_role'] = "user";
          $_SESSION['login_time'] = time();

          $_SESSION['user_id'] = $row_id['id'];
          $_SESSION['emp_fname'] = $row_id['e_fname'];
          // $_SESSION['emp_lname'] = $row_id['e_lname'];
          echo '<script type="text/javascript">window.location.href="dashboard/dashboard.php";</script>';
          // header('location:employee.php');
        }

        if ($row_id['e_role'] == 'Team Manager' || $row_id['e_role'] == 'Manager' || $row_id['e_role'] == 'manager' ||  $row_id['e_role'] == 'team manager') {
          $_SESSION['e_role'] = "Manager";
          $_SESSION['login_time'] = time();

          $_SESSION['user_id'] = $row_id['id'];
          $_SESSION['emp_fname'] = $row_id['e_fname'];
          // $_SESSION['emp_lname'] = $row_id['e_lname'];
          echo '<script type="text/javascript">window.location.href="dashboard/dashboard.php";</script>';
          // header('location:employee.php');
        }
      } else {
        echo '<script>alert("Please Enter Valid Password");</script>';
      }
    }
  }
}
?>

<body>
  <div class="container">
    <div class="cover">
      <div class="front">
        <img src="images/loginimg/frontImg.jpg" alt="">
        <div class="text">
          <span class="text-1">Every new friend is a <br> new adventure</span>
          <span class="text-2">Let's get connected</span>
        </div>
      </div>
    </div>
    <div class="forms">
      <div class="form-content">
        <div class="login-form">
          <div class="title">Login</div>
          <form method="POST">
            <div class="input-boxes">
              <div class="input-box">
                <i class="fas fa-envelope"></i>
                <input type="email" name="email" placeholder="Enter your email" required>
              </div>
              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="password" name="pass" placeholder="Enter your password" required>
              </div>
              <div class="button input-box">
                <input type="submit" name="sub_btn" value="Sumbit">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
</body>

</html>