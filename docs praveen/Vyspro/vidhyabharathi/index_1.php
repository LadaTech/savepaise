<?php
session_start();
$_SESSION['logunique'] = uniqid();
$headerTitle = 'APPLICATION FOR MERIT AWARD / SCHOLARSHIP ';
include_once 'common/logs.php';
include_once 'common/db.php';
include_once 'common/header.php';

$log = "insert payu details. " . PHP_EOL;
insertlogs($log);
?>
<style type="text/css">
    select.ui-datepicker-month, select.ui-datepicker-year{
        background-color: black;
    }
    </style>
<section class="page">  
    <div class="container">
        <h3 style="color: #D70000;">Vyspro-India APPLICATION FOR MERIT AWARD / SCHOLARSHIP</h3>
        <div class="row formContainer"> 
            <br />
            <div class="col-8">
                <div class="stepwizard">
                    <div class="stepwizard-row setup-panel">
                        <div class="stepwizard-step">
                            <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
                            <p>Personal/Family details</p>
                        </div>
                        <div class="stepwizard-step">
                            <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                            <p>Educational details</p>
                        </div>
                        <div class="stepwizard-step">
                            <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
                            <p>Income details</p>
                        </div>
                        <div class="stepwizard-step">
                            <a href="#step-4" type="button" class="btn btn-default btn-circle" disabled="disabled">4</a>
                            <p>Objectives</p>
                        </div>
                        <div class="stepwizard-step">
                            <a href="#step-5" type="button" class="btn btn-default btn-circle" disabled="disabled">5</a>
                            <p>Bank Account details</p>
                        </div>
                    </div>
                </div>

                <form role="form" id="applicationform" class="form" name="applicationform" method="post" action="application.php" enctype="multipart/form-data">
                    <label class="control-label">Applying for</label>
                    <br />
                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                        <input type="radio" class="form-check-input" required="required" id="applying_for1" name="applying_for" value="merit" />
                        <label class="form-check-label" for="materialInline1">MERIT AWARD</label>
                    </div>

                    <!-- Material inline 2 -->
                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                        <input type="radio" class="form-check-input" required="required" id="applying_for2" name="applying_for" value="scholarship" />
                        <label class="form-check-label" for="materialInline2">SCHOLARSHIP</label>
                    </div>

                    <!-- Material inline 3 -->
                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                        <input type="radio" class="form-check-input" required="required" id="applying_for3" name="applying_for" value="both" />
                        <label class="form-check-label" for="materialInline3">Both</label>
                    </div>

                    <div class="row setup-content" id="step-1">
                        <div class="col-xs-12">
                            <div class="col-md-12">
                                <h3>Personal Information</h3>
                                <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <label class="control-label">Surname</label>
                                    <input maxlength="250" required="required" type="text" class="form-control" id="surname" name="surname" placeholder="Enter First Name"  />
                                </div>
                                <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <label class="control-label">Name</label>
                                    <input maxlength="250" type="text" id="name" required="required" name="name" class="form-control" placeholder="Enter Last Name" />
                                </div>
                                <div class="clearfix"></div>
                                <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <label class="control-label">Photo</label>
                                    <input type="file" class="form-control" required="required" id="photo" name="photo" />

                                </div>
                                <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <label class="control-label">Date of Birth</label>
                                    <input type="text" class="form-control datepicker" required="required" id="dob" name="dob" />

                                </div>
                                <div class="clearfix"></div>
                                <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <label class="control-label">Email</label>
                                    <input maxlength="150" type="text" id="email" required="required" name="email" class="form-control" placeholder="Enter Email" />

                                </div>
                                <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <label class="control-label">Phone Number</label>
                                    <input maxlength="11" type="text" id="phone" required="required" name="phone" class="form-control" placeholder="Enter Phone Number" />
                                </div>
                                <div class="clearfix"></div>
                                <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <label class="control-label">Father/Mother/Guardian Name</label>
                                    <input maxlength="150" type="text" required="required" id="parentname" name="parentname" class="form-control" placeholder="Enter Father/Mother/Guardian Name" />
                                </div>
                                <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <label class="control-label">Occupation</label>
                                    <input maxlength="150" type="text" required="required"  id="parentoccupation" name="parentoccupation" class="form-control" placeholder="Enter Occupation" />
                                </div>
                                <div class="clearfix"></div>
                                <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <label class="control-label">Location / Landmark</label>
                                    <input type="text" id="faddress" required="required" name="faddress" class="form-control" placeholder="Enter Address" />
                                </div>

                                <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <label class="control-label">Street</label>
                                    <input type="text" id="street" required="required" name="street" class="form-control" placeholder="Enter Street" />
                                </div>
                                <div class="clearfix"></div>
                                <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <label class="control-label">City</label>
                                    <input type="text" id="city" required="required" name="city" class="form-control" placeholder="Enter City" />
                                </div>
                                <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <label class="control-label">State</label>
                                    <input type="text" id="state" required="required" name="state" class="form-control" placeholder="Enter State" />
                                </div>
                                <div class="clearfix"></div>
                                <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <label class="control-label">Pincode</label>
                                    <input maxlength="6" type="text" id="pincode" required="required" name="pincode" class="form-control" placeholder="Enter Pincode" />
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
                                    <input maxlength="150" type="text" required="required" id="latestclass" name="latestclass" class="form-control" placeholder="Enter Latest class completed" />
                                </div>
                                <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <label class="control-label">Month</label>
                                    <select class="form-control" id="latestmonth" name="latestmonth">
                                        <option value="">-select Month-</option>
                                        <option value="November-2018">November-2018</option>
                                        <option value="December2018">December2018</option>
                                        <option value="January-2019">January-2019</option>
                                        <option value="February-2019">February-2019</option>
                                        <option value="March-2019">March-2019</option>
                                        <option value="April-2019">April-2019</option>
                                        <option value="May-2019">May-2019</option>
                                        <option value="June-2019">June-2019</option>
                                        <option value="July-2019">July-2019</option>
                                        <option value="August-2019">August-2019</option>
                                        <option value="September-2019">September-2019</option>
                                        <option value="October-2019">October-2019</option>
                                        <option value="November-2019">November-2019</option>
                                    </select>
                                </div>
                                <div class="clearfix"></div>
                                <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <label class="control-label">Marks obtained/Total Marks</label>
                                    <input maxlength="150" type="text" required="required" id="marks" name="marks" class="form-control" placeholder="Enter Marks obtained/Total Marks" />
                                </div>
                                <div class="clearfix"></div>
                                <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <label class="control-label">Name of school / Collage / Institution </label>
                                    <input type="text" id="schoolname" required="required" name="schoolname" class="form-control" placeholder="Enter Name of school / Collage / Institution" />
                                </div>
                                <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <label class="control-label">Name of school / Collage / Institution Address </label>
                                    <textarea id="schooladdress" required="required" name="schooladdress" class="form-control"></textarea>
                                </div>
                                <div class="clearfix"></div>
                                <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <label class="control-label">Presently studying </label>
                                    <select class="form-control" required="required" id="presentlystudying" name="presentlystudying">
                                        <option value="">-select Presently studying-</option>
                                        <option value="CA">CA</option>
                                        <option value="CMS">CMA</option>
                                        <option value="CS">CS</option>
                                        <option value="LLB">LLB</option>
                                        <option value="MBA">MBA</option>
                                        <option value="MCA">MCA</option>
                                        <option value="MBBS">MBBS</option>
                                        <option value="BDS">BDS</option>
                                        <option value="MS">MS</option>
                                        <option value="Engg">Engg</option>
                                    </select>
                                </div>
                                <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
                            </div>
                        </div>
                    </div>
                    <div class="row setup-content" id="step-3">
                        <div class="col-xs-12">
                            <div class="col-md-12">
                                <h3>Income Details</h3>
                                <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <label class="control-label">Annual income</label>
                                    <input maxlength="250" required="required" type="text" id="annualincome" name="annualincome" class="form-control" placeholder="Enter Annual income" />
                                </div>
                                <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <label class="control-label">Annual Income certificate </label>
                                    <input type="file" required="required" class="form-control" id="annualincomeproof" name="annualincomeproof" />
                                </div>
                                <div class="clearfix"></div>
                                <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <label class="control-label">Any other scholarships received</label>
                                    <input maxlength="250" required="required" type="text" id="otherscholorships" name="otherscholorships" class="form-control" placeholder="Enter scholarships details" />
                                </div>     
                                <div class="clearfix"></div>
                                <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <label class="control-label">Did you received scholarship from vyspro</label>
                                    <select id="vysprocholorships" required="required" name="vysprocholorships" class="form-control">
                                        <option value=''>-select-</option>
                                        <option value='Yes'>Yes</option>
                                        <option value='No'>No</option>
                                    </select>
                                </div>
                                <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <label class="control-label">Did you received scholarship in which year</label>
                                    <select id="vysprocholorshipsyear" required="required" name="vysprocholorshipsyear" class="form-control">
                                        <option value="">-Year received-</option>
                                        <option value="2019">2019</option>
                                        <option value="2018">2018</option>
                                        <option value="2017">2017</option>
                                        <option value="2016">2016</option>
                                        <option value="2015">2015</option>
                                        <option value="2014">2014</option>
                                        <option value="2013">2013</option>
                                        <option value="2012">2012</option>
                                        <option value="2011">2011</option>
                                        <option value="2010">2010</option>
                                    </select>
                                </div>
                                <div class="clearfix"></div>
                                <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <label class="control-label">Are your Parent / Guardian is a member of any Vysya Association</label>
                                    <select id="vysproparent" name="vysproparent" required="required" class="form-control">
                                        <option value=''>-select-</option>
                                        <option value='Yes'>Yes</option>
                                        <option value='No'>No</option>
                                    </select>
                                </div>
                                <button class="btn btn-primary nextBtn btn-lg pull-right" type="button">Next</button>

                            </div>
                        </div>
                    </div>

                    <div class="row setup-content" id="step-4">
                        <div class="col-xs-12">
                            <div class="col-md-12">
                                <h3>Objectives</h3>
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
                                <div class="clearfix"></div>
                                <button class="btn btn-primary nextBtn btn-lg pull-right" type="button">Next</button>
                            </div>
                        </div>
                    </div>                    
                    <div class="row setup-content" id="step-5">
                        <div class="col-xs-12">
                            <div class="col-md-12 ">
                                <h3>Bank Account details</h3>
                                <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <label class="control-label">Bank Name </label>
                                    <input type="text" class="form-control" id="bankname" name="bankname" placeholder="Enter Bank Name />
                                </div>
                                <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <label class="control-label">Bank A/C number</label>
                                    <input type="text" class="form-control" id="banknumber" name="banknumber" placeholder="Enter Bank A/c number" />
                                </div>
                                <div class="clearfix"></div>
                                <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <label class="control-label">Bank IFSC code </label>
                                    <input type="text" class="form-control" id="bankifsc" name="bankifsc" placeholder="Enter Bank IFSC code" />
                                </div>
                                <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                    <label class="control-label">Bank Branch </label>
                                    <input type="text" class="form-control" id="bankbranch" name="bankbranch" placeholder="Enter Bank Branch" />
                                </div>
                                <div class="clearfix"></div>
                                <!--<button class="btn btn-success btn-lg" id="viewnsubmit" type="submit">View & Submit</button>-->
                                <button class="btn btn-success btn-lg pull-right" type="submit">Submit</button>
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
            dateFormat: "d M, y",
            yearRange: '-50y:-18y'
        });
    });
    
    $( "#datepicker" ).datepicker( "option", "dateFormat", $( this ).val() );
</script>
