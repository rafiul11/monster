<?php
session_start();
require '../db.php';


    $id = $_GET ['id'];
    $select_blog = "SELECT * FROM blog Where id=$id";
    $select_blog_result =mysqli_query($db_connect,$select_blog);
    $after_assoc = mysqli_fetch_assoc($select_blog_result);
    
    $delete_from = "../upload/blog/".$after_assoc['image'];
    unlink($delete_from);

    $delete_blog = "DELETE FROM blog WHERE id=$id";
    $delete_blog_result = mysqli_query($db_connect,$delete_blog);

    $_SESSION['delete']='Deleted Successfully';
    header('location:blog.php');

?>