<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Employee</title>
	<link rel="stylesheet" href="emp.css">
	<link rel="stylesheet" href="sidebar.css">
	<!-- <link rel="stylesheet" href="sidebar.css"> -->
</head>
<body>
<div class="dashboard">
		<?php
			include 'sidebar.php';
		?>   
	 <main class="main-content">
      <!-- Main content goes here -->
      <div class="col-md-6 order-md-1">
<div class="bd-example">
    <div class="form-group">
        <input type="text" class="form-control date_flatpicker" placeholder="Date Picker">
    </div>
</div>
<div class="bd-example">
    <div class="form-group">
        <input type="text" name="start" class="form-control range_flatpicker" placeholder="Range Date Picker">
    </div>
</div>
<div class="bd-example">
    <div class="form-group">
        <input type="text" name="start" class="form-control time_flatpicker" placeholder="Time Picker">
    </div>
</div>
<div class="bd-example">
    <div class="form-group">
        <div class="input-group wrap_flatpicker">
            <input type="text" class="form-control" placeholder="Select Date.." data-input> <!-- input is mandatory -->
            <a class="input-group-text input-button pointer-event" title="toggle" data-bs-toggle href="javascript:void(0)">
                <svg width="24"  class="icon-24"   fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
            </a>
            <a class="input-group-text input-button" title="clear" data-clear href="javascript:void(0)">
                <svg width="24" class="icon-24"   fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </a>
        </div>
    </div>
</div>
</div>
<div class="bd-example col-md-6 order-md-0 mt-0">
<div class="form-group">
    <input type="hidden" name="inline" class="d-none inline_flatpickr">
</div>
</div>
			</main>
	</div>
</body>
</html> 