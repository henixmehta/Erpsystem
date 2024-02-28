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
   <link rel="stylesheet" href="css/main.min.css">
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
           
                // $pid=$_GET['id'];
                
                // if(isset($_GET['id']))
                // {
                //     $qry="select * from project where id='".$pid."'";
                //     $data=mysqli_query($conn,$qry);
                //     $row=mysqli_fetch_array($data);
                // }

                // if(isset($_POST['sub_btn']))
                // {

                //         $q = "update project set p_name='".$_POST['p_name']."',p_client_name='".$_POST['p_client_name']."',t_name='".$_POST['t_name']."',p_lan='".$_POST['p_lan']."',p_client_mob='".$_POST['p_client_mob']."',com_img='".$_POST['com_img']."',p_status='".$_POST['p_status']."' where id='".$pid."' ";
                //       mysqli_query($conn,$q);

                //     header("location:clientproject.php");
                // }


                
                $pid = $_GET['id'];
                
                if (isset($_GET['id'])) {
                    $qry = "SELECT * FROM project WHERE id=?";
                    $stmt = mysqli_prepare($conn, $qry);
                    mysqli_stmt_bind_param($stmt, "i", $pid);
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                    $row = mysqli_fetch_array($result);
                }
                
                if (isset($_POST['sub_btn'])) {
                    // Update text fields in the database
                    $q = "UPDATE project SET p_name=?, p_client_name=?, t_name=?, p_lan=?, p_client_mob=?, p_status=? WHERE id=?";
                    $stmt = mysqli_prepare($conn, $q);
                    mysqli_stmt_bind_param($stmt, "ssssssi", $_POST['p_name'], $_POST['p_client_name'], $_POST['t_name'], $_POST['p_lan'], $_POST['p_client_mob'], $_POST['p_status'], $pid);
                    mysqli_stmt_execute($stmt);
                
                    // Handle image upload if a file is selected
                    if (isset($_FILES["com_img"]) && $_FILES["com_img"]["error"] == 0) {
                        $targetDirectory = "storage/clientproject/";
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
                
                    echo '<script type="text/javascript">window.location.href="clientproject.php";</script>';
          
                    exit();
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
					<form method="POST" enctype="multipart/form-data">
               <div class="form-group">
                           <div class="profile-img-edit position-relative">
							<!-- insert add profile -->
                           </div>
                           
                           <div class="row">
                               <div class="form-group col-md-15">
                                   <label class="form-label" for="fname">Client / Compney Name:</label>
                                   <input type="text" class="form-control" id="tname" placeholder="Client / Compney  Name" name="p_client_name" value="<?php echo $row['p_client_name']; ?>">
                                                             
                                </div>
                                <div class="form-group col-md-15">
                                    <label class="form-label" for="Degree"> Client / Compney  Image </label>
                                    <input type="file" class="form-control" id="Degree" placeholder="Client / Compney  Image"  name="com_img">
                                    <div><?php echo $row['com_img'];?></div>
                                   
                                </div>
                                <div class="form-group col-md-15">
                                    <label class="form-label" for="fname">Project Name:</label>
                                    <input type="text" class="form-control" id="tname" placeholder="Project Name" name="p_name" value="<?php echo $row['p_name']; ?>">
                                   
                                </div>
                                <div class="form-group col-md-15">
                                    <label class="form-label" for="fname">Client / Compney contact:</label>
                                    <input type="text" class="form-control" id="tname" placeholder="Client / Compney  contact" name="p_client_mob" value="<?php echo $row['p_client_mob']; ?>">
                                   
                                </div>
                                <div class="form-group">
                                 <div class="form-group col-md-15">
                                 <label class="form-label" for="fname">Project Language:</label>
                                 <input type="text" class="form-control" id="tname" placeholder="Project Language" name="p_lan" value="<?php echo $row['p_lan']; ?>">
                              </div>

                              <fieldset class="mb-3">
                              <div class="form-group col-md-15">
                                 <label class="form-label" for="add1">Project Description</label>
                                 <input type="text" class="form-control" id="add1" placeholder="Project Description" name="p_des" value="<?php echo $row['p_des']; ?>">
                              </div>
                              
                            <div class="form-group">
                            <label class="form-label">Team Name:</label>
                            <select name="t_name" class="selectpicker form-control" data-style="py-0" value="<?php echo $row['t_name'] ?>" required>
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
                                <input type="radio" class="form-check-input" name="p_status" value="active"   id="Active" checked>
                                <label class="form-check-label" for="Active">Active</label>
                            </div>
                            <div class="mb-3 form-check">
                                <input type="radio" class="form-check-input" name="p_status" value="inactive">
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