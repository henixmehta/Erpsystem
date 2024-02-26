<?php 
    include 'sidebar.php';
   include 'connection.php';
  // include 'formvalidation.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="main.min.css">
	<title>Team</title>
   <style>
   .error {
      color: red;
    }
   .main-content{
      margin-left:265px;
    }
   </style>
<?php 
                
                $pid = $_GET['id'];
                
                if (isset($_GET['id'])) {
                    $qry = "SELECT * FROM employee WHERE id=?";
                    $stmt = mysqli_prepare($conn, $qry);
                    mysqli_stmt_bind_param($stmt, "i", $pid);
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                    $row = mysqli_fetch_array($result);
                }
                
                if (isset($_POST['sub_btn'])) {
                    // Update text fields in the database
                    $q = "UPDATE employee SET e_name=?, e_lname=?, e_role=?, e_bdate=?, e_country=?, e_state=?, e_city=?, e_add=?, e_pin=?, e_mob=?, e_alt_mob=?, e_email=?, e_team_name=?, e_joindate=?, e_exp=?, e_deg=?, e_resume=?, e_salary=?, e_com_email=?, e_pwd=?, e_status=? WHERE id=?";
                    $stmt = mysqli_prepare($conn, $q);
                    mysqli_stmt_bind_param($stmt, "ssssssi", $_POST['e_name'], $_POST['e_lname'], $_POST['e_role'], $_POST['e_bdate'], $_POST['e_country'], $_POST['e_state'], $_POST['e_city'], $_POST['e_add'], $_POST['e_pin'], $_POST['e_mob'], $_POST['e_alt_mob'],  $_POST['e_email'],  $_POST['e_team_name'],  $_POST['e_joindate'],  $_POST['e_exp'],  $_POST['e_deg'],  $_POST['e_resume'],  $_POST['e_salary'],  $_POST['e_com_email'],  $_POST['e_pwd'],  $_POST['e_status'], $pid);
                    mysqli_stmt_execute($stmt);
                
                    // Handle image upload if a file is selected
                    if (isset($_FILES["com_img"]) && $_FILES["com_img"]["error"] == 0) {
                        $targetDirectory = "storage/employeedata/";
                        $targetFile = $targetDirectory . basename($_FILES["com_img"]["name"]);
                        $uploadOk = 1;
                        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
                
                        // Check if image file is a actual image or fake image
                        $check = getimagesize($_FILES["com_img"]["tmp_name"]);
                        if ($check !== false) {
                            echo "File is an image - " . $check["mime"] . ".";
                            $uploadOk = 1;
                        } else {
                            echo "File is not an image.";
                            $uploadOk = 0;
                        }
                
                        // Check file size
                        if ($_FILES["com_img"]["size"] > 500000) {
                            echo "Sorry, your file is too large.";
                            $uploadOk = 0;
                        }
                
                        // Allow certain file formats
                        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                            && $imageFileType != "gif") {
                            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                            $uploadOk = 0;
                        }
                
                        // Check if $uploadOk is set to 0 by an error
                        if ($uploadOk == 0) {
                            echo "Sorry, your file was not uploaded.";
                        } else {
                            // if everything is ok, try to upload file
                            if (move_uploaded_file($_FILES["com_img"]["tmp_name"], $targetFile)) {
                                echo "The file " . htmlspecialchars(basename($_FILES["com_img"]["name"])) . " has been uploaded.";
                            } else {
                                echo "Sorry, there was an error uploading your file.";
                            }
                        }
                    }
                
                    header("location: clientproject.php");
                    exit();
                }
                ?>
                
                <body>
         <main class="main-content">
            <div class="iq-navbar-header" style="height: 100px;">
                  <div class="container-fluid iq-container">
                     <div class="row">
                        <div class="col-md-12" id="header">
                           <div class="flex-wrap d-flex justify-content-between align-items-center">
            
                           </div>
                        </div>
                     </div>
                  </div>
            </div>
            <div class="conatiner-fluid content-inner mt-n5 py-0">
            <div class="row">
               <div class="col-xl-12 col-lg-8">
                  <div class="card">
                     <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                        <h4 class="card-title">Update an Employee</h4>
                           <hr>
                           <h4 class="card-title">Updated Employee Information</h4>
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
                                    <label class="form-label" for="fname">First Name:</label>
                                    <input type="text" class="form-control" name="f_name" id="fname" placeholder="First Name" value=<?php echo $row['e_fname']; ?> required>
                                    <!-- <span class="error"><?php // echo $e_fname; ?></span>                              -->
                                 </div>
                                 
                                 <div class="form-group">
                                    <label class="form-label">Employee Role:</label>
                                    <select class="selectpicker form-control" name="e_role" data-style="py-0" required>
                                        <option>Select</option>
                                        <?php
                                        // Assuming $conn is your database connection object
                                        $query = "SELECT role_name, r_status FROM role";
                                        $result = mysqli_query($conn, $query);
                                        if(mysqli_num_rows($result) > 0) {
                                            while($role_row = mysqli_fetch_assoc($result)) {
                                                if($role_row['r_status'] == "active") {
                                                    $selected = ($row['e_role'] == $role_row['role_name']) ? 'selected' : ''; // Check if the fetched role matches the option, set 'selected' if true
                                                    echo "<option ".$selected.">".$role_row['role_name']."</option>";
                                                }
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                 
                                 <div class="form-group col-md-12">
                                    <label class="form-label" for="bdate">bdate:</label>
                                    <input type="date" class="form-control" name="e_bate" id="bdate" placeholder="Enter your Birthday"  value=<?php echo $row['e_bdate']; ?> required>
                                    <!-- <span class="error"><?php // echo $e_lname; ?></span>    -->
                                 </div>
                                 
                                 <div class="form-group col-md-4">
                                    <label class="form-label">Country:</label>
                                    <select type="text" name="e_country" id="country" class="form-control" value=<?php echo $row['e_country']; ?> >
                                       <option>Select Country</option>
                                    </select>
                                 </div>

                                 <div class="form-group col-sm-4">
                                    <label class="form-label">State:</label>
                                    <select type="text" id="state" name="e_state" class="form-control"></select>
                                 </div>

                                 <div class="form-group col-sm-4">
                                    <label class="form-label">City:</label>
                                    <select name="e_city" id="city" class="form-control"></select>
                                 </div>

                                 <div class="form-group col-md-12">
                                    <label class="form-label" for="add1">Street Address 1:</label>
                                    <input type="text" class="form-control" id="add1" name="address" placeholder="Street Address 1" required>
                                 <!-- <span class="error"><?php // echo $e_fname; ?></span>   -->
                                 </div>
                                 <div class="form-group col-md-12">
                                    <label class="form-label" for="pno">Pin Code:</label>
                                    <input type="text" class="form-control" id="pno" name="pincode" placeholder="Pin Code" required>
                                 <!-- <span class="error"><?php // echo $e_fname; ?></span>   -->
                                 </div>
                              
                                 <div class="form-group col-md-6">
                                 <label class="form-label" for="mobno">Mobile Number:</label>
                                    <input type="text" class="form-control" id="mobno" name="mono" placeholder="Mobile Number" required>
                                 <!-- <span class="error"><?php // echo $e_fname; ?></span>   -->
                                 </div>
                                 <div class="form-group col-md-6">
                                    <label class="form-label" for="altconno">Alternate Contact:</label>
                                    <input type="text" class="form-control" id="altconno" name="alte_mono" placeholder="Alternate Contact"required>
                                 <!-- <span class="error"><?php // echo $e_fname; ?></span>   -->
                                 </div>
                                 <div class="form-group col-md-12">
                                    <label class="form-label" for="email"> Email:</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                                 <!-- <span class="error"><?php // echo $e_fname; ?></span>   -->
                                 </div>
                                 <div class="form-group">
                                       <label class="form-label">Team Name:</label>
                                       <select class="selectpicker form-control" name="team_name" data-style="py-0" required>
                                          <option>Select</option>
                                          <?php
                                          // Assuming $conn is your database connection object
                                          $t_query = "SELECT t_name, t_status FROM team";
                                          $result = mysqli_query($conn, $t_query);
                                          if(mysqli_num_rows($result) > 0) {
                                                while($row = mysqli_fetch_assoc($result)) {
                                                   if($row['t_status'] == "active") {
                                                      echo "<option>".$row['t_name']."</option>";
                                                   }
                                                }
                                          }
                                          ?>
                                       </select>
                                    </div>

                                 
                                 <div class="form-group col-md-12">
                                    <label class="form-label" for="Joining Date">Joining Date:</label>
                                    <input type="date" class="form-control" id="joindate" name="j_date" placeholder="Enter your Joining Date" required>
                                    <!-- <span class="error"><?php // echo $e_lname; ?></span>    -->
                                 </div>
                                 
                                 <div class="form-group col-md-12">
                                    <label class="form-label" for="Experience">Experience: </label>
                                    <input type="text" class="form-control" id="Experience" name="exp" placeholder="Experience in year/ month" required>
                                    <!-- <span class="error"><?php // echo $e_fname; ?></span>   -->
                                 </div>
                                 <div class="form-group col-md-12">
                                    <label class="form-label" for="Degree">Degree certificate: </label>
                                    <input type="file" class="form-control" id="Degree" name="degree" placeholder="Degree certificate" required>
                                    <!-- <span class="error"><?php // echo $e_fname; ?></span>   -->
                                 </div>
                                 <div class="form-group col-md-12">
                                    <label class="form-label" for="Resume">Resume: </label>
                                    <input type="file" class="form-control" id="Resume" name="resume" placeholder="Resume" required>
                                    <!-- <span class="error"><?php // echo $e_fname; ?></span>   -->
                                 </div>
                              </div>
                              <div class="form-group col-md-12">
                                 <label class="form-label" for="Salary">Salary: </label>
                                 <input type="text" class="form-control" name="salary" id="Salary" placeholder="Salary" required>
                              <!-- <span class="error"><?php // echo $e_fname; ?></span>   -->
                              </div>   
                              <hr>
                              <h5 class="mb-3">Security</h5>
                              <div class="row">
                                 <div class="form-group col-md-6">
                                    <label class="form-label" for="uname">Employee Compney Email:</label>
                                    <input type="text" class="form-control" id="c_email" name="c_email" placeholder="Employee Compney Email" isValidEmail required >
                                 </div>
                                 <div class="form-group col-md-6">
                                    <label class="form-label" for="pass">Password:</label>
                                    <input type="password" class="form-control" id="pass" name="c_pass" placeholder="Employe Compney Password" required>
                                 </div>
                                 <fieldset class="mb-3">
                                 <legend>Status:</legend>
                                    <div class="form-check">
                                       <input type="radio" name="status" class="form-check-input" value="active" id="Active" checked>
                                       <label class="form-check-label" for="Active">Active</label>
                                    </div>
                                    <div class="mb-3 form-check">
                                       <input type="radio" name="status"  class="form-check-input" value="inactive" id="Inactive" >
                                       <label class="form-check-label" for="Inactive">Inactive</label>
                                    </div>
                                 </fieldset> 
                              </fieldset> 
                              </div>
                              <input type="submit" value="submit" class="btn btn-primary" name="sub_btn1">
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