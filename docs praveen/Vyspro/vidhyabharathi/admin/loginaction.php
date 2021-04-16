<?php

session_start();
include_once '../common/logs.php';
include_once '../common/db.php';

$userName = $_REQUEST['name'];
$password = $_REQUEST['password'];


$selectType = "SELECT * FROM `admins` where  username = '$userName' and password = '$password'";
$result = $conn->query($selectType);
if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        $_SESSION['adminusername'] = $row['username'];
        $_SESSION['adminusertype'] = $row['type'];
        $_SESSION['adminfullName'] = $row['full_name'];
        $_SESSION['adminuserid'] = $row['id'];
    }
    echo "<script>window.location.href='users.php';</script>";
    exit;
//    header("location: /users.php");
    exit;
} else {
    echo "<script>window.location.href='login.php?e=fail';</script>";
    exit;
}
    