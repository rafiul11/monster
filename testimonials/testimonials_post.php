<?php 
session_start();
require '../db.php';


$details = $_POST['details'];
$company_name= $_POST['company_name'];
$position = $_POST['position'];
$logo = $_FILES['image']['name'];


$upload_file = $_FILES['image'];
$after_explode= explode('.',$upload_file['name']);
$extension = end($after_explode);
$allowed_extension = array('jpg','png','jpeg','gif');
if(in_array($extension,$allowed_extension)){
    if($upload_file['size']<= 100000 ){
        $insert_testimonials = "INSERT INTO testimonials (details,company_name,image,position) VALUES ('$details','$company_name','$logo','$position')";
        $insert_testimonials_result = mysqli_query($db_connect,$insert_testimonials);

        $id = mysqli_insert_id($db_connect);
        $file_name = $id.'.'.$extension;
        $new_location= '../upload/testimonials/'.$file_name;
        move_uploaded_file($upload_file['tmp_name'],$new_location);
        

        $update_image= "UPDATE testimonials SET image='$file_name' WHERE id=$id";
        $update_image_result = mysqli_query($db_connect,$update_image);
        $_SESSION['success']='Add Successfully';
        header('location:add_testimonials.php');
    }
    else{
        $_SESSION['size'] = 'Maximum File Size 1MB';
        header('location:add_testimonials.php');
    }
}
else{
    $_SESSION['invalid_extension']='Image Type Should be (jpg,png,gif,jpeg)';
    header('location:add_testimonials.php');
}



?>