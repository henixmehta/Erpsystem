<?php 
   include 'sidebar.php';
   include 'connection.php';
?>
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
	<main class="main-content">
   <div class="conatiner-fluid content-inner mt-n5 py-0">
      <div>
         <div class="row">
           
            <div class="col-xl-12 col-lg-8">
               <div class="card">
                  <div class="card-header d-flex justify-content-between">
                     
                     <h4 class="card-title">Teams List</h4>
                    <a href="addclientproject.php"> <button class="btn btn-primary">Add</button></a>
                  </div>
                  <div class="card-body">         
                     <div class="card-body px-0">
               <div class="table-responsive">
               <div class="sidebar-body pt-0 data-scrollbar"  style="max-height: calc(100vh - 100px); overflow-y: auto;">

                  <table id="user-list-table" class="table table-striped" role="grid" data-bs-toggle="data-table">
                     <thead>
                        <tr class="ligth">
                           <th>Id</th>
                           <th>Client Name / Compney Name</th>
                           <th>Client_Image / Compney_image</th>
                           <th>Project_name</th>
                           <th>Contect</th>
                           <th>Team_name</th>
                           <th>Project_language</th>
                           <th>Status</th>
                           <th>Project_Description</th>
                           <th style="min-width: 100px">Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        <tr>
                            <td>Anna Sthesia</td>
                            
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