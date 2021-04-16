<?php

define('ROOTPATH', dirname(__FILE__));

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

class commonfunction {

    function __construct() {
        include_once ROOTPATH . '/config.php';
        $this->conn = $conn;
    }

    public function uploadFiles($imageFile, $usename = '', $uploadDirectory = 'uploads') {
//        print_r($imageFile);
        $currentDir = $_SERVER['DOCUMENT_ROOT'];
        $uploadDirectory = "/" . $uploadDirectory . "/";
        $fileName = $imageFile['name'];
        $fileSize = $imageFile['size'];
        $fileTmpName = $imageFile['tmp_name'];
        $fileType = $imageFile['type'];
        $fileExtension = strtolower(end(explode('.', $fileName)));
        $txnid = rand(1, 100000000) . rand(10, 2000);
//    echo '<br />';
        $uploadPath = $currentDir . $uploadDirectory . $txnid . '_' . $usename . '_' . basename($fileName);
//    echo '<br />';
        $didUpload = move_uploaded_file($fileTmpName, $uploadPath);
//        print_r($didUpload);
        if ($didUpload) {
//        $_SESSION['users'][$feildName] = $usename . '_' . basename($fileName);
            return $txnid . '_' . $usename . '_' . basename($fileName);
        } else {
            return "uploadfail";
        }
    }

    public function insertlogs($log) {
        $logtext = date("F j, Y, g:i a") . ' ' . $log;
        $server = $_SERVER["SERVER_SOFTWARE"];
        $currentDir = $_SERVER['DOCUMENT_ROOT'];
        $server_name = explode('/', $server);
        list($server_type, $server_version) = $server_name;
        if ($server_type == 'nginx') {
            file_put_contents('/var/log/nginx/payuform_' . date("j.n.Y") . '.txt', $logtext, FILE_APPEND);
        } else {
            file_put_contents($currentDir . '/logs/vyspro_' . date("j.n.Y") . '.txt', $logtext, FILE_APPEND);
        }
    }

    public function getEvents($id = '', $limit = 3) {
        $whereCond = '';
        if ($id != '') {
            $ids = $this->conn->real_escape_string($id);
            $whereCond = " and id = $ids ";
        }

        $sql = "select * from events where 1=1 $whereCond order by event_starttime desc limit $limit";
        $result = $this->conn->query($sql);
        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $events[] = $row;
            }
            return $events;
        }
        return 'No events';
    }

    public function getbulletin($id = '', $limit = 3) {
        $whereCond = '';
        if ($id != '') {
            $ids = $this->conn->real_escape_string($id);
            $whereCond = " and id = $ids ";
        }

        $sql = "select * from bulletin where 1=1 $whereCond order by bulletin_date desc limit $limit";
        $result = $this->conn->query($sql);
        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $events[] = $row;
            }
            return $events;
        }
        return 'No events';
    }

    public function getLifeMembers($id = '', $status = 'approved', $limit = 10) {
//    echo ROOTPATH;exit;
        $whereCond = '';
        if ($id != '') {
            $ids = $this->conn->real_escape_string($id);
            $whereCond = " and id = $ids ";
        }
        $events = '';

        $sql = "select * from members where 1=1 $whereCond and status = '$status' order by member_id desc limit $limit";
        $result = $this->conn->query($sql);
        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $events[] = $row;
            }
            return $events;
        }
        return 'No events';
    }

    public function updateMemberStatus($data, $id) {
        $comments = $data['comments'];
        $memberstatus = $data['memberstatus'];
        $newid = $data['membershipId'];
        $sql = "update members set member_id = $newid, comments = concat(comments, '$comments'), status = '$memberstatus' where id = $id";
        $status = $this->conn->query($sql);
//    if($status)
    }

    public function insetContactus($data) {
        $finaldata = $this->escapeArray($data);
        $insert = "insert into contactus (firstname, lastname,email_id,subject,description) values "
                . "('$finaldata[fname]','$finaldata[lname]','$finaldata[email]','$finaldata[subject]','$finaldata[message]')";
        $status = $this->conn->query($insert);
    }

    public function escapeArray($data) {
        foreach ($data as $key => $value) {
            $finalData[$key] = $this->conn->escape_string($this->conn->real_escape_string($value));
        }
        return $finalData;
    }

    public function sendGmail($toUser, $subject, $message, $attachment = '') {

        require_once './vendor/PHPMailer/vendor/autoload.php';

//Create a new PHPMailer instance
        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->SMTPDebug = 0;
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = "ssl";
        $mail->Port = 465;
        $mail->CharSet = "UTF-8";

        $mail->Username = "database.vysproindia@gmail.com"; // Gmail username
        $mail->Password = "vasavi@123456"; // Gmail pasword 
        $mail->setFrom("database.vysproindia@gmail.com", "Vyspro-India"); //  From address email id
        $mail->Subject = $subject;
//    $message = file_get_contents('email.html');    
        $mail->msgHTML($message);
        $mail->addAddress($toUser); // To address email id
        $mail->addBCC('simplykumar9@gmail.com');

        if ($attachment != '') {
            $file_to_attach = $attachment;
            $mail->AddAttachment($file_to_attach);
        }
        if (!$mail->send()) {
            return $mail->ErrorInfo;
        } else {
            return "Mail Sent";
        }
    }

    public function insetCheyutaCorona2020($data) {
        $finaldata = $this->escapeArray($data);
        $insert = "insert into corona2020 (lifemember, lmemail,lmnumber,bname,blastname,bnumber,"
                . "bphoto,fathername,bcaste,bdependents,boccupation,bproof_type,baddress,"
                . "bcity,proof,bproofupload,annualincome,bproofnumber,incomeproof)"
                . " values "
                . "('$finaldata[fname]','$finaldata[lmemail]','$finaldata[lmnumber]','$finaldata[bfname]','$finaldata[blname]','$finaldata[bnumber]',"
                . "'$finaldata[photo]','$finaldata[bfathername]','$finaldata[bcaste]','$finaldata[bdependents]','$finaldata[boccupation]','$finaldata[bproof]','$finaldata[baddress]',"
                . "'$finaldata[bcity]','$finaldata[bproof]','$finaldata[bproofupload]','$finaldata[bannualincome]','$finaldata[bproofnumber]','$finaldata[bincomeproof]')";

        $insertstatus = $this->conn->query($insert);
        if ($insertstatus) {
//    echo "<br />";
            $insertId = $this->conn->insert_id;
//            $log = $insertId . ' insert done - ' . $mail->ErrorInfo . PHP_EOL;
//            insertlogs($log);
            $applicationNumber = "C" . str_pad($insertId, 4, '0', STR_PAD_LEFT);
            $update = "update corona2020 set application_number = '$applicationNumber' where id = $insertId";
            $this->conn->query($update);
            return $applicationNumber;
        } else {
            return "Insert Fail";
        }
    }

    public function getBeneficiary($id = '', $limit = '100') {
//    echo ROOTPATH;exit;
        $whereCond = '';
        if ($id != '') {
            $ids = $this->conn->real_escape_string($id);
            $whereCond = " and id = $ids ";
        }
        $events = '';

        $sql = "select * from corona2020 where 1=1 and bname !='' $whereCond order by id desc";
        $result = $this->conn->query($sql);
        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $events[] = $row;
            }
            return $events;
        }
        return 'No events';
    }

    public function getBeneficiaryFields() {
//    echo ROOTPATH;exit;
        $sql = "select id,application_number,bname,blastname,lifemember from corona2020 where 1=1 and bname !='' order by id asc";
        $result = $this->conn->query($sql);
        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $events[] = $row;
            }
            return $events;
        }
        return 'No events';
    }

    public function sendBulksms($number, $message) {
        $username = "vysproindia";
        $password = "Praveen@1";
        $sender = 'Vyspro';

        $url = "login.bulksmsgateway.in/sendmessage.php?user=" . urlencode($username) . "&password=" . urlencode($password) . "&mobile=" . urlencode($number) . "&sender=" . urlencode($sender) . "&message=" . urlencode($message) . "&type=" . urlencode('3');
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $curl_scraped_page = curl_exec($ch);
//        print_r($curl_scraped_page);
//        exit;
        curl_close($ch);
    }

    public function getBeneficiaryStatus($daily = '', $byLM = '') {
        //    echo ROOTPATH;exit;
        $whereCond = '';
        if ($daily != '') {
            $groupBy = " group by date(created_date)";
            $orderBy = " order by date(created_date) desc";
            $fields = " count(*) total,date(created_date) status";
        }
        if ($byLM != '') {
            $groupBy = " group by lifemember";
            $orderBy = " order by count(*) desc";
            $fields = " count(*) total,lifemember status";
        }
        $events = '';

        $sql = "select $fields from corona2020 where 1=1 and lifemember !=''  $whereCond $groupBy $orderBy";
        $result = $this->conn->query($sql);
        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $events[] = $row;
            }
            return $events;
        }
        return 'No events';
    }

    public function updateBenstatus($cid, $status, $comment) {

        if ($status == 'verifail') {
            $ustatus = "Vefication Failed";
        } else if ($status == 'verifail') {
            $ustatus = "Vefication Approved";
        } else if ($status == 'approve') {
            $ustatus = "Benificary Approved";
        } else if ($status == 'reject') {
            $ustatus = "Benificary Rejected";
        }
        $statuss = ucwords($ustatus);
//        print_r($_SESSION);
        $update = "update corona2020 set status = '$statuss',"
                . "comment =concat(comment,' <p> " . date('d-m-Y H:i:s') . " :: user - $_SESSION[adminfullName] :: status - " . $statuss . ", :: comment:  " . $comment . "</p>') "
                . ", updated_by = '$_SESSION[adminfullName]', updated_date = now() where id = $cid";
        $result = $this->conn->query($update);
//        print_r($result);
    }
    
    public function insertgalleryPhotos($imagesnamesArray,$eventId,$type){
        $insert = "insert into gallery_photos (gallery_id,photo,type) values ";
        foreach($imagesnamesArray as $imagesname){
            $insert.="($eventId,'$imagesname','$type'),";
        }
        echo $insert = rtrim($insert,',');
        return $result = $this->conn->query($insert);
    }

}

?>