<?php
session_start();
require '../db.php';


    $id = $_GET ['id'];
    $select_banner = "SELECT * FROM banner Where id=$id";
    $select_banner_result =mysqli_query($db_connect,$select_banner);
    $after_assoc = mysqli_fetch_assoc($select_banner_result);
    
    $delete_from = "../upload/banner/".$after_assoc['image'];
    unlink($delete_from);

    $delete_banner = "DELETE FROM banner WHERE id=$id";
    $delete_banner_result = mysqli_query($db_connect,$delete_banner);

    $_SESSION['delete_banner']='Deleted Successfully';
    header('location:banners.php');

?>