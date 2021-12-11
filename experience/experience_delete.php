<?php
session_start();
require '../db.php';


    $id = $_GET ['id'];

    $delete_experience = "DELETE FROM experience WHERE id=$id";
    $delete_experience_result = mysqli_query($db_connect,$delete_experience);

    $_SESSION['delete']='Deleted Successfully';
    header('location:experience.php');

?>