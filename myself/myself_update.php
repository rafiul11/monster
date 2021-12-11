<?php
session_start();  
require '../db.php';


$id = $_POST['id'];
$title = $_POST['title'];
$description = $_POST['description'];
$year = $_POST['years'];


$update_myself = "UPDATE my_self SET title='$title', description='$description', years='$year' WHERE id=$id";
$update_myself_result = mysqli_query($db_connect,$update_myself);

$_SESSION['update_myself']='Updated Successfully';
header('location:myself_edit.php?id='.$id);






?>