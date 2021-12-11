<?php
session_start();
require '../db.php';


    $id = $_GET ['id'];

    $select_img = "SELECT * FROM partners Where id=$id";
    $select_img_result =mysqli_query($db_connect,$select_img);
    $after_assoc = mysqli_fetch_assoc($select_img_result);

    $delete_from = "../upload/partners/".$after_assoc['image'];
    unlink($delete_from);

    $delete_partners = "DELETE FROM partners WHERE id=$id";
    $delete_partners_result = mysqli_query($db_connect,$delete_partners);

    $_SESSION['delete']='Deleted Successfully';
    header('location:partners.php');

?>