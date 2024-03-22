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
	<title>Team</title>
   <style>
        .error {  
      color: red;
    }
   
   </style>
	<link rel="stylesheet" href="css/main.min.css">

<body>


<?php
// Check if the 'id' parameter is set in the URL
if (isset($_GET['id'])) {
    $pid = $_GET['id'];
    
    // Fetch the row from the database based on the provided ID
    $qry = "SELECT * FROM team WHERE id=?";
    $stmt = mysqli_prepare($conn, $qry);
    mysqli_stmt_bind_param($stmt, "i", $pid);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result); // Use mysqli_fetch_assoc to fetch the row as an associative array
}


     
if (isset($_POST['sub_btn'])) {

   $project_file = $_FILES['com_img']['name'];

   // Specify the directory where you want to store the files
   $upload_directory = '../storage/team/';

   // Create the full path for the uploaded files
   $project_target_path = $upload_directory . $project_file;

   // Move the uploaded files to the specified directory
   move_uploaded_file($_FILES['com_img']['tmp_name'], $project_target_path);





   // Update text fields in the database
   $q = "UPDATE team SET t_name=?, t_project_name=?, t_des=?, t_emp=?, t_language=?, t_status=?, t_img=? WHERE id=?";
   $stmt = mysqli_prepare($conn, $q);

   // Check if image field is empty
   if (!empty($_FILES['com_img']['name'])) {
       mysqli_stmt_bind_param($stmt, "sssssssi", $_POST['tname'], $_POST['tpname'], $_POST['desc'], $_POST['ename'], $_POST['lang'], $_POST['tstatus'], $project_file, $pid);
   } else {
       mysqli_stmt_bind_param($stmt, "sssssssi", $_POST['tname'], $_POST['tpname'], $_POST['desc'], $_POST['ename'], $_POST['lang'], $_POST['tstatus'], $row['t_img'], $pid);
   }
   mysqli_stmt_execute($stmt);
   
   // // Handle image upload if a file is selected
   // if (!empty($_FILES["com_img"]["name"])) {
   //    $targetDirectory = "../storage/clientproject/";
   //    $targetFile = $targetDirectory . basename($_FILES["com_img"]["name"]);
   //    $uploadOk = 1;
   //    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
   // }

   echo '<script type="text/javascript">window.location.href="teamtable.php";</script>';
   exit();
}
?>
<main class="main-content">

			<div class="iq-navbar-header">
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
      <div>
         <div class="row">         
            <div class="col-xl-12 col-lg-8">
               <div class="card">
                  <div class="card-header d-flex justify-content-between">
                     <div class="header-title">
                        <h4 class="card-title">Update Team Information</h4>
                     </div>
                     <a href="teamtable.php"><button class="btn btn-primary" style="margin:10 10 10 10 "> back</button></a>

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
                                    <input type="text" class="form-control" id="tname" name="tname" placeholder="Team Name" value="<?php echo isset($row['t_name']) ? $row['t_name'] : ''; ?>" required>

                              </div>
                              
                              <div class="form-group col-md-15">
                                    <label class="form-label" for="image"> Team Image </label>
                                    <input type="file" class="form-control" id="com_img" name="com_img" placeholder="Team Image"   >
                                    <div><?php echo isset($row['t_img']) ? $row['t_img'] : ''; ?></div>
                              </div>

                              <div class="form-group col-md-15">
                                    <label class="form-label" for="tname">Team project Name:</label>
                                    <input type="text" class="form-control" id="tpname" name="tpname" placeholder="Team Name" value="<?php echo isset($row['t_project_name']) ? $row['t_project_name'] : ''; ?>" required>
                              </div>
                            
                              <div class="form-group col-md-15">
                                    <label class="form-label" for="tname">Employee name:</label>
                                    <input type="text" class="form-control" id="ename" name="ename" placeholder="Team Name" value="<?php echo isset($row['t_emp']) ? $row['t_emp'] : ''; ?>" required>
                              </div>

                           </div>
                           <div class="form-group">
                              <label class="form-label" for="add1">Team Description</label>
                              <input type="text" class="form-control" id="desc" name="desc" placeholder="Team Description" value="<?php echo isset($row['t_des']) ? $row['t_des'] : ''; ?>" required>
                           </div>

                           <div class="form-group">
                            <label class="form-label">Team Projects language</label>
                            <select name="lang" class="selectpicker form-control" data-style="py-0" required>
                                <option>Select</option>
                                <option <?php if (isset($row['t_language']) && $row['t_language'] == 'Laravel') echo 'selected'; ?>>Laravel</option>
                                <option <?php if (isset($row['t_language']) && $row['t_language'] == 'Core PHP') echo 'selected'; ?>>Core PHP</option>
                                <option <?php if (isset($row['t_language']) && $row['t_language'] == 'Android') echo 'selected'; ?>>Android</option>
                                <option <?php if (isset($row['t_language']) && $row['t_language'] == 'IOS') echo 'selected'; ?>>IOS</option>
                                <option <?php if (isset($row['t_language']) && $row['t_language'] == 'NODE JS') echo 'selected'; ?>>NODE JS</option>
                            </select>
                             </div>

                           <fieldset class="mb-3">
                              <legend>Status:</legend>
                              <div class="form-check">
                                    <input type="radio" name="tstatus" class="form-check-input" id="Active" value="active" value="<?php echo isset($row['t_status']) ? $row['t_status'] : ''; ?>" checked>
                                    <label class="form-check-label" for="Active">Active</label>
                              </div>
                              <div class="mb-3 form-check">
                                    <input type="radio" name="tstatus" class="form-check-input" id="Inactive" value="Inactive" >
                                    <label class="form-check-label" for="Inactive">Inactive</label>
                              </div>
                           </fieldset> 
                           <div class="form-group col-md-15">
                              <input type="submit" value="Update" class="btn btn-primary" name="sub_btn">
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


   