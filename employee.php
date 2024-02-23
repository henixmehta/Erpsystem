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
         <link rel="stylesheet" href="main.min.css">
         <script src="js/jquery/3.7.1.min.js" type="text/javascript"></script>
         <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {

                $('#country').change(function() {
                    loadState($(this).find(':selected').val())
                })
                $('#state').change(function() {
                    loadCity($(this).find(':selected').val())
                })


            });

            function loadCountry() {
                $.ajax({
                    type: "POST",
                    url: "ajax.php",
                    data: "get=country"
                }).done(function(result) {


                    $(result).each(function() {
                        $("#country").append($(result));
                    })
                });
            }
            function loadState(countryId) {
                $("#state").children().remove()
                $.ajax({
                    type: "POST",
                    url: "ajax.php",
                    data: "get=state&countryId=" + countryId
                }).done(function(result) {

                    $("#state").append($(result));

                });
            }
            function loadCity(stateId) {
                $("#city").children().remove()
                $.ajax({
                    type: "POST",
                    url: "ajax.php",
                    data: "get=city&stateId=" + stateId
                }).done(function(result) {

                    $("#city").append($(result));

                });
            }

            // init the countries
            loadCountry();
        </script>


            <style>
                        .error {
                        color: red;
                     }
                     .main-content{
                        margin-left:265px;
                     }
            </style>


     <?php  
      if(isset($_POST['sub_btn1'])){

         $f_name = $_POST['f_name'];
         $l_name = $_POST['l_name'];
         $e_role = $_POST['e_role'];
         $e_country = $_POST['e_country'];
         $e_state = $_POST['e_state'];
         $e_city = $_POST['e_city'];
         $pincode = $_POST['pincode'];
         $mono = $_POST['mono'];
         $alte_mono = $_POST['alte_mono'];
         $email = $_POST['email'];
         $team_name = $_POST['team_name'];
         $j_date = $_POST['j_date'];
         $exp = $_POST['exp'];
         $degree = $_POST['degree'];
         $resume = $_POST['resume'];
         $salary = $_POST['salary'];
         $c_email = $_POST['c_email'];
         $c_pass = $_POST['c_pass'];
         $status = $_POST['status'];
         
         $q = "insert into employee values(NULL,'".$f_name."','".$l_name."','".$e_role."','".$e_country."','".$e_state."','".$e_city."','".$pincode."','".$mono."','".$alte_mono."','".$email."','".$team_name."','".$j_date."','".$exp."','".$degree."','".$resume."','".$salary."','".$c_email."','".$c_pass."','".$status."')";
         $insert = mysqli_query($conn,$q);

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
                     </div>
                     <div class="card-body">
                        <div class="new-employee-info">
                  <form method="POST">
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
                                    <select name="type" class="selectpicker form-control" name="e_role" data-style="py-0" required>
                                       <option>Select</option>
                                       <?php
                                       // Assuming $conn is your database connection object
                                       $query = "SELECT role_name, r_status FROM role";
                                       $result = mysqli_query($conn, $query);
                                       if(mysqli_num_rows($result) > 0) {
                                             while($row = mysqli_fetch_assoc($result)) {
                                                if($row['r_status'] == "active") {
                                                   echo "<option>".$row['role_name']."</option>";
                                                }
                                             }
                                       }
                                       ?>
                                    </select>
                                 </div>

                                 
                                 <div class="form-group col-md-12">
                                    <label class="form-label" for="bdate">bdate:</label>
                                    <input type="date" class="form-control" name="e_bdate" id="bdate" placeholder="Enter your Birthday" required>
                                    <!-- <span class="error"><?php // echo $e_lname; ?></span>    -->
                                 </div>
                                 
                                 <div class="form-group col-md-4">
                                    <label class="form-label">Country:</label>
                                 <select type="text" name="country" id="country" name="e_country" class="form-control" >
                                    <option>Select Country</option>
                                 </select>
                                 </div>
                                 
                                 <div class="form-group col-sm-4">
                                    <label class="form-label">state:</label>
                                    <select type="text" id="state" name="state" name="e_state" class="form-control" ></select>
                                 </div>
                                 <div class="form-group col-sm-4">
                                    <label class="form-label">City:</label>
                                    <select name="e_city" id="city" class="form-control" ></select>
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
                                    <input type="text" class="form-control" id="mobno" nmae="mono" placeholder="Mobile Number" required>
                                 <!-- <span class="error"><?php // echo $e_fname; ?></span>   -->
                                 </div>
                                 <div class="form-group col-md-6">
                                    <label class="form-label" for="altconno">Alternate Contact:</label>
                                    <input type="text" class="form-control" id="altconno" name="alte_mono" placeholder="Alternate Contact"required>
                                 <!-- <span class="error"><?php // echo $e_fname; ?></span>   -->
                                 </div>
                                 <div class="form-group col-md-12">
                                    <label class="form-label" for="email"> Email:</label>
                                    <input type="email" class="form-control" id="email" nmae="email" placeholder="Email" required>
                                 <!-- <span class="error"><?php // echo $e_fname; ?></span>   -->
                                 </div>
                                 <div class="form-group">
                                    <label class="form-label">Team Name:</label>
                                    <select name="type" class="selectpicker form-control" name="team_name" data-style="py-0" required>
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
                                       <input type="radio" name="status" name="inactive" class="form-check-input" id="Inactive" >
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