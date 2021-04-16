<?php
session_start();
header("location:/");
exit;
//session_destroy();
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL);
$headerTitle = 'APPLICATION FOR MERIT AWARD / SCHOLARSHIP ';
include_once 'common/logs.php';
include_once 'common/db.php';
include_once 'common/header.php';

$log = "application from started. " . PHP_EOL;
insertlogs($log);
?>
<style type="text/css">
    select.ui-datepicker-month, select.ui-datepicker-year{
        background-color: black;
    }
</style>
<section class="page">  
    <div class="container">
        <h3 style="color: #D70000;">Vyspro-India Application for MERIT AWARD</h3>
        <div class="row formContainer"> 
            <br />
            <div class="col-8">
                <div class="stepwizard">
                    <div class="stepwizard-row setup-panel">
                        <div class="stepwizard-steps">
                            <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
                            <p>Personal/Family details</p>
                        </div>
                        <div class="stepwizard-steps">
                            <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                            <p>Educational details</p>
                        </div>
                        <!--<div class="stepwizard-steps">-->
                        <!--<a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>-->
                        <!--<p>Objectives</p>-->
                        <!--</div>-->
                    </div>
                </div>
                <form role="form" id="applicationform" class="form" name="applicationform" method="post" action="meritapplication.php" enctype="multipart/form-data">
                    <div class="row setup-content" id="step-1">
                        <div class="col-xs-12">
                            <div class="col-md-12">
                                <h3>Personal Information</h3>
                                <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <label class="control-label">Surname</label>
                                    <input maxlength="250" required="required" type="text" class="form-control" value="<?PHP echo $_SESSION['users']['surname']; ?>" id="surname" name="surname" placeholder="Enter Surname"  />
                                </div>
                                <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <label class="control-label">Full Name</label>
                                    <input maxlength="250" type="text" id="name" required="required" name="name" value="<?PHP echo $_SESSION['users']['name']; ?>" class="form-control" placeholder="Enter Full Name" />
                                </div>
                                <div class="clearfix"></div>
                                <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <label class="control-label">Photo</label>
                                    <input type="file" class="form-control" required="required" id="photo" name="photo" />

                                </div>
                                <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <label class="control-label">Date of Birth</label>
                                    <input type="text" class="form-control datepicker" readonly="readonly" value="<?PHP echo $_SESSION['users']['dob']; ?>" required="required" id="dob" name="dob" placeholder="Select Date of Birth" />

                                </div>
                                <div class="clearfix"></div>
                                <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <label class="control-label">Email</label>
                                    <input maxlength="150" type="text" id="email" required="required" value="<?PHP echo $_SESSION['users']['email']; ?>" name="email" class="form-control" placeholder="Enter Email" />
                                </div>
                                <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <label class="control-label">Mobile Number</label>
                                    <input maxlength="10" type="text" id="phone" required="required" value="<?PHP echo $_SESSION['users']['phone']; ?>" name="phone" class="form-control" placeholder="Enter Phone Number" />
                                </div>
                                <div class="clearfix"></div>
                                <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <label class="control-label">Father/Guardian Name</label>
                                    <input maxlength="150" type="text" required="required" id="parentname" value="<?PHP echo $_SESSION['users']['parentname']; ?>" name="parentname" class="form-control" placeholder="Enter Father / Guardian Name" />
                                </div>
                                <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <label class="control-label">Father Occupation</label>
                                    <input maxlength="150" type="text" required="required"  id="parentoccupation" value="<?PHP echo $_SESSION['users']['parentoccupation']; ?>" name="parentoccupation" class="form-control" placeholder="Enter Father Occupation" />
                                </div>
                                <div class="clearfix"></div>
                                <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <label class="control-label">Father/Guardian Phone Number</label>
                                    <input maxlength="11" type="text" required="required"  id="parentphone" name="parentphone" value="<?PHP echo $_SESSION['users']['parentphone']; ?>" class="form-control" placeholder="Enter Father/ Guardian Phone Number" />
                                </div>


                                <div class="clearfix"></div>
                                <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <label class="control-label">Mother Name</label>
                                    <input maxlength="150" type="text" required="required" id="mothername" value="<?PHP echo $_SESSION['users']['mothername']; ?>" name="mothername" class="form-control" placeholder="Enter Mother Name" />
                                </div>
                                <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <label class="control-label">Mother Occupation</label>
                                    <input maxlength="150" type="text" required="required"  id="motheroccupation" value="<?PHP echo $_SESSION['users']['motheroccupation']; ?>" name="motheroccupation" class="form-control" placeholder="Enter MotherOccupation" />
                                </div>
                                <div class="clearfix"></div>
                                <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <label class="control-label">Mother Phone Number</label>
                                    <input maxlength="11" type="text" id="motherphone" name="motherphone" value="<?PHP echo $_SESSION['users']['motherphone']; ?>" class="form-control" placeholder="Enter Mother Phone Number" />
                                </div>
                                <div class="clearfix"></div>

                                <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <label class="control-label">Gothram</label>
                                    <input maxlength="150" type="text" required="required"  id="gothram" name="gothram" value="<?PHP echo $_SESSION['users']['gothram']; ?>" class="form-control" placeholder="Enter Gothram" />
                                </div>
                                <div class="clearfix"></div>


                                <h3>Permanent Address</h3>
                                <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <label class="control-label">Address 1</label>
                                    <input type="text" id="faddress" required="required" name="faddress" value="<?PHP echo $_SESSION['users']['faddress']; ?>" class="form-control" placeholder="Enter Address 1" />
                                </div>

                                <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <label class="control-label">Address 2</label>
                                    <input type="text" id="street" required="required" name="street" value="<?PHP echo $_SESSION['users']['street']; ?>" class="form-control" placeholder="Enter Address 2" />
                                </div>
                                <div class="clearfix"></div>
                                <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <label class="control-label">City</label>
                                    <input type="text" id="city" required="required" name="city" value="<?PHP echo $_SESSION['users']['city']; ?>" class="form-control" placeholder="Enter City" />
                                </div>
                                <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <label class="control-label">District</label>
                                    <input type="text" id="district" required="required" name="district" value="<?PHP echo $_SESSION['users']['district']; ?>" class="form-control" placeholder="Enter District" />
                                </div>
                                <div class="clearfix"></div>
                                <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <label class="control-label">State</label>
                                    <select id="state" name="state" class="form-control">
                                        <option value="">--Select state--</option>
                                        <option value="Andaman and Nicobar Islands" <?PHP
                                        if ($_SESSION['users']['state'] == 'Andaman and Nicobar Islands') {
                                            echo "selected='selected'";
                                        }
                                        ?>>Andaman and Nicobar Islands</option>
                                        <option value="Andra Pradesh" <?PHP
                                        if ($_SESSION['users']['state'] == 'Andra Pradesh') {
                                            echo "selected='selected'";
                                        }
                                        ?>>Andra Pradesh</option>
                                        <option value="Arunachal Pradesh"<?PHP
                                        if ($_SESSION['users']['state'] == 'Arunachal Pradesh') {
                                            echo "selected='selected'";
                                        }
                                        ?>>Arunachal Pradesh</option>
                                        <option value="Assam" <?PHP
                                        if ($_SESSION['users']['state'] == 'Assam') {
                                            echo "selected='selected'";
                                        }
                                        ?>>Assam</option>
                                        <option value="Bihar" <?PHP
                                        if ($_SESSION['users']['state'] == 'Bihar') {
                                            echo "selected='selected'";
                                        }
                                        ?>>Bihar</option>
                                        <option value="Chandigarh" <?PHP
                                        if ($_SESSION['users']['state'] == 'Chandigarh') {
                                            echo "selected='selected'";
                                        }
                                        ?>>Chandigarh</option>
                                        <option value="Chhattisgarh" <?PHP
                                        if ($_SESSION['users']['state'] == 'Chhattisgarh') {
                                            echo "selected='selected'";
                                        }
                                        ?>>Chhattisgarh</option>
                                        <option value="Dadar and Nagar Haveli" <?PHP
                                        if ($_SESSION['users']['state'] == 'Dadar and Nagar Haveli') {
                                            echo "selected='selected'";
                                        }
                                        ?>>Dadar and Nagar Haveli</option>
                                        <option value="Daman and Diu" <?PHP
                                        if ($_SESSION['users']['state'] == 'Daman and Diu') {
                                            echo "selected='selected'";
                                        }
                                        ?>>Daman and Diu</option>
                                        <option value="Delhi" <?PHP
                                        if ($_SESSION['users']['state'] == 'Delhi') {
                                            echo "selected='selected'";
                                        }
                                        ?>>Delhi</option>
                                        <option value="Goa" <?PHP
                                        if ($_SESSION['users']['state'] == 'Goa') {
                                            echo "selected='selected'";
                                        }
                                        ?>>Goa</option>
                                        <option value="Gujarat" <?PHP
                                        if ($_SESSION['users']['state'] == 'Gujarat') {
                                            echo "selected='selected'";
                                        }
                                        ?>>Gujarat</option>
                                        <option value="Haryana" <?PHP
                                        if ($_SESSION['users']['state'] == 'Haryana') {
                                            echo "selected='selected'";
                                        }
                                        ?>>Haryana</option>
                                        <option value="Himachal Pradesh" <?PHP
                                        if ($_SESSION['users']['state'] == 'Himachal Pradesh') {
                                            echo "selected='selected'";
                                        }
                                        ?>>Himachal Pradesh</option>
                                        <option value="Jammu and Kashmir" <?PHP
                                        if ($_SESSION['users']['state'] == 'Jammu and Kashmir') {
                                            echo "selected='selected'";
                                        }
                                        ?>>Jammu and Kashmir</option>
                                        <option value="Jharkhand" <?PHP
                                        if ($_SESSION['users']['state'] == 'Jharkhand') {
                                            echo "selected='selected'";
                                        }
                                        ?>>Jharkhand</option>
                                        <option value="Karnataka" <?PHP
                                        if ($_SESSION['users']['state'] == 'Karnataka') {
                                            echo "selected='selected'";
                                        }
                                        ?>>Karnataka</option>
                                        <option value="Kerala" <?PHP
                                        if ($_SESSION['users']['state'] == 'Kerala') {
                                            echo "selected='selected'";
                                        }
                                        ?>>Kerala</option>
                                        <option value="Lakshadeep" <?PHP
                                        if ($_SESSION['users']['state'] == 'Lakshadeep') {
                                            echo "selected='selected'";
                                        }
                                        ?>>Lakshadeep</option>
                                        <option value="Madhya Pradesh" <?PHP
                                        if ($_SESSION['users']['state'] == 'Madhya Pradesh') {
                                            echo "selected='selected'";
                                        }
                                        ?>>Madhya Pradesh</option>
                                        <option value="Maharashtra" <?PHP
                                        if ($_SESSION['users']['state'] == 'Maharashtra') {
                                            echo "selected='selected'";
                                        }
                                        ?>>Maharashtra</option>
                                        <option value="Manipur" <?PHP
                                        if ($_SESSION['users']['state'] == 'Manipur') {
                                            echo "selected='selected'";
                                        }
                                        ?>>Manipur</option>
                                        <option value="Meghalaya" <?PHP
                                        if ($_SESSION['users']['state'] == 'Meghalaya') {
                                            echo "selected='selected'";
                                        }
                                        ?>>Meghalaya</option>
                                        <option value="Mizoram" <?PHP
                                        if ($_SESSION['users']['state'] == 'Mizoram') {
                                            echo "selected='selected'";
                                        }
                                        ?>>Mizoram</option>
                                        <option value="Nagaland" <?PHP
                                        if ($_SESSION['users']['state'] == 'Nagaland') {
                                            echo "selected='selected'";
                                        }
                                        ?>>Nagaland</option>
                                        <option value="Orissa" <?PHP
                                        if ($_SESSION['users']['state'] == 'Orissa') {
                                            echo "selected='selected'";
                                        }
                                        ?>>Orissa</option>
                                        <option value="Pondicherry" <?PHP
                                        if ($_SESSION['users']['state'] == 'Pondicherry') {
                                            echo "selected='selected'";
                                        }
                                        ?>>Pondicherry</option>
                                        <option value="Punjab" <?PHP
                                        if ($_SESSION['users']['state'] == 'Punjab') {
                                            echo "selected='selected'";
                                        }
                                        ?>>Punjab</option>
                                        <option value="Rajasthan" <?PHP
                                        if ($_SESSION['users']['state'] == 'Rajasthan') {
                                            echo "selected='selected'";
                                        }
                                        ?>>Rajasthan</option>
                                        <option value="Sikkim" <?PHP
                                        if ($_SESSION['users']['state'] == 'Sikkim') {
                                            echo "selected='selected'";
                                        }
                                        ?>>Sikkim</option>
                                        <option value="Tamil Nadu" <?PHP
                                        if ($_SESSION['users']['state'] == 'Tamil Nadu') {
                                            echo "selected='selected'";
                                        }
                                        ?>>Tamil Nadu</option>
                                        <option value="Telagana" <?PHP
                                        if ($_SESSION['users']['state'] == 'Telagana') {
                                            echo "selected='selected'";
                                        }
                                        ?>>Telagana</option>
                                        <option value="Tripura" <?PHP
                                        if ($_SESSION['users']['state'] == 'Tripura') {
                                            echo "selected='selected'";
                                        }
                                        ?>>Tripura</option>
                                        <option value="Uttaranchal" <?PHP
                                        if ($_SESSION['users']['state'] == 'Uttaranchal') {
                                            echo "selected='selected'";
                                        }
                                        ?>>Uttaranchal</option>
                                        <option value="Uttar Pradesh" <?PHP
                                        if ($_SESSION['users']['state'] == 'Uttar Pradesh') {
                                            echo "selected='selected'";
                                        }
                                        ?>>Uttar Pradesh</option>
                                        <option value="West Bengal" <?PHP
                                        if ($_SESSION['users']['state'] == 'West Bengal') {
                                            echo "selected='selected'";
                                        }
                                        ?>>West Bengal</option>
                                    </select>
                                </div>
                                <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <label class="control-label">Pincode</label>
                                    <input maxlength="6" type="text" id="pincode" required="required" value="<?PHP echo $_SESSION['users']['pincode']; ?>" name="pincode" class="form-control" placeholder="Enter Pincode" />
                                </div>
                                <div class="clearfix"></div>


                                <h3 >Communication Address (<input type="checkbox" id="aboveaddress" name="aboveaddress" onclick="selectaboveaddress()">same as above)</h3>
                                <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <label class="control-label">Address 1</label>
                                    <input type="text" id="cfaddress" required="required" name="cfaddress" value="<?PHP echo $_SESSION['users']['cfaddress']; ?>" class="form-control" placeholder="Enter Address 1" />
                                </div>

                                <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <label class="control-label">Address 2</label>
                                    <input type="text" id="cstreet" required="required" name="cstreet" value="<?PHP echo $_SESSION['users']['cstreet']; ?>" class="form-control" placeholder="Enter Address 2" />
                                </div>
                                <div class="clearfix"></div>
                                <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <label class="control-label">City</label>
                                    <input type="text" id="ccity" required="required" name="ccity" value="<?PHP echo $_SESSION['users']['ccity']; ?>" class="form-control" placeholder="Enter City" />
                                </div>
                                <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <label class="control-label">District</label>
                                    <input type="text" id="cdistrict" required="required" name="cdistrict" value="<?PHP echo $_SESSION['users']['cdistrict']; ?>" class="form-control" placeholder="Enter District" />
                                </div>
                                <div class="clearfix"></div>
                                <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <label class="control-label">State</label>

                                    <select id="cstate" required="required" name="cstate" class="form-control">
                                        <option value="">--Select state--</option>
                                        <option value="Andaman and Nicobar Islands" <?PHP
                                        if ($_SESSION['users']['cstate'] == 'Andaman and Nicobar Islands') {
                                            echo "selected='selected'";
                                        }
                                        ?>>Andaman and Nicobar Islands</option>
                                        <option value="Andra Pradesh" <?PHP
                                        if ($_SESSION['users']['cstate'] == 'Andra Pradesh') {
                                            echo "selected='selected'";
                                        }
                                        ?>>Andra Pradesh</option>
                                        <option value="Arunachal Pradesh"<?PHP
                                        if ($_SESSION['users']['cstate'] == 'Arunachal Pradesh') {
                                            echo "selected='selected'";
                                        }
                                        ?>>Arunachal Pradesh</option>
                                        <option value="Assam" <?PHP
                                        if ($_SESSION['users']['cstate'] == 'Assam') {
                                            echo "selected='selected'";
                                        }
                                        ?>>Assam</option>
                                        <option value="Bihar" <?PHP
                                        if ($_SESSION['users']['cstate'] == 'Bihar') {
                                            echo "selected='selected'";
                                        }
                                        ?>>Bihar</option>
                                        <option value="Chandigarh" <?PHP
                                        if ($_SESSION['users']['cstate'] == 'Chandigarh') {
                                            echo "selected='selected'";
                                        }
                                        ?>>Chandigarh</option>
                                        <option value="Chhattisgarh" <?PHP
                                        if ($_SESSION['users']['cstate'] == 'Chhattisgarh') {
                                            echo "selected='selected'";
                                        }
                                        ?>>Chhattisgarh</option>
                                        <option value="Dadar and Nagar Haveli" <?PHP
                                        if ($_SESSION['users']['cstate'] == 'Dadar and Nagar Haveli') {
                                            echo "selected='selected'";
                                        }
                                        ?>>Dadar and Nagar Haveli</option>
                                        <option value="Daman and Diu" <?PHP
                                        if ($_SESSION['users']['cstate'] == 'Daman and Diu') {
                                            echo "selected='selected'";
                                        }
                                        ?>>Daman and Diu</option>
                                        <option value="Delhi" <?PHP
                                        if ($_SESSION['users']['cstate'] == 'Delhi') {
                                            echo "selected='selected'";
                                        }
                                        ?>>Delhi</option>
                                        <option value="Goa" <?PHP
                                        if ($_SESSION['users']['cstate'] == 'Goa') {
                                            echo "selected='selected'";
                                        }
                                        ?>>Goa</option>
                                        <option value="Gujarat" <?PHP
                                        if ($_SESSION['users']['cstate'] == 'Gujarat') {
                                            echo "selected='selected'";
                                        }
                                        ?>>Gujarat</option>
                                        <option value="Haryana" <?PHP
                                        if ($_SESSION['users']['cstate'] == 'Haryana') {
                                            echo "selected='selected'";
                                        }
                                        ?>>Haryana</option>
                                        <option value="Himachal Pradesh" <?PHP
                                        if ($_SESSION['users']['cstate'] == 'Himachal Pradesh') {
                                            echo "selected='selected'";
                                        }
                                        ?>>Himachal Pradesh</option>
                                        <option value="Jammu and Kashmir" <?PHP
                                        if ($_SESSION['users']['cstate'] == 'Jammu and Kashmir') {
                                            echo "selected='selected'";
                                        }
                                        ?>>Jammu and Kashmir</option>
                                        <option value="Jharkhand" <?PHP
                                        if ($_SESSION['users']['cstate'] == 'Jharkhand') {
                                            echo "selected='selected'";
                                        }
                                        ?>>Jharkhand</option>
                                        <option value="Karnataka" <?PHP
                                        if ($_SESSION['users']['cstate'] == 'Karnataka') {
                                            echo "selected='selected'";
                                        }
                                        ?>>Karnataka</option>
                                        <option value="Kerala" <?PHP
                                        if ($_SESSION['users']['cstate'] == 'Kerala') {
                                            echo "selected='selected'";
                                        }
                                        ?>>Kerala</option>
                                        <option value="Lakshadeep" <?PHP
                                        if ($_SESSION['users']['cstate'] == 'Lakshadeep') {
                                            echo "selected='selected'";
                                        }
                                        ?>>Lakshadeep</option>
                                        <option value="Madhya Pradesh" <?PHP
                                        if ($_SESSION['users']['cstate'] == 'Madhya Pradesh') {
                                            echo "selected='selected'";
                                        }
                                        ?>>Madhya Pradesh</option>
                                        <option value="Maharashtra" <?PHP
                                        if ($_SESSION['users']['cstate'] == 'Maharashtra') {
                                            echo "selected='selected'";
                                        }
                                        ?>>Maharashtra</option>
                                        <option value="Manipur" <?PHP
                                        if ($_SESSION['users']['cstate'] == 'Manipur') {
                                            echo "selected='selected'";
                                        }
                                        ?>>Manipur</option>
                                        <option value="Meghalaya" <?PHP
                                        if ($_SESSION['users']['cstate'] == 'Meghalaya') {
                                            echo "selected='selected'";
                                        }
                                        ?>>Meghalaya</option>
                                        <option value="Mizoram" <?PHP
                                        if ($_SESSION['users']['cstate'] == 'Mizoram') {
                                            echo "selected='selected'";
                                        }
                                        ?>>Mizoram</option>
                                        <option value="Nagaland" <?PHP
                                        if ($_SESSION['users']['cstate'] == 'Nagaland') {
                                            echo "selected='selected'";
                                        }
                                        ?>>Nagaland</option>
                                        <option value="Orissa" <?PHP
                                        if ($_SESSION['users']['cstate'] == 'Orissa') {
                                            echo "selected='selected'";
                                        }
                                        ?>>Orissa</option>
                                        <option value="Pondicherry" <?PHP
                                        if ($_SESSION['users']['cstate'] == 'Pondicherry') {
                                            echo "selected='selected'";
                                        }
                                        ?>>Pondicherry</option>
                                        <option value="Punjab" <?PHP
                                        if ($_SESSION['users']['cstate'] == 'Punjab') {
                                            echo "selected='selected'";
                                        }
                                        ?>>Punjab</option>
                                        <option value="Rajasthan" <?PHP
                                        if ($_SESSION['users']['cstate'] == 'Rajasthan') {
                                            echo "selected='selected'";
                                        }
                                        ?>>Rajasthan</option>
                                        <option value="Sikkim" <?PHP
                                        if ($_SESSION['users']['cstate'] == 'Sikkim') {
                                            echo "selected='selected'";
                                        }
                                        ?>>Sikkim</option>
                                        <option value="Tamil Nadu" <?PHP
                                        if ($_SESSION['users']['cstate'] == 'Tamil Nadu') {
                                            echo "selected='selected'";
                                        }
                                        ?>>Tamil Nadu</option>
                                        <option value="Telagana" <?PHP
                                        if ($_SESSION['users']['cstate'] == 'Telagana') {
                                            echo "selected='selected'";
                                        }
                                        ?>>Telagana</option>
                                        <option value="Tripura" <?PHP
                                        if ($_SESSION['users']['cstate'] == 'Tripura') {
                                            echo "selected='selected'";
                                        }
                                        ?>>Tripura</option>
                                        <option value="Uttaranchal" <?PHP
                                        if ($_SESSION['users']['cstate'] == 'Uttaranchal') {
                                            echo "selected='selected'";
                                        }
                                        ?>>Uttaranchal</option>
                                        <option value="Uttar Pradesh" <?PHP
                                        if ($_SESSION['users']['cstate'] == 'Uttar Pradesh') {
                                            echo "selected='selected'";
                                        }
                                        ?>>Uttar Pradesh</option>
                                        <option value="West Bengal" <?PHP
                                        if ($_SESSION['users']['cstate'] == 'West Bengal') {
                                            echo "selected='selected'";
                                        }
                                        ?>>West Bengal</option>
                                    </select>
                                </div>
                                <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <label class="control-label">Pincode</label>
                                    <input maxlength="6" type="text" id="cpincode" required="required" value="<?PHP echo $_SESSION['users']['cpincode']; ?>" name="cpincode" class="form-control" placeholder="Enter Pincode" />
                                </div>
                                <div class="clearfix"></div>

                                <button class="btn btn-primary nextBtn btn-lg pull-right" type="submit">Next</button>
                            </div>
                        </div>
                    </div>
                    <div class="row setup-content" id="step-2">
                        <div class="col-xs-12">
                            <div class="col-md-12">
                                <h3>Educational Details</h3>
                                <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <label class="control-label">Latest class completed</label>
                                    <input maxlength="150" type="text" required="required" id="latestclass" name="latestclass" value="<?PHP echo $_SESSION['users']['latestclass']; ?>" class="form-control" placeholder="Enter Latest class completed" />
                                </div>
                                <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <label class="control-label">Month - Year (year of Passing)</label>
                                    <select class="form-control" id="latestmonth" name="latestmonth">
                                        <option value="">-select option-</option>
                                        <option value="November-2018" <?PHP
                                        if ($_SESSION['users']['latestmonth'] == 'November-2018') {
                                            echo "selected='selected'";
                                        }
                                        ?> >November-2018</option>
                                        <option value="December-2018" <?PHP
                                        if ($_SESSION['users']['latestmonth'] == 'December-2018') {
                                            echo "selected='selected'";
                                        }
                                        ?>>December-2018</option>
                                        <option value="January-2019" <?PHP
                                        if ($_SESSION['users']['latestmonth'] == 'January-2019') {
                                            echo "selected='selected'";
                                        }
                                        ?>>January-2019</option>
                                        <option value="February-2019" <?PHP
                                        if ($_SESSION['users']['latestmonth'] == 'February-2019') {
                                            echo "selected='selected'";
                                        }
                                        ?>>February-2019</option>
                                        <option value="March-2019" <?PHP
                                        if ($_SESSION['users']['latestmonth'] == 'March-2019') {
                                            echo "selected='selected'";
                                        }
                                        ?>>March-2019</option>
                                        <option value="April-2019" <?PHP
                                        if ($_SESSION['users']['latestmonth'] == 'April-2019') {
                                            echo "selected='selected'";
                                        }
                                        ?>>April-2019</option>
                                        <option value="May-2019" <?PHP
                                        if ($_SESSION['users']['latestmonth'] == 'May-2019') {
                                            echo "selected='selected'";
                                        }
                                        ?>>May-2019</option>
                                        <option value="June-2019" <?PHP
                                        if ($_SESSION['users']['latestmonth'] == 'June-2019') {
                                            echo "selected='selected'";
                                        }
                                        ?>>June-2019</option>
                                        <option value="July-2019" <?PHP
                                        if ($_SESSION['users']['latestmonth'] == 'July-2019') {
                                            echo "selected='selected'";
                                        }
                                        ?>>July-2019</option>
                                        <option value="August-2019" <?PHP
                                        if ($_SESSION['users']['latestmonth'] == 'August-2019') {
                                            echo "selected='selected'";
                                        }
                                        ?>>August-2019</option>
                                        <option value="September-2019" <?PHP
                                        if ($_SESSION['users']['latestmonth'] == 'September-2019') {
                                            echo "selected='selected'";
                                        }
                                        ?>>September-2019</option>
                                        <option value="October-2019" <?PHP
                                        if ($_SESSION['users']['latestmonth'] == 'October-2019') {
                                            echo "selected='selected'";
                                        }
                                        ?>>October-2019</option>
                                        <option value="November-2019" <?PHP
                                        if ($_SESSION['users']['latestmonth'] == 'November-2019') {
                                            echo "selected='selected'";
                                        }
                                        ?>>November-2019</option>
                                    </select>
                                </div>
                                <div class="clearfix"></div>
                                <div id="formeritdiv">

                                    <h3>Details for Merit selection</h3>
                                    <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                                        <label class="control-label">Class</label>
                                        <select id="classname" name="classname" class="form-control" onchange="showmarksdiv()">
                                            <option value="">--Select Class-- </option>
                                            <option value="ssc" <?PHP
                                            if ($_SESSION['users']['classname'] == 'ssc') {
                                                echo "selected='selected'";
                                            }
                                            ?>>SSC</option>
                                            <option value="INTERMEDIATE - CEC" <?PHP
                                            if ($_SESSION['users']['classname'] == 'INTERMEDIATE - CEC') {
                                                echo "selected='selected'";
                                            }
                                            ?>>INTERMEDIATE - CEC</option>
                                            <option value="INTERMEDIATE - MEC" <?PHP
                                            if ($_SESSION['users']['classname'] == 'INTERMEDIATE - MEC') {
                                                echo "selected='selected'";
                                            }
                                            ?>>INTERMEDIATE - MEC</option>
                                            <option value="INTERMEDIATE - MPC" <?PHP
                                            if ($_SESSION['users']['classname'] == 'INTERMEDIATE - MPC') {
                                                echo "selected='selected'";
                                            }
                                            ?>>INTERMEDIATE - MPC</option>
                                            <option value="INTERMEDIATE - BiPC" <?PHP
                                            if ($_SESSION['users']['classname'] == 'INTERMEDIATE - BiPC') {
                                                echo "selected='selected'";
                                            }
                                            ?>>INTERMEDIATE - BiPC</option>
                                            <option value="B COM" <?PHP
                                            if ($_SESSION['users']['classname'] == 'B COM') {
                                                echo "selected='selected'";
                                            }
                                            ?>>B COM </option>
                                            <option value="CA CPT/FOUNDATION" <?PHP
                                            if ($_SESSION['users']['classname'] == 'CA CPT/FOUNDATION') {
                                                echo "selected='selected'";
                                            }
                                            ?>>CA CPT/FOUNDATION</option>
                                            <option value="CA IPCC/INTER BOTH GROUPS" <?PHP
                                            if ($_SESSION['users']['classname'] == 'CA IPCC/INTER BOTH GROUPS') {
                                                echo "selected='selected'";
                                            }
                                            ?>>CA IPCC/INTER BOTH GROUPS</option>
                                            <option value="CA IPCC/INTER GROUP-I" <?PHP
                                            if ($_SESSION['users']['classname'] == 'CA IPCC/INTER GROUP-I') {
                                                echo "selected='selected'";
                                            }
                                            ?>>CA IPCC/INTER GROUP-I</option>
                                            <option value="CA IPCC/INTER GROUP-II" <?PHP
                                            if ($_SESSION['users']['classname'] == 'CA IPCC/INTER GROUP-II') {
                                                echo "selected='selected'";
                                            }
                                            ?>>CA IPCC/INTER GROUP-II</option>                                            
                                            <option value="CA FINAL BOTH GROUPS" <?PHP
                                            if ($_SESSION['users']['classname'] == 'CA FINAL BOTH GROUPS') {
                                                echo "selected='selected'";
                                            }
                                            ?>>CA FINAL BOTH GROUPS</option>
                                            <option value="CA FINAL GROUP-I" <?PHP
                                            if ($_SESSION['users']['classname'] == 'CA FINAL GROUP-I') {
                                                echo "selected='selected'";
                                            }
                                            ?>>CA FINAL GROUP-I</option>
                                            <option value="CA FINAL GROUP-II" <?PHP
                                            if ($_SESSION['users']['classname'] == 'CA FINAL GROUP-II') {
                                                echo "selected='selected'";
                                            }
                                            ?>>CA FINAL GROUP-II</option>
                                            <option value="CMA FOUNDATION" <?PHP
                                            if ($_SESSION['users']['classname'] == 'CMA FOUNDATION') {
                                                echo "selected='selected'";
                                            }
                                            ?>>CMA FOUNDATION</option>
                                            <option value="CMA INTER BOTH GROUPS" <?PHP
                                            if ($_SESSION['users']['classname'] == 'CMA INTER BOTH GROUPS') {
                                                echo "selected='selected'";
                                            }
                                            ?>>CMA INTER BOTH GROUPS</option>
                                            <option value="CMA INTER GROUP-I" <?PHP
                                            if ($_SESSION['users']['classname'] == 'CMA INTER GROUP-I') {
                                                echo "selected='selected'";
                                            }
                                            ?>>CMA INTER GROUP-I</option>
                                            <option value="CMA INTER GROUP-II" <?PHP
                                            if ($_SESSION['users']['classname'] == 'CMA INTER GROUP-II') {
                                                echo "selected='selected'";
                                            }
                                            ?>>CMA INTER GROUP-II</option>
                                            <option value="CMA FINAL BOTH GROUPS" <?PHP
                                            if ($_SESSION['users']['classname'] == 'CMA FINAL BOTH GROUPS') {
                                                echo "selected='selected'";
                                            }
                                            ?>>CMA FINAL BOTH GROUPS</option>
                                            <option value="CMA FINAL GROUP-I" <?PHP
                                            if ($_SESSION['users']['classname'] == 'CMA FINAL GROUP-I') {
                                                echo "selected='selected'";
                                            }
                                            ?>>CMA FINAL GROUP-I</option>
                                            <option value="CMA FINAL GROUP-II" <?PHP
                                            if ($_SESSION['users']['classname'] == 'CMA FINAL GROUP-II') {
                                                echo "selected='selected'";
                                            }
                                            ?>>CMA FINAL GROUP-II</option>
                                            <option value="CS FOUNDATION" <?PHP
                                            if ($_SESSION['users']['classname'] == 'CS FOUNDATION') {
                                                echo "selected='selected'";
                                            }
                                            ?>>CS FOUNDATION</option>
                                            <option value="CS INTER BOTH" <?PHP
                                            if ($_SESSION['users']['classname'] == 'CS INTER BOTH') {
                                                echo "selected='selected'";
                                            }
                                            ?>>CS INTER BOTH</option>
                                            <option value="CS INTER GROUP-I" <?PHP
                                            if ($_SESSION['users']['classname'] == 'CS INTER GROUP-I') {
                                                echo "selected='selected'";
                                            }
                                            ?>>CS INTER GROUP-I</option>
                                            <option value="CS INTER GROUP-II" <?PHP
                                            if ($_SESSION['users']['classname'] == 'CS INTER GROUP-II') {
                                                echo "selected='selected'";
                                            }
                                            ?>>CS INTER GROUP-II</option>
                                            <option value="CS FINAL ALL GROUPS" <?PHP
                                            if ($_SESSION['users']['classname'] == 'CS FINAL ALL GROUPS') {
                                                echo "selected='selected'";
                                            }
                                            ?>>CS FINAL ALL GROUPS</option>
                                            <option value="CS FINAL GROUP-I" <?PHP
                                            if ($_SESSION['users']['classname'] == 'CS FINAL GROUP-I') {
                                                echo "selected='selected'";
                                            }
                                            ?>>CS FINAL GROUP-I</option>
                                            <option value="CS FINAL GROUP-II" <?PHP
                                            if ($_SESSION['users']['classname'] == 'CS FINAL GROUP-II') {
                                                echo "selected='selected'";
                                            }
                                            ?>>CS FINAL GROUP-II</option>
                                            <option value="CS FINAL GROUP-III" <?PHP
                                            if ($_SESSION['users']['classname'] == 'CS FINAL GROUP-III') {
                                                echo "selected='selected'";
                                            }
                                            ?>>CS FINAL GROUP-III</option>
                                            <option value="ENGINEERING" <?PHP
                                            if ($_SESSION['users']['classname'] == 'ENGINEERING') {
                                                echo "selected='selected'";
                                            }
                                            ?>>ENGINEERING</option>
                                            <option value="LLB" <?PHP
                                            if ($_SESSION['users']['classname'] == 'LLB') {
                                                echo "selected='selected'";
                                            }
                                            ?>>LLB</option>
                                            <option value="MBA" <?PHP
                                            if ($_SESSION['users']['classname'] == 'MBA') {
                                                echo "selected='selected'";
                                            }
                                            ?>>MBA</option>
                                            <option value="MBBS" <?PHP
                                            if ($_SESSION['users']['classname'] == 'MBBS') {
                                                echo "selected='selected'";
                                            }
                                            ?>>MBBS</option>
                                            <option value="MCA" <?PHP
                                            if ($_SESSION['users']['classname'] == 'MCA') {
                                                echo "selected='selected'";
                                            }
                                            ?>>MCA</option>
                                            <option value="MS" <?PHP
                                            if ($_SESSION['users']['classname'] == 'MS') {
                                                echo "selected='selected'";
                                            }
                                            ?>>MS</option>

                                        </select>
                                    </div>
                                    <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                                        <label class="control-label">Total Maximum Marks</label>
                                        <input maxlength="4" type="text" required="required" id="totalmarks" name="totalmarks" value="<?PHP echo $_SESSION['users']['totalmarks']; ?>" class="form-control" placeholder="Enter enter Total Marks" />
                                    </div>
                                    <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                                        <label class="control-label">Total Marks Obtained</label>
                                        <input maxlength="4" type="text" required="required" id="totalmarksobtained" name="totalmarksobtained" value="<?PHP echo $_SESSION['users']['totalmarksobtained']; ?>" class="form-control" placeholder="Enter enter Total Marks" />
                                    </div>

                                    <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3" id="markssubjectiddiv" style="display:none;">
                                        <label class="control-label" id="markssubjectid">Marks in subject</label>
                                        <input maxlength="4" type="text" required="required" id="marksinsubject" name="marksinsubject" value="<?PHP echo $_SESSION['users']['marksinsubject']; ?>" class="form-control" placeholder="Enter enter  Marks" />
                                    </div>

                                    <div class="clearfix"></div>
                                </div>
                                <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <label class="control-label">Hall Ticket Number</label>
                                    <input maxlength="150" type="text" required="required" id="hallticketnumber" name="hallticketnumber" value="<?PHP echo $_SESSION['users']['hallticketnumber']; ?>" class="form-control" placeholder="Enter enter hall ticket Number" />
                                </div>
                                <div class="clearfix"></div>
                                <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6" >
                                    <label class="control-label">Marks list Certificate / proof</label>
                                    <input type="file" required="required" id="markslist" name="markslist" value="<?PHP echo $_SESSION['users']['marks']; ?>" class="form-control" placeholder="Upload marks list" />
                                </div>
<!--                                <div class="form-group col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                    <label class="control-label">&nbsp;</label>
                                    <br />
                                    <a href="javascript:void(0);" class="add_button" title="Add field">Add More</a>
                                </div>-->
                                <div class="clearfix"></div>
                                <div id="addmoreuploads" class="form-group field_wrapper col-xs-12 col-sm-12 col-md-12 col-lg-12"></div>

                                <!-- Copy Fields -->
                                <div class="copy hide">
                                    <div class="control-group input-group" style="margin-top:10px">
                                        <input type="text" name="addmore[]" class="form-control" placeholder="Enter Name Here">
                                        <div class="input-group-btn"> 
                                            <button class="btn btn-danger remove" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
                                        </div>
                                    </div>
                                </div>

                                <div class="clearfix"></div>
                                <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <label class="control-label">Name of the School / Collage / Institution </label>
                                    <input type="text" id="schoolname" required="required" name="schoolname" value="<?PHP echo $_SESSION['users']['schoolname']; ?>" class="form-control" placeholder="Enter Name of school / Collage / Institution" />
                                </div>
                                <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <label class="control-label">Address of the School / Collage / Institution  </label>
                                    <textarea id="schooladdress" required="required" name="schooladdress" class="form-control"><?PHP echo $_SESSION['users']['schooladdress']; ?></textarea>
                                </div>
                                <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <label class="control-label">Pincode</label>
                                    <input type="text" maxlength="6" id="schooladdresspincode" required="required" name="schooladdresspincode" value="<?PHP echo $_SESSION['users']['schooladdresspincode']; ?>" class="form-control" />
                                </div>
                                <div class="clearfix"></div>
                                <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <label class="control-label">Presently studying </label>
                                    <select class="form-control" required="required" id="presentlystudying" name="presentlystudying" onchange="showotherDegree()">
                                        <option value="">-select Presently studying-</option>
                                        <option value="CA" <?PHP
                                        if ($_SESSION['users']['presentlystudying'] == 'CA') {
                                            echo "selected='selected'";
                                        }
                                        ?>>CA</option>
                                        <option value="CMA" <?PHP
                                        if ($_SESSION['users']['presentlystudying'] == 'CMA') {
                                            echo "selected='selected'";
                                        }
                                        ?>>CMA</option>
                                        <option value="CS" <?PHP
                                        if ($_SESSION['users']['presentlystudying'] == 'CS') {
                                            echo "selected='selected'";
                                        }
                                        ?>>CS</option>
                                        <option value="LLB" <?PHP
                                        if ($_SESSION['users']['presentlystudying'] == 'LLB') {
                                            echo "selected='selected'";
                                        }
                                        ?>>LLB</option>
                                        <option value="MBA" <?PHP
                                        if ($_SESSION['users']['presentlystudying'] == 'MBA') {
                                            echo "selected='selected'";
                                        }
                                        ?>>MBA</option>
                                        <option value="MCA" <?PHP
                                        if ($_SESSION['users']['presentlystudying'] == 'MCA') {
                                            echo "selected='selected'";
                                        }
                                        ?> >MCA</option>
                                        <option value="MBBS" <?PHP
                                        if ($_SESSION['users']['presentlystudying'] == 'MBBS') {
                                            echo "selected='selected'";
                                        }
                                        ?>>MBBS</option>
                                        <option value="Engineering" <?PHP
                                        if ($_SESSION['users']['presentlystudying'] == 'Engineering') {
                                            echo "selected='selected'";
                                        }
                                        ?>>Engineering</option>
                                        <option value="not studying" <?PHP
                                        if ($_SESSION['users']['presentlystudying'] == 'not studying') {
                                            echo "selected='selected'";
                                        }
                                        ?>>Not Studying / Completed final Year</option>
                                        <option value="Employment" <?PHP
                                        if ($_SESSION['users']['presentlystudying'] == 'Employment') {
                                            echo "selected='selected'";
                                        }
                                        ?>>Employment</option> 
                                        <option value="other"<?PHP
                                        if ($_SESSION['users']['presentlystudying'] == 'other') {
                                            echo "selected='selected'";
                                        }
                                        ?>>other</option>
                                    </select>
                                </div>
                                <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6" id="specifyotherid" style="display:none;">
                                    <label class="control-label">Specify other</label>
                                    <input maxlength="150" type="text" required="required" id="specifyother" name="specifyother" value="<?PHP echo $_SESSION['users']['specifyother']; ?>" class="form-control" placeholder="Enter enter specify other" />
                                </div>
                                <div class="clearfix"></div>
                                <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <label class="control-label">Aims/Goals </label>
                                    <textarea id="aim" name="aim" required="required" class="form-control"></textarea>
                                </div>
                                <div class="clearfix"></div>
                                <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <label class="control-label">Are you interested to help financially needy / merit students in future?</label>
                                    <select id="futurehelp" name="futurehelp" required="required" class="form-control">
                                        <option value="">-select-</option>
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                    </select>
                                </div>
                                <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <label class="control-label">Are you willing to join Vyspro-India?</label>
                                    <select id="joinvyspro" name="joinvyspro" required="required" class="form-control">
                                        <option value="">-select-</option>
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                    </select>
                                </div>
                                <div class="clearfix"></div>
                                <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <label class="control-label">How do you know about Vidhya Bharathi?</label>
                                    <select id="referer" required="required" name="referer" class="form-control">
                                        <option value=''>-select-</option>
                                        <option value='Vyspro-India Life member'>Vyspro-India Life member</option>
                                        <option value='Vyspro-India Committee member'>Vyspro-India Committee member</option>
                                        <option value='Other Vysya Organisation'>Other Vysya Organisation</option>
                                        <option value='Any Other Source'>Any Other Source</option>                                          
                                    </select>
                                </div>
                                <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <label class="control-label">Referred by (Name / organisation Name) </label>
                                    <input maxlength="150" type="text" required="required"  id="referername" name="referername" value="<?PHP echo $_SESSION['users']['referername']; ?>" class="form-control" placeholder="Enter Person Name" />
                                </div>
                                <div class="clearfix"></div>
                                <button class="btn btn-primary nextBtn btn-lg pull-right" type="submit">View & Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>  
    </div>
</section>

<?PHP
include_once 'common/footer.php';
?>
<script>
    $(function () {
        $(".datepicker").datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: "d M, yy",
            yearRange: '-39y:-10y'
        });
    });

    $("#datepicker").datepicker("option", "dateFormat", $(this).val());




</script>
