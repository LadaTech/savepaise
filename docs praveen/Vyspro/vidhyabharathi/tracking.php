<?php
session_start();
session_destroy();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$headerTitle = 'APPLICATION FOR MERIT AWARD / SCHOLARSHIP ';
//include_once 'common/logs.php';
include_once 'common/db.php';
include_once 'common/header.php';

//$log = "application from started. " . PHP_EOL;
//insertlogs($log);
$display = 0;
//print_r($_POST);
if (isset($_POST) && !empty($_POST) || (isset($_REQUEST['tracking']) != '' && $_REQUEST['tracking'] != '')) {
    $display = 1;
    $selectType = "SELECT * FROM `vb_users` where application_number like '$_REQUEST[tracking]' and email like '$_REQUEST[email]'";
    $result = $conn->query($selectType);
    if ($result) {
        $row = $result->fetch_assoc();
    }
//    echo "<pre>";
//    print_r($row);
//    echo "</pre>";
}
?>
<section class="page">  
    <div class="container">
        <h3 style="color: #D70000;">Vyspro-India Vidhya Bharathi 2019 application status</h3>
        <div class="row formContainer"> 
            <div class="col-8">
                <div class="row" id="step-1">
                    <div class="col-xs-12">
                        <form role="form" id="tracking" class="form" name="tracking" method="post" action="tracking.php">
                            <div class="col-md-12">
                                <!--<h3>Application Status</h3>-->
                                <br />
                                <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <label class="control-label">Reference Number</label>
                                    <input maxlength="250" required="required" type="text" class="form-control" value="<?PHP
                                    if (isset($_POST['tracking'])) {
                                        echo $_POST['tracking'];
                                    }
                                    ?>" id="tracking" name="tracking" placeholder="Enter Reference Number"  />
                                </div>
                                <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <label class="control-label">Email Id</label>
                                    <input maxlength="250" required="required" type="text" class="form-control" value="<?PHP
                                    if (isset($_POST['email'])) {
                                        echo $_POST['email'];
                                    }
                                    ?>" id="email" name="email" placeholder="Enter Email Id"  />
                                </div>
                                <div class="clearfix"></div>
                                <button class="btn btn-success btn-lg pull-right" type="submit">Track</button>
                            </div>
                        </form>



                        <?PHP
                        if ($display == 1) {
                            if (isset($_REQUEST['s']) && $_REQUEST['s'] != '') {
                                echo "<div style='color:green; text-align:center; font-size:20px;'>Thanks for uploading Bank Proof</div>";
                            }
                            if (isset($row) && sizeof($row) > 0) {
                                ?>
                                <div>
                                    Application Details:
                                </div>
                                <div>
                                    <table class="table table-condensed">
                                        <tbody>
                                            <tr>
                                                <td colspan="2" style="font-weight:bold">Reference Number:</td>
                                                <td colspan="2" style="font-weight:bold"><?PHP echo $row['application_number']; ?></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" style="font-weight:bold">Full Name</td>
                                                <td colspan="2" style="font-weight:bold"><?PHP echo $row['surname'] . ' ' . $row['name']; ?></td>
                                            </tr><tr>
                                                <td colspan="2" style="font-weight:bold">Download PDF</td>
                                                <td colspan="2" style="font-weight:bold"><a target="_blank" href="/pdf/<?PHP echo $row['application_number']; ?>.pdf"><img src="/images/pdf.png"></a></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" style="font-weight:bold">Uploaded date:</td>
                                                <td colspan="2" style="font-weight:bold"><?PHP echo $row['submisstion_date']; ?></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" style="font-weight:bold">Status:</td>
                                                <td colspan="2" style="font-weight:bold"><?PHP echo $row['student_status']; ?></td>
                                            </tr>
                                            <?PHP
                                            if ($row['applying_for'] == 'scholarship' && $row['student_status']=='Approved') {
                                                ?>

                                                <tr>
                                                    <td colspan="2" style="font-weight:bold">Bank Name:</td>
                                                    <td colspan="2" style="font-weight:bold"><?PHP echo $row['bank_name']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" style="font-weight:bold">Bank A/c Name:</td>
                                                    <td colspan="2" style="font-weight:bold"><?PHP echo $row['bankstudentname']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" style="font-weight:bold">Bank A/c Number:</td>
                                                    <td colspan="2" style="font-weight:bold"><?PHP echo $row['account_number']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" style="font-weight:bold">Bank IFSC Code:</td>
                                                    <td colspan="2" style="font-weight:bold"><?PHP echo $row['ifsc_code']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" style="font-weight:bold">Bank Branch:</td>
                                                    <td colspan="2" style="font-weight:bold"><?PHP echo $row['bank_branch']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" style="font-weight:bold">
                                                        Upload Proof <br /> (canceled cheque / bank passbook first page)
                                                    </td>
                                                    <td colspan="2">
                                                        <?PHP
                                                        if ($row['bank_proof'] != '') {
                                                            echo "<a href='/uploads/$row[bank_proof]' target='_blank'><img src ='/uploads/$row[bank_proof]' width='350' /></a>";
                                                        } else {
                                                            ?>
                                                            <form id="uploadproof" name="uploadproof" role="form" action="proof.php" method="post" enctype="multipart/form-data">
                                                                <input type="file" id="proof" name="proof" required="required" />
                                                                <input type="hidden" value="<?PHP echo $row['application_number']; ?>" id="refNumber" name="refNumber" />
                                                                <input type="hidden" value="<?PHP echo $row['email']; ?>" id="email" name="email" />
                                                                <button class="btn btn-primary nextBtn btn-lg pull-right" type="submit">Submit</button>
                                                            </form>
                                                            <?PHP
                                                        }
                                                        ?>
                                                    </td>

                                                </tr>
                                                <?PHP
                                            }
                                            ?>


                                        </tbody>
                                    </table>
                                    <?PHP
                                } else {
                                    echo "<h3>No application found</h3>";
                                }
                            }
                            ?>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
<?PHP
include_once 'common/footer.php';
?>