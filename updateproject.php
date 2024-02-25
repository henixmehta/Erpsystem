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
if(isset($_GET['id'])) {
        // Retrieve the project ID from the URL
        $pid = $_GET['id'];

        // Construct the SQL query to retrieve project details based on the project ID
        $query = "SELECT * FROM project WHERE id = $pid";

        // Execute the SQL query
        $result = mysqli_query($conn, $query);

        // Check if the query executed successfully and if any rows are returned
        if($result && mysqli_num_rows($result) > 0) {
            // Fetch the project details
            $row = mysqli_fetch_assoc($result);

            // Assign project details to variables
            $pname = $row['p_name'];
            $cname = $row['p_client_name'];
            $com_con = $row['p_client_mob'];
            $proj_lang = $row['p_lan'];
            $proj_desc = $row['p_des'];
            $team_name = $row['t_name'];
            $p_status = $row['p_status'];
            $img = $row['com_img'];

        } else {
            // Handle the case when no project details are found
            echo "Error: No project found with ID $pid";
            // You may redirect the user or handle this case as per your requirement
            exit();
        }
    } else {
        // Redirect the user if the project ID is not provided
        echo '<script>window.location.href = "clientproject.php";</script>';
    }

    // Check if the update form is submitted
    if(isset($_POST['sub_btn'])) {
        // Check if the 'id' index is set in $_POST
        if(isset($_POST['id'])) {
            // Assign form field values to variables
            $pid = $_POST['id'];
            $pname = $_POST['proj_name'];
            $cname = $_POST['com_name'];
            $com_con = $_POST['com_con'];
            $proj_lang = $_POST['proj_lang'];
            $proj_desc = $_POST['proj_desc'];
            $team_name = $_POST['team_name'];
            $p_status = $_POST['p_status'];
            $img = isset($_POST['com_img']) ? $_POST['com_img'] : ''; // Set $img to $_POST['com_img'] if it is set, otherwise set it to an empty string

            // Construct the update query
            $q = "update project set p_name ='$pname', p_client_name='$cname', t_name='$team_name' , p_lan='$proj_lang' , p_client_mob= '$com_con' , p_des='$proj_desc' , p_status='$p_status' , com_img='$img' WHERE id='$pid'";
            // Execute the update query
            $insert = mysqli_query($conn, $q); 
            
            // Check if the update was successful
            if($insert) {
                // Redirect to the clientproject.php page after successful update
                echo '<script>window.location.href = "clientproject.php";</script>';
            } else {
                // Display error message if update fails
                echo "Error: " . mysqli_error($conn);
            }
        } else {
            // Display error message if 'id' is not set in $_POST
            echo "Error: Project ID is not provided.";
        }
    }
?>
<body>
<main class="main-content">
		<div class="iq-navbar-header" style="height: 100px;"></div>
        <div class="conatiner-fluid content-inner mt-n5 py-0"><div>
        <div class="row">   
            <div class="col-xl-12 col-lg-8">
               <div class="card">
                  <div class="card-header d-flex justify-content-between">
                     <div class="header-title">
                        <h4 class="card-title">Update client Project Information</h4>
                     </div>
                  </div>
                  <div class="card-body">
                     <div class="new-Team-info">
                     <!-- form-->         
					<form method="POST">
               <div class="form-group">
                           <div class="profile-img-edit position-relative">
							<!-- insert add profile -->
                           </div>
                           
                           <div class="row">
                               <div class="form-group col-md-15">
                                   <label class="form-label" for="fname">Client / Compney Name:</label>
                                   <input type="text" class="form-control" id="tname" placeholder="Client / Compney  Name" name="com_name" value="<?php echo $cname; ?>">
                                   <span class="error"><?php //echo $e_fname; ?></span>                             
                                </div>
                                <div class="form-group col-md-15">
                                    <label class="form-label" for="Degree"> Client / Compney  Image </label>
                                    <input type="file" class="form-control" id="Degree" placeholder="Client / Compney  Image"  name="com_img" value="<?php echo $img; ?>">
                                    <span class="error"><?php // echo $e_fname; ?></span>  
                                </div>
                                <div class="form-group col-md-15">
                                    <label class="form-label" for="fname">Project Name:</label>
                                    <input type="text" class="form-control" id="tname" placeholder="Project Name" name="proj_name" value="<?php echo $pname; ?>">
                                    <!-- <span class="error"><?php // echo $e_fname; ?></span>                              -->
                                </div>
                                <div class="form-group col-md-15">
                                    <label class="form-label" for="fname">Client / Compney contact:</label>
                                    <input type="text" class="form-control" id="tname" placeholder="Client / Compney  contact" name="com_con" value="<?php echo $com_con; ?>">
                                    <!-- <span class="error"><?php // echo $e_fname; ?></span>                              -->
                                </div>
                                <div class="form-group">
                                <!-- <label class="form-label">Team Name:</label>
                                <select name="type" class="selectpicker form-control" data-style="py-0" name="t_name">
                                    <option>Select</option>
                                    <option>Web Designer</option>
                                    <option>Web Developer</option>
                                    <option>Tester</option>
                                    <option>Php Developer</option>
                                    <option>Ios Developer </option>
                                </select>
                                </div> -->
                                 <div class="form-group col-md-15">
                                 <label class="form-label" for="fname">Project Language:</label>
                                 <input type="text" class="form-control" id="tname" placeholder="Project Language" name="proj_lang" value="<?php echo $proj_lang; ?>">
                                 <span class="error"><?php // echo $e_fname; ?></span>                             
                              </div>

                              <fieldset class="mb-3">
                              <div class="form-group col-md-15">
                                 <label class="form-label" for="add1">Project Description</label>
                                 <input type="text" class="form-control" id="add1" placeholder="Project Description" name="proj_desc" value="<?php echo $proj_desc; ?>">
                              <!-- <span class="error"><?php // echo $e_fname; ?></span>   -->
                              </div>
                              
                            <div class="form-group">
                            <label class="form-label">Team Name:</label>
                            <select name="team_name" class="selectpicker form-control" data-style="py-0" required>
                                <option>Select</option>
                                <?php
                                // Assuming $conn is your database connection object
                                $t_query = "SELECT t_name, t_status FROM team";
                                $result = mysqli_query($conn, $t_query);
                                if(mysqli_num_rows($result) > 0) {
                                    while($row = mysqli_fetch_assoc($result)) {
                                        $selected = ($row['t_name'] == $team_name) ? 'selected' : ''; 
                                        if($row['t_status'] == "active") {
                                            echo "<option $selected>".$row['t_name']."</option>";
                                        }
                                    }
                                }
                                ?>
                            </select>
                            </div>
        
                            <legend>Status:</legend>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" name="p_status" value="active" id="Active" <?php echo ($p_status === 'active') ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="Active">Active</label>
                            </div>
                            <div class="mb-3 form-check">
                                <input type="radio" class="form-check-input" name="p_status" value="inactive" id="Inactive" <?php echo ($p_status === 'inactive') ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="Inactive">Inactive</label>
                            </div>
                         </fieldset> 
                         <input type="submit" value="Update" class="btn btn-primary" name="sub_btn">
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