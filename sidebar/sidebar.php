<?php
include '../connection/connection.php';
session_start();
?>

<link rel="stylesheet" href="../css/main.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<style>
    .error {
        color: red;
    }

    .main-content {
        margin-left: 265px;
    }

    .hearder {
        padding-top: 5px;

    }

    .logo-title {
        color: #3a57e8;
    }

    .card {
        border-radius: 8px;

    }
</style>
<?php
$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
// $u_id = $_SESSION['user_id'] ;


$q = "select * from employee where  id='$user_id'";
$data = mysqli_query($conn, $q);
$row_id = mysqli_fetch_array($data);

?>
<!-- loader Start -->
<div id="loading">
    <div class="loader simple-loader">
        <div class="loader-body"></div>
    </div>
</div>
<!-- loader END -->
<main class="main-content">
    <div class="iq-navbar-header" style="height: 215px;">
        <div class="card col-md-12" style="margin-top:10px;">
            <div class="container-fluid iq-container">
                <div class="row">
                    <div class="col-md-12" id="header">
                        <div class="flex-wrap d-flex justify-content-between align-items-center">
                            <?php
                            if ($row_id !== null) {
                                // Now you can use $row_id to access user information
                                echo '<h2 class="hearder"> ' . strtoupper($row_id['e_fname']) . ' ' . strtoupper($row_id['e_lname'])  .
                                    '</h2>';
                            ?>
                                <li class="nav-item dropdown">
                                    <a class="py-0 nav-link d-flex align-items-center" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <div class="caption ms-3 d-none d-md-block ">
                                            <h6 class="mb-0 caption-title"><?php echo  strtoupper($row_id['e_fname']) . '' .  strtoupper($row_id['e_lname']); ?></h6>
                                            <p class="mb-0 caption-sub-title"><?php echo 'ROLE:' . strtoupper($row_id['e_role']); ?></p>
                                        </div>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <li><a class="dropdown-item" href="../profile/profile.php?id=<?php echo $row_id['id'] ?>">Profile</a></li>
                                    <?php
                                } else {
                                    echo '<h1 class="hearder">@: SuperAdmin</h1>';
                                }
                                    ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</main>
<div class="sidebar">
    <aside class="sidebar sidebar-default sidebar-white sidebar-base navs-rounded-all ">
        <div class="sidebar-header d-flex align-items-center justify-content-start">

            <!--Logo start-->
            <div class="logo-main">
                <div class="logo-normal" style="padding-left:5px">
                    <img src="../pictures/erp.png" alt="Company Logo" width="50" height="50" class="mt-2 ms-2">
                </div>
                <div class="logo-mini">
                    <svg class=" icon-30" viewBox="0 0 30 30" fill="none">
                        <rect x="-0.757324" y="19.2427" width="28" height="4" rx="2" transform="rotate(-45 -0.757324 19.2427)" fill="currentColor" />
                        <rect x="7.72803" y="27.728" width="28" height="4" rx="2" transform="rotate(-45 7.72803 27.728)" fill="currentColor" />
                        <rect x="10.5366" y="16.3945" width="16" height="4" rx="2" transform="rotate(45 10.5366 16.3945)" fill="currentColor" />
                        <rect x="10.5562" y="-0.556152" width="28" height="4" rx="2" transform="rotate(45 10.5562 -0.556152)" fill="currentColor" />
                    </svg>
                </div>
            </div>
            <!--logo End-->
            <h4 class="logo-title ms-3">APEXTECH</h4>
        </div>

        <!-- <div class="sidebar-body pt-0 data-scrollbar"> -->
        <div class="sidebar-body pt-0 data-scrollbar" style="max-height: calc(100vh - 100px); overflow-y: auto;">
            <div class="sidebar-body pt-0 data-scrollbar" style="max-height: calc(100vh - 100px); overflow-y: auto;">

                <div class="sidebar-list">
                    <!-- Sidebar Menu Start -->
                    <ul class="navbar-nav iq-main-menu" id="sidebar-menu">
                        <li class="nav-item static-item">
                            <a class="nav-link static-item disabled" href="#" tabindex="-1">
                                <!-- <   class="default-icon">Home</> -->
                                <span class="mini-icon">-</span>
                            </a>
                        </li>
                        <?php

                        if (isset($_SESSION['e_role'])) {


                            if ($_SESSION['e_role'] == "admin") {
                        ?>
                                <li class="nav-item">
                                    <a class="nav-link active" href="#">
                                        <i class="icon">
                                            <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M7.7688 8.71387H16.2312C18.5886 8.71387 20.5 10.5831 20.5 12.8885V17.8254C20.5 20.1308 18.5886 22 16.2312 22H7.7688C5.41136 22 3.5 20.1308 3.5 17.8254V12.8885C3.5 10.5831 5.41136 8.71387 7.7688 8.71387ZM11.9949 17.3295C12.4928 17.3295 12.8891 16.9419 12.8891 16.455V14.2489C12.8891 13.772 12.4928 13.3844 11.9949 13.3844C11.5072 13.3844 11.1109 13.772 11.1109 14.2489V16.455C11.1109 16.9419 11.5072 17.3295 11.9949 17.3295Z" fill="currentColor"></path>
                                                <path opacity="0.4" d="M17.523 7.39595V8.86667C17.1673 8.7673 16.7913 8.71761 16.4052 8.71761H15.7447V7.39595C15.7447 5.37868 14.0681 3.73903 12.0053 3.73903C9.94257 3.73903 8.26594 5.36874 8.25578 7.37608V8.71761H7.60545C7.20916 8.71761 6.83319 8.7673 6.47754 8.87661V7.39595C6.4877 4.41476 8.95692 2 11.985 2C15.0537 2 17.523 4.41476 17.523 7.39595Z" fill="currentColor"></path>
                                            </svg>
                                        </i>
                                        <span class="item-name">admin</span>
                                    </a>
                                </li>
                            <?php
                            }
                            if ($_SESSION['e_role'] == "Manager") {
                            ?>
                                <li class="nav-item">
                                    <a class="nav-link active" href="#">
                                        <i class="icon">
                                            <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M7.7688 8.71387H16.2312C18.5886 8.71387 20.5 10.5831 20.5 12.8885V17.8254C20.5 20.1308 18.5886 22 16.2312 22H7.7688C5.41136 22 3.5 20.1308 3.5 17.8254V12.8885C3.5 10.5831 5.41136 8.71387 7.7688 8.71387ZM11.9949 17.3295C12.4928 17.3295 12.8891 16.9419 12.8891 16.455V14.2489C12.8891 13.772 12.4928 13.3844 11.9949 13.3844C11.5072 13.3844 11.1109 13.772 11.1109 14.2489V16.455C11.1109 16.9419 11.5072 17.3295 11.9949 17.3295Z" fill="currentColor"></path>
                                                <path opacity="0.4" d="M17.523 7.39595V8.86667C17.1673 8.7673 16.7913 8.71761 16.4052 8.71761H15.7447V7.39595C15.7447 5.37868 14.0681 3.73903 12.0053 3.73903C9.94257 3.73903 8.26594 5.36874 8.25578 7.37608V8.71761H7.60545C7.20916 8.71761 6.83319 8.7673 6.47754 8.87661V7.39595C6.4877 4.41476 8.95692 2 11.985 2C15.0537 2 17.523 4.41476 17.523 7.39595Z" fill="currentColor"></path>
                                            </svg>
                                        </i>
                                        <span class="item-name">Manager</span>
                                    </a>
                                </li>
                            <?php
                            } elseif ($_SESSION['e_role'] == "user") {
                                // $u_id = $_SESSION['user_id'] ;

                                // echo $user_id;

                            ?>
                                <li class="nav-item">
                                    <a class="nav-link active" href="#">
                                        <i class="icon">
                                            <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M7.7688 8.71387H16.2312C18.5886 8.71387 20.5 10.5831 20.5 12.8885V17.8254C20.5 20.1308 18.5886 22 16.2312 22H7.7688C5.41136 22 3.5 20.1308 3.5 17.8254V12.8885C3.5 10.5831 5.41136 8.71387 7.7688 8.71387ZM11.9949 17.3295C12.4928 17.3295 12.8891 16.9419 12.8891 16.455V14.2489C12.8891 13.772 12.4928 13.3844 11.9949 13.3844C11.5072 13.3844 11.1109 13.772 11.1109 14.2489V16.455C11.1109 16.9419 11.5072 17.3295 11.9949 17.3295Z" fill="currentColor"></path>
                                                <path opacity="0.4" d="M17.523 7.39595V8.86667C17.1673 8.7673 16.7913 8.71761 16.4052 8.71761H15.7447V7.39595C15.7447 5.37868 14.0681 3.73903 12.0053 3.73903C9.94257 3.73903 8.26594 5.36874 8.25578 7.37608V8.71761H7.60545C7.20916 8.71761 6.83319 8.7673 6.47754 8.87661V7.39595C6.4877 4.41476 8.95692 2 11.985 2C15.0537 2 17.523 4.41476 17.523 7.39595Z" fill="currentColor"></path>
                                            </svg>
                                        </i>
                                        <span class="item-name"> Employee</span>
                                    </a>
                                </li>
                        <?php
                            }
                        } elseif (empty($_SESSION['e_role'])) {
                            echo '<script type="text/javascript">window.location.href="../spicalpages/errorpage.php";</script>';

                            // header("Location: ../spicalpages/errorpage.php");
                        }
                        ?>
                        <li class="nav-item">
                            <a class="nav-link " aria-current="page" href="../dashboard/dashboard.php">
                                <i class="icon">
                                    <svg width="20" viewBox="0 0 24 24" fill="none" class="icon-20">
                                        <path opacity="0.4" d="M16.0756 2H19.4616C20.8639 2 22.0001 3.14585 22.0001 4.55996V7.97452C22.0001 9.38864 20.8639 10.5345 19.4616 10.5345H16.0756C14.6734 10.5345 13.5371 9.38864 13.5371 7.97452V4.55996C13.5371 3.14585 14.6734 2 16.0756 2Z" fill="currentColor"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M4.53852 2H7.92449C9.32676 2 10.463 3.14585 10.463 4.55996V7.97452C10.463 9.38864 9.32676 10.5345 7.92449 10.5345H4.53852C3.13626 10.5345 2 9.38864 2 7.97452V4.55996C2 3.14585 3.13626 2 4.53852 2ZM4.53852 13.4655H7.92449C9.32676 13.4655 10.463 14.6114 10.463 16.0255V19.44C10.463 20.8532 9.32676 22 7.92449 22H4.53852C3.13626 22 2 20.8532 2 19.44V16.0255C2 14.6114 3.13626 13.4655 4.53852 13.4655ZM19.4615 13.4655H16.0755C14.6732 13.4655 13.537 14.6114 13.537 16.0255V19.44C13.537 20.8532 14.6732 22 16.0755 22H19.4615C20.8637 22 22 20.8532 22 19.44V16.0255C22 14.6114 20.8637 13.4655 19.4615 13.4655Z" fill="currentColor"></path>
                                    </svg>
                                </i>
                                <span class="item-name">Dashboard</span>
                            </a>
                        </li>
                        <?php
                        if ($_SESSION['e_role'] == "admin") {
                        ?>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="collapse" href="#sidebar-role" role="button" aria-expanded="false" aria-controls="sidebar-role">
                                    <i class="icon">
                                        <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none">
                                            <path d="M11.9488 14.54C8.49884 14.54 5.58789 15.1038 5.58789 17.2795C5.58789 19.4562 8.51765 20.0001 11.9488 20.0001C15.3988 20.0001 18.3098 19.4364 18.3098 17.2606C18.3098 15.084 15.38 14.54 11.9488 14.54Z" fill="currentColor"></path>
                                            <path opacity="0.4" d="M11.949 12.467C14.2851 12.467 16.1583 10.5831 16.1583 8.23351C16.1583 5.88306 14.2851 4 11.949 4C9.61293 4 7.73975 5.88306 7.73975 8.23351C7.73975 10.5831 9.61293 12.467 11.949 12.467Z" fill="currentColor"></path>
                                            <path opacity="0.4" d="M21.0881 9.21923C21.6925 6.84176 19.9205 4.70654 17.664 4.70654C17.4187 4.70654 17.1841 4.73356 16.9549 4.77949C16.9244 4.78669 16.8904 4.802 16.8725 4.82902C16.8519 4.86324 16.8671 4.90917 16.8895 4.93889C17.5673 5.89528 17.9568 7.0597 17.9568 8.30967C17.9568 9.50741 17.5996 10.6241 16.9728 11.5508C16.9083 11.6462 16.9656 11.775 17.0793 11.7948C17.2369 11.8227 17.3981 11.8371 17.5629 11.8416C19.2059 11.8849 20.6807 10.8213 21.0881 9.21923Z" fill="currentColor"></path>
                                            <path d="M22.8094 14.817C22.5086 14.1722 21.7824 13.73 20.6783 13.513C20.1572 13.3851 18.747 13.205 17.4352 13.2293C17.4155 13.232 17.4048 13.2455 17.403 13.2545C17.4003 13.2671 17.4057 13.2887 17.4316 13.3022C18.0378 13.6039 20.3811 14.916 20.0865 17.6834C20.074 17.8032 20.1698 17.9068 20.2888 17.8888C20.8655 17.8059 22.3492 17.4853 22.8094 16.4866C23.0637 15.9589 23.0637 15.3456 22.8094 14.817Z" fill="currentColor"></path>
                                            <path opacity="0.4" d="M7.04459 4.77973C6.81626 4.7329 6.58077 4.70679 6.33543 4.70679C4.07901 4.70679 2.30701 6.84201 2.9123 9.21947C3.31882 10.8216 4.79355 11.8851 6.43661 11.8419C6.60136 11.8374 6.76343 11.8221 6.92013 11.7951C7.03384 11.7753 7.09115 11.6465 7.02668 11.551C6.3999 10.6234 6.04263 9.50765 6.04263 8.30991C6.04263 7.05904 6.43303 5.89462 7.11085 4.93913C7.13234 4.90941 7.14845 4.86348 7.12696 4.82926C7.10906 4.80135 7.07593 4.78694 7.04459 4.77973Z" fill="currentColor"></path>
                                            <path d="M3.32156 13.5127C2.21752 13.7297 1.49225 14.1719 1.19139 14.8167C0.936203 15.3453 0.936203 15.9586 1.19139 16.4872C1.65163 17.4851 3.13531 17.8066 3.71195 17.8885C3.83104 17.9065 3.92595 17.8038 3.91342 17.6832C3.61883 14.9167 5.9621 13.6046 6.56918 13.3029C6.59425 13.2885 6.59962 13.2677 6.59694 13.2542C6.59515 13.2452 6.5853 13.2317 6.5656 13.2299C5.25294 13.2047 3.84358 13.3848 3.32156 13.5127Z" fill="currentColor"></path>
                                        </svg>
                                    </i>
                                    <span class="item-name">Role</span>
                                    <i class="right-icon">
                                        <svg class="icon-18" width="18" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                        </svg>
                                    </i>
                                </a>
                                <ul class="sub-nav collapse" id="sidebar-role" data-bs-parent="#sidebar-menu">

                                    <li class="nav-item">
                                        <!-- emp list  -->
                                        <a class="nav-link " href="../role/roletable.php">
                                            <i class="icon">
                                                <svg class="icon-10" width="10" viewBox="0 0 24 24" fill="currentColor">
                                                    <g>
                                                        <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                                    </g>
                                                </svg>
                                            </i>
                                            <i class="sidenav-mini-icon"> U </i>
                                            <span class="item-name">Add Employee Role</span>
                                        </a>
                                        <a class="nav-link " href="../employee/employee-list.php">
                                            <i class="icon">
                                                <svg class="icon-10" width="10" viewBox="0 0 24 24" fill="currentColor">
                                                    <g>
                                                        <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                                    </g>
                                                </svg>
                                            </i>
                                            <i class="sidenav-mini-icon"> U </i>
                                            <span class="item-name">Add Employees</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        <?php
                        }
                        if ($_SESSION['e_role'] == "admin" || $_SESSION['e_role'] == "Manager") {
                        ?>

                            <li class="nav-item">
                                <a class="nav-link" href="../team/teamtable.php">
                                    <i class="icon">
                                        <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none">
                                            <path opacity="0.4" d="M2 11.0786C2.05 13.4166 2.19 17.4156 2.21 17.8566C2.281 18.7996 2.642 19.7526 3.204 20.4246C3.986 21.3676 4.949 21.7886 6.292 21.7886C8.148 21.7986 10.194 21.7986 12.181 21.7986C14.176 21.7986 16.112 21.7986 17.747 21.7886C19.071 21.7886 20.064 21.3566 20.836 20.4246C21.398 19.7526 21.759 18.7896 21.81 17.8566C21.83 17.4856 21.93 13.1446 21.99 11.0786H2Z" fill="currentColor"></path>
                                            <path d="M11.2451 15.3843V16.6783C11.2451 17.0923 11.5811 17.4283 11.9951 17.4283C12.4091 17.4283 12.7451 17.0923 12.7451 16.6783V15.3843C12.7451 14.9703 12.4091 14.6343 11.9951 14.6343C11.5811 14.6343 11.2451 14.9703 11.2451 15.3843Z" fill="currentColor"></path>
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M10.211 14.5565C10.111 14.9195 9.762 15.1515 9.384 15.1015C6.833 14.7455 4.395 13.8405 2.337 12.4815C2.126 12.3435 2 12.1075 2 11.8555V8.38949C2 6.28949 3.712 4.58149 5.817 4.58149H7.784C7.972 3.12949 9.202 2.00049 10.704 2.00049H13.286C14.787 2.00049 16.018 3.12949 16.206 4.58149H18.183C20.282 4.58149 21.99 6.28949 21.99 8.38949V11.8555C21.99 12.1075 21.863 12.3425 21.654 12.4815C19.592 13.8465 17.144 14.7555 14.576 15.1105C14.541 15.1155 14.507 15.1175 14.473 15.1175C14.134 15.1175 13.831 14.8885 13.746 14.5525C13.544 13.7565 12.821 13.1995 11.99 13.1995C11.148 13.1995 10.433 13.7445 10.211 14.5565ZM13.286 3.50049H10.704C10.031 3.50049 9.469 3.96049 9.301 4.58149H14.688C14.52 3.96049 13.958 3.50049 13.286 3.50049Z" fill="currentColor">
                                            </path>
                                        </svg>
                                    </i>
                                    <span class="item-name">Teams</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="collapse" href="#sidebar-Projects" role="button" aria-expanded="false" aria-controls="sidebar-Projects">
                                    <i class="icon">
                                        <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none">
                                            <path opacity="0.4" d="M21.25 13.4764C20.429 13.4764 19.761 12.8145 19.761 12.001C19.761 11.1865 20.429 10.5246 21.25 10.5246C21.449 10.5246 21.64 10.4463 21.78 10.3076C21.921 10.1679 22 9.97864 22 9.78146L21.999 7.10415C21.999 4.84102 20.14 3 17.856 3H6.144C3.86 3 2.001 4.84102 2.001 7.10415L2 9.86766C2 10.0648 2.079 10.2541 2.22 10.3938C2.36 10.5325 2.551 10.6108 2.75 10.6108C3.599 10.6108 4.239 11.2083 4.239 12.001C4.239 12.8145 3.571 13.4764 2.75 13.4764C2.336 13.4764 2 13.8093 2 14.2195V16.8949C2 19.158 3.858 21 6.143 21H17.857C20.142 21 22 19.158 22 16.8949V14.2195C22 13.8093 21.664 13.4764 21.25 13.4764Z" fill="currentColor"></path>
                                            <path d="M15.4303 11.5887L14.2513 12.7367L14.5303 14.3597C14.5783 14.6407 14.4653 14.9177 14.2343 15.0837C14.0053 15.2517 13.7063 15.2727 13.4543 15.1387L11.9993 14.3737L10.5413 15.1397C10.4333 15.1967 10.3153 15.2267 10.1983 15.2267C10.0453 15.2267 9.89434 15.1787 9.76434 15.0847C9.53434 14.9177 9.42134 14.6407 9.46934 14.3597L9.74734 12.7367L8.56834 11.5887C8.36434 11.3907 8.29334 11.0997 8.38134 10.8287C8.47034 10.5587 8.70034 10.3667 8.98134 10.3267L10.6073 10.0897L11.3363 8.61268C11.4633 8.35868 11.7173 8.20068 11.9993 8.20068H12.0013C12.2843 8.20168 12.5383 8.35968 12.6633 8.61368L13.3923 10.0897L15.0213 10.3277C15.2993 10.3667 15.5293 10.5587 15.6173 10.8287C15.7063 11.0997 15.6353 11.3907 15.4303 11.5887Z" fill="currentColor"></path>
                                        </svg>
                                    </i>
                                    <span class="item-name">Projects</span>
                                    <i class="right-icon">
                                        <svg class="icon-18" width="18" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                        </svg>
                                    </i>
                                </a>
                                <ul class="sub-nav collapse" id="sidebar-Projects" data-bs-parent="#sidebar-menu">
                                    <li class="nav-item">
                                        <a class="nav-link " href="../clientproject/clientproject.php">
                                            <i class="icon">
                                                <svg class="icon-10" width="10" viewBox="0 0 24 24" fill="currentColor">
                                                    <g>
                                                        <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                                    </g>
                                                </svg>
                                            </i>
                                            <i class="sidenav-mini-icon"> W </i>
                                            <span class="item-name">Client Project</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        <?php
                        }
                        if ($_SESSION['e_role'] != "Manager") {
                        ?>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="collapse" href="#sidebar-Attendence" role="button" aria-expanded="false" aria-controls="sidebar-Attendence">
                                    <i class="icon">
                                        <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none">
                                            <path opacity="0.4" d="M16.191 2H7.81C4.77 2 3 3.78 3 6.83V17.16C3 20.26 4.77 22 7.81 22H16.191C19.28 22 21 20.26 21 17.16V6.83C21 3.78 19.28 2 16.191 2Z" fill="currentColor"></path>
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M8.07996 6.6499V6.6599C7.64896 6.6599 7.29996 7.0099 7.29996 7.4399C7.29996 7.8699 7.64896 8.2199 8.07996 8.2199H11.069C11.5 8.2199 11.85 7.8699 11.85 7.4289C11.85 6.9999 11.5 6.6499 11.069 6.6499H8.07996ZM15.92 12.7399H8.07996C7.64896 12.7399 7.29996 12.3899 7.29996 11.9599C7.29996 11.5299 7.64896 11.1789 8.07996 11.1789H15.92C16.35 11.1789 16.7 11.5299 16.7 11.9599C16.7 12.3899 16.35 12.7399 15.92 12.7399ZM15.92 17.3099H8.07996C7.77996 17.3499 7.48996 17.1999 7.32996 16.9499C7.16996 16.6899 7.16996 16.3599 7.32996 16.1099C7.48996 15.8499 7.77996 15.7099 8.07996 15.7399H15.92C16.319 15.7799 16.62 16.1199 16.62 16.5299C16.62 16.9289 16.319 17.2699 15.92 17.3099Z" fill="currentColor"></path>
                                        </svg>
                                    </i>
                                    <span class="item-name">Attendance</span>
                                    <i class="right-icon">
                                        <svg class="icon-18" width="18" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                        </svg>
                                    </i>
                                </a>
                                <ul class="sub-nav collapse" id="sidebar-Attendence" data-bs-parent="#sidebar-menu">
                                    <li class="nav-item">
                                        <a class="nav-link " href="../attendence/attendence-display.php">
                                            <i class="icon">
                                                <svg class="icon-10" width="10" viewBox="0 0 24 24" fill="currentColor">
                                                    <g>
                                                        <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                                    </g>
                                                </svg>
                                            </i>
                                            <i class="sidenav-mini-icon"> E </i>
                                            <span class="item-name">Employee Attendence</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link " href="../leave/leave-display.php">
                                            <i class="icon">
                                                <svg class="icon-10" width="10" viewBox="0 0 24 24" fill="currentColor">
                                                    <g>
                                                        <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                                    </g>
                                                </svg>
                                            </i>
                                            <i class="sidenav-mini-icon"> W </i>
                                            <span class="item-name">Leave</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link " href="../Holiday/Holiday-list.php">
                                            <i class="icon">
                                                <svg class="icon-10" width="10" viewBox="0 0 24 24" fill="currentColor">
                                                    <g>
                                                        <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                                    </g>
                                                </svg>
                                            </i>
                                            <i class="sidenav-mini-icon"> V </i>
                                            <span class="item-name">Hollidays</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        <?php
                        }
                        if ($_SESSION['e_role'] == "admin") {
                        ?>
                            <li class="nav-item">
                                <a class="nav-link" href="../feedback/feedback.php">
                                    <i class="fa fa-comments" aria-hidden="true"></i>
                                    <span class="item-name">Feedback</span>
                                </a>
                            </li>
                        <?php
                        }
                        ?>
                        <li class="nav-item">
                            <a class="nav-link" href="../logout.php">
                                <i class="fa fa-sign-out" aria-hidden="true"></i>
                                <span class="item-name">Logout</span>
                            </a>
                        </li>
                    </ul>
                    <!-- Sidebar Menu End -->
                </div>
            </div>
            <div class="sidebar-footer"></div>
    </aside>
</div>

<!-- Library Bundle Script -->
<script src="../js/core/libs.min.js"></script>
<script src="../js/plugins/slider-tabs.js"></script>
<?php
// session_start();

if (isset($_SESSION["e_role"])) {
    if ($_SESSION["e_role"] == "admin") {
        $inactive_timeout = 3600; // 1 minute
    } else {
        $inactive_timeout = 300;
    }

    // Check if the session variable last_activity is set
    if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > $inactive_timeout)) {
        // Unset all of the session variables
        session_unset();

        // Destroy the session
        session_destroy();

        // Redirect the user to the index page
        echo '<script type="text/javascript">window.location.href="../index.php";</script>';
        echo '<script>alert("session is closed")</script>';

        // header("Location: index.php");
        exit();
    }

    // Update last activity time
    $_SESSION['last_activity'] = time();
}
?>

<script>
    document.getElementById('loading').style.display = 'block';

    setTimeout(function() {
        document.getElementById('loading').style.display = 'none';
    }, 100);
</script>