<?php

session_start();
$headerTitle = 'APPLICATION FOR MERIT AWARD / SCHOLARSHIP ';
include_once 'common/logs.php';
include_once 'common/db.php';
include_once 'common/functions.php';

ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL);

//echo "<pre>";
////print_r($_FILES['photo']);
//print_r($_SESSION);
//print_r($_POST);
//echo "<pre>";
//exit;
$row_cnt = 0;
if (isset($_POST)) {
    $outpost = cleanMe($_POST, $conn);

    $selectcheck = "select * from vb_users where email ='$outpost[email]' and phone_number = '$outpost[phone]' "
            . " and applying_for = '$outpost[applying_for]' ";
    $resultselect = $conn->query($selectcheck);
//    echo '<br />';
    $row_cnt = $resultselect->num_rows;

    if ($outpost["applying_for"] == 'merit') {
        $checkcount = 1;
    } else {
        $checkcount = 0;
    }
//    echo "<br />check count: - $checkcount <br />";
    if ($row_cnt > $checkcount) {
        while ($rowselect = $resultselect->fetch_assoc()) {
            $applicationNumberID = $rowselect['application_number'];
            break;
        }
//        header("location:thanks.php?id=$applicationNumberID&a=$outpost[applying_for]");
//        exit;
    }
//    exit;



    $str = $outpost['latestmonth'];
    $strVal = explode("-", $str);
    $month = $strVal[0];
    $year = $strVal[1];
    $dob = $outpost[dob];
    $time = strtotime($dob);
    $newformatDOB = date('Y-m-d', $time);
    $approvalStatus ='<p> date("Y-m-d"):: student online application Received </p>';

    $insert = "insert into vb_users ("
            . "applying_for,surname,name,email,dob,phone_number,parent_name,occupation,parent_phone,"
            . "mothername,motheroccupation,mother_phone,"
            . "gothram,referer,referername,"
            . "address,street,city,state,pincode,"
            . "cfaddress,cstreet,ccity,cstate,cpincode,"
            . "latest_class_completed,month,year,marks_obtained,name_of_school,school_address,hallticketnumber,"
            . "marksobtained,percentagemarks,current_studying,annual_income,"
            . "classname,totalmarks,totalmarksobtained,marksinsubject,"
            . "other_scholarships,vyspro_scholarship,vyspro_scholarship_year,parents_in_vyspro,"
            . "aims,future_interests_help,joinvyspro,"
            . "bankstudentname,bank_name,account_number,ifsc_code,bank_branch,submisstion_date,"
            . "comment,approval_status,student_status"
            . ")"
            . " values "
            . "('$outpost[applying_for]','$outpost[surname]','$outpost[name]','$outpost[email]','$newformatDOB','$outpost[phone]','$outpost[parentname]','$outpost[parentoccupation]','$outpost[parentphone]',"
            . "'$outpost[mothername]','$outpost[motheroccupation]','$outpost[motherphone]',"
            . "'$outpost[gothram]','$outpost[referer]','$outpost[referername]',"
            . "'$outpost[faddress]','$outpost[street]','$outpost[city]','$outpost[state]','$outpost[pincode]',"
            . "'$outpost[cfaddress]','$outpost[cstreet]','$outpost[ccity]','$outpost[cstate]','$outpost[cpincode]',"
            . "'$outpost[latestclass]','$month','$year','$outpost[marks]','$outpost[schoolname]','$outpost[schooladdress]','$outpost[hallticketnumber]',"
            . "'$outpost[marksobtained]','$outpost[percentagemarks]','$outpost[presentlystudying]','$outpost[annualincome]',"
            . "'$outpost[classname]','$outpost[totalmarks]','$outpost[totalmarksobtained]','$outpost[marksinsubject]',"
            . "'$outpost[otherscholorships]','$outpost[vysprocholorships]','$outpost[vysprocholorshipsyear]','$outpost[vysproparent]',"
            . "'$outpost[aim]','$outpost[futurehelp]','$outpost[joinvyspro]',"
            . "'$outpost[bankstudentname]','$outpost[bankname]','$outpost[banknumber]','$outpost[bankifsc]','$outpost[bankbranch]',now(),"
            . "'$approvalStatus','Received online application','Yet to receive Physical copies'"
            . ")";
    $insertstatus = $conn->query($insert);
//    echo $log = "Query  - " . $insert . PHP_EOL;
    insertlogs($log);
//    exit;
    if ($insertstatus) {

//    echo "<br />";
        $insertId = $conn->insert_id;
        $log = $insertId . ' insert done - ' . $mail->ErrorInfo . PHP_EOL;
        insertlogs($log);
        $ids = str_pad($insertId, 6, '0', STR_PAD_LEFT);
        if ($outpost[applying_for] == 'merit') {
            $applicationNumber = 'VBM' . $ids;
        } else {
            $applicationNumber = 'VBS' . $ids;
        }

        $_SESSION['insertId'] = $applicationNumber;
//        print_r($_SESSION);
        $_SESSION['users']['applying_for'] = $_POST['applying_for'];

        $usersdata = $_SESSION['users'];
        $photoPath = $_SESSION[users][photo];
        $annualincomeproofPath = $_SESSION[users][annualincomeproof];
        $markslistPath = $_SESSION[users][markslist];
        $update = "update vb_users set application_number = '$applicationNumber', photo = '$photoPath',Annual_Income_certificate='$annualincomeproofPath',marks_proof_certificate='$markslistPath' where id = $insertId";
        $conn->query($update);
        $log = $applicationNumber . ' application number updated - ' . $mail->ErrorInfo . PHP_EOL;
        insertlogs($log);
//        print_r($usersdata);
//        exit;
        if ($usersdata['applying_for'] == 'merit') {
            require_once 'meritpdf.php';
            $thanksTitle = "Thank you for Submitting Merit Award Application";
            $emailoptions = '<li>Copy of Marks List Duly Attested by School / College Principal / any Office bearer of Vyspro organisation with stamp</li>';
        } else if ($usersdata['applying_for'] == 'both') {
            $thanksTitle = "Thank you for Submitting Merit Award Application & Scholorship";
        } else if ($usersdata['applying_for'] == 'scholarship') {
            uploadFiles($_FILES['files']['annualincomeproofEdit'], 'annualincomeproof', $applicationNumber);
            require_once 'scholarshippdf.php';
            $thanksTitle = "Thank you for Submitting scholarship Application";
            $emailoptions = '<li>Duly attested Latest Marks list (mandatory)</li>
                                                    <li>Proof of studying Professional course</li>
                                                    <li>Parent / Guardian income Proof</li>';
        }

//        sleep(3);
//        $toUser = "praveenkumar.bolisetty@gmail.com";
        $toUser = $outpost['email'];
        $subject = $_SESSION['insertId'] . " - Welcome " . $outpost['surname'] . " " . $outpost['name'];

        $message = file_get_contents('email.php');
        $message = str_replace('%%%thanksTitle%%%', $thanksTitle, $message);
        $message = str_replace('%%%referenceID%%%', $applicationNumber, $message);
        $message = str_replace('%%%listofdocucuments%%%', $emailoptions, $message);
        $attachment = 'pdf/' . $_SESSION['insertId'] . '.pdf';
        $log = $applicationNumber . ' sending email inisitated - ' . $mail->ErrorInfo . PHP_EOL;
        insertlogs($log);
        $statusemail = sendGmail($toUser, $subject, $message, $attachment);
        $log = $applicationNumber . ' email status: ' . $mail->ErrorInfo . PHP_EOL;
        insertlogs($log);

//echo "</pre>";
//print_r($_SESSION);
        unset($_SESSION['users']);
        unset($_SESSION['files']);
        $_POST = array();
        unset($_POST);
    } else {
//    echo "dsfdsf";
        echo "<script>window.location.href = '/?s=fail';</script>";
        exit;
    }
    header("location:thanks.php?id=$applicationNumber&a=$outpost[applying_for]");
    exit;
}
?>
