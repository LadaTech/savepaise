<?php
session_start();
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL);
$headerTitle = 'APPLICATION FOR MERIT AWARD / SCHOLARSHIP ';
include_once 'common/logs.php';
include_once 'common/db.php';
include_once 'common/header.php';

$log = "showing view options page. " . PHP_EOL;
//echo "<pre>";
insertlogs($log);
$_SESSION['users'] = $_POST;
unset($_SESSION['files']);

//print_r($_FILES);
//print_r($_POST);

list($firstName, $domainName) = explode('@', $_POST['email']);


if(is_array($_FILES['photo'])){
    uploadFiles($_FILES['photo'], "photo", $firstName);
}

if(is_array($_FILES['markslist'])){
    uploadFiles($_FILES['markslist'], "markslist", $firstName);
}

if(is_array($_FILES['annualincomeproof'])){
    uploadFiles($_FILES['annualincomeproof'], "annualincomeproof", $firstName);
}

if(is_array($_FILES['photoEdit'])){
    uploadFiles($_FILES['photoEdit'], "photo", $firstName);
}

if(is_array($_FILES['markslistEdit'])){
    uploadFiles($_FILES['markslistEdit'], "markslist", $firstName);
}

if(is_array($_FILES['annualincomeproofEdit'])){
    uploadFiles($_FILES['annualincomeproofEdit'], "annualincomeproof", $firstName);
}

//uploadFiles($_FILES['photo'], "photo", $firstName);
//uploadFiles($_FILES['annualincomeproof'], "annualincomeproof", $firstName);
//uploadFiles($_FILES['markslist'], "markslist", $firstName);

//echo "----------------<br />------<br />";
//print_r($_SESSION);
//echo "</pre>";
//exit;


//print_r($_SESSION);
//echo "</pre>";
?>
<section class="page">  
    <div class="container">
        <h3 style="color: #D70000;">Vyspro-India APPLICATION FOR SCHOLARSHIP</h3>
        <div class="row formContainer"> 
            <br />
            <div class="col-8">
                <form role="form" id="applicationform" class="form" name="applicationform" method="post" action="scholarapplication.php" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="col-md-12">
                                <h3>Personal Information</h3>

                                <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <label class="control-label">Surname</label>
                                    <input maxlength="250" required="required" type="text" class="form-control" value="<?PHP echo $_SESSION['users']['surname']; ?>" id="surname" name="surname" placeholder="Enter Surname"  />
                                    <input type="hidden" id="applying_for" name="applying_for" value="scholarship" />
                                </div>
                                <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <label class="control-label">Full Name</label>
                                    <input maxlength="250" type="text" id="name" required="required" name="name" value="<?PHP echo $_SESSION['users']['name']; ?>" class="form-control" placeholder="Enter Full Name" />
                                </div>
                                <div class="clearfix"></div>
                                <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <label class="control-label">Photo</label>
                                    <img src="uploads/<?PHP echo $_SESSION[users]['photo']; ?>" width="80" />
                                    <input type="file" class="form-control" id="photoEdit" name="photoEdit" />

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
                                    <input maxlength="11" type="text"  id="motherphone" name="motherphone" value="<?PHP echo $_SESSION['users']['motherphone']; ?>" class="form-control" placeholder="Enter Mother Phone Number" />
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
                                <div class="clearfix"></div>
                                <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <label class="control-label">Pincode</label>
                                    <input maxlength="6" type="text" id="pincode" required="required" value="<?PHP echo $_SESSION['users']['pincode']; ?>" name="pincode" class="form-control" placeholder="Enter Pincode" />
                                </div>
                                <div class="clearfix"></div>


                                <h3 >Communication Address</h3>
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
                                <div class="clearfix"></div>
                                <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <label class="control-label">Pincode</label>
                                    <input maxlength="6" type="text" id="cpincode" required="required" value="<?PHP echo $_SESSION['users']['cpincode']; ?>" name="cpincode" class="form-control" placeholder="Enter Pincode" />
                                </div>
                                <div class="clearfix"></div>
                                <!--<button class="btn btn-primary nextBtn btn-lg pull-right" type="submit">Next</button>-->
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="col-md-12">
                                <h3>Educational Details</h3>
                                <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <label class="control-label">Latest class completed</label>
                                    <input maxlength="150" type="text" required="required" id="latestclass" name="latestclass" value="<?PHP echo $_SESSION['users']['latestclass']; ?>" class="form-control" placeholder="Enter Latest class completed" />
                                </div>
                                <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <label class="control-label">Month - Year</label>
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
                                <div id="formeritdiv" style="display: none;">

                                    <h3>Details for Merit selection</h3>
                                    <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                                        <label class="control-label">Subject / Class</label>
                                        <select id="classname" name="classname" class="form-control" onchange="showmarksdiv()">
                                            <option value="">--Select Subject / Class-- </option>
                                            <option value="ssc" <?PHP
                                            if ($_SESSION['users']['classname'] == 'ssc') {
                                                echo "selected='selected'";
                                            }
                                            ?>>SSC</option>
                                            <option value="Inter CEC" <?PHP
                                            if ($_SESSION['users']['classname'] == 'Inter CEC') {
                                                echo "selected='selected'";
                                            }
                                            ?>>Inter CEC</option>
                                            <option value="Inter MEC" <?PHP
                                            if ($_SESSION['users']['classname'] == 'Inter MEC') {
                                                echo "selected='selected'";
                                            }
                                            ?>>Inter MEC</option>
                                            <option value="Inter MPC" <?PHP
                                            if ($_SESSION['users']['classname'] == 'Inter MPC') {
                                                echo "selected='selected'";
                                            }
                                            ?>>Inter MPC</option>
                                            <option value="B.Com" <?PHP
                                            if ($_SESSION['users']['classname'] == 'B.Com') {
                                                echo "selected='selected'";
                                            }
                                            ?>>B.Com </option>
                                            <option value="CA CPT" <?PHP
                                            if ($_SESSION['users']['classname'] == 'CA CPT') {
                                                echo "selected='selected'";
                                            }
                                            ?>>CA CPT</option>
                                            <option value="CA Final both groups" <?PHP
                                            if ($_SESSION['users']['classname'] == 'CA Final both groups') {
                                                echo "selected='selected'";
                                            }
                                            ?>>CA Final both groups</option>
                                            <option value="CA Final Group-I" <?PHP
                                            if ($_SESSION['users']['classname'] == 'CA Final Group-I') {
                                                echo "selected='selected'";
                                            }
                                            ?>>CA Final Group-I</option>
                                            <option value="CA Final Group-II" <?PHP
                                            if ($_SESSION['users']['classname'] == 'CA Final Group-II') {
                                                echo "selected='selected'";
                                            }
                                            ?>>CA Final Group-II</option>
                                            <option value="CA IPCC" <?PHP
                                            if ($_SESSION['users']['classname'] == 'CA IPCC') {
                                                echo "selected='selected'";
                                            }
                                            ?>>CA IPCC</option>
                                            <option value="CA IPCC both" <?PHP
                                            if ($_SESSION['users']['classname'] == 'CA IPCC both') {
                                                echo "selected='selected'";
                                            }
                                            ?>>CA IPCC both</option>
                                            <option value="CA IPCC Group-I" <?PHP
                                            if ($_SESSION['users']['classname'] == 'CA IPCC Group-I') {
                                                echo "selected='selected'";
                                            }
                                            ?>>CA IPCC Group-I</option>
                                            <option value="CA IPCC Group-II" <?PHP
                                            if ($_SESSION['users']['classname'] == 'CA IPCC Group-II') {
                                                echo "selected='selected'";
                                            }
                                            ?>>CA IPCC Group-II</option>
                                            <option value="CMA Final both groups" <?PHP
                                            if ($_SESSION['users']['classname'] == 'CMA Final both groups') {
                                                echo "selected='selected'";
                                            }
                                            ?>>CMA Final both groups</option>
                                            <option value="CMA Final Group-I" <?PHP
                                            if ($_SESSION['users']['classname'] == 'CMA Final Group-I') {
                                                echo "selected='selected'";
                                            }
                                            ?>>CMA Final Group-I</option>
                                            <option value="CMA Final Group-II" <?PHP
                                            if ($_SESSION['users']['classname'] == 'CMA Final Group-II') {
                                                echo "selected='selected'";
                                            }
                                            ?>>CMA Final Group-II</option>
                                            <option value="CMA IPCC both groups" <?PHP
                                            if ($_SESSION['users']['classname'] == 'CMA IPCC both groups') {
                                                echo "selected='selected'";
                                            }
                                            ?>>CMA IPCC both groups</option>
                                            <option value="CMA IPCC Group-I" <?PHP
                                            if ($_SESSION['users']['classname'] == 'CMA IPCC Group-I') {
                                                echo "selected='selected'";
                                            }
                                            ?>>CMA IPCC Group-I</option>
                                            <option value="CMA IPCC Group-II" <?PHP
                                            if ($_SESSION['users']['classname'] == 'CMA IPCC Group-II') {
                                                echo "selected='selected'";
                                            }
                                            ?>>CMA IPCC Group-II</option>
                                            <option value="CS Final both groups" <?PHP
                                            if ($_SESSION['users']['classname'] == 'CS Final both groups') {
                                                echo "selected='selected'";
                                            }
                                            ?>>CS Final both groups</option>
                                            <option value="CS Final Group-I" <?PHP
                                            if ($_SESSION['users']['classname'] == 'CS Final Group-I') {
                                                echo "selected='selected'";
                                            }
                                            ?>>CS Final Group-I</option>
                                            <option value="CS Final Group-II" <?PHP
                                            if ($_SESSION['users']['classname'] == 'CS Final Group-II') {
                                                echo "selected='selected'";
                                            }
                                            ?>>CS Final Group-II</option>
                                            <option value="CS Final Group-III" <?PHP
                                            if ($_SESSION['users']['classname'] == 'CS Final Group-III') {
                                                echo "selected='selected'";
                                            }
                                            ?>>CS Final Group-III</option>
                                            <option value="CS Final Group-IV" <?PHP
                                            if ($_SESSION['users']['classname'] == 'CS Final Group-IV') {
                                                echo "selected='selected'";
                                            }
                                            ?>>CS Final Group-IV</option>
                                            <option value="CS Inter both groups" <?PHP
                                            if ($_SESSION['users']['classname'] == 'CS Inter both groups') {
                                                echo "selected='selected'";
                                            }
                                            ?>>CS Inter both groups</option>
                                            <option value="CS Inter Group-I" <?PHP
                                            if ($_SESSION['users']['classname'] == 'CS Inter Group-I') {
                                                echo "selected='selected'";
                                            }
                                            ?>>CS Inter Group-I</option>
                                            <option value="CS Inter Group-II" <?PHP
                                            if ($_SESSION['users']['classname'] == 'CS Inter Group-II') {
                                                echo "selected='selected'";
                                            }
                                            ?>>CS Inter Group-II</option>
                                            <option value="Engineer" <?PHP
                                            if ($_SESSION['users']['classname'] == 'Engineer') {
                                                echo "selected='selected'";
                                            }
                                            ?>>Engineer</option>
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
                                        <label class="control-label">Total Marks</label>
                                        <input maxlength="150" type="text" required="required" id="totalmarks" name="totalmarks" value="<?PHP echo $_SESSION['users']['totalmarks']; ?>" class="form-control" placeholder="Enter enter Total Marks" />
                                    </div>
                                    <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3">
                                        <label class="control-label">Total Marks Obtained</label>
                                        <input maxlength="150" type="text" required="required" id="totalmarksobtained" name="totalmarksobtained" value="<?PHP echo $_SESSION['users']['totalmarksobtained']; ?>" class="form-control" placeholder="Enter enter Total Marks" />
                                    </div>

                                    <div class="form-group col-xs-12 col-sm-3 col-md-3 col-lg-3" id="markssubjectiddiv" style="display:none;">
                                        <label class="control-label" id="markssubjectid">Marks in subject</label>
                                        <input maxlength="150" type="text" required="required" id="marksinsubject" name="marksinsubject" value="<?PHP echo $_SESSION['users']['marksinsubject']; ?>" class="form-control" placeholder="Enter enter  Marks" />
                                    </div>

                                    <div class="clearfix"></div>
                                </div>


                                <div class="clearfix"></div>
                                <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <label class="control-label">Hall Ticket Number</label>
                                    <input maxlength="150" type="text" required="required" id="hallticketnumber" name="hallticketnumber" value="<?PHP echo $_SESSION['users']['hallticketnumber']; ?>" class="form-control" placeholder="Enter enter hall ticket Number" />
                                </div>
                                <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <label class="control-label">Marks list Certificate / proof</label>
                                    <img src="uploads/<?PHP echo $_SESSION[users][markslist]; ?>" width="80">
                                    <input type="file"  id="markslistEdit" name="markslistEdit" value="<?PHP echo $_SESSION['users']['marks']; ?>" class="form-control" placeholder="Upload marks list" />
                                </div>
                                <div class="clearfix"></div>
                                <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <label class="control-label">Marks obtained</label>
                                    <input type="text" id="marksobtained" required="required" name="marksobtained" value="<?PHP echo $_SESSION['users']['marksobtained']; ?>" class="form-control" placeholder="Enter marks obtained" />
                                </div>
                                <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <label class="control-label">Percentage of marks</label>
                                    <input type="text" id="percentagemarks" required="required" name="percentagemarks" class="form-control" value="<?PHP echo $_SESSION['users']['percentagemarks']; ?>" placeholder="Enter Percentage of marks" />
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
                                    <input type="text" id="schooladdresspincode" required="required" name="schooladdresspincode" value="<?PHP echo $_SESSION['users']['schooladdresspincode']; ?>" class="form-control" />
                                </div>
                                <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <label class="control-label">Presently studying </label>
                                    <select class="form-control" required="required" id="presentlystudying" name="presentlystudying">
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
                                        <option value="Engg" <?PHP
                                        if ($_SESSION['users']['presentlystudying'] == 'Engg') {
                                            echo "selected='selected'";
                                        }
                                        ?>>Engg</option>                                      
                                    </select>
                                </div>
                                <div class="clearfix"></div>
                                <!--<button class="btn btn-primary nextBtn btn-lg pull-right" type="submit" >Next</button>-->
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="col-md-12">
                                <h3>Income Details</h3>
                                <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <label class="control-label">Annual income</label>
                                    <input maxlength="10" required="required" id="annualincome" type="text" value="<?PHP echo $_SESSION['users']['annualincome']; ?>" id="annualincome" name="annualincome" class="form-control" placeholder="Enter Annual income" />
                                </div>
                                <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <label class="control-label">Annual Income certificate </label>
                                    <img src="uploads/<?PHP echo $_SESSION[users][annualincomeproof]; ?>" width="80" />
                                    <input type="file" class="form-control" value="<?PHP echo $_SESSION['users']['annualincomeproof']; ?>" id="annualincomeproofEdit" name="annualincomeproofEdit" />
                                </div>
                                <div class="clearfix"></div>
                                <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <label class="control-label">Any other scholarships received</label>
                                    <textarea  id="otherscholorships" name="otherscholorships"  class="form-control" placeholder="Enter scholarships details"><?PHP echo $_SESSION['users']['otherscholorships']; ?></textarea>
                                </div>     
                                <div class="clearfix"></div>
                                <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <label class="control-label">Did you receive scholarship from Vyspro-India</label>
                                    <select id="vysprocholorships" required="required" name="vysprocholorships" onchange="changeSholorships()" class="form-control">
                                        <option value=''>-select-</option>
                                        <option value='Yes' <?PHP
                                        if ($_SESSION['users']['vysprocholorships'] == 'Yes') {
                                            echo "selected='selected'";
                                        }
                                        ?>>Yes</option>
                                        <option value='No' <?PHP
                                        if ($_SESSION['users']['vysprocholorships'] == 'No') {
                                            echo "selected='selected'";
                                        }
                                        ?>>No</option>
                                    </select>
                                </div>
                                <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6" id="vysprocholorshipsyeardiv">
                                    <label class="control-label">Year of latest scholarship received</label>
                                    <select id="vysprocholorshipsyear" required="required" name="vysprocholorshipsyear" class="form-control">
                                        <option value="">-Year received-</option>
                                        <option value="2019" <?PHP
                                        if ($_SESSION['users']['vysprocholorshipsyear'] == '2019') {
                                            echo "selected='selected'";
                                        }
                                        ?>>2019</option>
                                        <option value="2018" <?PHP
                                        if ($_SESSION['users']['vysprocholorshipsyear'] == '2018') {
                                            echo "selected='selected'";
                                        }
                                        ?>>2018</option>
                                        <option value="2017" <?PHP
                                        if ($_SESSION['users']['vysprocholorshipsyear'] == '2017') {
                                            echo "selected='selected'";
                                        }
                                        ?>>2017</option>
                                        <option value="2016" <?PHP
                                        if ($_SESSION['users']['vysprocholorshipsyear'] == '2016') {
                                            echo "selected='selected'";
                                        }
                                        ?>>2016</option>
                                        <option value="2015" <?PHP
                                        if ($_SESSION['users']['vysprocholorshipsyear'] == '2015') {
                                            echo "selected='selected'";
                                        }
                                        ?>>2015</option>
                                        <option value="2014" <?PHP
                                        if ($_SESSION['users']['vysprocholorshipsyear'] == '2014') {
                                            echo "selected='selected'";
                                        }
                                        ?>>2014</option>
                                        <option value="2013" <?PHP
                                        if ($_SESSION['users']['vysprocholorshipsyear'] == '2013') {
                                            echo "selected='selected'";
                                        }
                                        ?>>2013</option>
                                        <option value="2012" <?PHP
                                        if ($_SESSION['users']['vysprocholorshipsyear'] == '2012') {
                                            echo "selected='selected'";
                                        }
                                        ?>>2012</option>
                                        <option value="2011" <?PHP
                                        if ($_SESSION['users']['vysprocholorshipsyear'] == '2011') {
                                            echo "selected='selected'";
                                        }
                                        ?>>2011</option>
                                        <option value="2010" <?PHP
                                        if ($_SESSION['users']['vysprocholorshipsyear'] == '2010') {
                                            echo "selected='selected'";
                                        }
                                        ?>>2010</option>
                                    </select>
                                </div>
                                <div class="clearfix"></div>
                                <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <label class="control-label">Are your Parent / Guardian is a member of any Vysya Association</label>
                                    <select id="vysproparent" name="vysproparent" required="required" class="form-control" onchange="checkparentOrg()">
                                        <option value=''>-select-</option>
                                        <option value='Yes' <?PHP
                                        if ($_SESSION['users']['vysproparent'] == 'Yes') {
                                            echo "selected='selected'";
                                        }
                                        ?>>Yes</option>
                                        <option value='No' <?PHP
                                        if ($_SESSION['users']['vysproparent'] == 'No') {
                                            echo "selected='selected'";
                                        }
                                        ?>>No</option>
                                    </select>
                                </div>
                                <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6" id="organisationnamediv">
                                    <label class="control-label">Organisation Name</label>
                                    <input type="text" class="form-control" value="<?PHP echo $_SESSION['users']['organisationname']; ?>" id="organisationname" name="organisationname" placeholder="Enter Organisation Name" />

                                </div>
                                <div class="clearfix"></div>
                                <!--<button class="btn btn-primary nextBtn btn-lg pull-right" type="submit">Next</button>-->

                            </div>
                        </div>
                    </div>

                    <div class="row" >
                        <div class="col-xs-12">
                            <div class="col-md-12">
                                <h3>Objectives</h3>
                                <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <label class="control-label">Aims/Goals </label>
                                    <textarea id="aim" name="aim" required="required" class="form-control"><?PHP echo $_SESSION['users']['aim']; ?></textarea>
                                </div>
                                <div class="clearfix"></div>
                                <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <label class="control-label">Are you interested to help financially needy / merit students in future?</label>
                                    <select id="futurehelp" name="futurehelp" required="required" class="form-control">
                                        <option value="">-select-</option>
                                        <option value="Yes" <?PHP
                                        if ($_SESSION['users']['futurehelp'] == 'Yes') {
                                            echo "selected='selected'";
                                        }
                                        ?>>Yes</option>
                                        <option value="No" <?PHP
                                        if ($_SESSION['users']['futurehelp'] == 'No') {
                                            echo "selected='selected'";
                                        }
                                        ?>>No</option>

                                    </select>
                                </div>
                                <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <label class="control-label">Are you willing to join Vyspro-India?</label>
                                    <select id="joinvyspro" name="joinvyspro" required="required" class="form-control">
                                        <option value="">-select-</option>
                                        <option value="Yes" <?PHP
                                        if ($_SESSION['users']['joinvyspro'] == 'Yes') {
                                            echo "selected='selected'";
                                        }
                                        ?>>Yes</option>
                                        <option value="No" <?PHP
                                        if ($_SESSION['users']['joinvyspro'] == 'No') {
                                            echo "selected='selected'";
                                        }
                                        ?>>No</option>

                                    </select>
                                </div>
                                <div class="clearfix"></div>
                                <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <label class="control-label">How do you know about Vidhya Bharathi?</label>
                                    <select id="referer" required="required" name="referer" class="form-control">
                                        <option value=''>-select-</option>
                                        <option value='Vyspro-India Life member' <?PHP
                                        if ($_SESSION['users']['referer'] == 'Vyspro-India Life member') {
                                            echo "selected='selected'";
                                        }
                                        ?>>Vyspro-India Life member</option>
                                        <option value='Vyspro-India Committee member' <?PHP
                                        if ($_SESSION['users']['referer'] == 'Vyspro-India Committee member') {
                                            echo "selected='selected'";
                                        }
                                        ?>>Vyspro-India Committee member</option>
                                        <option value='Other Vysya Organisation' <?PHP
                                        if ($_SESSION['users']['referer'] == 'Other Vysya Organisation') {
                                            echo "selected='selected'";
                                        }
                                        ?>>Other Vysya Organisation</option>
                                        <option value='Any other source' <?PHP
                                        if ($_SESSION['users']['referer'] == 'Any other source') {
                                            echo "selected='selected'";
                                        }
                                        ?>>Any other source</option>                                          
                                    </select>
                                </div>
                                <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <label class="control-label">Referred by (Name / organisation Name) </label>
                                    <input maxlength="150" type="text" required="required"  id="referername" name="referername" value="<?PHP echo $_SESSION['users']['referername']; ?>" class="form-control" placeholder="Enter Person Name" />
                                </div>

                                <div class="clearfix"></div>
                                <!--<button class="btn btn-primary nextBtn btn-lg pull-right" type="submit">Next</button>-->
                            </div>
                        </div>
                    </div>                    
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="col-md-12 ">
                                <h3>Bank Account details</h3>
                                <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <label class="control-label">Student / Beneficiary Name (as per bank account) </label>
                                    <input type="text" required="required" class="form-control" value="<?PHP echo $_SESSION['users']['bankstudentname']; ?>" id="bankstudentname" name="bankstudentname" />
                                </div>
                                <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <label class="control-label">Bank Name </label>
                                    <input type="text" required="required" class="form-control" value="<?PHP echo $_SESSION['users']['bankname']; ?>" id="bankname" name="bankname" />
                                </div>
                                <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <label class="control-label">Bank A/C number</label>
                                    <input type="text" required="required" class="form-control" value="<?PHP echo $_SESSION['users']['banknumber']; ?>" id="banknumber" name="banknumber" />
                                </div>
                                <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <label class="control-label">Reenter Bank A/C number</label>
                                    <input type="password" required="required" class="form-control" value="<?PHP echo $_SESSION['users']['reenterbanknumber']; ?>" id="reenterbanknumber" name="reenterbanknumber" placeholder="Reenter Bank A/C number" />
                                </div>
                                <div class="clearfix"></div>
                                <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <label class="control-label">Bank IFSC code </label>
                                    <input type="text" maxlength="11" required="required" class="form-control" value="<?PHP echo $_SESSION['users']['bankifsc']; ?>" id="bankifsc" name="bankifsc" />
                                </div>
                                <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <label class="control-label">Bank Branch </label>
                                    <input type="text" required="required" class="form-control" value="<?PHP echo $_SESSION['users']['bankbranch']; ?>" id="bankbranch" name="bankbranch" />
                                </div>
                                <div class="clearfix"></div>

                            </div>
                        </div>
                    </div>
                    <span class="pull-right" style='display:none;' id='loadingImage'><img src="/images/loading.gif" width="50"  /></span>
                    <input class="btn btn-success btn-lg pull-right" id="submitbutton" style="margin-right: 10px;" type="submit" value="Submit" />
                    <input class="btn btn-success btn-lg pull-right" id="previewbutton" style="margin-right: 10px;" onclick="makeEditform('no');" type="submit" value="View & Submit" />
                    <input class="btn btn-success btn-lg pull-right" id="editbutton" style="margin-right: 10px;" type="button" onclick="makeEditform('yes');" value="EDIT" />
                </form>

                </form>
            </div>
        </div>  
    </div>
</section>

<?PHP
$extrascript = "<script type='text/javascript'>
            makeEditform('no');
            
            $('#submitbutton').click(function(){   
                if($('#applicationform').valid()){
                    $('#submitbutton').prop('disabled', true);
                    $('#previewbutton').prop('disabled', true);
                    $('#editbutton').prop('disabled', true);
                    $('#loadingImage').show();
                    $('#applicationform').attr('action', 'confirm.php');
                    $('#applicationform').submit();
                
            }
        });
        $(function () {
            $('.datepicker').datepicker({
                changeMonth: true,
                changeYear: true,
                dateFormat: 'd M, yy',
                yearRange: '-39y:-10y'
            });
        });

    $('#datepicker').datepicker('option', 'dateFormat', $(this).val());
</script>        
";
include_once 'common/footer.php';
?>

