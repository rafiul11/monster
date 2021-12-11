<?php
session_start();
require '../db.php';


    $id = $_GET ['id'];

    $delete_myself = "DELETE FROM my_self WHERE id=$id";
    $delete_myself_result = mysqli_query($db_connect,$delete_myself);

    $_SESSION['delete']='Deleted Successfully';
    header('location:myself.php');

?>