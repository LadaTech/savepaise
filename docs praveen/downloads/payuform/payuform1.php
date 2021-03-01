<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$server_url = (filter_input(INPUT_SERVER, 'HTTPS') === 'on' ? "https" : "http") . "://" . filter_input(INPUT_SERVER, 'HTTP_HOST');
  
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $productinfo = $_POST['productinfo'];
    $amount = $_POST['amount'];
    $baseUrl = 'https://test.payu.in';
    $key = 'gtKFFx';
    $salt = 'eCwWELxi';//    $amount = 100;
    $txnid = rand(1,100000000);
//    $productinfo = "daily_india";
    $surl = $server_url . "/success.php";
    $furl = $server_url . "/Failure.php";
    $curl = $server_url . "/cancel.php";
//    $email = "janibasha55@gmail.com";
//$firstName = "janibasha";
//    $phone = "7842585505";
    $mode = "CC";
    $cardName = "mastercard";
//    $cardNum = "5123456789012346";
//    $cvv = "123";
//    $expMonth = "05";
//    $expyear = "20";
    $udf1 = $cpId = "MSMIND";
    $udf2 = $cpCustId = "3423432324323232432fgd";
    $udf3 = $pkgInd = "T";
    $udf4 = $amount;
    $hash_string = "$key|$txnid|$amount|$productinfo|$cardName|$email|$udf1|$udf2|$udf3|$udf4|||||||$salt";
    $hash = strtolower(hash('sha512', $hash_string));

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
                <input type="hidden" name="firstname" value="<?php echo $cardName; ?>">
                <input type="hidden" name="productinfo" value="<?php echo $productinfo; ?>" />
                <input type="hidden" name="surl" value="<?php echo $surl; ?>" />
                <input type="hidden" name="furl" value="<?php echo $furl; ?>" />
                <input type="hidden" name="curl" value="<?php echo $curl; ?>" />
                <input type="hidden" name="email" value="<?php echo $email; ?>" />
                <input type="hidden" name="phone" value="<?php echo $phone; ?>"/>
                <input type="hidden" name="udf1" value="<?php echo $udf1; ?>" />
                <input type="hidden" name="udf2" value="<?php echo $udf2; ?>" />
                <input type="hidden" name="udf3" value="<?php echo $udf3; ?>" />
                <input type="hidden" name="udf4" value="<?php echo $udf4; ?>" />
                <input type="hidden" name="pg" value="<?php echo $mode; ?>" />
<?php
// SI transactions
//            if ($this->si_value == '1' && $this->renewable == 'T') {
?>
    <!--                <input type="hidden" name="user_credentials" value="<?php // echo $this->userCredentials;    ?>" />
                    <input type="hidden" name="store_card" value="<?php // echo $this->storeCard;    ?>" />
                    <input type="hidden" name="si" value="<?php // echo $this->si;     ?>" />-->
<?php // }  ?>
                <?php // if ($mode == 'CC' || $mode == 'DC') {   ?>
                    <!--<input type="hidden" name="bankcode" value="<?php // echo ($mode == 'DC') ? $this->dc_bank_code : $mode;     ?>" />-->
                <!--<input type="hidden" name="bankcode" value="<?php // echo $mode ?>" />-->
               

                <!--<input type="hidden" name="firstname" value="<?php // echo $cardName; ?>" />-->
                <!--<input type="hidden" name="pg" value="<?php echo $mode; ?>" />-->

                <!--<input type="hidden" name="ccname" value="<?php echo $cardName; ?>" />-->
                <!--<input type="hidden" name="ccnum" value="<?php echo $cardNum; ?>" />-->
                <!--<input type="hidden" name="ccvv" value="<?php echo $cvv; ?>" />-->
                <!--<input type="hidden" name="ccexpmon" value="<?php echo $expMonth; ?>" />-->
                <!--<input type="hidden" name="ccexpyr" value="<?php echo $expyear; ?>" />-->
<?php // }   ?>
                <!--<input type="submit" id="" value="payusubmit"/>-->

            </form>
        </div>
        <script>
            var payuForm = document.forms.payuform;
            payuForm.submit();</script>
    </body>
</html>