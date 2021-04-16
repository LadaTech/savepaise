<?php
session_start();
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL);
if(!isset($_SESSION['adminusername']))
{
    header("location:/admin/login.php");
    exit;
}
$headerTitle = 'Application Status';
include_once '../common/logs.php';
include_once '../common/db.php';
include_once '../common/header.php';
$selectType = "SELECT approval_status,count(approval_status) applied FROM `vb_users` where applying_for in ('merit','scholarship')  group by approval_status";
$result = $conn->query($selectType);
$totalApplication=0;
if ($result->num_rows > 0) {
    // output data of each row
    

    while ($row = $result->fetch_assoc()) {
        $totalApplication += $row["applied"];
        $results.='<tr>
            <td><a href="/admin/userslist.php?status='.urlencode($row["approval_status"]).'">' . ucwords($row["approval_status"]) . '</a></td>
            <td>' . $row["applied"] . '</td>           
        </tr> ';
    }
    $results.='<tr>
            <td>Total</td>
            <td>'.$totalApplication.'</td>           
        </tr> ';
} else {
    $results = "<tr>
            <td colspan=5>0 results</td>
        </tr>";
}
$conn->close();
?>
<section class="page">  
    <div class="container">
        <h3 style="color: #D70000;">Vyspro-India Vidhya Bharati status</h3>
        <div class="row">     
            <div class="col-md-12 formContainer clearfix">
                <div class="payuform">
                    <h4 style="color: #d70000;">Applied type status</h4>

                    <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th class="th-sm">Applied For
                                </th>                                
                                <th class="th-sm">Totals
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?PHP
                            echo $results;
                            ?>
                        </tbody>

                    </table>
                </div>
            </div></div>
    </div>
</section>
<?PHP
include_once 'footer.php';
?>
