<?php
	include 'dbh.p.php';
	
	//check equipment reading
	$sql_readings = "SELECT * FROM `equipment_readings_aircon` WHERE report_id = ".$_GET['r_id']."";
	$stmt = mysqli_stmt_init($conn);

	if(!mysqli_stmt_prepare($stmt, $sql_readings)){
		echo 'error connecting to the database report';
	}else{
		$result_readings = mysqli_query($conn, $sql_readings);
		$row_hvac = mysqli_fetch_assoc($result_readings);
	}

	// get asset normal range bounds
	$sql_monitor = "SELECT * FROM `equipment_monitoring` WHERE asset = 'HVAC'";
	$stmt = mysqli_stmt_init($conn);

	if(!mysqli_stmt_prepare($stmt, $sql_monitor)){
		echo 'error connecting to the database equipment monitoring';
	}else{
		$result_monitor = mysqli_query($conn, $sql_monitor);
		$row_monitor = mysqli_fetch_assoc($result_monitor);
	}

	//determine abnormal readings
	if($row_hvac['temp'] < $row_monitor['lower_bound'] or $row_hvac['temp'] > $row_monitor['upper_bound']){ ?>
		<div>
			<div class="alert alert-danger alert-dismissible fade show" role="alert">
    			<strong>WARNING:</strong> Abnormal temperature reading detected. An issue report has been made and admins will be notified.
    			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
		</div>
	<?php
	
	//update equipment condition to 'with issues/abnormal reading'
	$sql = "UPDATE `equipment` SET `condition` = 'with issues/abnormal reading' WHERE `equipment_id` = ".$row_equipment['equipment_id']."";
    $stmt = mysqli_stmt_init($conn);
        
    if(!mysqli_stmt_prepare($stmt, $sql)){
        echo 'error updating equipment database';
    }else{
        mysqli_query($conn, $sql);
    }
        
    $stmt = mysqli_stmt_init($conn);
        
    if(!mysqli_stmt_prepare($stmt, $sql)){
        //header('Location:../users.php?updatenotsuccessful&page=1&site=Users');
        exit();
    }else{
        $result = mysqli_query($conn,$sql);
    } 
        
    //update report to abnormal data found
	$sql = "UPDATE `reports` SET `abnormal_data` = 1 WHERE `report_id` = ".$row_report['report_id']."";
    $stmt = mysqli_stmt_init($conn);
        
    if(!mysqli_stmt_prepare($stmt, $sql)){
        echo 'error updating equipment database';
    }else{
        mysqli_query($conn, $sql);
    }

	//create new issue
	$issue = "Abnormal Reading";
	$issue_description = "Abnormal Reading: Temperature in equipment ".$row_equipment['equipment_name'];
	$issue_status = 0;

	date_default_timezone_set('Asia/Hong_Kong');
    $date_created = date('Y-m-d h:i:s a', time());

	//getting the username of specific record
	$sql_user = "SELECT * FROM `users` WHERE users_id = ".$row_hvac['assigned_to']."";
	
	if(!mysqli_stmt_prepare($stmt, $sql_user)){
		echo 'error connecting to database users';
	}else{	
		$result_user = mysqli_query($conn, $sql_user);
		$row_user = mysqli_fetch_assoc($result_user);
	}

    $newIssue = "INSERT into `issue` (`machine_id`,`report_id`, `issue`, `issue description`, `submitted_by`, `issue_status`, `date_created`) VALUES (?,?,?,?,?,?,?)";
	$stmt = mysqli_stmt_init($conn);
        
    if(!mysqli_stmt_prepare($stmt, $newIssue)){
        header("Location: ../viewStatusReportHVAC.php?&error=insert%20abnormal%20readings%20report");
        exit();
    }else{
        mysqli_stmt_bind_param($stmt, "iissiis", $row_equipment['equipment_id'], $row_report['report_id'], $issue, $issue_description, $row_user['users_id'], $issue_status, $date_created);
        mysqli_stmt_execute($stmt);
    }

	//send email notifictions to admins
	//include 'notify_admins.p.php';
	

		}else{ ?>
		<div>
			<div class="alert alert-success alert-dismissible fade show" role="alert">
    			<strong>Yes!</strong> Temperature reading is normal.
    			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
		</div>
	<?php }
?>