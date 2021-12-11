<?php
session_start();
unset($_SESSION['login']);
$_SESSION['logout']='Sign Out successfully';
header('location:login.php');
?>