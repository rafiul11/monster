<?php
session_start();
require '../db.php';


    $id = $_GET ['id'];
    $select_project = "SELECT * FROM projects Where id=$id";
    $select_project_result =mysqli_query($db_connect,$select_project);
    $after_assoc = mysqli_fetch_assoc($select_project_result);
    
    $delete_from = "../upload/projects/".$after_assoc['image'];
    unlink($delete_from);

    $delete_project = "DELETE FROM projects WHERE id=$id";
    $delete_project_result = mysqli_query($db_connect,$delete_project);

    $_SESSION['delete']='Deleted Successfully';
    header('location:projects.php');

?>