<?php

session_start();
include_once '../common/logs.php';
include_once '../common/db.php';

//echo "<pre>";
//print_r($_POST);
//echo "</pre>";

switch ($_POST['vysprostatus']) {
    case "Document Received":
    case "Online Application verified & approved":
    case "Online Application verified & Rejected":
    case "Hard copy Application verified & approved":
    case "Hard copy Application verified & Rejected":
        $studentStatus = 'Under Verification';
        break;
    case "Application Approved":
        $studentStatus = "Approved";
        break;
    case "Application Rejected":
        $studentStatus = "Rejected";
        break;
    default :
        $studentStatus = 'Under Verification';
}
$selectType = "update vb_users set approval_status = '" . $_POST["vysprostatus"] . "',"
        . " comment = concat(comment,' <p> " . date('d-m-Y H:i:s') . " :: user - $_SESSION[adminfullName] ,:: status - " . $_POST["vysprostatus"] . ", :: comment:  " . $_POST["comment"] . "</p>'),"
        . " student_status = '$studentStatus', approved_by = '$_SESSION[adminuserid]',verified_date = now()"
        . " where application_number = '$_POST[refID]' ";
$result = $conn->query($selectType);
if ($result) {
    header("location:users.php");
    exit;
}
?>    