<?php
include '../sidebar/sidebar.php';
include '../connection/connection.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <!-- <link rel="stylesheet" href="css/main.min.css"> -->
   <title>Team</title>
   <style>
      .error {
         color: red;
      }
   </style>
   <?php

   if (isset($_POST['sub_btn'])) {
      // File upload handling
      $project_file = $_FILES['com_img']['name'];

      // Specify the directory where you want to store the files
      $upload_directory = '../storage/clientproject/';

      // Create the full path for the uploaded files
      $project_target_path = $upload_directory . $project_file;

      // Move the uploaded files to the specified directory
      move_uploaded_file($_FILES['com_img']['tmp_name'], $project_target_path);

      $q = "INSERT INTO project(`id`, `p_name`, `p_client_name`, `t_name`, `p_lan`, `p_client_mob`, `p_des`, `p_status`, `com_img`) VALUES (NULL, '" . $_POST['proj_name'] . "', '" . $_POST['com_name'] . "', '" . $_POST['team_name'] . "', '" . $_POST['proj_lang'] . "', '" . $_POST['com_con'] . "', '" . $_POST['proj_desc'] . "', '" . $_POST['p_status'] . "',  '$project_file')";
      $insert = mysqli_query($conn, $q);
      echo '<script type="text/javascript">window.location.href="clientproject.php";</script>';
   }
   ?>

<body>
   <main class="main-content">


      <div class="conatiner-fluid content-inner mt-n5 py-0">
         <div>
            <div class="row">

               <div class="col-xl-12 col-lg-8">
                  <div class="card">
                     <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                           <h4 class="card-title">Add New client Project Information</h4>
                        </div>
                        <a href="clientproject.php"><button class="btn btn-primary" style="margin:10 10 10 10 "> back</button></a>
                     </div>
                     <div class="card-body">
                        <div class="new-Team-info">
                           <!-- form-->
                           <form method="POST" enctype="multipart/form-data">
                              <div class="form-group">
                                 <div class="profile-img-edit position-relative">
                                    <!-- insert add profile -->
                                 </div>

                                 <div class="row">
                                    <div class="form-group col-md-15">
                                       <label class="form-label" for="fname">Client / Compney Name:</label>
                                       <input type="text" class="form-control" id="tname" placeholder="Client / Compney  Name" name="com_name" required>
                                    </div>
                                    <div class="form-group col-md-15">
                                       <label class="form-label" for="Degree"> Client / Compney Image </label>
                                       <input type="file" class="form-control" id="image" placeholder="Client / Compney  Image" name="com_img" required>
                                    </div>
                                    <div class="form-group col-md-15">
                                       <label class="form-label" for="fname">Project Name:</label>
                                       <input type="text" class="form-control" id="tname" placeholder="Project  Name" name="proj_name" required>
                                    </div>
                                    <div class="form-group col-md-15">
                                       <label class="form-label" for="fname">Client / Compney contact:</label>
                                       <input type="text" class="form-control" id="tname" placeholder="Client / Compney  contact" name="com_con" required>
                                    </div>
                                    <div class="form-group">
                                       <div class="form-group col-md-15">
                                          <label class="form-label" for="fname">Project Language:</label>
                                          <input type="text" class="form-control" id="tname" placeholder="Project Language" name="proj_lang" required>
                                       </div>

                                       <fieldset class="mb-3">
                                          <div class="form-group col-md-15">
                                             <label class="form-label" for="add1">Project Description</label>
                                             <input type="text" class="form-control" id="add1" placeholder="Project Description" name="proj_desc" requiredrequired>
                                          </div>

                                          <div class="form-group">
                                             <label class="form-label">Team Name:</label>
                                             <select name="team_name" class="selectpicker form-control" data-style="py-0" required>
                                                <option>Select</option>
                                                <?php
                                                // Assuming $conn is your database connection object
                                                $t_query = "SELECT t_name, t_status FROM team";
                                                $result = mysqli_query($conn, $t_query);
                                                if (mysqli_num_rows($result) > 0) {
                                                   while ($row = mysqli_fetch_assoc($result)) {
                                                      if ($row['t_status'] == "active" || $row['t_status'] == "Active") {
                                                         echo "<option>" . $row['t_name'] . "</option>";
                                                      }
                                                   }
                                                }
                                                ?>
                                             </select>
                                          </div>


                                          <legend>Status:</legend>
                                          <div class="form-check">
                                             <input type="radio" class="form-check-input" name="p_status" value="active" id="Active" checked>
                                             <label class="form-check-label" for="Active">Active</label>
                                          </div>
                                          <div class="mb-3 form-check">
                                             <input type="radio" class="form-check-input" name="p_status" value="inactive" id="Inactive">
                                             <label class="form-check-label" for="Inactive">Inactive</label>
                                          </div>
                                       </fieldset>
                                       <input type="submit" value="submit" class="btn btn-primary" name="sub_btn">
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