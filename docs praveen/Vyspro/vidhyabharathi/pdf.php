<?php

include_once 'common/db.php';
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

$selectType = "SELECT * FROM `vb_users` where  application_number = '$_REQUEST[id]'";
$result = $conn->query($selectType);
if ($result->num_rows > 0) {
    // output data of each row
    $usersdata = $result->fetch_assoc();
}
        