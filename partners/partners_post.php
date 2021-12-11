<?php 
session_start();
require '../db.php';


$image = $_FILES['image']['name'];



$upload_file = $_FILES['image'];
$after_explode= explode('.',$upload_file['name']);
$extension = end($after_explode);
$allowed_extension = array('jpg','png','jpeg','gif');
if(in_array($extension,$allowed_extension)){
    if($upload_file['size']<=3000000 ){
        $insert_partners = "INSERT INTO partners(image) VALUES ('$image')";
        $insert_partners_result = mysqli_query($db_connect,$insert_partners);

        $id = mysqli_insert_id($db_connect);
        $file_name = $id.'.'.$extension;
        $new_location= '../upload/partners/'.$file_name;
        move_uploaded_file($upload_file['tmp_name'],$new_location);
        

        $update_partners = "UPDATE partners SET image='$file_name' WHERE id=$id";
        $update_partners_result = mysqli_query($db_connect,$update_partners);
        $_SESSION['success']='Add Successfully';
        header('location:add_partners.php');
    }
    else{
        $_SESSION['size'] = 'Maximum File Size 3MB';
        header('location:add_partners.php');
    }
}
else{
    $_SESSION['invalid_extension']='Image Type Should be (jpg,png,gif,jpeg)';
    header('location:add_partners.php');
}


?>