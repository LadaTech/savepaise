<?php
session_start();
include_once 'logs.php';
include_once 'db.php';
include_once 'header.php';
$select = "select transport,date(created_ts) date_submitted,sum(amount) totalamount,sum(no_of_tickets) tickets from transaction_info "
        . "where status = 'success' and date(created_ts)!='' group by transport, date(created_ts) order by date(created_ts),transport";
$result = $conn->query($select);

if ($result->num_rows > 0) {
    // output data of each row
    $todayAmount = 0;
    $totalAmount=0;
    $withTransport=0;
    $noTransport=0;
    while ($row = $result->fetch_assoc()) {
        $totalAmount = $totalAmount + $row["totalamount"];
        if ($row["date_submitted"] == date('Y-m-d')) {
            $todayAmount = $todayAmount + $row["totalamount"];
        }
        if ($row["transport"] == 'yes') {
            $withTransport = $withTransport + $row["tickets"];
        } else {
            $noTransport = $noTransport + $row["tickets"];
        }
        $results.='<tr>
            <td>' . $row["date_submitted"] . '</td>
            <td>' . $row["tickets"] . '</td>
            <td>' . $row["transport"] . '</td>
            <td>' . number_format((float) $row["totalamount"], 2, ".", "") . '</td>
        </tr> ';
    }
} else {
    $results = "<tr>
            <td colspan=5>0 results</td>
        </tr>";
}
$conn->close();
?>
<section class="page">  
    <div class="container">
        <h3 style="color: #D70000;">Vyspro-India KVB 2019 Invite</h3>
        <div class="row">     
            <div class="col-md-12 formContainer clearfix">
                <div class="payuform">
                    <h4 style="color: #d70000;">Payments Summary</h4>
                    <div class="col-md-6">
                        Total Amount Collected till Date: <span style="font-weight: bold;"><?PHP echo $totalAmount; ?></span>
                        <br />
                        Total Amount Collected Today Date: <span style="font-weight: bold;"><?PHP echo $todayAmount; ?></span>
                        <br />
                    </div>
                    <div class="col-md-6" style="text-align:right;">
                        Opted for Transport: <span style="font-weight: bold;"><?PHP echo $withTransport; ?></span>
                        <br />
                        Transport not required: <span style="font-weight: bold;"><?PHP echo $noTransport; ?></span>
                        <br />
                    </div>


                    <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th class="th-sm">Date
                                </th>                                
                                <th class="th-sm">No of Tickets
                                </th>
                                <th class="th-sm">Transport status
                                </th>
                                <th class="th-sm">Amount Paid
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

                <?PHP
                include_once 'footer.php';
                ?>
