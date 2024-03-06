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
	<title>Role</title>
   <style>
        .error {
      color: red;
    }
   
   </style>
	<!-- <link rel="stylesheet" href="css/main.min.css"> -->

<?php                 
    $pid = $_GET['id'];
                    
    if (isset($_GET['id'])) {
        $qry = "SELECT * FROM role WHERE id=?";
        $stmt = mysqli_prepare($conn, $qry);
        mysqli_stmt_bind_param($stmt, "i", $pid);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_array($result);
    }

    if (isset($_POST['sub_btn'])) {
        // Update text fields in the database
        $q = "UPDATE role SET role_name=?, r_status=? WHERE id=?";
        $stmt = mysqli_prepare($conn, $q);
        mysqli_stmt_bind_param($stmt, "ssi", $_POST['role_name'], $_POST['r_status'], $pid);
        mysqli_stmt_execute($stmt);
    
        echo '<script type="text/javascript">window.location.href="roletable.php";</script>';
        exit();
    }
    
    ?>
<body>
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
                     <h4 class="card-title">Update Employee Role</h4>
                     </div>
                     <a href="roletable.php"><button class="btn btn-primary" style="margin:10 10 10 10 "> back</button></a>

                  </div>
                  <div class="card-body">
                     <div class="new-employee-info">
                     <!-- form-->

                <form method="POST" action="">
                    <div class="form-group">
                        <div class="profile-img-edit position-relative">
                            <!-- insert add profile -->
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label class="form-label" for="rname">Role Name:</label>
                                <input type="text" class="form-control" name="role_name" id="Rolename" placeholder="RoleName" value="<?php echo $row['role_name']?>" required >
                                <!-- <span class="error"><?php echo  $rolne_name_error; ?></span> -->
                            </div> 
                            <fieldset class="mb-3">
                                <legend>Status:</legend>
                                <div class="form-check">
                                    <input type="radio" name="r_status" value="active" class="form-check-input" id="Active" <?php echo ($row['r_status'] == 'active') ? 'checked' : ''; ?> required>
                                    <label class="form-check-label" for="Active">Active</label>
                                </div>
                                <div class="mb-3 form-check">
                                    <input type="radio" name="r_status" value="inactive" class="form-check-input" id="Inactive" <?php echo ($row['r_status'] == 'inactive') ? 'checked' : ''; ?> required>
                                    <label class="form-check-label" for="Inactive">Inactive</label>
                                </div>
                            </fieldset>
                            <input type="submit" value="Update" class="btn btn-primary" name="sub_btn">
                        </div>
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


   