<?php 
session_start();
require '../db.php';



$title = $_POST['title'];
$category = $_POST['category'];
$client = $_POST['client'];
$completion = $_POST['completion'];
$project_type = $_POST['project_type'];
$authors = $_POST['authors'];
$budget = $_POST['budget'];


$upload_file = $_FILES['image'];
$after_explode= explode('.',$upload_file['name']);
$extension = end($after_explode);
$allowed_extension = array('jpg','png','jpeg','gif');
if(in_array($extension,$allowed_extension)){
    if($upload_file['size']<= 1000000 ){
        $insert_project = "INSERT INTO projects(title, category, client, completion, project_type, authors, budget) VALUES ('$title','$category','$client','$completion','$project_type','$authors','$budget')";
        $insert_project_result = mysqli_query($db_connect,$insert_project);

        $id = mysqli_insert_id($db_connect);
        $file_name = $id.'.'.$extension;
        $new_location= '../upload/projects/'.$file_name;
        move_uploaded_file($upload_file['tmp_name'],$new_location);
        

        $update_image = "UPDATE projects SET image='$file_name' WHERE id=$id";
        $update_image_result = mysqli_query($db_connect,$update_image);
        $_SESSION['success']='Project Add Successfully';
        header('location:add_project.php');
    }
    else{
        $_SESSION['size'] = 'Maximum File Size 1MB';
        header('location:add_project.php');
    }
}
else{
    $_SESSION['invalid_extension']='Image Type Should be (jpg,png,gif,jpeg)';
    header('location:add_project.php');
}


?>