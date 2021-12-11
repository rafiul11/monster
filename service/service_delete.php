<?php
session_start();
require '../db.php';


    $id = $_GET ['id'];
    $select_service = "SELECT * FROM services Where id=$id";
    $select_service_result =mysqli_query($db_connect,$select_service);
    $after_assoc = mysqli_fetch_assoc($select_service_result);
    
    $delete_from = "../upload/service/".$after_assoc['logo_image'];
    unlink($delete_from);

    $delete_service = "DELETE FROM services WHERE id=$id";
    $delete_service_result = mysqli_query($db_connect,$delete_service);

    $_SESSION['delete']='Deleted Successfully';
    header('location:service.php');

?>