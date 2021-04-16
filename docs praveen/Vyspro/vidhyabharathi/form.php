<?php
session_start();
//session_destroy();
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL);
//print_r($_POST);
//exit;
if (isset($_POST)) {
    if ($_POST['applying_for'] == 'scholarship') {
        header("location:scholarship.php");
        exit;
    } else {
        header("location:merit.php");
        exit;
    }
}
?>
