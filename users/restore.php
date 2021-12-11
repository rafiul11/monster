<?php

session_start();
require '../session.php';
require "../db.php";

$id = $_GET['id'];

$update_user = "UPDATE users set status=0 where id=$id";
$update_user_result = mysqli_query($db_connect,$update_user);


$_SESSION['restore'] = 'User Restore successfully';
header('location:users.php')



?>