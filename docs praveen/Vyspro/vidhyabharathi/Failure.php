<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once 'common/logs.php';
include_once 'common/db.php';
$log = "Transaction Failure response is: " . json_encode($_POST) . PHP_EOL;

insertlogs($log);

$tranactionId= $_POST['txnid'];
$update = "update transaction_info_vb set status = 'fail',txRefNo= '".$_POST['payuMoneyId']."',response= '".json_encode($_POST)."' where txId = '$tranactionId'";

if ($conn->query($update) === TRUE) {
    insertlogs("Transaction was fail with transaction id ". $tranactionId.' '.PHP_EOL);
} else {
    insertlogs("Error: " . $update . "<br>" . $conn->error .PHP_EOL);
}
echo "<script>window.location.href='status.php?s=f';</script>";
exit;
//$server = $_SERVER["SERVER_SOFTWARE"];
//$server_name = explode('/', $server);
//list($server_type, $server_version) = $server_name;
//if ($server_type == 'nginx') {
//    file_put_contents('/var/log/nginx/payuform_' . date("j.n.Y") . '.txt', $log, FILE_APPEND);
//} else {
//    file_put_contents('./payuform_' . date("j.n.Y") . '.txt', $log, FILE_APPEND);
//}
//echo "<pre>";
//print_r($_POST);
