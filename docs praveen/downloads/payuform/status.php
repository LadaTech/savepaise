<?php
include_once 'logs.php';
include_once 'header.php';
$log = "insert payu details. " . PHP_EOL;
insertlogs($log);
if ($_REQUEST['s'] == 's') {
    $message = "Thanks for Purchaing the tickets. <br /> Please show the message at the venue with the transaction ID - $_REQUEST[t]";
} else if ($_REQUEST['s'] == 'c') {
    $message = "Oops! you canceled the purchase, to try again click <a href='/index.php'>Payment Page</a>";
}else if ($_REQUEST['s'] == 'f') {
    $message = "Oops! your transaction is failed, Please try again! <a href='/index.php'>Payment Page</a>";
}
else
    $message = "something went wrong";
?>
<section class="page">  
    <div class="container">
        <h3 style="color: #D70000;">Vyspro-India KVB 2019 Invite</h3>
        <div class="row">

            <div class="col-md-12 formContainer clearfix">
                <div class="payuform">
                    <h4 style="color: #d70000;"><?PHP echo $message; ?></h4>
                </div>
            </div>

            <?PHP
            include_once 'footer.php';
            ?>