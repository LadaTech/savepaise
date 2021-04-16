<?PHP
include_once '../common/adminheader.php';
include_once '../common/functions.php';
$commonfunction = new commonfunction();
$events = $commonfunction->getBeneficiary();
//echo "<pre>";
//print_r($events);
//echo "</pre>";
?>
<div id="fh5co-staff">
    <div class="container">
        <div class="row">
            <div class="col-md-12">          
                <ol class="breadcrumb">        
                    <li class="breadcrumb-item">
                        <a href="dashboard.php">Home</a>
                    </li>            
                    <li class="active breadcrumb-item">Beneficiaries
                    </li>
                    </ul>          

            </div>        
            <div class="container">
                <div class="row">                   
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Reference number</th>
                                <th>LM Details</th>
                                <th>Beneficiary Name</th>                                
                                <th>Beneficiary Caste</th>
                                <th>Beneficiary Occupation</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?PHP
                            if ($events == 'No events') {
                                echo '<tr>
                                        <td colspan="6">' . $events . '</td></tr>';
                            } else {
                                foreach ($events as $event) {
                                    ?>
                                    <tr>
                                        <td><?PHP echo $event['application_number']; ?></td>
                                        <td><?PHP echo $event['lifemember'] . "<br />" . $event['lmemail'] . "<br />" . $event['lmnumber']; ?></td>
                                        <td><?PHP echo $event['bname'] . " " . $event['blastname'] . "<br />" . $event['bnumber']; ?></td>
                                        <td><?PHP echo $event['bcaste']; ?></td>
                                        <td><?PHP echo $event['boccupation']; ?></td>
                                        <td><?PHP echo $event['status']; ?></td>
                                        <td>
                                            <?PHP
                                            if ($event["status"] != 'Benificary Approved' && $event["status"] != 'Benificary Rejected') {
                                                ?>
                                                <button type="button" class="bmd-modalButton btn btn-primary" data-toggle="modal" data-bmdSrc="/admin/viewBen2020?id=<?PHP echo $event['id']; ?>" data-bmdWidth="800" data-bmdHeight="281" data-target="#myModal">View / Verify</button>
                                                <?PHP
                                            } else {
                                                echo 'status Updated';
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                    <?PHP
                                }
                            }
                            ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="myModal" style="height: 600px;">
    <div class="modal-dialog" style="margin-left:20%; ">
        <div class="modal-content bmd-modalContent"  style="width:800px; ">

            <div class="modal-body">
                <div class="close-button">
                    <button type="button" class="close" data-dismiss="modal" onclick="closebenPopup();" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" frameborder="0" id="viewbeniframe"></iframe>
                </div>
            </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?PHP
$customJsFooter = '<script src="/js/iframepopup.js" type="text/javascript"></script>'
        . '<script src="/js/custom.js" type="text/javascript"></script>';
include_once '../common/adminfooter.php';
?>