<?php 
include 'dbh.p.php';
require("PHPMailer/src/PHPMailer.php");
require("PHPMailer/src/Exception.php");
require("PHPMailer/src/SMTP.php");

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

//getting the username of specific record
$sql_user = "SELECT * FROM `users` WHERE users_id = ".$row_hvac['assigned_to']."";
	
if(!mysqli_stmt_prepare($stmt, $sql_user)){
	echo 'error connecting to database users';
}else{	
	$result_user = mysqli_query($conn, $sql_user);
	$row_user = mysqli_fetch_assoc($result_user);
}


//getting admin users
$sql_users = "SELECT `email` FROM `users` WHERE `role` = 'Admin' or `role` = 'Head' ";
$stmt = mysqli_stmt_init($conn);

if(!mysqli_stmt_prepare($stmt, $sql_users)){
    echo 'error connecting to the database users';
}else{
    $result = mysqli_query($conn, $sql_users);
}

    //email report content
    $equip_name = $row_equipment['equipment_name'];
    $user_name = $row_user['username'];

    // dynamic email content

    $mailSubject = "Issue: Abnormal Reading";
    $mailBody = "<b>Abnormal Reading:</b> Temperature in Equipment ".$equip_name."<br>Readings report submitted by ".$user_name;


    while($row = mysqli_fetch_assoc($result)){

        $mailTo = $row['email'];

        //mail($mailTo, $mailSubject, $mailBody, 'From: keomspending2022@gmail.com')
    }
?>