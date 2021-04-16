<?PHP
include_once 'common/logs.php';
include_once 'common/db.php';
$log = "Transaction success response is: " . json_encode($_POST) . PHP_EOL;
insertlogs($log);
//echo "<pre>";
//print_r($_POST);
$tranactionId = $_POST['txnid'];
$update = "update transaction_info_vb set status = 'success',txRefNo= '".$_POST['payuMoneyId']."', response= '".json_encode($_POST)."' where txId = '$tranactionId'";

if ($conn->query($update) === TRUE) {
    insertlogs("Transaction was success with transaction id " . $tranactionId . ' ' . PHP_EOL);
} else {
    insertlogs("Error: " . $update . "<br>" . $conn->error . PHP_EOL);
}
echo "<script>window.location.href='status.php?s=s&t=".$_POST['payuMoneyId']."';</script>";
//    exit;
//header("location: /status.php?s=s");
//exit;
?>