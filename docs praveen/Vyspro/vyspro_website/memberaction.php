<?php
session_start();
ini_set('upload_max_filesize', '0');
include_once '/common/db.php';
include_once '/common/functions.php';
$commonfunction = new commonfunction();

//echo "<pre>";
//print_r($conn);
//print_r($_POST);
//print_r($_FILES);
//echo $key;
//exit;
$surname = $conn->real_escape_string($_POST['surname']);
$fullname = $conn->real_escape_string($_POST['fullname']);
$lastname = $conn->real_escape_string($_POST['lastname']);
$email = $conn->real_escape_string($_POST['email']);
$mobilenumber = $conn->real_escape_string($_POST['mobilenumber']);
$gowtram = $conn->real_escape_string($_POST['gowtram']);
$fathername = $conn->real_escape_string($_POST['fathername']);
$dob = $conn->real_escape_string($_POST['dob']);
$domarriage = $conn->real_escape_string($_POST['domarriage']);
$address1 = $conn->real_escape_string($_POST['address1']);
$address2 = $conn->real_escape_string($_POST['address2']);
$street = $conn->real_escape_string($_POST['street']);
$city = $conn->real_escape_string($_POST['city']);
$state = $conn->real_escape_string($_POST['state']);
$country = $conn->real_escape_string($_POST['country']);
$pincode = $conn->real_escape_string($_POST['pincode']);
$referredby = $conn->real_escape_string($_POST['referredby']);
$qualification = $conn->real_escape_string($_POST['qualification']);
$profession = $conn->real_escape_string($_POST['profession']);
$tnc = $conn->real_escape_string($_POST['tnc']);
list($emailName, $domainName) = explode('@', $email);
$txnid = rand(1, 100000000) . rand(10, 2000);
$photo = $txnid . '_' . $emailName . '_photo_' . $conn->real_escape_string($_FILES['photo']['name']);
$certificate = $txnid . '_' . $emailName . '_certificate_' . $conn->real_escape_string($_FILES['certificate']['name']);


$p = $commonfunction->uploadFiles($_FILES['photo'], $txnid . '_' . $emailName . '_photo');
$pe = $commonfunction->uploadFiles($_FILES['certificate'], $txnid . '_' . $emailName . '_certificate');

$price = 1000;
$taxRate = 2.4;
$tax = $price * $taxRate / 100;
$amount = $price + $tax;
//$amount=(($total-$price)/$price)*100;


$surl = $server_url . "/success.php";
$furl = $server_url . "/Failure.php";
$curl = $server_url . "/cancel.php";
$mode = "CC";
//$firstname = "mastercard";
$udf1 = $cpId = "MSMIND";
$udf2 = $cpCustId = rand(1, 10000000000);
$udf3 = $pkgInd = "T";
$udf4 = $amount;
$hash_string = "$key|$txnid|$amount|membership|" . str_replace(" ", "_", $fullname . $lastname) . "|$email|$udf1|$udf2|$udf3|$udf4|||||||$salt";
//    $hash_string = "$key|$txnid|$amount|$productinfo|$cardName|$email|$udf4|||||||$salt";
$hash = strtolower(hash('sha512', $hash_string));
$log = "Redirecting to payu page and the " . PHP_EOL;
$log .= "Transaction Details are txId=" . $txnid . "  email=" . $email . " phone=" . $phone . " and amount = " . $amount . PHP_EOL;
$log .= "Surname=" . $surname . " FirstName = " . $name . "and cpId = " . $cpCustId . PHP_EOL;
insertlogs($log);

$sql = "INSERT INTO members (sur_name,firstname,lastname,email_id, mobile_number,gowtram,
                             fathername,date_of_birth,marriage_date,address1,address2,
                             street_name,city,state,country,pincode,referred_by,qualification,
                             profession,photo,certificate,status,paymentTxtId,payment_request,amount)
                    VALUES ('$surname','$fullname','$lastname', '$email', '$mobilenumber','$gowtram',"
        . "'$fathername','$dob','$domarriage','$address1','$address2',"
        . "'$street','$city','$state','$country','$pincode','$referredby','$qualification',"
        . "'$profession','$photo','$certificate','payment Pending','$txnid','$hash_string', '$amount')";
$querylog = "inserted query - " . $sql . PHP_EOL;
insertlogs($querylog);

if ($conn->query($sql) === TRUE) {
    insertlogs("New record created successfully" . PHP_EOL);
} else {
    insertlogs("Error: " . $sql . "<br>" . $conn->error . PHP_EOL);
}
insertlogs("generating hidden form with transaction id - $txnid " . PHP_EOL);
//exit;
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
                <input type="hidden" name="firstname" value="<?php echo str_replace(" ", "_", $fullname . $lastname); ?>">
                <input type="hidden" name="productinfo" value="<?php echo "membership"; ?>" />
                <input type="hidden" name="surl" value="<?php echo $surl; ?>" />
                <input type="hidden" name="furl" value="<?php echo $furl; ?>" />
                <input type="hidden" name="curl" value="<?php echo $curl; ?>" />
                <input type="hidden" name="email" value="<?php echo $email; ?>" />
                <input type="hidden" name="phone" value="<?php echo $phone; ?>"/>
                <input type="hidden" name="udf1" value="<?php echo $udf1; ?>" />
                <?PHP
                if ($serverhost != 'localhost') {
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