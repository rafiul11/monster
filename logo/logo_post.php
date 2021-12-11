<?php 
session_start();
require '../db.php';


$logo = $_FILES['logo']['name'];


$upload_file = $_FILES['logo'];
$after_explode= explode('.',$upload_file['name']);
$extension = end($after_explode);
$allowed_extension = array('jpg','png','jpeg','gif');
if(in_array($extension,$allowed_extension)){
    if($upload_file['size']<= 1000000 ){
        $insert_logo = "INSERT INTO logo(logo) VALUES ('$logo')";
        $insert_logo_result = mysqli_query($db_connect,$insert_logo);

        $id = mysqli_insert_id($db_connect);
        $file_name = $id.'.'.$extension;
        $new_location= '../upload/logo/'.$file_name;
        move_uploaded_file($upload_file['tmp_name'],$new_location);
        

        $update_logo = "UPDATE logo SET logo='$file_name' WHERE id=$id";
        $update_logo_result = mysqli_query($db_connect,$update_logo);
        $_SESSION['success']='Logo Add Successfully';
        header('location:add_logo.php');
    }
    else{
        $_SESSION['size'] = 'Maximum File Size 1MB';
        header('location:add_logo.php');
    }
}
else{
    $_SESSION['invalid_extension']='Image Type Should be (jpg,png,gif,jpeg)';
    header('location:add_logo.php');
}


?>