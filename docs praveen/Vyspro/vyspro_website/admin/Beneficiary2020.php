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
                                <th>LM Details</th>
                                <th>Beneficiary Name</th>
                                <th>Beneficiary Photo</th>
                                <th>Beneficiary Caste</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?PHP
                            if ($events == 'No events') {
                                echo  '<tr>
                                        <td colspan="6">'.$events.'</td></tr>';
                            } else {
                                foreach ($events as $event) {
                                    ?>
                                    <tr>
                                        <td><?PHP echo $event['lifemember'] ."<br />".$event['lmemail']."<br />".$event['lmnumber']; ?></td>
                                        <td><?PHP echo $event['bname']." ".$event['blastname']."<br />".$event['bnumber']; ?></td>
                                        <td><?PHP echo "<img src='../uploads/cheeyuta/$event[bphoto]' width='100' />"; ?></td>
                                        <td><?PHP echo $event['bcaste']; ?></td>
                                        <td><?PHP echo $event['boccupation']; ?></td>
                                        <td>
                                            <a type="button" class="btn btn-primary" href="/gallery.php?id=<?PHP echo $event['id']; ?>" target="_blank">View</a>
                                            <a type="button" class="btn btn-primary">Verify</a>
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
<?PHP
include_once '../common/adminfooter.php';
?>