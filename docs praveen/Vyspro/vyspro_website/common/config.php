<?php

$server_name = $_SERVER['SERVER_NAME'];
switch ($server_name) {
    case "localhost": {
            $serverhost = "localhost";
            $username = "root";
            $password = "";
            $dbname = "vyspro";
            $server_url = "http://localhost:8110";
            $baseUrl = 'https://test.payu.in';
            $key = 'gtKFFx';
            $salt = 'eCwWELxi';
            $server_url = "http://localhost:8110";
        }
        break;
    case "vysproindia.com":
    case "www.vysproindia.com": {
            $serverhost = "localhost";
            $username = "vysproin_web";
            $password = "ebwFWnga&D7T";
            $dbname = "vysproin_main";
            $server_url = "http://vysproindia.com";
            $baseUrl = 'https://secure.payu.in';
            $key = 'OzI3W5MV';
            $salt = '2tiJjIow5v';
            $server_url = "http://" . $_SERVER['SERVER_NAME'];
        }
        break;
}
$conn = new mysqli($serverhost, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>