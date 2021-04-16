<?PHP
include_once '/common/db.php';
include_once '/common/functions.php';
$log = "Transaction success response is: " . json_encode($_POST) . PHP_EOL;
insertlogs($log);
//echo "<pre>";
//print_r($_POST);
$tranactionId = $_POST['txnid'];
$update = "update members set status = 'success',payment_id= '".$_POST['payuMoneyId']."', payment_response= '".json_encode($_POST)."' where paymentTxtId = '$tranactionId'";

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