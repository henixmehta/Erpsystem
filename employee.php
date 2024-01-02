<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Employee</title>
   <style>
        .error {
      color: red;
    }
    .main-content{
      margin-left:265px;
    }
   </style>
	<link rel="stylesheet" href="main.min.css">



<body>
            <?php 
               include 'sidebar.php';
               include 'formvalidation.php';

            ?>
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
      <div>
         <div class="row">
           
            <div class="col-xl-12 col-lg-8">
               <div class="card">
                  <div class="card-header d-flex justify-content-between">
                     <div class="header-title">
                     <h4 class="card-title">Add New User</h4>
                        <hr>
                        <h4 class="card-title">New User Information</h4>
                     </div>
                  </div>
                  <div class="card-body">
                     <div class="new-user-info">
                     <!-- form    -->

         
					<form method="POST">
               <div class="form-group">
                           <div class="profile-img-edit position-relative">
    
							<!-- insert add profile -->
                              
                           </div>

                        </div>
                        <div class="form-group">
                           <label class="form-label">User Role:</label>
                           <select name="type" class="selectpicker form-control" data-style="py-0">
                              <option>Select</option>
                              <option>Web Designer</option>
                              <option>Web Developer</option>
                              <option>Tester</option>
                              <option>Php Developer</option>
                              <option>Ios Developer </option>
                           </select>
                        </div>
                           <div class="row">
                              <div class="form-group col-md-6">
                                 <label class="form-label" for="fname">First Name:</label>
                                 <input type="text" class="form-control" id="fname" placeholder="First Name">
                                 <span class="error"><?php echo $e_fname; ?></span>                             
                              </div>
                              
                              <div class="form-group col-md-6">
                                 <label class="form-label" for="lname">Last Name:</label>
                                 <input type="text" class="form-control" id="lname" placeholder="Last Name">
                                 <span class="error"><?php echo $e_lname; ?></span>   
                              </div>

                              <div class="form-group col-md-6">
                                 <label class="form-label" for="bdate">bdate:</label>
                                 <input type="date" class="form-control" id="bdate" placeholder="Enter your Birthday">
                                 <span class="error"><?php echo $e_lname; ?></span>   
                              </div>
                              
                              <div class="form-group col-sm-12">
                                 <label class="form-label">Country:</label>
                                 <select name="country" class="form-control" >
                                    <option>Select Country</option>
                                    <option>Caneda</option>
                                    <option>Noida</option>
                                    <option >USA</option>
                                    <option>India</option>
                                    <option>Africa</option>
                                 </select>
                              </div>
                              <div class="form-group col-md-12">
                                 <label class="form-label" for="city">Town/City:</label>
                                 <input type="text" class="form-control" id="city" placeholder="Town/City">
                              <span class="error"><?php echo $e_fname; ?></span>  
                              </div>
                              <div class="form-group col-md-6">
                                 <label class="form-label" for="add1">Street Address 1:</label>
                                 <input type="text" class="form-control" id="add1" placeholder="Street Address 1">
                              <span class="error"><?php echo $e_fname; ?></span>  
                              </div>
                              <div class="form-group col-md-6">
                                <label class="form-label" for="mobno">Mobile Number:</label>
                                 <input type="text" class="form-control" id="mobno" placeholder="Mobile Number">
                              <span class="error"><?php echo $e_fname; ?></span>  
                              </div>
                              <div class="form-group col-md-6">
                                 <label class="form-label" for="altconno">Alternate Contact:</label>
                                 <input type="text" class="form-control" id="altconno" placeholder="Alternate Contact">
                              <span class="error"><?php echo $e_fname; ?></span>  
                              </div>
                              <div class="form-group col-md-6">
                                 <label class="form-label" for="email">Email:</label>
                                 <input type="email" class="form-control" id="email" placeholder="Email">
                              <span class="error"><?php echo $e_fname; ?></span>  
                              </div>
                              <div class="form-group col-md-6">
                                 <label class="form-label" for="pno">Pin Code:</label>
                                 <input type="text" class="form-control" id="pno" placeholder="Pin Code">
                              <span class="error"><?php echo $e_fname; ?></span>  
                              </div>
                             
                              <div class="form-group col-md-12">
                                 <label class="form-label" for="Salary">Salary: </label>
                                 <input type="text" class="form-control" id="Salary" placeholder="Salary">
                              <span class="error"><?php echo $e_fname; ?></span>  
                              </div>
                              <div class="form-group col-md-6">
                                 <label class="form-label" for="Joining Date">Joining Date:</label>
                                 <input type="date" class="form-control" id="bdate" placeholder="Enter your Joining Date">
                                 <span class="error"><?php echo $e_lname; ?></span>   
                              </div>
                              <div class="form-group col-md-12">
                                 <label class="form-label" for="Experience">Experience: </label>
                                 <input type="text" class="form-control" id="Experience" placeholder="Experience in year/ month" >
                              <span class="error"><?php echo $e_fname; ?></span>  
                              </div>
                              <div class="form-group col-md-12">
                                 <label class="form-label" for="Degree">Degree certificate: </label>
                                 <input type="file" class="form-control" id="Degree" placeholder="Degree certificate" >
                              <span class="error"><?php echo $e_fname; ?></span>  
                              </div>
                              <div class="form-group col-md-12">
                                 <label class="form-label" for="Resume">Resume: </label>
                                 <input type="file" class="form-control" id="Resume" placeholder="Resume" >
                              <span class="error"><?php echo $e_fname; ?></span>  
                              </div>
                           </div>
                           <hr>
                           <h5 class="mb-3">Security</h5>
                           <div class="row">
                              <div class="form-group col-md-12">
                                 <label class="form-label" for="uname">User Name:</label>
                                 <input type="text" class="form-control" id="uname" placeholder="User Name">
                              </div>
                              <div class="form-group col-md-6">
                                 <label class="form-label" for="pass">Password:</label>
                                 <input type="password" class="form-control" id="pass" placeholder="Password">
                              </div>
                              <div class="form-group col-md-6">
                                 <label class="form-label" for="rpass">Repeat Password:</label>
                                 <input type="password" class="form-control" id="rpass" placeholder="Repeat Password ">
                              </div>
                           </div>
                           <div class="checkbox">
                              <label class="form-label"><input class="form-check-input me-2" type="checkbox" value="" id="flexCheckChecked">Enable Two-Factor-Authentication</label>
                           </div>
                           <!-- <button type="submit" name="sub_btn" class="btn btn-primary">Add New User</button> -->
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


   