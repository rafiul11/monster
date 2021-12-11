<?php 
session_start();
require '../db.php';


$title = $_POST['title'];
$description = mysqli_real_escape_string($db_connect,$_POST['description']);
date_default_timezone_set('Asia/Dhaka');
$created_at = date('y-m-d');


$upload_file = $_FILES['image'];
$after_explode= explode('.',$upload_file['name']);
$extension = end($after_explode);
$allowed_extension = array('jpg','png','jpeg','gif');
if(in_array($extension,$allowed_extension)){
    if($upload_file['size']<= 100000){
        $insert_blog = "INSERT INTO blog(title,description,created_at) VALUES ('$title','$description','$created_at')";
        $insert_blog_result = mysqli_query($db_connect,$insert_blog);

        $id = mysqli_insert_id($db_connect);
        $file_name = $id.'.'.$extension;
        $new_location= '../upload/blog/'.$file_name;
        move_uploaded_file($upload_file['tmp_name'],$new_location);
        

        $update_image = "UPDATE blog SET image='$file_name' WHERE id=$id";
        $update_image_result = mysqli_query($db_connect,$update_image);
        $_SESSION['success']='Add Successfully';
        header('location:add_blog.php');
    }
    else{
        $_SESSION['size'] = 'Maximum File Size 1MB';
        header('location:add_blog.php');
    }
}
else{
    $_SESSION['invalid_extension']='Image Type Should be (jpg,png,gif,jpeg)';
    header('location:add_blog.php');
}




?>