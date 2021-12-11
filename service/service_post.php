<?php 
session_start();
require '../db.php';


$title = $_POST['title'];
$description = $_POST['description'];
$logo = $_FILES['logo_image']['name'];


$upload_file = $_FILES['logo_image'];
$after_explode= explode('.',$upload_file['name']);
$extension = end($after_explode);
$allowed_extension = array('jpg','png','jpeg','gif');
if(in_array($extension,$allowed_extension)){
    if($upload_file['size']<= 100000 ){
        $insert_service = "INSERT INTO services (title,description,logo_image) VALUES ('$title','$description','$logo')";
        $insert_service_result = mysqli_query($db_connect,$insert_service);

        $id = mysqli_insert_id($db_connect);
        $file_name = $id.'.'.$extension;
        $new_location= '../upload/service/'.$file_name;
        move_uploaded_file($upload_file['tmp_name'],$new_location);
        

        $update_image_logo = "UPDATE services SET logo_image='$file_name' WHERE id=$id";
        $update_image_logo_result = mysqli_query($db_connect,$update_image_logo);
        $_SESSION['success']='Add Successfully';
        header('location:add_service.php');
    }
    else{
        $_SESSION['size'] = 'Maximum File Size 1MB';
        header('location:add_service.php');
    }
}
else{
    $_SESSION['invalid_extension']='Image Type Should be (jpg,png,gif,jpeg)';
    header('location:add_service.php');
}



?>