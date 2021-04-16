<?PHP
include_once '../common/adminheader.php';
include_once '../common/functions.php';
$commonfunction = new commonfunction();
$daily = $commonfunction->getBeneficiaryStatus('daily');
//echo "<pre>";
//print_r($daily);
//echo "</pre>";

$bylm = $commonfunction->getBeneficiaryStatus('', 'lm');
//echo "<pre>";
//print_r($bylm);
//echo "</pre>";
//exit;
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
                </ol>       

            </div>        
            <div class="container">    
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#home">Day Wise</a></li>
                    <li><a data-toggle="tab" href="#menu1">LM Wise</a></li>
                </ul>
                <div class="tab-content">
                    <div id="home" class="tab-pane fade active">
                        <h3>Daily</h3>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Count</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?PHP
                                if ($daily == 'No events') {
                                    echo '<tr>
                                        <td colspan="6">' . $daily . '</td></tr>';
                                } else {
                                    foreach ($daily as $dailys) {
                                        ?>
                                        <tr>
                                            <td><?PHP echo $dailys['status']; ?></td>
                                            <td><?PHP echo $dailys['total']; ?></td>

                                        </tr>
                                        <?PHP
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div id="menu1" class="tab-pane fade">
                        <h3>LM Wise</h3>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>LM Details</th>
                                    <th>Beneficiary Name</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?PHP
                                if ($bylm == 'No events') {
                                    echo '<tr>
                                        <td colspan="6">' . $bylm . '</td></tr>';
                                } else {
                                    foreach ($bylm as $lm) {
                                        ?>
                                        <tr>
                                            <td><?PHP echo $lm['status']; ?></td>
                                            <td><?PHP echo $lm['total']; ?></td>
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
</div>

<div class="modal fade" id="myModal" style="height: 600px;">
    <div class="modal-dialog" style="margin-left:20%; ">
        <div class="modal-content bmd-modalContent"  style="width:800px; ">

            <div class="modal-body">
                <div class="close-button">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" frameborder="0"></iframe>
                </div>
            </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?PHP
$cusstomJsFooter = '<script>
$(document).ready(function(){
  $(".nav-tabs a").click(function(){
    $(this).tab("show");
  });
});
</script>';
include_once '../common/adminfooter.php';
?>