<?php
include 'dbh.p.php';

$id = $_GET['id'];

$brand = $_POST['brand'];
$machine_description = $_POST['machine_description'];
$model_no = $_POST['model_no'];
$serial_no = $_POST['serial_no'];
$date_of_purchase = $_POST['date_of_purchase'];
$floor = $_POST['floor'];
$room_number = $_POST['room_number'];
$room_classification = $_POST['room_classification'];


$sql = "UPDATE `equipment` SET brand = ".$brand.", machine_description = ".$machine_description.", model_no = ".$model_no.", serial_no = ".$serial_no.", date_of_purchase = ".$date_of_purchase.", location_id = ".$floor.", location_id = ".$room_number.", location_id = ".$room_classification." WHERE equipment_id = ".$id."";
$stmt = mysqli_stmt_init($conn);


if(!mysqli_stmt_prepare($stmt, $sql)){
    echo 'error connecting to database';
    echo $sql;
}else{
    $result = mysqli_query($conn,$sql);


    header('Location:../issues.php?site=Issues&update=success&id='.$id.'');
    exit();
}