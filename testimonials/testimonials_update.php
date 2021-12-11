<?php
session_start();  
require '../db.php';


$id = $_POST['id'];
$details = $_POST['details'];
$company_name = $_POST['company_name'];
$position = $_POST['position'];




if ($_FILES['image']['name'] != '') {
    $upload_file =$_FILES['image'];
    $after_explode= explode('.', $upload_file['name']);
    $extension = end($after_explode);
    $allowed_extension = array('jpg','png','jpeg','gif');
    
        if (in_array($extension, $allowed_extension)) {
            if ($upload_file['size'] < 300000) {
                $select_img = "SELECT * FROM testimonials WHERE id=$id";
                $select_img_result =mysqli_query($db_connect, $select_img);
                $after_assoc = mysqli_fetch_assoc($select_img_result);
    
                $delete_from = "../upload/testimonials/".$after_assoc['image'];
                unlink($delete_from);
    
                $update_testimonials = "UPDATE testimonials SET details='$details',company_name='$company_name', position='$position' WHERE id=$id";
                $update_testimonials_result = mysqli_query($db_connect, $update_testimonials);
    
                $file_name = $id.'.'.$extension;
                $new_location = '../upload/testimonials/'.$file_name;
                move_uploaded_file($upload_file['tmp_name'], $new_location);
                $update_img = "UPDATE testimonials SET image='$file_name' WHERE id=$id";
                $update_img_result = mysqli_query($db_connect, $update_img);
    
                $_SESSION['update']='Updated Successfully';
                header('location:testimonials_edit.php?id='.$id);
            }
             else {
                $_SESSION['size']='File size to high';
                header('location:testimonials_edit.php?id='.$id);
            }
        } 
        else {
            $_SESSION['extension']='Invalid Extension';
            header('location:testimonials_edit.php?id='.$id);
        }
    }
    else{
    
        $update_testimonials = "UPDATE testimonials SET details='$details',company_name='$company_name', position='$position' WHERE id=$id";
        $update_testimonials_result = mysqli_query($db_connect, $update_testimonials);
    
        $_SESSION['update']='Updated Successfully';
        header('location:testimonials_edit.php?id='.$id);
    }




?>