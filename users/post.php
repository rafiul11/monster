 
<?php
   session_start();
   require '../db.php';

    $errors = [];
    $field_names=['name'=>'Username Required','email'=>'Email Required','password'=>'Password Required','country'=>'Country Required'];

    foreach($field_names as $field_name=>$message){
        if(empty($_POST[$field_name])){
           $errors[$field_name]=$message;
        }
        else if(empty($_POST[$field_name])){
           $errors[$field_name] = $message;
        }
        else if(empty($_POST[$field_name])){
            $errors[$field_name] = $message;
        }
    }

    if(count($errors)==0){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $after_password = password_hash($password, PASSWORD_DEFAULT );
    date_default_timezone_set('Asia/dhaka');
    $created_at = date('d-m-y h:i:s');    
    $country = $_POST['country'];
    $role = $_POST['role'];


    $select_users = "SELECT COUNT(*) AS all_exist FROM users WHERE name='$name' and email='$email'";
    $select_users_result = mysqli_query($db_connect, $select_users);
    $after_assoc = mysqli_fetch_assoc($select_users_result);

    if($after_assoc['all_exist']==0){

        $uploaded_file= $_FILES['profile_photo'];
        $after_explode = explode('.',$uploaded_file['name']);
        $extension = end($after_explode); 
         $allowed = array('jpg','png','jpeg','gif','webp');
         if(in_array($extension,$allowed)){
            if($uploaded_file['size'] < 300000){

                $insert = "INSERT INTO users(name,email,password,country,created_at,role) VALUES('$name','$email','$after_password','$country','$created_at','$role')";
                $insert_result = mysqli_query($db_connect,$insert);

                $user_id = mysqli_insert_id($db_connect);
                $file_name = $user_id.'.'.$extension;
                $new_location = '../upload/users/'.$file_name;
                move_uploaded_file($uploaded_file['tmp_name'], $new_location);

                $update_user = "UPDATE users SET profile_photo='$file_name' WHERE id= $user_id";
                $update_user_result = mysqli_query($db_connect,$update_user);

                $_SESSION['success'] = 'Registered Successfully';
                header('location:registration.php');
            }
            else{
                $_SESSION['high'] = 'File Size To High';
                header('location:registration.php');
            }
         }
         else{
            $_SESSION['invalid'] = 'Invalid Email';
            header('location:registration.php');
         }
        }

    elseif($after_assoc['all_exist']==0){
        $_SESSION['success'] = 'Registered Successfully';
        header('location:registration.php');
        }
    
    else{
            $_SESSION['name_exist'] = 'Username Already Exist';
            header('location:registration.php');
            $_SESSION['email_exist'] = 'Email Already Exist';
            header('location:registration.php');
    }

    }
    else{
        $_SESSION['errors'] = $errors;
        $_SESSION['name']= $_POST['name'];
        $_SESSION['email']= $_POST['email'];
        $_SESSION['password']= $_POST['password'];
        header('location:registration.php');
    }





   



    










?>