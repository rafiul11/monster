<?php
session_start(); 
require '../db.php';


$id = $_GET['id'];

$select_skill = "SELECT * FROM skills WHERE id=$id";
$select_skill_result = mysqli_query($db_connect,$select_skill);
$after_assoc = mysqli_fetch_assoc($select_skill_result);

if($after_assoc['status']==1){
    $update_status = "UPDATE skills SET status=0 where id=$id";
    $update_status_result = mysqli_query($db_connect,$update_status);
    header('location:skills.php');
}
else{
    $count_skill = "SELECT COUNT(*) as total_active FROM skills where status=1";
    $count_result = mysqli_query($db_connect,$count_skill);
    $after_skill_assoc = mysqli_fetch_assoc($count_result);
    if($after_skill_assoc['total_active']==3){
        $_SESSION['limit'] = 'You Can active 3 skills';
        header('location:skills.php');
    }
    else{
        $update_status = "UPDATE skills SET status=1 where id=$id";
        $update_status_result = mysqli_query($db_connect,$update_status);
        header('location:skills.php');
    }    
}

?>