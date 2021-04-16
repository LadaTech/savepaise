<?php
session_start();
include_once '../common/functions.php';
$commonfunction = new commonfunction();
$cid = $_REQUEST['cid'];
$status = $_REQUEST['status'];
$comment = $_REQUEST['comment'];
$commonfunction->updateBenstatus($cid,$status,$comment);

echo "praveen";

//adminfullName

