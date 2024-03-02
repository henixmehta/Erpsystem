         <?php 
                  include 'sidebar.php';
                  include 'connection.php';
                  //   include 'formvalidation.php';
                  ?>
   <html>
      
      <head>
         <meta charset="UTF-8">
         <meta http-equiv="X-UA-Compatible" content="IE=edge">
         <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <title>Employee</title>
         <link rel="stylesheet" href="css/main.min.css">
         <script src="js/jquery/3.7.1.min.js" type="text/javascript"></script>
         <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
         <script src="js/location/location.js"></script>
         
       
    <script>
        function validateEmails() {
            var email_check = document.getElementById('email').value;
            var e_com_email_check = document.getElementById('c_email').value;

            // AJAX request to check if the email exists on the server
            $.ajax({
                type: 'POST',
                url: 'employee.php',
                data: {email: email_check, c_email: e_com_email_check},
                success: function(response) {
                    if (response === "exists") {
                        alert("Email already registered. Please choose a different email.");
                    }
                     else {
                        alert("Emails are valid. Proceed with the form submission.");
                        // You can submit the form or perform additional actions here
                    }
                },
                error: function() {
                    alert("An error occurred during the email validation.");
                }


               
            });
            
        }
    </script>
            <style>
                        .error {
                        color: red;
                     }
                     
            </style>


     <?php  
  

     

         if(isset($_POST['sub_btn1'])){
          
           //sAssuming you have a database connection established in $conn
            
            $email_check = $_POST['email'];
            $com_email_check = $_POST['c_email'];
            
            $checkEmailSql = "SELECT * FROM employee WHERE e_email = '$email_check' OR e_com_email = '$com_email_check'";
            $emailResult = mysqli_query($conn, $checkEmailSql);
            
            if ($emailResult->num_rows > 0) {
               echo '<script>alert("exists");</script>';
            } else {
 
             $f_name = $_POST['f_name'];
            $l_name = $_POST['l_name'];
            $e_role = $_POST['e_role'];
            $e_bate = $_POST['e_bate'];
            $e_country = $_POST['e_country'];
            $e_state = $_POST['e_state'];
            $e_city = $_POST['e_city'];
            $e_add = $_POST['address'];
            $pincode = $_POST['pincode'];
            $mono = $_POST['mono'];
            $alte_mono = $_POST['alte_mono'];
            $email = $_POST['email'];
            $team_name = $_POST['team_name'];
            $j_date = $_POST['j_date'];
            $exp = $_POST['exp'];
            $salary = $_POST['salary'];
            $c_email = $_POST['c_email'];
            $c_pass = $_POST['c_pass'];
            $status = $_POST['status'];

            
            // File upload handling
            $degree_file = $_FILES['degree']['name'];
            $resume_file = $_FILES['resume']['name'];
        
            // Specify the directory where you want to store the files
            $upload_directory = 'storage/employeedata/';
        
            // Create the full path for the uploaded files
            $degree_target_path = $upload_directory . $degree_file;
            $resume_target_path = $upload_directory . $resume_file;
        
            // Move the uploaded files to the specified directory
            move_uploaded_file($_FILES['degree']['tmp_name'], $degree_target_path);
            move_uploaded_file($_FILES['resume']['tmp_name'], $resume_target_path);
        
            // Modify your SQL query to include the file names
            $q = "INSERT INTO employee (e_fname, e_lname, e_role, e_bdate, e_country, e_state, e_city, e_add, e_pin, e_mob, e_alt_mob, e_email, e_team_name, e_joindate, e_exp, e_deg, e_resume, e_salary, e_com_email, e_pwd, e_status) 
            VALUES ('$f_name', '$l_name', '$e_role', '$e_bate', '$e_country', '$e_state', '$e_city', '$e_add', '$pincode', '$mono', '$alte_mono', '$email', '$team_name', '$j_date', '$exp', '$degree_file', '$resume_file', '$salary', '$c_email', '$c_pass', '$status')";
          
            //echo $q;
            // Execute your SQL query to insert the data into the database
             $insert = mysqli_query($conn, $q);
             echo '<script type="text/javascript">window.location.href="employee-list.php";</script>';
        }
        
         }

   
      ?>
      <body>
         <main class="main-content">
           
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
                                    <input type="text" class="form-control" name="f_name" id="fname" placeholder="First Name" required>
                                    <!-- <span class="error"><?php // echo $e_fname; ?></span>                              -->
                                 </div>
                                 
                                 <div class="form-group col-md-6">
                                    <label class="form-label" for="lname">Last Name:</label>
                                    <input type="text" class="form-control" id="lname" name="l_name" placeholder="Last Name"required>
                                    <!-- <span class="error"><?php // echo $e_lname; ?></span>    -->
                                 </div>
                                 <div class="form-group">
                                       <label class="form-label">Employee Role:</label>
                                       <select class="selectpicker form-control" name="e_role" data-style="py-0" required>
                                          
                                          <?php
                                          // Assuming $conn is your database connection object
                                          $query = "SELECT role_name, r_status FROM role";
                                          $result = mysqli_query($conn, $query);
                                          if(mysqli_num_rows($result) > 0) {
                                             while($row = mysqli_fetch_assoc($result)) {
                                                   if($row['r_status'] == "active" || $row['t_status'] == "Active") {
                                                      echo "<option>".$row['role_name']."</option>";
                                                   }
                                             }
                                          }
                                          ?>
                                       </select>
                                 </div>


                                 
                                 <div class="form-group col-md-12">
                                    <label class="form-label" for="bdate">bdate:</label>
                                    <input type="date" class="form-control" name="e_bate" id="bdate" placeholder="Enter your Birthday" required>
                                    <!-- <span class="error"><?php // echo $e_lname; ?></span>    -->
                                 </div>
                                 
                                 <div class="form-group col-md-4">
                                    <label class="form-label">Country:</label>
                                    <select type="text" name="e_country" id="country" class="form-control" required>
                                       <option>Select Country</option>
                                    </select>
                                 </div>

                                 <div class="form-group col-sm-4">
                                    <label class="form-label">State:</label>
                                    <select type="text" id="state" name="e_state" class="form-control" required></select>
                                    
                                 </div>

                                 <div class="form-group col-sm-4">
                                    <label class="form-label">City:</label>
                                    <select name="e_city" id="city" class="form-control" required></select>
                                   
                                 </div>

                                 <div class="form-group col-md-12">
                                    <label class="form-label" for="add1">Street Address 1:</label>
                                    <input type="text" class="form-control" id="add1" name="address" placeholder="Street Address 1" required>
                                 <!-- <span class="error"><?php // echo $e_fname; ?></span>   -->
                                 </div>

                                 <div class="form-group col-md-12">
                                    <label class="form-label" for="pno">Pin Code:</label>
                                    <input type="text" class="form-control" id="pno" name="pincode"  pattern="\d{6}" title="Please enter a 6-digit PIN code"  placeholder="Pin Code" required>
                                 <!-- <span class="error"><?php // echo $e_fname; ?></span>   -->
                                 </div>
                              
                                 <div class="form-group col-md-6">
                                 <label class="form-label" for="mobno">Mobile Number:</label>
                                    <input type="text" class="form-control" id="mobno" pattern="^\d{10}$" title="Please enter a 10-digit mobile number "  name="mono" placeholder="Mobile Number" required>
                                 <!-- <span class="error"><?php // echo $e_fname; ?></span>   -->
                                 </div>
                                 <div class="form-group col-md-6">
                                    <label class="form-label" for="altconno">Alternate Contact:</label>
                                    <input type="text" class="form-control" id="altconno" name="alte_mono" pattern="^\d{10}$" title="Please enter a 10-digit mobile number " placeholder="Alternate Contact"required>
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
                                    <label class="form-label" for="jdate">Joining Date:</label>
                                    <input type="date" class="form-control" name="j_date" id="jdate" placeholder="Enter your Joining Date" required>
                                    <!-- <span class="error"><?php // echo $e_lname; ?></span>    -->
                                 </div>
                                 
                                 <div class="form-group col-md-12">
                                    <label class="form-label" for="Experience">Experience: </label>
                                    <input type="number" class="form-control" id="Experience" name="exp" placeholder="Experience in year/ month" min="0" max="100" required>
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
                                 <input type="number" class="form-control" name="salary" id="Salary" placeholder="Salary" min="500" required>
                              <!-- <span class="error"><?php // echo $e_fname; ?></span>   -->
                              </div>   
                              <hr>
                              <h5 class="mb-3">Security</h5>
                              <div class="row">
                                 <div class="form-group col-md-6">
                                    <label class="form-label" for="uname">Employee Compney Email:</label>
                                    <input type="email" class="form-control" id="c_email" name="c_email" placeholder="Employee Compney Email" isValidEmail required >
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
                              <input type="submit" value="submit" onclick="validateEmails()" class="btn btn-primary" name="sub_btn1">
                              
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