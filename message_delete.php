<?php

require 'db.php';


    $id = $_GET ['id'];

    // $select_msg = "SELECT * FROM massages Where id=$id";
    // $select_msg_result =mysqli_query($db_connect,$select_msg);
    // $after_assoc = mysqli_fetch_assoc($select_img_result);


    $delete_msg = "DELETE FROM massages WHERE id=$id";
    $delete_msg_result = mysqli_query($db_connect,$delete_msg);

    $_SESSION['delete_msg']='Permanent Deleted Successfully';
    header('location:inbox.php');

?>