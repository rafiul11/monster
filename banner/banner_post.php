<?php 
session_start();
require '../db.php';



$title = $_POST['title'];
$description = $_POST['description'];
$btn = $_POST['btn'];


$upload_file = $_FILES['image'];
$after_explode= explode('.',$upload_file['name']);
$extension = end($after_explode);
$allowed_extension = array('jpg','png','jpeg','gif');
if(in_array($extension,$allowed_extension)){
    if($upload_file['size']<= 1000000 ){
        $insert_banner = "INSERT INTO banner(title,description,btn) VALUES ('$title','$description','$btn')";
        $insert_banner_result = mysqli_query($db_connect,$insert_banner);

        $id = mysqli_insert_id($db_connect);
        $file_name = $id.'.'.$extension;
        $new_location= '../upload/banner/'.$file_name;
        move_uploaded_file($upload_file['tmp_name'],$new_location);
        

        $update_image = "UPDATE banner SET image='$file_name' WHERE id=$id";
        $update_image_result = mysqli_query($db_connect,$update_image);
        $_SESSION['success']='Banner Add Successfully';
        header('location:add_banner.php');
    }
    else{
        $_SESSION['size'] = 'Maximum File Size 1MB';
        header('location:add_banner.php');
    }
}
else{
    $_SESSION['invalid_extension']='Image Type Should be (jpg,png,gif,jpeg)';
    header('location:add_banner.php');
}


?>