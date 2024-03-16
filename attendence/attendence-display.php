<?php
include '../sidebar/sidebar.php';
include '../connection/connection.php';

?>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leaves</title>
    <!-- <link rel="stylesheet" href="../css/main.min.css">
        <link rel="stylesheet" href="../sidebar.css"> -->
</head>
<?php 
 $q_emp = "select * from employee" ;
 $data_emp =mysqli_query($conn,$q_emp);
 $row_emp=mysqli_fetch_array($data_emp)
?>
<body>
    <main class="main-content">
        <div class="conatiner-fluid content-inner mt-n5 py-0">
            <div class="row">
                <div class="col-xl-12 col-lg-8">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <h4 class="card-title">
                                Attendance List
                            </h4>
                        </div>
                        <div class="card-body">
                            <div class="card-body px-0">
                                <div class="table-responsive">
                                    <div class="sidebar-body pt-0 data-scrollbar" style="max-height: calc(100vh - 100px); overflow-y: auto;">
                                        <table id="user-list-table" class="table table-striped" role="grid" data-bs-toggle="data-table">
                                            <thead>
                                                <tr class="ligth">

                                                    <?php
                                                    if ($_SESSION['e_role'] == "admin") {
                                                    ?>
                                                        <th>
                                                            Employee id
                                                        </th>
                                                    <?php
                                                    }
                                                    ?>
                                                    <th>
                                                        Date
                                                    </th>
                                                    <th>
                                                        Punchin Time
                                                    </th>
                                                    <th>
                                                        Punchout Time
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if ($_SESSION['e_role'] == "user") {

                                                    $q = "select * from attendance where emp_id = '" . $_SESSION['user_id'] . "' ";
                                                    $data = mysqli_query($conn, $q);
                                                    while ($row = mysqli_fetch_array($data)) {
                                                ?>
                                                        <tr>
                                                            <td><?php echo $row['c_date'] ?></td>
                                                            <td><?php echo $row['punchin_time'] ?></td>
                                                            <td><?php echo $row['punchout_time'] ?></td>

                                                        <?php
                                                    }
                                                } elseif ($_SESSION['e_role'] == "admin") {
                                                    $q = "select * from attendance";
                                                    $data = mysqli_query($conn, $q);
                                                    while ($row = mysqli_fetch_array($data)) {
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $row_emp['e_fname'] ." ". $row_emp['e_lname']  ?></td>
                                                            <td><?php echo $row['c_date'] ?></td>
                                                            <td><?php echo $row['punchin_time'] ?></td>
                                                            <td><?php echo $row['punchout_time'] ?></td>
                                                        </tr>
                                                <?php
                                                    }
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
            </div>
        </div>
    </main>
</body>

</html>