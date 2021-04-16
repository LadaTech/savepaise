<?php
session_start();
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
    .custom-bullet li {
        display: block;
    }

    .custom-bullet li:before
    {
        /*Using a Bootstrap glyphicon as the bullet point*/
        content: "\e080";
        font-family: 'Glyphicons Halflings';
        font-size: 9px;
        float: left;
        margin-top: 4px;
        margin-left: -17px;
        color: #CCCCCC;
    }
    ul{
        margin-left: 30px;
    }
    li ol{
        margin:0 30px;
        list-style-type: lower-alpha;
    }
    ol{
        list-style-type: decimal;
        margin-left: 40px;
    }
    li{
        padding: 5px 0px;
    }

</style>
<section class="page">  
    <div class="container">
        <h3 style="color: #D70000; font-weight: bold;">VYSPRO-INDIA Vidya Bharathi 2019 Scholarship List</h3>
        <div class="row formContainer"> 
            <br />
            <!--            <h3 style="color: #D70000; font-weight: bold; text-align: center;">Online application submission is closed,<br />
                            Thank you for submitting the Online Application for Merit Award/Scholarship. Please ensure to send the physical 
                            copy of application along with relevant enclosures on or before 13th Dec 2019. Applications received AFTER 13th 
                            Dec 2019 can not be considered for validation purpose.</h3>-->

            <h3 style="color: green; font-weight: bold; text-align: center;">Congratulations...,</h3><br />
            <p>Dear Students, <br />

                We are happy to announce that applications received for Scholarship has been finalized and selected eligible Students, refer below attached list. 
                In this connection, we request you to please send your bank account details along with proof (self-signed copy of cancelled cheque or passbook or latest bank statement having details of the account number, name of the beneficiary, IFSC code etc)
            </p> 
            <br />
            <p> Use the below process upload the proof by tracking your application</p>

            <br />
            <span style="font-weight:bold">Process/procedure:</span>
            <ol>

                <li>Open the URL: https://tinyurl.com/vysprotrack</li>
                <li>Enter the Reference number and Email id</li>
                <li>Click on Track Button.</li>
                <li>if your application status is Approved then upload your bank proof ( self-signed copy of cancelled cheque or passbook )</li>
                <li>click on submit.</li>
            </ol>
            <p> Please ensure all particulars before you are sending and Vyspro-India is not responsible for wrong information provided.</p>
            <br />
            <p>
                Below is the list of students you selected fro scholarship

            </p>

            <iframe src="/uploads/VVB 2019_Scholarship_List.pdf" width="100%" height="600"></iframe>

            <div class="col-8">

                <!--                <h3>Instructions to fill application</h3>
                
                                <ol>
                                    <li>Please have all the documents handy for uploading in the application
                                        <ol>
                                            <li>Photo</li>
                                            <li>Academic records</li>
                                            <li>Income certificate (mandatory for scholarship) </li>
                                        </ol>
                                    </li>
                                    <li>Application for Merit Award & Scholarship are separate and Student shall choose appropriate Application as per his/her requirement. Students applying for both Merit Award and Scholarship shall apply separately. Common application for both is not considered for validation</li>
                                    <li>Eligibility for applying Scholarship, Student shall:
                                        <ol>
                                            <li>belong to Arya Vysya Community</li>
                                            <li>be economically poor</li>
                                            <li>fill application, with valid & true information, completely in all respects; and </li>
                                            <li>enclose list of documents as per point no.3 given below</li>                
                                        </ol>
                                    </li>
                                    <li>List of documents required for Scholarship:
                                        <ol>
                                            <li>Latest Marks list duly attested by any Office Bearer of Arya Vysya Organization with Seal or any Vyspro-India Member (Membership Number mandatory) .</li>
                                            <li>Income Proof of Father / Mother / Family /Guardian </li>
                                            <li>Address proof </li>
                                            <li>Proof of studying the Professional course</li>
                                        </ol>
                                    </li>
                
                                    <li>Eligibility for applying Merit Award, Student shall:
                                        <ol>
                                            <li>belong to Arya Vysya Community</li>
                                            <li>be passed exam results received during the period between Nov 2018 to Nov 2019 and classes/categories mentioned in the application (SSC/ Intermediate/ Degree/ CA/ CMA/ CS/ MBBS/ Engineering/ LLP/ LLM/ MBA/ MCA)</li> 
                                            <li>fill application, with valid & true information, completely in all respects; and</li>
                                            <li>enclose list of documents as per point no.5 given below</li> 
                                        </ol>
                                    </li>
                
                                    <li>List of documents required for Merit Award:
                                        <ol>
                                            <li>Copy of Mark list duly attested by School/ College/ Principal/ any Office Bearer of Arya Vysya Organization with seal</<li>
                                            <li>Address proof</li>
                                        </ol>
                                    </li>
                
                                    <li>Improper/incomplete application, incorrect information/documents and applications without attestation shall not be considered.</li>
                
                                    <li>Last date for filling ONLINE Application is <span style="font-weight:bold;">10th December, 2019</span></li>
                
                                    <li>Duly filled in application along with required list of documents shall reach to the address given below on or before 13th December 2019. <span style="font-weight:bold;">Applications received AFTER 13th December 2019 shall not be considered.</span></li>
                                    <span style="padding-left:20px; font-weight: bold; text-decoration: underline; ">Postal Address:</span>
                
                                    <p style="padding-left:50px; font-weight: bold;">CA Ramesh Babu Kollipara <br />
                                        House No.13-1-70/1,<br />
                                        Flat No.101, Kolan Laxmi Nivas,<br />
                                        Motinagar Extension Road,<br />
                                        Opposite Chinnari Kids Play School Road,<br />
                                        Motinagar, Hyderabad – 500 018.<br />
                                    </p>
                                    </li>-->
                <li>For any clarifications you may reach below given Project Committee Members:
                    <table class="table table-condensed">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>WhatsApp Number</th>
                                <th>Name</th>
                                <th>Number</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="2" style="font-weight:bold">Project Chairman:</td>
                                <td colspan="2" style="font-weight:bold">Advisors:</td>
                            </tr>
                            <tr >
                                <td style="padding-left:30px;">CA Ramesh Babu Kollipara</td>
                                <td>970 191 1117</td>
                                <td style="padding-left:30px;">CA P. Rajeswara Rao</td>
                                <td>984 901 0903</td>                                    
                            </tr>
                            <tr>
                                <td colspan="2" style="font-weight:bold">Project Co-Chairmen:</td>  
                                <td style="padding-left:30px;">CA G V Ramavataram </td>
                                <td>040 40269230</td>
                            </tr>
                            <tr>
                                <td style="padding-left:30px;">CA Leela Krishna Mohan Kota</td>
                                <td>905 220 8181</td>
                                <td style="padding-left:30px;">CA S. Surya Prakash </td>
                                <td>939 168 6797</td>            
                            </tr>
                            <tr>
                                <td style="padding-left:30px;">CA Vijay Kalimicherla</td>
                                <td>900 000 1253</td>
                                <td style="padding-left:30px;">CA S. Narayana Murthy</td>
                                <td>984 824 3715</td>
                            </tr>
                            <tr>
                                <td style="padding-left:30px;">CA Labhishetty Praneeth Kumar</td>
                                <td>939 300 7237</td>
                                <td style="padding-left:30px;"></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td style="padding-left:30px;">Praveen Kumar Bolisetty, <span style="font-size:10px;">MCA</span> (Technical support)</td>
                                <td>998 519 0066</td>
                                <td style="padding-left:30px;"></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </li>
                <!--                    <li>For any Technical Assistance relating to online application:
                                        <ol>
                                            <li>Email: <a href="mailto:database.vysproindia@gmail.com"> database.vysproindia@gmail.com</a></li>
                                            <li>WhatsApp: 944 182 0017</li>
                                        </ol>
                                    </li>-->
                </ol>
<!--                <p style="font-weight:bold; color:red; font-style: italic;">
                    Note:<br /> 1. Please provide your full name / online application reference number for any queries / clarifications<br />
                    2. Strictly communication if any through WhatsApp message only.<br />
                    3. Don't refresh the page or close the page.                         
                </p>-->

                <!--                <form role="form" id="applyingnform" class="form" name="applyingnform" method="post" action="form.php" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <div class="col-md-12">
                                                <label class="control-label">Applying for</label><br />
                                                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                                    <input type="radio" class="form-check-input" required="required" <?PHP
                if ($_SESSION['users']['applying_for'] == "merit") {
                    echo "checked='checked'";
                }
                ?> id="applying_for1" name="applying_for" value="merit" />
                                                    <label class="form-check-label" for="materialInline1">MERIT AWARD</label>
                                                </div>
                
                                                 Material inline 2 
                                                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                                    <input type="radio" class="form-check-input" required="required" <?PHP
                if ($_SESSION['users']['applying_for'] == "scholarship") {
                    echo "checked='checked'";
                }
                ?> id="applying_for2" name="applying_for" value="scholarship" />
                                                    <label class="form-check-label" for="materialInline2">SCHOLARSHIP</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p style="font-style:italic;">By clicking on Proceed, you are agreeing to abide by the rules framed by VYSPRO-INDIA</p>
                                    <input class="btn btn-primary nextBtn btn-lg pull-right" id='applyingbutton' name="applyingbutton" type="submit" value="Proceed" />
                                </form>-->
            </div>
            <!--<a href="/tracking.php" class="btn btn-success btn-lg" type="button">Track your filled application</a>-->
        </div>
    </div>
</section>
<?PHP
include_once 'common/footer.php';
?>
