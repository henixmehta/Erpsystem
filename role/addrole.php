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
   <link rel="stylesheet" href="css/main.min.css">
	<title>Employee</title>
   <style>
        .error {
      color: red;
    }
    
   </style>
   <!-- <script>
    document.addEventListener('DOMContentLoaded', function () {
        var form = document.querySelector('form');

        form.addEventListener('submit', function (event) {
            var roleName = document.getElementById('Rolename').value.trim();
            var statusActive = document.getElementById('Active').checked;
            var statusInactive = document.getElementById('Inactive').checked;

            if (roleName === '') {
                alert('Please enter role name');
                event.preventDefault();
                return;
            }

            if (!statusActive && !statusInactive) {
                alert('Please select status');
                event.preventDefault();
                return;
            }
        });
    });
</script> -->


<?php 

$rolne_name_error = $rolne_status_error ="";

if(isset($_POST['sub_btn1']))
{
      if(empty($_POST['role_name'] && $_POST['r_status']))
      {
         $rolne_name_error = " <li> <b> Enter Role Please </b> </li> ";
         $rolne_status_error = " <li> <b> Enter status Please </b> </li> ";
      }
      //if(empty($_POST['r_status']))
      //{
      //}
      else
      {
         $q = "insert into role values(NULL,'".$_POST['role_name']."','".$_POST['r_status']."')";
         $insert = mysqli_query($conn,$q);
         echo '<script type="text/javascript">window.location.href="clientproject.php";</script>';

      }
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
                     <h4 class="card-title">Add  Employee Role</h4>
                     </div>
                  </div>
                  <div class="card-body">
                     <div class="new-employee-info">
                     <!-- form-->

         
					<form method="POST">
               <div class="form-group">
                           <div class="profile-img-edit position-relative">
							<!-- insert add profile -->
                        </div>
                           <div class="row">
                              <div class="form-group col-md-12 ">
                                 <label class="form-label" for="rname">Role Name:</label>
                                 <input type="text" class="form-control" name="role_name" id="Rolename" placeholder="RoleName" required >
                                 <span class="error"><?php  echo  $rolne_name_error; ?></span>
                              </div> 
                              <fieldset class="mb-3">
                                 <legend>Status:</legend>
                                    <div class="form-check">
                                       <input type="radio" name="r_status" value="active" class="form-check-input" id="Active" required>
                                       <label class="form-check-label" for="Active">Active</label>
                                    </div>
                                    <div class="mb-3 form-check">
                                       <input type="radio" name="r_status" value="inactive" class="form-check-input" id="Inactive" required>
                                       <label class="form-check-label" for="Inactive">Inactive</label>
                                       <span class="error"><?php  echo $rolne_status_error; ?></span>
                                    </div>
                                 </fieldset>
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


   