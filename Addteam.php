   <?php 
      include 'sidebar.php';
      // include 'formvalidation.php';
      include 'connection.php';
   ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Team</title>
   <style>
        .error {  
      color: red;
    }
  
   </style>
	<link rel="stylesheet" href="css/main.min.css">

<body> 
   <?php
   
      if(isset($_POST['sub_btn'])) {
          // File upload handling
       $project_file = $_FILES['timg']['name'];
   
       // Specify the directory where you want to store the files
       $upload_directory = 'storage/team/';
   
       // Create the full path for the uploaded files
       $project_target_path = $upload_directory . $project_file;
   
       // Move the uploaded files to the specified directory
       move_uploaded_file($_FILES['timg']['tmp_name'], $project_target_path);
       
       $q = "INSERT INTO team(`id`, `t_name`, `t_project_name`, `t_des`, `t_emp`, `t_language`, `t_status`, `t_img`) VALUES (NULL, '".$_POST['tname']."', '".$_POST['tpname']."', '".$_POST['desc']."', '".$_POST['ename']."', '".$_POST['lang']."', '".$_POST['tstatus']."', '$project_file')";

       $insert = mysqli_query($conn, $q);   
       echo '<script type="text/javascript">window.location.href="teamtable.php";</script>';
      }
   ?>

<main class="main-content">

		
         <div class="conatiner-fluid content-inner mt-n5 py-0">
      <div>
         <div class="row">
           
            <div class="col-xl-12 col-lg-8">
               <div class="card">
                  <div class="card-header d-flex justify-content-between">
                     <div class="header-title">
                        <h4 class="card-title">Add New Team Information</h4>
                     </div>
                  </div>
                  <div class="card-body">
                     <div class="new-Team-info">
                     <!-- form-->

                     <form method="POST" enctype="multipart/form-data">
                           <div class="form-group">
                              <div class="profile-img-edit position-relative">
                                    <!-- insert add profile -->
                              </div>
                           </div>
                           <div class="row">
                              <div class="form-group col-md-15">
                                    <label class="form-label" for="tname">Team Name:</label>
                                    <input type="text" class="form-control" id="tname" name="tname" placeholder="Team Name" required>
                              </div>
                              
                              <div class="form-group col-md-15">
                                    <label class="form-label" for="image"> Team Image </label>
                                    <input type="file" class="form-control" id="Degree" name="timg" placeholder="Team Image" required >
                              </div>

                              <div class="form-group col-md-15">
                                    <label class="form-label" for="tname">Team project Name:</label>
                                    <input type="text" class="form-control" id="tpname" name="tpname" placeholder="Team Name" required>
                              </div>
                            
                              <div class="form-group col-md-15">
                                    <label class="form-label" for="tname">Employee name:</label>
                                    <input type="text" class="form-control" id="ename" name="ename" placeholder="Employee Name" required>
                              </div>

                           </div>
                           <div class="form-group">
                              <label class="form-label" for="add1">Team Description</label>
                              <input type="text" class="form-control" id="desc" name="desc" placeholder="Team Description" required>
                           </div>
                           <div class="form-group">
                              <label class="form-label">Team Projects language</label>
                              <select name="lang" class="selectpicker form-control" data-style="py-0" required>
                                    <option>Select</option>
                                    <option>Laravel</option>
                                    <option>Core PHP</option>
                                    <option>Android</option>
                                    <option>IOS</option>
                                    <option>NODE JS </option>
                              </select>
                           </div>
                           <fieldset class="mb-3">
                              <legend>Status:</legend>
                              <div class="form-check">
                                    <input type="radio" name="tstatus" class="form-check-input" id="Active" value="active" checked>
                                    <label class="form-check-label" for="Active">Active</label>
                              </div>
                              <div class="mb-3 form-check">
                                    <input type="radio" name="tstatus" class="form-check-input" id="Inactive" value="Inactive" >
                                    <label class="form-check-label" for="Inactive">Inactive</label>
                              </div>
                           </fieldset> 
                           <div class="form-group col-md-15">
                              <input type="submit" value="Submit" class="btn btn-primary" name="sub_btn">
                           </div>
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


   