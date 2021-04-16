<?php
session_start();
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL);
$headerTitle = 'Donation FOR MERIT AWARD / SCHOLARSHIP ';
include_once 'common/logs.php';
include_once 'common/db.php';
include_once 'common/header.php';
$log = "insert payu details. " . PHP_EOL;
insertlogs($log);
?>
<section class="page">  
    <div class="container">
        <h3 style="color: #D70000;">Donation form for Vidhya Bharathi 2019 </h3>
        <div class="row">     
            <div class="col-md-6 formContainer clearfix">
                <br />
                <div class="payuform">
                    <form id="payuform" name="payuform" method="post" action="payuform.php" >
                        <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <label class="textleft">Surname:</label>
                            <input class="form-control" type="text" name="surname" id="surname" /> 
                        </div>
                        <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <label class="textleft">Name:</label>
                            <input class="form-control" type="text" name="name" id="name" /> 
                        </div>
                        <div class="clearfix"></div>
                        <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6"">
                            <label class="textleft">EMAIL:</label>
                            <input class="form-control" type="email" name="email" id="email" /> 
                        </div>

                        <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <label class="textleft">Contact number:</label>
                            <input class="form-control" type="text" maxlength="10" name="contactnumbers" id="contactnumbers" />                          

                        </div>
                        <div class="clearfix"></div>
                        <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <label class="textleft">No of Students: (each student INR 5000)</label>
                            <select class="form-control" id="noofstudents" name="noofstudents" onchange="UpdatePrice()">
                                <option value="">--Select--</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                                <option value="17">17</option>
                                <option value="18">18</option>
                                <option value="19">19</option>
                                <option value="20">20</option>
                                <option value="21">21</option>
                                <option value="22">22</option>
                                <option value="23">23</option>
                                <option value="24">24</option>
                                <option value="25">25</option>
                            </select>                            
                        </div>
                        <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <br />
                            <br />
                            <label class="textleft">Amount: <span id="amountvalue">0</label>
                            <input class="form-control" type="hidden" name="amount" id="amount" value="0" /> 

                        </div>
                        <div class="clearfix"></div>
                        <div class="form-group">
                            <input class="btn btn-default" type ="submit" name="submit" value="Submit" id="submit">
                        </div>
                    </form>
                </div>
            </div>      
        </div>
</section>

<?PHP
include_once 'common/footer.php';
?>
<script type="text/javascript">
    UpdatePrice();
</script>