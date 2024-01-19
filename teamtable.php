<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
	<link rel="stylesheet" href="main.min.css">
   <link rel="stylesheet" href="sidebar.css">
   <style>
        .error {
      color: red;
    }
    .main-content{
      margin-left:265px;
      margin-top: 100px;
    }
   </style>
</head>
<body>
<?php 
   include 'sidebar.php';
            ?>
	<main class="main-content">
   <div class="conatiner-fluid content-inners mt-n5 py-0">
      <div>
         <div class="row">
           
            <div class="col-xl-12 col-lg-8">
               <div class="card">
                  <div class="card-header d-flex justify-content-between">
                     
                     <h4 class="card-title">Teams List</h4>
                    <a href="addteam.php"> <button class="btn btn-primary">Add</button></a>
                  </div>
                  <div class="card-body">         
                     <div class="card-body px-0">
               <div class="table-responsive">
               <div class="sidebar-body pt-0 data-scrollbar"  style="max-height: calc(100vh - 100px); overflow-y: auto;">

                  <table id="user-list-table" class="table table-striped" role="grid" data-bs-toggle="data-table">
                     <thead>
                        <tr class="ligth">
                           <th>Id</th>
                           <th>Team Name</th>
                           <th>Team project name</th>
                           <th>Team employee name</th>
                           <th>Team Description</th>
                           <th>Team employee</th>
                           <th>Team project</th>
                           <th>Team status</th>
                           <th style="min-width: 100px">Action</th>
                        </tr>
                     </thead>
                     <tbody>
                    
                     <?php
                        $q = "select * from team " ;
                        $data=mysqli_query($con,$q);
                        while($row=mysqli_fetch_array($data))
                        {       
                        ?>

                        <tr>
                        <td><?php echo $row['t_name']?></td>
                        <td><?php echo $row['t_project_name']?></td>
                        <td><?php echo $row['t_des']?></td>
                        <td><?php echo $row['e_bdate']?></td>
                        <td><?php echo $row['t_emp']?></td>
                        <td><?php echo $row['t_project']?></td>
                        <td><?php echo $row['t_status']?></td>
                        
                        <td><a href="delete.php?id=<?php echo $row['id']?>">delete/</a></td>
                        <td><a href="update.php?id=<?php echo $row['id']?>">update</a></td>

                        </tr>
                        <?php  
                        }
                        ?>
                     </tbody>
                  </table>
               </div>
               </div>
                  
               </div>
            </div>
            </div>
            </div>
        </main>
    </body>
</html>