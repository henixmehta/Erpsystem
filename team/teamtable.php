   <?php
   include '../sidebar/sidebar.php';
   include '../connection/connection.php';
   ?>

   <body>
      <!DOCTYPE html>
      <html lang="en">

      <head>
         <meta charset="UTF-8">
         <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <title>Team</title>
         <link rel="stylesheet" href="css/main.min.css">
         <!-- <link rel="stylesheet" href="sidebar.css"> -->
         <style>
            .error {
               color: red;
            }
         </style>
      </head>
      <main class="main-content">
         <div class="conatiner-fluid content-inners mt-n5 py-0">
            <div>
               <div class="row">
                  <div class="col-xl-11 col-lg-8">
                     <div class="card">
                        <div class="card-header d-flex justify-content-between">

                           <h4 class="card-title">Teams List</h4>
                           <a href="addteam.php"> <button class="btn btn-primary">Add</button></a>
                        </div>
                        <div class="card-body">
                           <form method="POST" action="" id="searchForm" class="row">
                              <div class="form-group col-md-6">
                                 <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search" name="search" id="searchInput">
                                    <div class="input-group-append">
                                       <span class="input-group-text"><i class="fa fa-search" style="font-size:20px;"></i></span>
                                    </div>
                                 </div>
                              </div>
                           </form>
                           <div class="card-body px-0">
                              <div class="table-responsive">
                                 <div class="sidebar-body pt-0 data-scrollbar" style="max-height: calc(100vh - 100px); overflow-y: auto;">

                                    <table id="user-list-table" class="table table-striped" role="grid" data-bs-toggle="data-table">
                                       <thead>
                                          <tr class="ligth">
                                             <th>Team ID</th>
                                             <th>Team Name</th>
                                             <th>Team image</th>
                                             <th>Team project name</th>
                                             <th>Team Description</th>
                                             <th>Team Leader name</th>
                                             <th>Team language</th>
                                             <th>Team status</th>
                                             <th style="min-width: 100px">Action</th>
                                          </tr>
                                       </thead>
                                       <tbody>

                                          <?php
                                          if (isset($_POST['search'])) {
                                             $search = $_POST['search'];

                                             // Query to search for employees by first name, last name, or team name
                                             $q = "SELECT * FROM team WHERE t_name LIKE '%$search%' OR t_project_name LIKE '%$search%' OR t_language LIKE '%$search%'  ";
                                          } else {
                                             $q = "select * from team ";
                                          }

                                          $data = mysqli_query($conn, $q);
                                          while ($row = mysqli_fetch_array($data)) {
                                          ?>

                                             <tr>
                                                <td><?php echo $row['id'] ?></td>
                                                <td><?php echo $row['t_name'] ?></td>
                                                <td><img src="../storage/team/<?php echo $row['t_img']; ?>" style="max-width: 100px; max-height: 100px; margin-left:50px;"> </td>
                                                <td><?php echo $row['t_project_name'] ?></td>
                                                <td><?php echo $row['t_des'] ?></td>
                                                <td><?php echo $row['t_emp'] ?></td>
                                                <td><?php echo $row['t_language'] ?></td>
                                                <td><?php
                                                      $status = $row['t_status'];
                                                      if ($status == "active") {
                                                      ?>
                                                      <span class="badge bg-primary">Active</span>
                                                   <?php
                                                      } else if ($status == "pending") {
                                                   ?>
                                                      <span class="badge bg-warning">Pending</span>
                                                   <?php
                                                      } else {
                                                   ?>
                                                      <span class="badge bg-danger">Inactive</span>
                                                   <?php
                                                      }
                                                   ?>
                                                </td>

                                                <td>

                                                   <!-- update -->
                                                   <a class="btn btn-sm btn-icon btn-warning" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" data-original-title="Edit" href="updateteam.php?id=<?php echo $row['id'] ?>">
                                                      <span class="btn-inner">
                                                         <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M11.4925 2.78906H7.75349C4.67849 2.78906 2.75049 4.96606 2.75049 8.04806V16.3621C2.75049 19.4441 4.66949 21.6211 7.75349 21.6211H16.5775C19.6625 21.6211 21.5815 19.4441 21.5815 16.3621V12.3341" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M8.82812 10.921L16.3011 3.44799C17.2321 2.51799 18.7411 2.51799 19.6721 3.44799L20.8891 4.66499C21.8201 5.59599 21.8201 7.10599 20.8891 8.03599L13.3801 15.545C12.9731 15.952 12.4211 16.181 11.8451 16.181H8.09912L8.19312 12.401C8.20712 11.845 8.43412 11.315 8.82812 10.921Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                            <path d="M15.1655 4.60254L19.7315 9.16854" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                         </svg>
                                                      </span>
                                                   </a>
                                                   <!-- delete button -->
                                                   <a class="btn btn-sm btn-icon btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" href="deleteteam.php?id=<?php echo $row['id'] ?>">
                                                      <span class="btn-inner">
                                                         <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="currentColor">
                                                            <path d="M19.3248 9.46826C19.3248 9.46826 18.7818 16.2033 18.4668 19.0403C18.3168 20.3953 17.4798 21.1893 16.1088 21.2143C13.4998 21.2613 10.8878 21.2643 8.27979 21.2093C6.96079 21.1823 6.13779 20.3783 5.99079 19.0473C5.67379 16.1853 5.13379 9.46826 5.13379 9.46826" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                            <path d="M20.708 6.23975H3.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                            <path d="M17.4406 6.23973C16.6556 6.23973 15.9796 5.68473 15.8256 4.91573L15.5826 3.69973C15.4326 3.13873 14.9246 2.75073 14.3456 2.75073H10.1126C9.53358 2.75073 9.02558 3.13873 8.87558 3.69973L8.63258 4.91573C8.47858 5.68473 7.80258 6.23973 7.01758 6.23973" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                         </svg>
                                                      </span>
                                                   </a>
                                                </td>

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
   <!-- js for seatch -->
   <script>
      document.getElementById('searchInput').addEventListener('input', function() {
         // Delay the execution of the search to avoid sending too many requests
         clearTimeout(window.searchTimer);
         window.searchTimer = setTimeout(function() {
            document.getElementById('searchForm').submit();
         }, 3000); // Adjust the delay as needed (in milliseconds)
      });
   </script>