<?php
session_start();
require '../db.php';


    $id = $_GET ['id'];
    $select_testimonials = "SELECT * FROM testimonials Where id=$id";
    $select_testimonials_result =mysqli_query($db_connect,$select_testimonials);
    $after_assoc = mysqli_fetch_assoc($select_testimonials_result);
    
    $delete_from = "../upload/testimonials/".$after_assoc['image'];
    unlink($delete_from);

    $delete_testimonials = "DELETE FROM testimonials WHERE id=$id";
    $delete_testimonials_result = mysqli_query($db_connect,$delete_testimonials);

    $_SESSION['delete']='Deleted Successfully';
    header('location:testimonials.php');

?>