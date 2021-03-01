<?php
session_start();
include_once 'logs.php';
include_once 'db.php';
include_once 'header.php';

$select = "select * from transaction_info where status not in ('fail','cancelled','pending')";
$result = $conn->query($select);
?>

<section class="page">  
    <div class="container">
        <h3 style="color: #D70000;">Vyspro-India KVB 2019 Invite</h3>
        <div class="row">     
            <div class="col-md-12 formContainer clearfix">
                <div class="payuform">
                    <h4 style="color: #d70000;">PAYMENT DETAILS</h4>

                    <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th class="th-sm">Surname</th>
                                <th class="th-sm">Name</th>
                                <th class="th-sm">Email id</th>
                                <th class="th-sm">Phone Number</th>
                                <th class="th-sm">Google Form status</th>
                                <th class="th-sm">No of Tickets</th>
                                <th class="th-sm">Transport status</th>
                                <th class="th-sm">Amount Paid</th>
                                <th class="th-sm">Date</th>
                                <th class="th-sm">Transaction Id</th>
                                <th class="th-sm">Reference Id</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?PHP
                            if ($result->num_rows > 0) {
                                // output data of each row
                                while ($row = $result->fetch_assoc()) {
//                                    echo "id: " . $row["id"] . " - Name: " . $row["firstname"] . " " . $row["lastname"] . "<br>";
                                    ?>
                                    <tr>
                                        <td><?PHP echo $row["surname"]; ?></td>
                                        <td><?PHP echo $row["name"]; ?></td>
                                        <td><?PHP echo $row["emailid"]; ?></td>
                                        <td><?PHP echo $row["phonenumber"]; ?></td>
                                        <td><?PHP echo $row["googleform"]; ?></td>
                                        <td><?PHP echo $row["no_of_tickets"]; ?></td>
                                        <td><?PHP echo $row["transport"]; ?></td>
                                        <td><?PHP echo $row["amount"]; ?></td>
                                        <td><?PHP echo $row["created_ts"]; ?></td>
                                        <td><?PHP echo $row["txId"]; ?></td>
                                        <td><?PHP echo $row["txRefNo"]; ?></td>
                                    </tr> 
                                    <?PHP
                                }
                            } else {
                                echo "0 results";
                            }
                            ?>

                        </tbody>
                        <tfoot>
                            <tr>
                                <th class="th-sm">Surname</th>
                                <th class="th-sm">Name</th>
                                <th class="th-sm">Email id</th>
                                <th class="th-sm">Phone Number</th>
                                <th class="th-sm">Google Form status</th>
                                <th class="th-sm">No of Tickets</th>
                                <th class="th-sm">Transport status</th>
                                <th class="th-sm">Amount Paid</th>
                                <th class="th-sm">Date</th>
                                <th class="th-sm">Transaction Id</th>
                                <th class="th-sm">Reference Id</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>

                <?PHP
                include_once 'footer.php';
                ?>
