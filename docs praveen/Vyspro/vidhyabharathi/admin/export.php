<?PHP

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
//include_once '../common/header.php';
if (isset($_SESSION['search'])) {    

    $applicationNumber = $_SESSION['search']['application_number'];
    $name = $_SESSION['search']['studentname'];
    $surname = $_SESSION['search']['studentsurname'];
    $applicationType = $_SESSION['search']['type'];
    $emailid = $_SESSION['search']['email'];

    if ($applicationNumber != '') {
        $whereCondition = " and application_number like '$applicationNumber'";
    }
    if ($name != '') {
        $whereCondition .= " and name like '$name'";
    }
    if ($surname != '') {
        $whereCondition .= " and surname like '$surname'";
    }
    if ($applicationType != '') {
        $whereCondition .= " and applying_for like '$applicationType'";
    }
    if ($emailid != '') {
        $whereCondition .= " and email like '$emailid'";
    }
}
//echo "<pre>";
$select = "select applying_for,application_number,surname,name,photo,email,dob,phone_number,parent_name,occupation,"
        . "parent_phone,mothername,motheroccupation,mother_phone,gothram,referer,referername,address,"
        . "street,city,state,pincode,cfaddress,cstreet,ccity,cstate,cpincode,latest_class_completed,month,year,"
        . "classname,totalmarks,totalmarksobtained,marksinsubject,hallticketnumber,schooladdresspincode,marksobtained,"
        . "percentagemarks,marks_obtained,marks_proof_certificate,name_of_school,school_address,current_studying,annual_income,Annual_Income_certificate,"
        . "other_scholarships,vyspro_scholarship,vyspro_scholarship_year,parents_in_vyspro,aims,future_interests_help,joinvyspro,bankstudentname,"
        . "bank_name,account_number,ifsc_code,bank_branch,student_status,approval_status,submisstion_date from vb_users where 1=1 and applying_for in ('merit','scholarship') $whereCondition order by id";
//print_r($conn);
$result = $conn->query($select);
$columnHeader = '';
$columnHeader = "Applying For"."\t "."Reference Number"."\t "."surname"."\t "."name"."\t "."photo"."\t "."email"."\t "."DOB"."\t "."Phone Number"."\t "."Father/Guardian Name"."\t "."Father Occupation"."\t "." Father/Guardian Phone Number"."\t "."Mother Name"."\t "."Mother Occupation"."\t "."Mother Phone Number"."\t "."Gothram"."\t "."How do you know about Vidhya Bharathi?"."\t "."Referred by (Name / organisation Name)"."\t "."P Address 1"."\t "."p Address 2"."\t "."P City"."\t "."P State"."\t "."P Pincode"."\t "."c address1 "."\t "."c Address 2"."\t "."c city"."\t "."c state"."\t "."c pincode"."\t "."Latest class completed"."\t "."Month (year of Passing)"."\t "."Year (year of Passing)"."\t "."classname"."\t "."totalmarks"."\t "."totalmarksobtained"."\t "."marksinsubject"."\t "."Hall Ticket Number"."\t "."schooladdresspincode"."\t "."Marks obtained"."\t "."Percentage of marks"."\t "."Marks obtained"."\t "."Marks list Certificate / proof"."\t "."Name of the School / Collage / Institution"."\t "."Address of the School / Collage / Institution"."\t "."Presently studying"."\t "."Annual income"."\t "."Annual Income certificate"."\t "."Any other scholarships received"."\t "."Did you receive scholarship from Vyspro-India"."\t "."Year of latest scholarship received"."\t "."Are your Parent / Guardian is a member of any Vysya Association"."\t "."Aims/Goals"."\t "."Are you interested to help financially needy / merit students in future?"."\t "."Are you willing to join Vyspro-India?"."\t "."Student / Beneficiary Name (as per bank account)"."\t "."Bank Name"."\t "."Bank A/C number"."\t "."Bank IFSC code"."\t "."Bank Branch"."\t "."student status"."\t "."approval status"."\t "."submisstion date\t";
$setData = '';
while ($rec = $result->fetch_assoc()) {
    $rowData = '';
    foreach ($rec as $value) {
        $value = '"' . $value . '"' . "\t";
        $rowData .= $value;
    }
    $setData .= trim($rowData) . "\n";
}

header("Content-type: application/octet-stream");  
header("Content-Disposition: attachment; filename=User_Detail_Reoprt.xls");  
header("Pragma: no-cache");  
header("Expires: 0");  
  
echo ucwords($columnHeader) . "\n" . $setData . "\n";

//echo ucwords($columnHeader) . "\n" . $setData . "\n";
?>  