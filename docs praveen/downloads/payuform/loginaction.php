<?php
session_start();
include_once 'logs.php';
include_once 'db.php';

$userName = $_REQUEST['name'];
$password = $_REQUEST['password'];


if (($userName == 'admin' && $password == 'admin@123') ||
        ($userName == 'praveen' && $password == 'praveen@123')) {
    $_SESSION['username'] = $userName;
    echo "<script>window.location.href='users.php';</script>";
    exit;
//    header("location: /users.php");
    exit;
} else {
    echo "<script>window.location.href='login.php';</script>";
    exit;
}
