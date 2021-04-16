<?php
$noHeader = 'Yes';
include_once '../common/adminheader.php';
include_once '../common/functions.php';
$commonfunction = new commonfunction();
//echo '<pre>';
//print_r($_REQUEST);
$id = $_REQUEST['id'];
$events = $commonfunction->getBeneficiary($id);
//print_r($events);
?>

<div id="fh5co-staff">
    <div class="container">
        <div class="row">   
            <h2><?PHP echo $events[0]['application_number']; ?></h2>
            <table class="table table-hover" width ="500">
                <tbody>
                    <?PHP
                    if ($events == 'No events') {
                        echo '<tr>
                                        <td colspan="6">' . $events . '</td></tr>';
                    } else {
                        $event = $events[0];
                        ?>
                        <tr>
                            <td>LM Details</td>
                            <td><?PHP echo $event['lifemember'] . "<br />" . $event['lmemail'] . "<br />" . $event['lmnumber']; ?></td>
                        </tr>
    <!--                        <tr>
                            <td>LM Details</td>
                            <td><?PHP echo $event['lifemember'] . "<br />" . $event['lmemail'] . "<br />" . $event['lmnumber']; ?></td>
                        </tr>-->
                        <tr>
                            <td>Beneficial Details</td>
                            <td><?PHP echo $event['bname'] . " " . $event['blastname'] . "<br />" . $event['bnumber']; ?></td>
                        </tr>
                        <tr>
                            <td>Beneficial Photo</td>
                            <td><img src="../uploads/cheeyuta/<?PHP echo $event['bphoto']; ?>" width="200" /></td>
                        </tr>
                        <tr>
                            <td>Beneficial father Name</td>
                            <td><?PHP echo $event['fathername']; ?></td>
                        </tr>
                        <tr>
                            <td>Beneficial Caste</td>
                            <td><?PHP echo $event['bcaste']; ?></td>
                        </tr>
                        <tr>
                            <td>Beneficial Annual Income</td>
                            <td><?PHP echo $event['annualincome']; ?></td>
                        </tr>

                        <tr>
                            <td>Beneficial Annual Income Proof</td>
                            <td><img src="../uploads/cheeyuta/<?PHP echo $event['incomeproof']; ?>" width="200" /></td>
                        </tr>

                        <tr>
                            <td>Beneficial Dependents</td>
                            <td><?PHP echo $event['bdependents']; ?></td>
                        </tr>

                        <tr>
                            <td>Beneficial Occupation</td>
                            <td><?PHP echo $event['boccupation']; ?></td>
                        </tr>

                        <tr>
                            <td>Beneficial Proof</td>
                            <td><?PHP echo $event['bproof_type']; ?></td>
                        </tr>
                        <tr>
                            <td>Beneficial Address</td>
                            <td><?PHP echo $event['baddress'] . " <br />" . $event['bcity'] ?></td>
                        </tr>

                        <tr>
                            <td>Beneficial Proof</td>
                            <td><?PHP echo $event['bproof_type']; ?></td>
                        </tr>

                        <tr>
                            <td>Beneficial Proof Ref Number</td>
                            <td><?PHP echo $event['bproofnumber']; ?></td>
                        </tr>

                        <tr>
                            <td>Beneficial Proof</td>
                            <td><img src="../uploads/cheeyuta/<?PHP echo $event['bproofupload']; ?>" width="200" /></td>
                        </tr>

                        <tr>
                            <td>Created Date</td>
                            <td><?PHP echo $event['created_date']; ?></td>
                        </tr>

                        <tr>
                            <td>Status</td>
                            <td><?PHP echo $event['status']; ?></td>
                        </tr>
                        <tr>
                            <td>Comment</td>
                            <td><?PHP echo $event['comment']; ?></td>
                        </tr>

                        <tr>
                            <td>Last Updated By</td>
                            <td> 
                                <?PHP
                                if ($event['updated_by'] != '') {
                                    ?>
                                    <?PHP echo $event['updated_by']; ?> at <?PHP echo $event['updated_date']; ?>
                                    <?PHP
                                }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">Add Comment</td>

                        </tr>

                        <tr>
                            <td colspan="2">
                                <textarea cols="75" id="bencomment" name="bencomment" required="required"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" id="benbuttons">
                                <?PHP
                                if ($event["status"] == 'Submitted') {
                                    ?>
                                    <button type = "button" onclick = "updateCheyutaStatus('<?PHP echo $event['id']; ?>', 'verifail')" class = "btn btn-primary">Verification Failed</button>
                                    <button type = "button" onclick = "updateCheyutaStatus('<?PHP echo $event['id']; ?>', 'veriapproved')" class = "btn btn-primary">Verification Approved</button>

                                    <?PHP
                                } else if ($event["status"] != 'Submitted') {
                                    ?>
                                    <button type="button" onclick="updateCheyutaStatus('<?PHP echo $event['id']; ?>', 'approve')" class="btn btn-primary">Ben Approve</button>
                                    <button type="button" onclick="updateCheyutaStatus('<?PHP echo $event['id']; ?>', 'reject')" class="btn btn-primary">Ben Reject</button>
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
        </div>
    </div>
</div>
<?PHP
$customJsFooter = '<script src="/js/iframepopup.js" type="text/javascript"></script>'
        . '<script src="/js/custom.js" type="text/javascript"></script>';
include_once '../common/adminfooter.php';
?>
