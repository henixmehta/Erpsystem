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
                        <?php
                        if($_SESSION['e_role']=="user")
                        {
                            ?>
                                <button id="activateDiceBtn" class="btn btn-primary" onclick="activateDice()">Activate Dice</button>
                            <?php
                        }
                        ?>
                        
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
    function activateDice() {
        const currentTime = new Date();
        const currentHour = currentTime.getHours();

        // Check if the current time is after 10 PM (22:00)
        if (currentHour >= 22) {
            // Add your dice activation logic here
            alert("Dice activated!");
        } else {
            alert("Dice activation only allowed after 10 PM.");
        }
    }
    </script>