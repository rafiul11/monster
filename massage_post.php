<?php
require 'db.php';

$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

$insert = "INSERT INTO massages(name,email, message)VALUE('$name','$email','$message')";
$insert_result = mysqli_query($db_connect,$insert);
header('location:index.php');



?>