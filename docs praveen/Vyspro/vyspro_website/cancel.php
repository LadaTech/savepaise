<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once '/common/db.php';
include_once '/common/functions.php';
$log = "Transaction FCancel response is: " . json_encode($_POST) . PHP_EOL;
insertlogs($log);
$tranactionId = $_POST['txnid'];
$update = "update members set status = 'cancelled',payment_response= '".json_encode($_POST)."' where paymentTxtId = '$tranactionId'";
if ($conn->query($update) === TRUE) {
    insertlogs("Transaction was cancelled with transaction id " . $tranactionId . ' ' . PHP_EOL);
} else {
    insertlogs("Error: " . $update . "<br>" . $conn->error . PHP_EOL);
}
echo "<script>window.location.href='status.php?s=c';</script>";
    exit;
//echo "<pre>";
//print_r($_POST);
?>