<?php
session_start();
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL);
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once 'logs.php';
include_once 'db.php';

//$server_url = (filter_input(INPUT_SERVER, 'HTTPS') === 'on' ? "https" : "http") . "://" . filter_input(INPUT_SERVER, 'HTTP_HOST');
//echo "<pre>";
//print_r($_POST);
//echo "</pre>";
//exit;


$name = $_POST['name'];
$surname = $_POST['surname'];
$email = $_POST['email'];
//list($firstName, $domainName) = explode('@', $email);
$firstName = $surname.'.'.$name;
$phone = $_POST['contactnumbers'];
$productinfo = $_POST['nooftickets'];
$transport = $_POST['transport'];
$amount = $_POST['amount'];
$googleform = $_POST['googleform'];
//$amount = 1;
//echo $baseUrl;exit;

$txnid = rand(1, 100000000) . rand(10, 2000);
$surl = $server_url . "/success.php";
$furl = $server_url . "/Failure.php";
$curl = $server_url . "/cancel.php";
$mode = "CC";
//$firstname = "mastercard";
$udf1 = $cpId = "MSMIND";
$udf2 = $cpCustId = rand(1, 10000000000);
$udf3 = $pkgInd = "T";
$udf4 = $amount;
$hash_string = "$key|$txnid|$amount|$productinfo|$firstName|$email|$udf1|$udf2|$udf3|$udf4|||||||$salt";
//    $hash_string = "$key|$txnid|$amount|$productinfo|$cardName|$email|$udf4|||||||$salt";
$hash = strtolower(hash('sha512', $hash_string));
$log = "Redirecting to payu page and the " . PHP_EOL;
$log .= "Transaction Details are txId=" . $txnid . "  email=" . $email . " phone=" . $phone . " and amount = " . $amount . PHP_EOL;
$log .= "Surname=".$surname." FirstName = " . $name . "and cpId = " . $cpCustId . PHP_EOL;
insertlogs($log);
$sql = "INSERT INTO transaction_info (surname,name, emailid, phonenumber,googleform, no_of_tickets,transport,request,status,txId,amount,created_ts)
VALUES ('$surname','$name', '$email', '$phone','$googleform',$productinfo,'$transport','$hash_string','pending','$txnid','$amount',now())";
$querylog = "inerted query - " . $sql . PHP_EOL;
insertlogs($querylog);

if ($conn->query($sql) === TRUE) {
    insertlogs("New record created successfully" . PHP_EOL);
} else {
    insertlogs("Error: " . $sql . "<br>" . $conn->error . PHP_EOL);
}
insertlogs("generating hidden form with transaction id - $txnid " . PHP_EOL);

//$server = $_SERVER["SERVER_SOFTWARE"];
//$server_name = explode('/', $server);
//list($server_type, $server_version) = $server_name;
//if ($server_type == 'nginx') {
//    file_put_contents('/var/log/nginx/payuform_' . date("j.n.Y") . '.txt', $log, FILE_APPEND);
//} else {
//    file_put_contents('./payuform_' . date("j.n.Y") . '.txt', $log, FILE_APPEND);
//}
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>

        <div class="center">
            <form id="payuform" name="payuform" method="post" action="<?php echo $baseUrl . "/_payment"; ?>">
                <input type="hidden" name="key" value="<?php echo $key; ?>" />
                <input type="hidden" name="hash" value="<?php echo $hash; ?>"/>
                <input type="hidden" name="txnid" value="<?php echo $txnid; ?>" />
                <input type="hidden" name="amount" value="<?php echo $amount; ?>" />
                <input type="hidden" name="firstname" value="<?php echo $firstName; ?>">
                <input type="hidden" name="productinfo" value="<?php echo $productinfo; ?>" />
                <input type="hidden" name="surl" value="<?php echo $surl; ?>" />
                <input type="hidden" name="furl" value="<?php echo $furl; ?>" />
                <input type="hidden" name="curl" value="<?php echo $curl; ?>" />
                <input type="hidden" name="email" value="<?php echo $email; ?>" />
                <input type="hidden" name="phone" value="<?php echo $phone; ?>"/>
                <input type="hidden" name="udf1" value="<?php echo $udf1; ?>" />
                <?PHP
                if ($domain!='localhost') {
                    ?>
                    <input type='hidden' name ="service_provider" value="payu_paisa" />
                    <?PHP
                }
                ?>
                <input type="hidden" name="udf2" value="<?php echo $udf2; ?>" />
                <input type="hidden" name="udf3" value="<?php echo $udf3; ?>" />
                <input type="hidden" name="udf4" value="<?php echo $udf4; ?>" />
                <input type="hidden" name="pg" value="<?php echo $mode; ?>" />
            </form>
        </div>
        <?PHP
//        exit;
        insertlogs("redirecting to payu with transation id - $txnid " . PHP_EOL);
        ?>
        <script>
            var payuForm = document.forms.payuform;
            payuForm.submit();</script>
    </body>
</html>