<?php
session_start();
include_once 'logs.php';
include_once 'header.php';
include_once 'db.php';
$log = "insert payu details. " . PHP_EOL;
insertlogs($log);

echo $select = "select sum(no_of_tickets) totaltickets from transaction_info where status ='success' and transport = 'yes'";
$result = $conn->query($select);

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        $totalpurchased = $row['totaltickets'];
    }
}
echo $totalpurchased;
echo $available = 30 - $totalpurchased;

if ($available > 25) {
    $counts = 25;
} else {
    $counts = $available;
}

for ($p = 1; $p <= $counts; $p++) {
    $optionsval .= "<option value='$p'>$p</option>";
}
?>
<section class="page">  
    <div class="container">
        <h3 style="color: #D70000;">Vyspro-India KVB 2019 Invite</h3>
        <div class="row">     
            <div class="col-md-6 formContainer clearfix">
                <div class="payuform">
                    <h4 style="color: #d70000;">PAYMENT DETAILS</h4>
                    <form id="payuform" name="payuform" method="post" action="payuform.php" >
                        <div class="form-group">
                            <label class="textleft">Surname:</label>
                            <input class="form-control" type="text" name="surname" id="surname" /> 
                        </div>
                        <div class="form-group">
                            <label class="textleft">Name:</label>
                            <input class="form-control" type="text" name="name" id="name" /> 
                        </div>
                        <div class="form-group">
                            <label class="textleft">EMAIL:</label>
                            <input class="form-control" type="email" name="email" id="email" /> 
                        </div>
                        <div class="form-group">
                            <label class="textleft">Google Form submitted?</label><br />
                            <input type="radio" name="googleform" value="yes"> Yes <br />
                            <input type="radio" name="googleform" value="no"> No <br />
                        </div>
                        <div class="form-group">
                            <label class="textleft">Contact number:</label>
                            <input class="form-control" type="text" maxlength="10" name="contactnumbers" id="contactnumbers" />
                            <input type="hidden" id="purchasedTickets" name="purchasedTickets" value="<?PHP echo $counts; ?>" />
                            <?PHP
                            if ($total < 30) {
                                ?>
                                <div class="form-group">
                                    <label class="textleft">Transport Required or Not</label><br />
                                    <input type="radio" name="transport" value="yes" onchange="UpdatePrice('trans')"> Yes (INR 450)<br>
                                    <input type="radio" name="transport" value="no" onchange="UpdatePrice('trans')"> No (INR 300)<br>
                                </div>
                                <?PHP
                            } else {
                                ?>
                                <br />
                                <label class="textleft">Sorry Transport Facility is filled (Price INR 300)</label><br />
                                <input type="hidden" name="transport" value="no" onchange="UpdatePrice('trans')">
                                <?PHP
                            }
                            ?>
                        </div>
                        <div class="form-group">
                            <label class="textleft">PRODUCT INFO:</label>
                            <select class="form-control" id="nooftickets" name="nooftickets" onchange="UpdatePrice('tickets')">
                                <option value="">--select No of tickets--</option>
                                <?PHP echo $optionsval; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="hidden" name="amount" id="amount" readonly value="0" />   
                        </div>
                        <div class="form-group">
                            <label class="textleft">Amount:</label> <span id="amountvalue">0</span><br /> 
                            <label class="textleft">Payment gateway charges:</label> <span id="taxid">0</span> <br />
                            <label class="textleft">Total Amount:</label> <span id="totalvalue">0</span><br /> 
                        </div>
                        <div class="form-group">
                            <input class="btn btn-default" type ="submit" name="submit" value="Submit" id="submit">
                        </div>
                    </form>
                </div>
            </div>         
            <div class="col-md-6">             
                <div class="formContainer clearfix">  
                    <div>
                        <p>Dear Vyspro India Family Members,</p><br />

                        <p>The event is scheduled to be held on November 24, 2019, Sunday 8:00 A.M. to 05:00 P.M. at the unique location which will give you a very pleasant experience amid greenery and nature viz., Sri Maruti Greenfields, Shadnagar. 
                        </p>
                        <p>Venue: Location Link</p>
                        <a href="https://goo.gl/maps/6oSLYhdPATxDKCX27">https://goo.gl/maps/6oSLYhdPATxDKCX27</a>


                        <p>In order to ensure your satisfying experience at the event and help the management to make necessary arrangements, we request you to kindly express your interest to participate alongwith other details of participants.
                        </p>
                        <p>The management has decided to collect a participation fee as below:
                        <ul>
                            <li>Rs. 300 per person (without transport) and </li>
                            <li>Rs. 450 with transport facility (the pickup points shall be announced in due course).</li>
                        </ul>
                        The Programme will be graced by Sri. KVS Chiranjeevi SBM, SBI Life as Chief Guest and Sri CA Beldi Sridhar, Founder President of Vyspro-India as Guest of Honour.
                        </p>
                        <h5 style="color:#2153A1;">Programme highlights</h5>
                        <ul>
                            <li>Usiri Chettu Pooja</li>
                            <li>Breakfast </li>
                            <li>Programme inauguration (details will be provided separately)</li>
                            <li>Vyspro-India Anniversary Cake Cutting Ceremony</li>
                            <li>Unique games for all age groups. </li>
                            <li>Sumptuous Lunch</li>
                            <li>Thrilling Mega Tambola with Silver coin gifts</li>
                            <li>Networking time. </li>
                            <li>Entertainment programmes</li>
                            <li>High Tea or Coffee with snacks</li>
                            <li>Distribution of Exciting participation gifts for kids, Ladies and Members</li>
                            <li>And Much More</li>
                        </ul>
                        <p>The last date for enrolment and payment of participation fee is November 15, 2019. We look forward for your great participation in the event as we are an extended family (VYSPRO INDIA FAMILY).</p>
                        <p>Feel free to contact any of the project committee members for any further clarification or details about the event.</p>
                        Jai Vasavi<br />
                        Jai Vyspro-India<br />

                        Regards,<br />
                        <div class="table-responsive">          
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Name of the Committee Member</th>
                                        <th>Designation</th>
                                        <th>Contact Number</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Shri. G Madhu Mohan </td><td>President</td><td>98481 60363</td><td>
                                    <tr>
                                        <td>Shri. R Srinivasa Rao</td><td>General Secretary</td><td>98490 30308</td><td>
                                    <tr>
                                        <td>Shri. Gururaj Guggal</td><td>Treasurer</td><td>99499 01000</td><td>
                                    <tr>
                                        <td>Shri. Sanka Narayana Murthy</td><td>Project Chairman</td><td>98482 43715</td><td>
                                    <tr>
                                        <td>Shri. Rajanikanth Kancharla</td><td>Project Co-Chairman</td><td>98490 31122</td><td>
                                    <tr>
                                        <td>Shri. Praveen Kumar Bolisetty</td><td>Project Co-Chairman</td><td>94418 20017</td><td>                                    <tr>
                                        <td>Shri. Ravikanth G</td><td>Project Co-Chairman</td><td>98660 66373</td><td></tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <?PHP
            include_once 'footer.php';
            ?>