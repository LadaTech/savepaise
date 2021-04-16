<?php

session_start();
//print_r($_SESSION);
//exit;
if (isset($_SESSION['adminuserid'])) {
    header("location:/admin/dashboard.php");
} else {
    header("location:/admin/login.php");
}

exit;
?>
