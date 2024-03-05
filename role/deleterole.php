<?php 

include '../sidebar/sidebar.php';
include '../connection/connection.php';

if(isset($_GET['id'])) {
    $id = $_GET['id'];

    $q = "delete from role WHERE id = $id";
    $insert = mysqli_query($conn, $q); 

    if(mysqli_query($conn, $q)) {
        echo '<script>window.location.href = "roletable.php";</script>';

    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    echo "ID parameter is missing.";
}

?>
