<?php 
session_start();
require '../db.php';



$title = $_POST['title'];
$description = $_POST['description'];
$year = $_POST['years'];

        $insert_myself = "INSERT INTO my_self(title,description,years) VALUES ('$title','$description','$year')";
        $insert_myself_result = mysqli_query($db_connect,$insert_myself);
    
        $_SESSION['success']='Add Successfully';
        header('location:add_myself.php');
 


?>