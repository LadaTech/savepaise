<?php
date_default_timezone_set("Asia/Kolkata");
$domain = $_SERVER['SERVER_NAME'];
if ($domain == 'localhost') {
    $servername = "http://localhost:8112/";
    $serverhost = "localhost";
    $username = "root";
    $password = "";
    $dbname = "statione_transactions";
    $baseUrl = 'https://test.payu.in';
    $key = 'gtKFFx';
    $salt = 'eCwWELxi';
    $server_url = "http://localhost:8112";
} else {
    $servername = "http://vb.stationeryonline.in/";
    $serverhost = "localhost";
    $username = "statione_payu";
    $password = "hWba3AH?Z_BV";
    $dbname = "statione_transactions";
    $baseUrl = 'https://secure.payu.in';
    $key = 'OzI3W5MV';
    $salt = '2tiJjIow5v';
    $server_url = "http://" . $_SERVER['SERVER_NAME'];
}

// Create connection
$conn = new mysqli($serverhost, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function uploadFiles($imageFile, $feildName = '', $usename = '') {
//    print_r($imageFile);
    $currentDir = getcwd();
    $uploadDirectory = "/uploads/";
    $fileName = $imageFile['name'];
    $fileSize = $imageFile['size'];
    $fileTmpName = $imageFile['tmp_name'];
    $fileType = $imageFile['type'];
    $fileExtension = strtolower(end(explode('.', $fileName)));
//    echo '<br />';
    $uploadPath = $currentDir . $uploadDirectory . $usename . '_' . basename($fileName);
//    echo '<br />';
    $didUpload = move_uploaded_file($fileTmpName, $uploadPath);
    if ($didUpload) {
        $_SESSION['users'][$feildName] = $usename . '_' . basename($fileName);
    } else {
        
    }
}

function cleanMe($inputpost, $con) {
    foreach ($inputpost as $name => $val) {
        $val1 = mysqli_real_escape_string($con, $val);
        $val2 = htmlspecialchars($val1, ENT_IGNORE, 'utf-8');
        $val3 = strip_tags($val2);
        $val4 = stripslashes($val3);
        $outpost[$name] = $val4;
    }
    return $outpost;
}

?>