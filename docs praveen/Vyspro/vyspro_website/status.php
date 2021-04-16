<?php
include_once '/common/db.php';
include_once '/common/functions.php';
include_once '/common/header.php';
$log = "insert payu details. " . PHP_EOL;
insertlogs($log);
if ($_REQUEST['s'] == 's') {
    $message = "Thanks for the Donation.";
} else if ($_REQUEST['s'] == 'c') {
    $message = "Oops! you canceled the purchase, to try again click <a href='/donation.php'>Payment Page</a>";
} else if ($_REQUEST['s'] == 'f') {
    $message = "Oops! your transaction is failed, Please try again! <a href='/donation.php'>Payment Page</a>";
} else
    $message = "something went wrong";
?>
<section class="page">  
    <div class="container">
        <h3 style="color: #D70000;">Donation for Merit Award / Scholarship</h3>
        <div class="row">

            <div class="col-md-12 formContainer clearfix">
                <div class="payuform">
                    <h4 style="color: #d70000;"><?PHP echo $message; ?></h4>
                </div>
            </div>
        </div>
</section>

<?PHP
include_once '/common/footer.php';
?>
