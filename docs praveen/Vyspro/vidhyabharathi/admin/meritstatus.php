<?php
session_start();
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL);
if (!isset($_SESSION['adminusername'])) {
    header("location:/admin/login.php");
    exit;
}
$headerTitle = 'Students';
include_once '../common/logs.php';
include_once '../common/db.php';
include_once '../common/header.php';
$referenceID = $_REQUEST['id'];
if ($referenceID == "") {
    header("location:/admin/login.php");
    exit;
}
?>
<style type="text/css">
    .titlelogo{
        color:red;
    }
    .page{
        width:680px;
    }
    .labeltext{
        font-weight:bold;
        padding-left:10px;
        vertical-align:top;
    }
    .coluntd{
        padding:0 5px;
        vertical-align:top;
        width:20px;
    }
    .labelvalue{
        margin-left:10px;
        text-align:left;
    }
    .cattitle{
        text-align:center;
        font-weight:bold;
        color:#D70000;
        font-size: 16px;
    }
    ul li{
        text-align:left;
    }
    .names{
        font-weight:bold;
    }
    .clearfix:after {
        content: " ";
        visibility: hidden;
        display: block;
        height: 0;
        clear: both;
    }

    .fundlist table {
        border-collapse: collapse;
    }

    tr {
        border: 1px solid black;
        /*padding-left:10px;*/
        padding:7px;
    }

</style>
<section class="">  
    <div class="container">
        <h3 style="color: #D70000;">Vyspro-India Vidhya Bharati 2019 Applications</h3>
        <div class="row">     
            <div class="col-md-12 formContainer clearfix">
                <?PHP
//                echo "<pre>";
                $select = "select * from vb_users where application_number = '$referenceID'";
                $result = $conn->query($select);

                if ($result->num_rows > 0) {
                    // output data of each row
                    while ($usersdata = $result->fetch_assoc()) {
//                        print_r($usersdata);
//                        echo "</pre>";
                        ?>
                        <table style="width:100%">
                            <tr>
                                <td>Submitted on: <span style="font-weight:bold; color:#D70000;"><?PHP echo $usersdata["submisstion_date"]; ?></span></td>
                                <td>Reference Number: <span style="font-weight:bold; color:#D70000;"><?PHP echo $referenceID; ?></span></td>
                                <td>Present Status: <span style="font-weight:bold; color:#D70000;"><?PHP echo $usersdata["student_status"]; ?></span></td>
                            </tr>
                            <tr>
                                <td colspan="3" class="cattitle">Personal Information</td>
                            </tr> 
                            <tr>                                
                                <td class="labeltext">Surname</td>
                                <td class="coluntd">:</td>
                                <td class="labelvalue"><?PHP echo $usersdata["surname"]; ?></td>
                            </tr>
                            <tr>
                                <td class="labeltext">Photo</td>
                                <td class="coluntd">:</td>
                                <td class="labelvalue"><a href="/uploads/<?PHP echo $usersdata[photo]; ?>" target="_blank" ><img width="80px" src="/uploads/<?PHP echo $usersdata[photo]; ?>" /></a></td>
                            </tr>
                            <tr>
                                <td class="labeltext">Name</td>
                                <td class="coluntd">:</td>
                                <td class="labelvalue"><?PHP echo $usersdata["name"]; ?></td>
                            </tr>
                            <tr>
                                <td class="labeltext">Date of Birth</td>
                                <td class="coluntd">:</td>
                                <td class="labelvalue"><?PHP echo $usersdata["dob"]; ?></td>
                            </tr>
                            <tr>
                                <td class="labeltext">Email</td>
                                <td class="coluntd">:</td>
                                <td class="labelvalue" ><?PHP echo $usersdata["email"]; ?></td>                       

                            </tr>
                            <tr>
                                <td class="labeltext">Phone Number</td>
                                <td class="coluntd">:</td>
                                <td class="labelvalue"><?PHP echo $usersdata["phone_number"]; ?></td>
                            </tr>
                            <tr>
                                <td class="labeltext">Father/Guardian Name</td>
                                <td class="coluntd">:</td>
                                <td class="labelvalue"><?PHP echo $usersdata["parent_name"]; ?></td>
                            </tr>
                            <tr>
                                <td class="labeltext">Occupation</td>
                                <td class="coluntd">:</td>
                                <td class="labelvalue"><?PHP echo $usersdata["occupation"]; ?></td>
                            </tr>
                            <tr>      
                                <td class="labeltext">Father/Guardian Phone Number</td>
                                <td class="coluntd">:</td>
                                <td class="labelvalue"><?PHP echo $usersdata["parent_phone"]; ?></td>
                            </tr>
                            <tr>
                                <td class="labeltext">Mother Name</td>
                                <td class="coluntd">:</td>
                                <td class="labelvalue"><?PHP echo $usersdata["mothername"]; ?></td>
                            </tr>
                            <tr>
                                <td class="labeltext">Mother Occupation</td>
                                <td class="coluntd">:</td>
                                <td class="labelvalue"><?PHP echo $usersdata["motheroccupation"]; ?></td>
                            </tr>
                            <tr>
                                <td class="labeltext">Mother Phone Number</td>
                                <td class="coluntd">:</td>
                                <td class="labelvalue"><?PHP echo $usersdata["mother_phone"]; ?></td>
                            </tr>
                            <tr>      
                                <td class="labeltext">Gothram</td>
                                <td class="coluntd">:</td>
                                <td class="labelvalue"><?PHP echo $usersdata["gothram"]; ?></td>
                            </tr>
                            <tr>
                                <td class="labeltext">Permanent Address</td>
                                <td class="coluntd">:</td>
                                <td class="labelvalue" colspan="3"><?PHP echo $usersdata["faddress"]; ?>, <?PHP echo $usersdata["street"]; ?>,<br /> <?PHP echo $usersdata["city"]; ?> <?PHP echo $usersdata["pincode"]; ?> <?PHP echo $usersdata["state"]; ?></td>
                            </tr>
                            <tr>
                                <td class="labeltext">Communication Address</td>
                                <td class="coluntd">:</td>
                                <td class="labelvalue" colspan="3"> <?PHP echo $usersdata["cfaddress"]; ?>, <?PHP echo $usersdata["cstreet"]; ?>,<br /> <?PHP echo $usersdata["ccity"]; ?> <?PHP echo $usersdata["cpincode"]; ?> <?PHP echo $usersdata["cstate"]; ?></td>
                            </tr>   
                            <tr>
                                <td colspan="3" style="width:100%; border-bottom:2px solid black;">&nbsp;</td>                                   
                            </tr>
                            <tr>
                                <td colspan="3" class="cattitle">Education Details</td>
                            </tr>                            
                            <tr>

                                <td class="labeltext">Subject / Class</td>
                                <td class="coluntd">:</td>
                                <td class="labelvalue"><?PHP echo $usersdata["classname"]; ?></td>
                            </tr>
                            <tr>

                                <td class="labeltext">Total Marks</td>
                                <td class="coluntd">:</td>
                                <td class="labelvalue"><?PHP echo $usersdata["totalmarks"]; ?></td>
                            </tr>
                            <tr>

                                <td class="labeltext">Total Marks Obtained</td>
                                <td class="coluntd">:</td>
                                <td class="labelvalue"><?PHP echo $usersdata["totalmarksobtained"]; ?></td>
                            </tr>
                            <tr>

                                <td class="labeltext">Marks in Maths</td>
                                <td class="coluntd">:</td>
                                <td class="labelvalue"><?PHP echo $usersdata["marksinsubject"]; ?></td>
                            </tr>                       
                            <tr>
                                <td class="labeltext">Latest class completed</td>
                                <td class="coluntd">:</td>
                                <td class="labelvalue"><?PHP echo $usersdata["latest_class_completed"]; ?></td>
                            </tr>
                            <tr>
                                <td class="labeltext">Month - Year</td>
                                <td class="coluntd">:</td>
                                <td class="labelvalue"><?PHP echo $usersdata["month"] . " - " . $usersdata["year"]; ?></td>
                            </tr>
                            <tr>
                                <td class="labeltext">Marks obtained/Total Marks</td>
                                <td class="coluntd">:</td>
                                <td class="labelvalue"><?PHP echo $usersdata["totalmarksobtained"]; ?></td>
                            </tr>
                            <tr>
                                <td class="labeltext">Name of school / Collage / Institution</td>
                                <td class="coluntd">:</td>
                                <td class="labelvalue"><?PHP echo $usersdata["name_of_school"]; ?></td>
                            </tr>
                            <tr>
                                <td class="labeltext">School / Collage / Institution Address</td>
                                <td class="coluntd">:</td>
                                <td class="labelvalue"><?PHP echo $usersdata["school_address"]; ?></td>
                            </tr>
                            <tr>
                                <td class="labeltext">Presently studying</td>
                                <td class="coluntd">:</td>
                                <td class="labelvalue"><?PHP echo $usersdata["current_studying"]; ?></td>
                            </tr>
                            <tr>
                                <td class="labeltext">Hall Ticket Number</td>
                                <td class="coluntd">:</td>
                                <td class="labelvalue"><?PHP echo $usersdata["hallticketnumber"]; ?></td>
                            </tr>
                            <tr>
                                <td class="labeltext">Marks list Certificate / proof</td>
                                <td class="coluntd">:</td>
                                <td class="labelvalue"><a href="/uploads/<?PHP echo $usersdata[marks_proof_certificate]; ?>" target="_blank" ><img width="80px" src="/uploads/<?PHP echo $usersdata[marks_proof_certificate]; ?>" /></a></td>s
                            </tr>
                            <tr>
                                <td colspan="3" style="width:720px; border-bottom:2px solid black;">&nbsp;</td>                                  
                            </tr>
                            
                            <tr>
                                <td colspan="3" class="cattitle">Objectives</td>
                            </tr>
                            <tr>
                                <td class="labeltext">Aims/Goals</td>
                                <td class="coluntd">:</td>
                                <td class="labelvalue"><?PHP echo $usersdata["aims"]; ?></td>
                            </tr>
                            <tr>
                                <td class="labeltext">Are you interested to help <br /> financially needy / merit students in future?</td>
                                <td class="coluntd">:</td>
                                <td class="labelvalue"><?PHP echo $usersdata["future_interests_help"]; ?></td>
                            </tr>
                            <tr>
                                <td class="labeltext">Are you willing to join Vyspro-India?</td>
                                <td class="coluntd">:</td>
                                <td class="labelvalue"><?PHP echo $usersdata["joinvyspro"]; ?></td>
                            </tr>
                            <tr>
                                <td class="labeltext">How do you know about Vidhya Bharathi?</td>
                                <td class="coluntd">:</td>
                                <td class="labelvalue"><?PHP echo $usersdata["referer"]; ?></td>
                            </tr>
                            <tr>
                                <td class="labeltext">Referred by (Name / organisation Name)</td>
                                <td class="coluntd">:</td>
                                <td class="labelvalue"><?PHP echo $usersdata["referername"]; ?></td>
                            </tr> 
                            <tr>
                                <td colspan=3>&nbsp;</td>
                            </tr>
                            <tr>
                                <td colspan="3" class="cattitle">Status</td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <form id="changestatsform" name="changestatsform" class="form-inline" method="post" action="/admin/statuschange.php">
                                        <table style="width:100%;" class="formt">
                                            <tr>
                                                <td class="labeltext">Submitted Date</td>
                                                <td class="coluntd">: </td>
                                                <td class="labelvalue"><?PHP echo $usersdata["submisstion_date"] ?></td>
                                            </tr>
                                            <tr>
                                                <td class="labeltext">Student Status </td>
                                                <td class="coluntd">: </td>
                                                <td class="labelvalue"><?PHP echo $usersdata["student_status"] ?></td>
                                            </tr>
                                            <tr>
                                                <td class="labeltext">Vyspro-India Status </td>
                                                <td class="coluntd">: </td>
                                                <td class="labelvalue"><?PHP echo $usersdata["approval_status"]; ?></td>
                                            </tr>
                                            <tr>
                                                <td class="labeltext">Change Status </td>
                                                <td class="coluntd">: </td>
                                                <td class="labelvalue"> 
                                                    <input type="hidden" id="refID" name="refID" value="<?PHP echo $referenceID; ?>" />
                                                    <select class="form-control" id="vysprostatus" name="vysprostatus" onchange="updatestudentstatus()">
                                                        <option value="">--Select--</option>
                                                        <option value="Duplicate">Duplicate</option>
                                                        <option value="Document Received">Document Received</option>
                                                        <option value="Online Application verified & approved">Online Application verified & approved</option>
                                                        <option value="Online Application verified & Rejected">Online Application verified & Rejected</option> 
                                                        <option value="Hard copy Application verified & approved">Hard copy Application verified & approved</option> 
                                                        <option value="Hard copy Application verified & Rejected">Hard copy Application verified & Rejected</option>
                                                        <option value="Application Approved">Application Approved</option>
                                                        <option value="Application Rejected">Application Rejected</option>
                                                    </select>
                                                    <br /><br /><br />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="labeltext">Change Status </td>
                                                <td class="coluntd">: </td>
                                                <td class="labelvalue"> 
                                                    <textarea id="comment" name="comment"class="form-control" rows="4" cols="50"></textarea>
                                                    <br /><br />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="labeltext">History </td>
                                                <td class="coluntd">: </td>
                                                <td class="labelvalue"> 
                                                    <?PHP echo $usersdata['comment']; ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="labeltext"></td>
                                                <td class="coluntd"></td>
                                                <td class="labelvalue">
                                                    <input type="submit" id="submitchange" class="btn btn-primary nextBtn btn-lg pull-right" name="submitchange" value="Update Status" />
                                                </td>
                                            </tr>
                                        </table>
                                    </form>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <?PHP
                }
            } else {
                echo "No Application received";
            }
            ?>
        </div>
    </div>
</section>
<?PHP
include_once '../common/footer.php';
?>
