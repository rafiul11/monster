<?php
session_start();
require '../db.php';


    $id = $_GET ['id'];

    $delete_skill = "DELETE FROM skills WHERE id=$id";
    $delete_skill_result = mysqli_query($db_connect,$delete_skill);

    $_SESSION['delete']='Deleted Successfully';
    header('location:skills.php');

?>