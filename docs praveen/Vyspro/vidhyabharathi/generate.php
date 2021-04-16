<?php

namespace Dompdf;

session_start();
//ini_set('display_errors', 0);
//ini_set('display_startup_errors', 0);
//error_reporting(E_ALL);
//echo "<pre>";
//print_r($_SESSION);
$usersdata = $_SESSION['users'];

//echo "in generate";
//exit;
//echo "</pre>";
require_once "vendor/dompdf/autoload.inc.php";

if ($usersdata['applying_for'] == 'merit') {
    $enclosuresTitle = "Enclosures for Merit Award";
} else if ($usersdata['applying_for'] == 'both') {
    $enclosuresTitle = "Enclosures for Merit Award / Scholorship";
    $enclosureslist = "<li> Proof of Studying the Professional Course</li><li>Income Proof of Father / Mother / Family / Guardian</li>";
} else if ($usersdata['applying_for'] == 'scholarship') {
    $enclosuresTitle = "Enclosures for Scholorship";
    $enclosureslist = "<li> Proof of Studying the Professional Course</li><li>Income Proof of Father / Mother / Family / Guardian</li>";
}
$dompdf = new Dompdf();
$dompdf->loadHtml('<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="Preview">
        <title>Sheets of Paper</title>
         <link rel="stylesheet" type="text/css" href="http://vysproindia.org/css/bootstrap.min.css" />
        <style type="text/css">
            .titlelogo{
                color:red;
            }
            .page{
                width:100%;
            }
            .labeltext{
                font-weight:bold;
                padding-left:10px;
                vertical-align:top;
                max-width:200px;
            }
            .coluntd{
                padding:0 5px;
                vertical-align:top;
                width:20px;
            }
            .labelvalue{
                margin-left:10px;
            }
            .cattitle{
                text-align:center;
                font-weight:bold;
            }
            .hrline{
                border:1px solid black;
                margin:10px 0px;
            }
            ul li{
                text-align:left;
            }
        </style>
      </head>
    <body >
        <div>
            <table class="page" style="border:2px solid black;">
                <tr>
                    <td style="text-align:center;" colspan="3">
                        <img src="images/header.png" width="680" />
                    </td>
                </tr>               
                <tr>
                    <td colspan="3"><hr class="hrline" /></td>
                </tr>
                <tr>
                    <td style="text-align: center;"><span class="names">Ln G Madhu Mohan</span> <br />PRESIDENT 9848160363</td>
                    <td style="text-align: center;"><span class="names">Er R. Srinivasa Rao</span> <br />GENERAL SECRETARY 9849030308</td>
                    <td style="text-align: center;"><span class="names">CA GURURAJ G</span> <br />TREASURER 9949901000</td>
                </tr>             
                <tr>
                    <td colspan="3"><hr class="hrline" /></td>
                </tr>
                <tr>
                    <td colspan="3" style="text-decoration: underline; text-align: center;">APPLICATION FOR MERIT AWARD / SCHOLARSHIP <br /></td>                    
                </tr>
                <tr>
                    
                    <td class="labeltext">Surname</td>
                    <td class="coluntd">:</td>
                    <td class="labelvalue">' . $usersdata["surname"] . '</td>
                </tr>
                <tr>
                    <td class="labeltext">Name</td>
                    <td class="coluntd">:</td>
                    <td class="labelvalue">' . $usersdata["name"] . '</td>
                </tr>
                <tr>
                    <td class="labeltext">Date of Birth</td>
                    <td class="coluntd">:</td>
                    <td class="labelvalue">' . $usersdata["dob"] . '</td>
                </tr>
                <tr>
                    <td class="labeltext">Email</td>
                    <td class="coluntd">:</td>
                    <td class="labelvalue" >' . $usersdata["email"] . '</td>                       
                    
                </tr>
                <tr>
                    <td class="labeltext">Phone Number</td>
                    <td class="coluntd">:</td>
                    <td class="labelvalue">' . $usersdata["phone"] . '</td>
                </tr>
                <tr>
                    <td class="labeltext">Father/Guardian Name</td>
                    <td class="coluntd">:</td>
                    <td class="labelvalue">' . $usersdata["parentname"] . '</td>
               </tr>
                <tr>
                    <td class="labeltext">Occupation</td>
                    <td class="coluntd">:</td>
                    <td class="labelvalue">' . $usersdata["parentoccupation"] . '</td>
                </tr>
                <tr>
                    <td class="labeltext">Father/Guardian <br /> Phone Number</td>
                    <td class="coluntd">:</td>
                    <td class="labelvalue">' . $usersdata["parentphone"] . '</td>
                 </tr>
                <tr>      
                    <td class="labeltext">Gothram</td>
                    <td class="coluntd">:</td>
                    <td class="labelvalue">' . $usersdata["gothram"] . '</td>
                </tr>                            
                <tr>
                    <td class="labeltext">Permanent Address</td>
                    <td class="coluntd">:</td>
                    <td class="labelvalue" colspan="3">' . $usersdata["faddress"] . ', ' . $usersdata["street"] . ',<br /> ' . $usersdata["city"] . ' ' . $usersdata["pincode"] . ' ' . $usersdata["state"] . '</td>
                </tr>
                <tr>
                    <td class="labeltext">Communication Address</td>
                    <td class="coluntd">:</td>
                    <td class="labelvalue" colspan="3"> ' . $usersdata["cfaddress"] . ', ' . $usersdata["cstreet"] . ',<br /> ' . $usersdata["ccity"] . ' ' . $usersdata["cpincode"] . ' ' . $usersdata["cstate"] . '</td>
                </tr>

                <tr>
                    <td class="labeltext">How do you know about Vidhya Bharathi?</td>
                    <td class="coluntd">:</td>
                    <td class="labelvalue">' . $usersdata["referer"] . '</td>
                </tr>
                <tr>
                    <td class="labeltext">Person Name</td>
                    <td class="coluntd">:</td>
                    <td class="labelvalue">' . $usersdata["referername"] . '</td>
                </tr>
                <tr>
                    <td colspan="3"><hr class="hrline" /></td>                                    
                </tr>
                <tr>
                    <td colspan="3" class="cattitle">Education Details</td>
                </tr>
                <tr>

                    <td class="labeltext">Latest class completed</td>
                    <td class="coluntd">:</td>
                    <td class="labelvalue">' . $usersdata["latestclass"] . '</td>
                </tr>
                <tr>
                    <td class="labeltext">Month - Year</td>
                    <td class="coluntd">:</td>
                    <td class="labelvalue">' . $usersdata["latestmonth"] . '</td>
                </tr>
                <tr>
                    <td class="labeltext">Marks obtained/Total Marks</td>
                    <td class="coluntd">:</td>
                    <td class="labelvalue">' . $usersdata["marks"] . '</td>
                </tr>
                <tr>
                    <td class="labeltext">Name of school / Collage / Institution</td>
                    <td class="coluntd">:</td>
                    <td class="labelvalue">' . $usersdata["schoolname"] . '</td>
                </tr>
                <tr>
                    <td class="labeltext">Name of school / Collage / Institution Address</td>
                    <td class="coluntd">:</td>
                    <td class="labelvalue">' . $usersdata["schooladdress"] . '</td>
                </tr>
                <tr>
                    <td class="labeltext">Presently studying</td>
                    <td class="coluntd">:</td>
                    <td class="labelvalue">' . $usersdata["presentlystudying"] . '</td>
                </tr>
                <tr>
                    <td colspan="3"><hr class="hrline" /></td>                                    
                </tr>
                <tr>
                    <td colspan="3" class="cattitle">We agree to abide by the rules framed by VYSPRO INDIA</td>
                </tr>
                <tr>
                    <td colspan="3">Signature of Student:_______________________Signature of Parent / Guardian: _____________________</td>
                </tr>
                <tr><td colspan="3">&nbsp;</td></tr>
                <tr>
                    <td colspan="3">Name: ______________________________Name: ____________________________</td>
                </tr>
                <tr><td colspan="3">&nbsp;</td></tr>
                <tr>
                    <td colspan="3">Place: ______________ Date:______________Place: ______________ Date:______________</td>
                </tr>
                <tr>
                    <td colspan="3"><hr class="hrline" /></td>                                    
                </tr>
                <tr>
                    <td colspan="3" class="cattitle">Recommendation of VYSYA organisation </td>
                </tr>
                <tr>
                    <td colspan="3">
                            I hearby certify that the above candidate belongs to our Vysya community. <br />
                            I further certiry that he deserves for medal  / scholarship.
                    </td>
                </tr>
                <tr>
                    <td colspan="3" >Name:_____________________________Signature: ________________________________</td>
                </tr>
                <tr>
                    <td colspan="3">&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="3">Designation: _________________________Place: ______________ Date:________________</td>
                </tr>
                <tr>
                    <td colspan="3"><hr class="hrline" /></td>                                    
                </tr>                
                <tr>
                    <td colspan="3" class="cattitle">' . $enclosuresTitle . '</td>
                </tr>
                <tr>
                    <td colspan="3" class="cattitle">
                         <ul>
                            <li>Copy of Marks List Duly Attested by School / College Principal / any <br /> office bearer of Vysya Orgn. with stamp</li>
                            <li>Address Proof</li>
                            ' . $enclosureslist . '
                         </ul>
                    </td>
                </tr>
                
            </table>            
        </div>
    </body>
</html>
');
$dompdf->setPaper("A4", "portrait");
$dompdf->render();
$dompdf->stream("", array("Attachment" => false));
//$dompdf->stream("sample.pdf");
$output = $dompdf->output();
$p = $_SESSION['insertId'];
file_put_contents("pdf/" . $p . ".pdf", $output);
?>