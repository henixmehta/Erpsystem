<?php

        include '../connection/connection.php';

?>

<!doctype html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Calender</title>
<head>
        <!-- Fullcalender CSS -->
        <link rel='stylesheet' href='../vendor/fullcalendar/core/main.css' />
        <link rel='stylesheet' href='../vendor/fullcalendar/daygrid/main.css' />
        <link rel='stylesheet' href='../vendor/fullcalendar/timegrid/main.css' />
        <link rel='stylesheet' href='../vendor/fullcalendar/list/main.css' />
</head>
 
   
                
<body>
    <main class="main-content">
        <div class="conatiner-fluid content-inner mt-n5 py-0">
            <div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body d-flex justify-content-between align-items-center">
                                <div class="card-title mb-0">
                                    <h4 class="mb-3">Calender</h4>
                                        <form method="POST" enctype="multipart/form-data">
                                            <?php
                                            if($_SESSION['e_role']=="user")
                                            {
                                                ?>
                                                    <input type="button" id="punch_in" class="btn btn-primary" onclick="Punch_in()" name="punch-in">
                                                    <input type="button" id="break_in" class="btn btn-primary" onclick="Break_in()" name="Break-in">
                                                    <input type="button" id="break_out" class="btn btn-primary" onclick="break_out()" name="Break-out">
                                                    <input type="button" id="Break_out" class="btn btn-primary" onclick="Break_out()" name="Break-out">
                                                    
                                                    <!-- <button id="Punch_in" class="btn btn-primary" onclick="Punch_in()">Punch-in</button>
                                                    <button id="Break_in" class="btn btn-primary" onclick="Break_in()" style="display:none"; >Break-in</button>
                                                    <button id="Break_out" class="btn btn-primary" onclick="Break_out()" style="display:none"; >Break-out</button>
                                                    <button id="Punch_out" class="btn btn-primary" onclick="Punch_out()" style="display:none";>Punch-out</button> -->
                                                <?php
                                            }
                                            ?>
                                        </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>            
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card  ">
                                    <div class="card-body">
                                        <div id="calendar1" class="calendar-s"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
        <!-- Fullcalender Javascript -->
        <script src='../vendor/fullcalendar/core/main.js'></script>
        <script src='../vendor/fullcalendar/daygrid/main.js'></script>
        <script src='../vendor/fullcalendar/timegrid/main.js'></script>
        <script src='../vendor/fullcalendar/list/main.js'></script>
        <script src='../vendor/fullcalendar/interaction/main.js'></script>
        <script src='../vendor/moment.min.js'></script>
        <script src='../js/plugins/calender.js'></script>
</body>
</html>
<script>
    function Punch_in() {
        var breakInButton = document.getElementById('Break_in');
        var breakOutButton = document.getElementById('Break_out');
        var punchOutButton = document.getElementById('Punch_out');

        breakInButton.style.display = 'inline-block';
        breakOutButton.style.display = 'inline-block';
        punchOutButton.style.display = 'inline-block';

        document.getElementById('Punch_in').style.display = 'none';
    }
</script>