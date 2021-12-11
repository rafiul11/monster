<?php
session_start();
require "../db.php";

$id = $_GET['id'];

$update_user = "UPDATE users set status=1 where id=$id";
$update_user_result = mysqli_query($db_connect,$update_user);


$_SESSION['soft_delete'] = 'User Move To Trash';
header('location:users.php')

?>