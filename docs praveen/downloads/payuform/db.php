<?php

$domain = $_SERVER['SERVER_NAME'];
if ($domain == 'localhost') {
    $serverhost = "localhost";
    $username = "root";
    $password = "";
    $dbname = "statione_transactions";
    $baseUrl = 'https://test.payu.in';
    $key = 'gtKFFx';
    $salt = 'eCwWELxi';
    $server_url = "http://localhost:8111";
} else {
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
?>

