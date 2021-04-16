<?php
/**
 * This example shows settings to use when sending via Google's Gmail servers.
 * This uses traditional id & password authentication - look at the gmail_xoauth.phps
 * example to see how to use XOAUTH2.
 * The IMAP section shows how to save this message to the 'Sent Mail' folder using IMAP commands.
 */

//Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require '../vendor/autoload.php';

//Create a new PHPMailer instance
$mail = new PHPMailer;


$mail->isSMTP();
$mail->SMTPDebug = 0;
$mail->Host = "smtp.gmail.com";
$mail->SMTPAuth = true;
$mail->SMTPSecure = "ssl";
$mail->Port = 465;
//$mail->CharSet = "UTF-8";

$mail->Username = "database.vysproindia@gmail.com"; // Gmail username
$mail->Password = "vasavi@123456"; // Gmail pasword 
$mail->setFrom("database.vysproindia@gmail.com", "Vyspro India"); //  From address email id
$mail->Subject = "Vyspro";

$message  = file_get_contents('email.html');

$mail->msgHTML($message);

$mail->addAddress("praveen@ladatechnologies.com"); // To address email id

$file_to_attach = 'hooq.png';

$mail->AddAttachment( $file_to_attach );

if (!$mail->send()) {
    $mail->ErrorInfo;
} else {
    echo "<b>Mail Sent<b>";
}

