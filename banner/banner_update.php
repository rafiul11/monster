<?php
session_start();  
require '../db.php';


$id = $_POST['id'];
$title = $_POST['title'];
$description = $_POST['description'];
$btn = $_POST['btn'];



if ($_FILES['image']['name'] != '') {
    $upload_file =$_FILES['image'];
    $after_explode= explode('.', $upload_file['name']);
    $extension = end($after_explode);
    $allowed_extension = array('jpg','png','jpeg','gif');
    
        if (in_array($extension, $allowed_extension)) {
            if ($upload_file['size'] < 300000) {
                $select_img = "SELECT * FROM banner WHERE id=$id";
                $select_img_result =mysqli_query($db_connect, $select_img);
                $after_assoc = mysqli_fetch_assoc($select_img_result);
    
                $delete_from = "../upload/banner/".$after_assoc['image'];
                unlink($delete_from);
    
                $update_banner = "UPDATE banner SET title='$title',description='$description',btn='$btn' WHERE id=$id";
                $update_banner_result = mysqli_query($db_connect, $update_banner);
    
                $file_name = $id.'.'.$extension;
                $new_location = '../upload/banner/'.$file_name;
                move_uploaded_file($upload_file['tmp_name'], $new_location);
                $update_img = "UPDATE banner SET image='$file_name' WHERE id=$id";
                $update_img_result = mysqli_query($db_connect, $update_img);
    
                $_SESSION['update_banner']='Banner Updated';
                header('location:banner_edit.php?id='.$id);
            }
             else {
                $_SESSION['banner_size']='File size to high';
                header('location:banner_edit.php?id='.$id);
            }
        } 
        else {
            $_SESSION['banner_extension']='Invalid Extension';
            header('location:banner_edit.php?id='.$id);
        }
    }
    else{
    
        $update_banner = "UPDATE banner SET title='$title',description='$description',btn='$btn' WHERE id=$id";
        $update_banner_result = mysqli_query($db_connect,$update_banner);
    
        $_SESSION['update_banner']='Banner Updated';
        header('location:banner_edit.php?id='.$id);
    }




?>