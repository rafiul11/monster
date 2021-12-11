<?php 
require '../db.php';


$id = $_GET['id'];

$select_banner = "SELECT * FROM banner WHERE id=$id";
$select_banner_result = mysqli_query($db_connect,$select_banner);
$after_assoc = mysqli_fetch_assoc($select_banner_result);

if($after_assoc['status']==1){
    $update_status = "UPDATE banner SET status=0 where id=$id";
    $update_status_result = mysqli_query($db_connect,$update_status);
    header('location:banners.php');
}
else{

    $update_status1 = "UPDATE banner SET status=0";
    $update_status_result1 = mysqli_query($db_connect,$update_status1);

    $update_status = "UPDATE banner SET status=1 where id=$id";
    $update_status_result = mysqli_query($db_connect,$update_status);
    header('location:banners.php');
}

?>