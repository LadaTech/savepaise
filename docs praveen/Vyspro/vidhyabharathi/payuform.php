<?php
session_start();
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once 'common/logs.php';
include_once 'common/db.php';
//echo "<pre>";
//print_r($_POST);
//exit;

$name = $_POST['name'];
$surname = $_POST['surname'];
$email = $_POST['email'];
//list($firstName, $domainName) = explode('@', $email);
$firstName = $surname . '.' . $name;
$phone = $_POST['contactnumbers'];
$productinfo = "vb";
$transport = $_POST['transport'];
$amount = $_POST['amount'];
$donationtype = $_POST['donationtype'];
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
$log .= "Surname=" . $surname . " FirstName = " . $name . "and cpId = " . $cpCustId . PHP_EOL;
insertlogs($log);
$sql = "INSERT INTO transaction_info_vb (surname,name, emailid, phonenumber,donation_type,request,status,txId,amount,created_ts)
VALUES ('$surname','$name', '$email', '$phone','$donationtype','$productinfo','$hash_string','pending','$txnid','$amount',now())";
$querylog = "inserted query - " . $sql . PHP_EOL;
insertlogs($querylog);

if ($conn->query($sql) === TRUE) {
    insertlogs("New record created successfully" . PHP_EOL);
    $insertId = $conn->insert_id;
    $receiptnumber = str_pad($insertId, 4, '0', STR_PAD_LEFT);
    $receiptID = "VB2019/" . $receiptnumber;
    $update = "update transaction_info_vb set receipt_number = '$receiptID' where id = '$insertId'";
    $conn->query($update);
} else {
    insertlogs("Error: " . $sql . "<br>" . $conn->error . PHP_EOL);
}
insertlogs("generating hidden form with transaction id - $txnid " . PHP_EOL);
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
                if ($domain != 'localhost') {
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