<?php

session_start();
include 'backend/dbh.p.php';
include 'header.php';
include 'backend/get_status_report_hvac.p.php';

//getting specific reports record
$sql_report = "SELECT * FROM `reports` WHERE report_id = ".$_GET['r_id']."";
$stmt = mysqli_stmt_init($conn);

if(!mysqli_stmt_prepare($stmt, $sql_report)){
	echo 'error connecting to the database report';
}else{
	$result_report = mysqli_query($conn, $sql_report);
	$row_report = mysqli_fetch_assoc($result_report);
}

//getting specific equipment record
$sql_equipment = "SELECT * FROM `equipment` WHERE equipment_id = ".$_GET['e_id']."";
$stmt = mysqli_stmt_init($conn);

if(!mysqli_stmt_prepare($stmt, $sql_equipment)){
	echo 'error connecting to the database equipment';
}else{
	$result_equipment = mysqli_query($conn, $sql_equipment);
	$row_equipment = mysqli_fetch_assoc($result_equipment);
}

//getting the readings of specific record
$sql_readings = "SELECT * FROM `equipment_readings_aircon` WHERE report_id = '".$row_report['report_id']."'";
	
if(!mysqli_stmt_prepare($stmt, $sql_readings)){
	echo 'error connecting to database equipment_readings_aircon';
}else{	
	$result_read = mysqli_query($conn, $sql_readings);
	$row_hvac = mysqli_fetch_assoc($result_read);
}

//getting the username of specific record
$sql_user = "SELECT * FROM `users` WHERE users_id = ".$row_report['assigned_user']."";
	
if(!mysqli_stmt_prepare($stmt, $sql_user)){
	echo 'error connecting to database users';
}else{	
	$result_user = mysqli_query($conn, $sql_user);
	$row_user = mysqli_fetch_assoc($result_user);
}

//set checkbox values
$for_repair = $row_hvac['for_repair'];
?>

<head>
	<style>
		input[type="number"]:disabled, input[type="text"]:disabled, textarea:disabled {
  			background: #e5e5e5;
			border: none;
			color: #000;
		}
		#main_content {
			padding:7%;
		}
	</style>
	<title>View Status Report</title>
</head>

<div class="container-fluid py-4" id="main_content">
		<i class="fa-solid fa-chevrons-left"><input type="button" class="btn btn-secondary" onClick="document.location.href='/Finals_pending/technician_reports.php?site=My%20Reports&page=1'" value="<< Back">
	<br /><br />
		<!-- assigned task info -->
		<h2><?php echo $row_report['task']; ?> : equipment <?php echo $row_equipment['equipment_name']; ?></h2>
		<hr class="rounded" />
		<div class="row mb-4">
			<div class="col-6">
				<h5>Due Date: <?php echo $row_report['task_due']; ?></h5>
				<h5>Date Submitted: <?php echo $row_report['date_submitted']; ?></h5>
				<h5>Submitted by: <?php echo $row_user['username'];?></h5>
			</div>
			<div class="col-6">
				<h5 class="mb-5">Date created: <?php echo $row_report['date_created'];?></h5>
			</div>
		</div>
		
		<!-- equipment readings -->
		<form>
		<div class="row mb-4">
	        <div class="col-4">
	        	<label for="volt">Voltage</label>
	        	<input type="number" class="form-control w-100" name="volt" id="volt" placeholder="<?php echo $row_hvac['volt'] ?> V" disabled>
	        </div>
			<div class="col-4">
	            <label for="pressure">Pressure</label>
	            <input type="number" class="form-control w-100" name="pressure" id="pressure" placeholder="<?php echo $row_hvac['pressure'] ?> psi" disabled>
	        </div>
			<div class="col-4">
	            <label for="temp">Temperature</label>
	            <input type="number" class="form-control w-100" name="temp" id="temp" placeholder="<?php echo $row_hvac['temp'] ?> F" disabled>
	        </div>
	    </div>

		<!-- additional report remarks -->
		<div class="form-group">
			<input type="checkbox" id="for_repair" name="for_repair" 
			<?php if ($for_repair == 1) { ?>
        		checked
    		<?php }?> disabled/>
			<label for="temp">Issue/For repair</label><br>
			<textarea class="form-control" id="repair_remarks" name="repair_remarks" rows="3" placeholder="<?php echo $row_hvac['repair_remarks'] ?>" disabled></textarea>
		</div>
        <div class="form-group">
            <label for="comments">Other remarks</label>
            <textarea class="form-control" id="comments" name="other_remarks" rows="3" placeholder="<?php echo $row_hvac['other_remarks'] ?>" disabled></textarea>
        </div>

	<div class="alert alert-warning alert-dismissible fade show" role="alert">
    	<strong>Yes!</strong> Report submitted succesfully 
    	<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	</div>
	<?php include 'backend/equipment_monitoring_hvac.p.php';?>
</div>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
