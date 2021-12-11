<?php 
session_start();
require '../db.php';


$skill_name = $_POST['skill_name'];
$percentage = $_POST['percentage'];

$insert_skill = "INSERT INTO skills(skill_name,percentage) VALUES ('$skill_name','$percentage')";
$insert_logo_result = mysqli_query($db_connect,$insert_skill);
$_SESSION['skill_add']= "Skill Added successfully";
header('location:add_skills.php')



?>