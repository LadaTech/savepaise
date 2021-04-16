<?php

session_start();
include_once 'common/logs.php';
include_once 'common/db.php';
//include_once 'common/header.php';
//echo "<pre>";
//print_r($_POST);
//print_r($_FILES);
list($firstName, $domainName) = explode('@', $_POST['email']);
uploadFiles($_FILES['proof'], "bankproof", $firstName . "_bank");
//print_r($_SESSION);
$bankProof = $_SESSION["users"]["bankproof"];
$update = "update vb_users set bank_proof = '$bankProof' where application_number = '$_POST[refNumber]'";
$status = $conn->query($update);
header("location:/tracking.php?tracking=$_POST[refNumber]&email=$_POST[email]&s=success");
//echo "</pre>";
?>

