<?php
session_start(); 
require '../db.php';


$id = $_GET['id'];

$select_blog = "SELECT * FROM blog WHERE id=$id";
$select_blog_result = mysqli_query($db_connect,$select_blog);
$after_assoc_blog = mysqli_fetch_assoc($select_blog_result);

if($after_assoc_blog['status']==1){
    $update_status = "UPDATE blog SET status=0 where id=$id";
    $update_status_result = mysqli_query($db_connect,$update_status);
    header('location:blog.php');
}
else{
    $count_blog = "SELECT COUNT(*) as total_active FROM blog where status=1";
    $count_blog_result = mysqli_query($db_connect,$count_blog);
    $after_blog_assoc = mysqli_fetch_assoc($count_blog_result);
    if($after_blog_assoc['total_active']==3){
        $_SESSION['limit'] = 'You Can active 3 blog';
        header('location:blog.php');
    }
    else{
        $update_status = "UPDATE blog SET status=1 where id=$id";
        $update_status_result = mysqli_query($db_connect,$update_status);
        header('location:blog.php');
    }    
}

?>