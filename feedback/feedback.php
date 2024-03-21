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
         <title>Feedback</title>
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

                           <h4 class="card-title">Feedback List</h4>
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
                                             <th>Id</th>
                                             <th>Name</th>
                                             <th>Email</th>
                                             <th>message</th>
                                          </tr>
                                       </thead>
                                       <tbody>

                                          <?php
                                          if (isset($_POST['search'])) {
                                             $search = $_POST['search'];

                                             // Query to search for employees by first name, last name, or team name
                                             $q = "SELECT * FROM contact WHERE id LIKE '%$search%' OR name LIKE '%$search%' OR email LIKE '%$search%'  ";
                                          } else {
                                             $q = "select * from contact ";
                                          }

                                          $data = mysqli_query($conn, $q);
                                          while ($row = mysqli_fetch_array($data)) {
                                          ?>

                                             <tr>
                                                <td><?php echo $row['id'] ?></td>
                                                <td><?php echo $row['name'] ?></td>
                                                <td><?php echo $row['email'] ?></td>
                                                <td><?php echo $row['message'] ?></td>
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