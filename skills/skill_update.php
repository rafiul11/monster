<?php
session_start();  
require '../db.php';


$id = $_POST['id'];
$skill_name = $_POST['skill_name'];
$percentage = $_POST['percentage'];

$update_myself = "UPDATE skills SET skill_name='$skill_name', percentage='$percentage' WHERE id=$id";
$update_myself_result = mysqli_query($db_connect,$update_myself);

$_SESSION['update_skill']='Updated Successfully';
header('location:skill_edit.php?id='.$id);






?>