<?php
session_start(); 
require '../db.php';


$id = $_GET['id'];

$select_service = "SELECT * FROM services WHERE id=$id";
$select_service_result = mysqli_query($db_connect,$select_service);
$after_assoc_service = mysqli_fetch_assoc($select_service_result);

if($after_assoc_service['status']==1){
    $update_status = "UPDATE services SET status=0 where id=$id";
    $update_status_result = mysqli_query($db_connect,$update_status);
    header('location:service.php');
}
else{
    $count_service = "SELECT COUNT(*) as total_active FROM services where status=1";
    $count_result = mysqli_query($db_connect,$count_service);
    $after_service_assoc = mysqli_fetch_assoc($count_result);
    if($after_service_assoc['total_active']==3){
        $_SESSION['limit'] = 'You Can active 3 service';
        header('location:service.php');
    }
    else{
        $update_status = "UPDATE services SET status=1 where id=$id";
        $update_status_result = mysqli_query($db_connect,$update_status);
        header('location:service.php');
    }    
}

?>