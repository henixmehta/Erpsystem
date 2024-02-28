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
    .main-content{
      margin-left:265px;
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

			<div class="iq-navbar-header" style="height: 160px;">
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


   