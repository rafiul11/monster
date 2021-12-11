<?php
session_start();
require '../db.php';


    $id = $_GET ['id'];

    $select_img = "SELECT * FROM logo Where id=$id";
    $select_img_result =mysqli_query($db_connect,$select_img);
    $after_assoc = mysqli_fetch_assoc($select_img_result);

    $delete_from = "../upload/logo/".$after_assoc['image'];
    unlink($delete_from);

    $delete_logo = "DELETE FROM logo WHERE id=$id";
    $delete_logo_result = mysqli_query($db_connect,$delete_logo);

    $_SESSION['delete_logo']='Deleted Successfully';
    header('location:logos.php');

?>