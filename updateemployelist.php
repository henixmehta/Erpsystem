<?php 
   //  include 'sidebar.php';
   include 'connection.php';
  // include 'formvalidation.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="css/main.min.css">
   <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

   <script src="js/location/location.js"></script>
   <script>
    // Make sure to load the initial values
    $(document).ready(function() {
        loadCountry();
        loadState(<?php echo $row['country_id']; ?>);
        loadCity(<?php echo $row['state_id']; ?>);
    });
</script>


	<title>Team</title>
   <style>
   .error {
      color: red;
    }
   
   </style>
<?php 
                
                $pid = $_GET['id'];
                
             
               if(isset($_GET['id'])) {
                  $qry = "select * from employee where id='".$pid."'";
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


                  $enceipt_pass= md5($_POST['c_pass']);
                  $q = "UPDATE employee SET 
                      e_fname='" . $_POST['f_name'] . "', e_lname='" . $_POST['l_name'] . "', e_role='" . $_POST['e_role'] . "', 
                      e_bdate='" . $_POST['e_bate'] . "', e_country='" . $_POST['country'] . "', e_state='" . $_POST['e_state'] . "', 
                      e_city='" . $_POST['e_city'] . "', e_add='" . $_POST['address'] . "', e_pin='" . $_POST['pincode'] . "', 
                      e_mob='" . $_POST['mono'] . "', e_alt_mob='" . $_POST['alte_mono'] . "', e_email='" . $_POST['email'] . "', 
                      e_team_name='" . $_POST['e_team_name'] . "', e_joindate='" . $_POST['e_joindate'] . "', e_exp='" . $_POST['exp'] . "', 
                      e_deg='" . (isset($_FILES['degree']) && $_FILES['degree']['error'] == 0 ? $_FILES['degree']['name'] : $_POST['old_degree']) . "', 
                      e_resume='" . (isset($_FILES['resume']) && $_FILES['resume']['error'] == 0 ? $_FILES['resume']['name'] : $_POST['old_resume']) . "', 
                      e_salary='" . $_POST['salary'] . "', 
                   e_pwd='" . $enceipt_pass . "', e_status='" . $_POST['p_status'] . "' 
                      WHERE id='" . $pid . "'";
                  mysqli_query($conn, $q);
              
                  // Handle image upload if a file is selected
                  if (isset($_FILES["com_img"]) && $_FILES["com_img"]["error"] == 0) {
                      // Your existing image upload code goes here
                  }
              
                  // Handle file uploads for Degree and Resume
                  if (isset($_FILES['degree']) && $_FILES['degree']['error'] == 0) {
                      $targetDirectory = "storage/employeedata/";
                      $targetFileDegree = $targetDirectory . basename($_FILES["degree"]["name"]);
                      move_uploaded_file($_FILES["degree"]["tmp_name"], $targetFileDegree);
                  }
              
                  if (isset($_FILES['resume']) && $_FILES['resume']['error'] == 0) {
                      $targetFileResume = $targetDirectory . basename($_FILES["resume"]["name"]);
                      move_uploaded_file($_FILES["resume"]["tmp_name"], $targetFileResume);
                  }
              
                  header("location: employee-list.php");
                  exit();
              }
              
                ?>
                
                <body>
          <main class="main-content">
            <div class="iq-navbar-header" style="height: 215px;">
                  <div class="container-fluid iq-container">
                     <div class="row">
                        <div class="col-md-12" id="header">
                           <div class="flex-wrap d-flex justify-content-between align-items-center">
                                 <div>
                                    <h1>Hello Devs!</h1>
                                    <p>We are on a mission to help developers like you build successful projects for FREE.</p>
                                 </div>
                                 <div>
                                    <a href="" class="btn btn-link btn-soft-light">
                                       <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none"  >
                                             <path d="M11.8251 15.2171H12.1748C14.0987 15.2171 15.731 13.985 16.3054 12.2764C16.3887 12.0276 16.1979 11.7713 15.9334 11.7713H14.8562C14.5133 11.7713 14.2362 11.4977 14.2362 11.16C14.2362 10.8213 14.5133 10.5467 14.8562 10.5467H15.9005C16.2463 10.5467 16.5263 10.2703 16.5263 9.92875C16.5263 9.58722 16.2463 9.31075 15.9005 9.31075H14.8562C14.5133 9.31075 14.2362 9.03619 14.2362 8.69849C14.2362 8.35984 14.5133 8.08528 14.8562 8.08528H15.9005C16.2463 8.08528 16.5263 7.8088 16.5263 7.46728C16.5263 7.12575 16.2463 6.84928 15.9005 6.84928H14.8562C14.5133 6.84928 14.2362 6.57472 14.2362 6.23606C14.2362 5.89837 14.5133 5.62381 14.8562 5.62381H15.9886C16.2483 5.62381 16.4343 5.3789 16.3645 5.13113C15.8501 3.32401 14.1694 2 12.1748 2H11.8251C9.42172 2 7.47363 3.92287 7.47363 6.29729V10.9198C7.47363 13.2933 9.42172 15.2171 11.8251 15.2171Z" fill="currentColor"></path>
                                             <path opacity="0.4" d="M19.5313 9.82568C18.9966 9.82568 18.5626 10.2533 18.5626 10.7823C18.5626 14.3554 15.6186 17.2627 12.0005 17.2627C8.38136 17.2627 5.43743 14.3554 5.43743 10.7823C5.43743 10.2533 5.00345 9.82568 4.46872 9.82568C3.93398 9.82568 3.5 10.2533 3.5 10.7823C3.5 15.0873 6.79945 18.6413 11.0318 19.1186V21.0434C11.0318 21.5715 11.4648 22.0001 12.0005 22.0001C12.5352 22.0001 12.9692 21.5715 12.9692 21.0434V19.1186C17.2006 18.6413 20.5 15.0873 20.5 10.7823C20.5 10.2533 20.066 9.82568 19.5313 9.82568Z" fill="currentColor"></path>
                                       </svg>
                                       Announcements
                                    </a>
                                 </div>
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
                        <h4 class="card-title">Add New Employee</h4>
                           <hr>
                           <h4 class="card-title">New Employee Information</h4>
                        </div>
                        <a href="employee-list.php"><button class="btn btn-primary" style="margin:10 10 10 10 "> back</button></a>

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
                                 
                                 <div class="form-group col-md-6">
                                    <label class="form-label" for="lname">Last Name:</label>
                                    <input type="text" class="form-control" id="lname" name="l_name" placeholder="Last Name" value=<?php echo $row['e_lname']; ?> required>
                                    <!-- <span class="error"><?php // echo $e_lname; ?></span>    -->
                                 </div>
                                 
                                 <div class="form-group">
                                    <label class="form-label">Employee Role:</label>
                                    <select class="selectpicker form-control" name="e_role" data-style="py-0" required>
                                        <option>Select</option>
                                        <?php
                                        // Assuming $conn is your database connection object
                                        $query1 = "SELECT role_name, r_status FROM role";
                                        $result_role = mysqli_query($conn, $query1);
                                        if(mysqli_num_rows($result_role) > 0) {
                                            while($role_row = mysqli_fetch_assoc($result_role)) {
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
                                             <select name="country" id="country" class="form-control" required>
                                             <option>Select Country</option>
                                                <!-- Options will be loaded dynamically through AJAX -->
                                             </select>
                                          </div>

                                          <div class="form-group col-sm-4">
                                             <label class="form-label">State:</label>
                                             <select type="text" id="state" name="e_state" class="form-control" required>
                                                <!-- Options will be loaded dynamically through AJAX -->
                                             </select>
                                          </div>

                                          <div class="form-group col-sm-4">
                                             <label class="form-label">City:</label>
                                             <select name="e_city" id="city" class="form-control" required>
                                                <!-- Options will be loaded dynamically through AJAX -->
                                             </select>
                                          </div>
                                 <div class="form-group col-md-12">
                                    <label class="form-label" for="add1">Street Address 1:</label>
                                    <input type="text" class="form-control" id="add1" name="address" placeholder="Street Address 1"  value=<?php echo $row['e_add']; ?> required>
                                 <!-- <span class="error"><?php // echo $e_fname; ?></span>   -->
                                 </div>
                                 <div class="form-group col-md-12">
                                    <label class="form-label" for="pno">Pin Code:</label>
                                    <input type="text" class="form-control" id="pno" name="pincode" placeholder="Pin Code"  pattern="\d{6}" title="Please enter a 6-digit PIN code"   value=<?php echo $row['e_pin']; ?> required>
                                 <!-- <span class="error"><?php // echo $e_fname; ?></span>   -->
                                 </div>
                              
                                 <div class="form-group col-md-6">
                                 <label class="form-label" for="mobno">Mobile Number:</label>
                                    <input type="text" class="form-control" id="mobno" name="mono" placeholder="Mobile Number" pattern="^\d{10}$" title="Please enter a 10-digit mobile number "  value=<?php echo $row['e_mob']; ?> required>
                                 <!-- <span class="error"><?php // echo $e_fname; ?></span>   -->
                                 </div>
                                 <div class="form-group col-md-6">
                                    <label class="form-label" for="altconno">Alternate Contact:</label>
                                    <input type="text" class="form-control" id="altconno" name="alte_mono" placeholder="Alternate Contact" pattern="^\d{10}$" title="Please enter a 10-digit mobile number "  value=<?php echo $row['e_alt_mob']; ?> required>
                                 <!-- <span class="error"><?php // echo $e_fname; ?></span>   -->
                                 </div>
                                 <div class="form-group col-md-12">
                                    <label class="form-label" for="email"> Email:</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Email"  value=<?php echo $row['e_email']; ?> required>
                                 <!-- <span class="error"><?php // echo $e_fname; ?></span>   -->
                                 </div>

                                 <div class="form-group">
                                    <label class="form-label">Team Name:</label>
                                    <select name="e_team_name" class="selectpicker form-control" data-style="py-0" required>
                                       <option>Select</option>
                                       <?php
                                       // Assuming $conn is your database connection object
                                       $t_query = "SELECT t_name, t_status FROM team";
                                       $result = mysqli_query($conn, $t_query);
                                       if(mysqli_num_rows($result) > 0) {
                                             while($row1 = mysqli_fetch_assoc($result)) {
                                                $selected = ($row['t_name'] == $t_name) ? 'selected' : ''; // Check if the option matches the existing value
                                                if($row1['t_status'] == "active") {
                                                   echo "<option $selected>".$row1['t_name']."</option>";
                                                }
                                             }
                                       }
                                       ?>
                                    </select>
                                 </div>
                  
                                 <div class="form-group col-md-12">
                                    <label class="form-label" for="joindate">Joining Date:</label>
                                    <input type="date" class="form-control" id="joindate" name="e_joindate" value="<?php echo !empty($row['e_joindate']) ? $row['e_joindate'] : ''; ?>" required>
                                 </div>

                                                                     
                                       <div class="form-group col-md-12">
                                       <label class="form-label" for="Experience">Experience: </label>
                                       <input type="number" class="form-control" id="Experience" name="exp" placeholder="Experience in year/ month" value="<?php echo isset($row['e_exp']) ? $row['e_exp'] : ''; ?>" required>
                                    </div>
                                    <div class="form-group col-md-12">
                                          <label class="form-label" for="Degree"> Degree certificate </label>
                                          <input type="file" class="form-control" id="Degree" name="degree" placeholder="Degree certificate" required>
                                          <?php if (isset($row['e_deg'])) { ?>
                                             <div>Old image : <?php echo $row['e_deg']; ?></div>
                                             <input type="hidden" name="old_degree" value="<?php echo $row['e_deg']; ?>">
                                          <?php } ?>
                                       </div>


                                 <div class="form-group col-md-12">
                                       <label class="form-label" for="Resume">Resume: </label>
                                       <input type="file" class="form-control" id="Resume" name="resume" placeholder="Resume" required>

                                       <?php
                                       // Check if $row is not null and if the 'e_resume' key exists in the array
                                       if ($row !== null && isset($row['e_resume'])) {
                                          ?>
                                          <div><?php echo $row['e_resume']; ?></div>
                                          <?php
                                       }
                                       ?>
                                    </div>

                              </div>
                              <div class="form-group col-md-12">
                                 <label class="form-label" for="Salary">Salary: </label>
                                 <input type="number" class="form-control" name="salary" id="Salary" placeholder="Salary" min="500"  value="<?php echo isset($row['e_salary']) ? $row['e_salary'] : ''; ?>"  required>
                              </div>    
                              <hr>
                              <h2 class="mb-3">Security</h2>
                              <hr>
                              <div class="row">
                              <div class="form-group col-md-6">
                                 <label class="form-label" for="c_email">Employee Company Email:</label>
                              <b>
                                 <?php echo "<br>Compney:  ".$row['e_com_email']; ?>
                              </b>
                              </div>
                                 <div class="form-group ">
                                    <label class="form-label" for="pass">Password:</label>
                                    <input type="password" class="form-control" id="pass" name="c_pass" placeholder="Employe Compney Password" value="<?php echo isset($row['e_pwd']) ? $row['e_pwd'] : ''; ?>"  required>
                                 </div>
                                 <fieldset class="mb-3">
                                 <legend>Status:</legend>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" name="p_status" value="active"   id="Active" checked>
                                <label class="form-check-label" for="Active">Active</label>
                            </div>
                            <div class="mb-3 form-check">
                                <input type="radio" class="form-check-input" name="p_status" value="inactive">
                                <label class="form-check-label" for="Inactive">Inactive</label>
                            </div>
                         </fieldset>  
                              </fieldset> 
                              </div>
                              <input type="submit" value="updated" class="btn btn-primary" name="sub_btn_update">
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