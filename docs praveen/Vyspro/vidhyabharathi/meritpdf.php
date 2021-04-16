<?php

namespace Dompdf;

session_start();
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL);
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
                width:680px;
            }
            .labeltext{
                font-weight:bold;
                padding-left:10px;
                vertical-align:top;
                width:250px;
            }
            .coluntd{
                padding:0 5px;
                vertical-align:top;
                width:20px;
            }
            .labelvalue{
                margin-left:10px;
                text-align:left;
            }
            .cattitle{
                text-align:center;
                font-weight:bold;
            }
            .hrline{
                border:1px solid black;
                margin:10px 0px;
                width:650px;
            }
            ul li{
                text-align:left;
            }
            .names{
                font-weight:bold;
            }
            .deisg{
                font-size:12px;
            }
            .break-before {
                page-break-before: always;
            }
            .no-break {
                page-break-inside: avoid;
            }
            .clearfix:after {
                content: " ";
                visibility: hidden;
                display: block;
                height: 0;
                clear: both;
            }
            
            .fundlist table {
              border-collapse: collapse;
            }

            .fundlist td {
              border: 1px solid black;
              padding-left:10px;
            }
            .snoclass{
                width:10px;
            }
        </style>
      </head>
    <body >
        <div>
            <table class="page" style="border:2px solid black;">
                <tr>
                    <td style="text-align:center;" colspan="3">
                        <img src="images/header.png" style="width:650px;" />
                    </td>
                </tr> 
                <tr>
                    <td colspan="3" style="width:650px; border-top:2px solid black;">&nbsp;</td>
                </tr>
                <tr>
                    <td style="text-align: center;"><span class="names">Ln G Madhu Mohan</span> <br /><span class="deisg">President - Cell: 9848160363</span></td>
                    <td style="text-align: center;"><span class="names">Er R. Srinivasa Rao</span> <br /><span class="deisg">General Secretary - Cell: 9849030308</span></td>
                    <td style="text-align: center;"><span class="names">CA GURURAJ G</span> <br /><span class="deisg">Treasurer - Cell: 9949901000</span></td>
                </tr> 
                <tr>
                    <td colspan="3" style="width:650px; border-top:2px solid black;">&nbsp;</td>
                </tr>
                <tr>
                    <td style="color:red; padding-left:20px;">' . date('d-M-Y') . '</td>
                    <td style="text-decoration: underline; text-align:center; width:280px; font-weight:bold;font-size:16px;">APPLICATION FOR MERIT AWARD</td> 
                    <td style="color:red; text-align:right; padding-right:20px;">' . $_SESSION['insertId'] . '</td>
                </tr>
                
                <tr>
                    <td colspan="3">
                        <table>
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
                                <td colspan="3" style="width:100%; border-bottom:2px solid black;">&nbsp;</td>                                   
                            </tr>
                            <tr>
                                <td colspan="3" class="cattitle">Education Details</td>
                            </tr>                            
                            <tr>

                                <td class="labeltext">Subject / Class</td>
                                <td class="coluntd">:</td>
                                <td class="labelvalue">' . $usersdata["classname"] . '</td>
                            </tr>
                            <tr>

                                <td class="labeltext">Total Marks</td>
                                <td class="coluntd">:</td>
                                <td class="labelvalue">' . $usersdata["totalmarks"] . '</td>
                            </tr>
                            <tr>

                                <td class="labeltext">Total Marks Obtained</td>
                                <td class="coluntd">:</td>
                                <td class="labelvalue">' . $usersdata["totalmarksobtained"] . '</td>
                            </tr>
                            <tr>

                                <td class="labeltext">Marks in Maths</td>
                                <td class="coluntd">:</td>
                                <td class="labelvalue">' . $usersdata["marksinsubject"] . '</td>
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
                                <td class="labeltext">School / Collage / Institution Address</td>
                                <td class="coluntd">:</td>
                                <td class="labelvalue">' . $usersdata["schooladdress"] . '</td>
                            </tr>
                            <tr>
                                <td class="labeltext">Presently studying</td>
                                <td class="coluntd">:</td>
                                <td class="labelvalue">' . $usersdata["presentlystudying"] . '</td>
                            </tr>
                            <tr>
                               <td colspan="3" style="width:720px; border-bottom:2px solid black;">&nbsp;</td>                                  
                            </tr>
                            <tr>
                                <td colspan="3" class="cattitle">Objectives</td>
                            </tr>
                            <tr>
                                <td class="labeltext">Aims/Goals</td>
                                <td class="coluntd">:</td>
                                <td class="labelvalue">' . $usersdata["aim"] . '</td>
                            </tr>
                            <tr>
                                <td class="labeltext">Are you interested to help <br /> financially needy / merit students in future?</td>
                                <td class="coluntd">:</td>
                                <td class="labelvalue">' . $usersdata["futurehelp"] . '</td>
                            </tr>
                            <tr>
                                <td class="labeltext">Are you willing to join Vyspro-India?</td>
                                <td class="coluntd">:</td>
                                <td class="labelvalue">' . $usersdata["joinvyspro"] . '</td>
                            </tr>
                            <tr>
                                <td class="labeltext">How do you know about Vidhya Bharathi?</td>
                                <td class="coluntd">:</td>
                                <td class="labelvalue">' . $usersdata["referer"] . '</td>
                            </tr>
                            <tr>
                                <td class="labeltext">Referred by (Name / organisation Name)</td>
                                <td class="coluntd">:</td>
                                <td class="labelvalue">' . $usersdata["referername"] . '</td>
                            </tr> 
                            <tr>
                                <td colspan=3>&nbsp;</td>
                            </tr> 
                        </table>
                    </td>
                </tr>
            </table>
            <table class="page break-before" style="border:2px solid black; padding:20px; width:680px;">
                <tr>
                    <td colspan="3" class="cattitle">We agree to abide by the rules framed by VYSPRO-INDIA </td>
                </tr>
                <tr>
                    <td colspan=3>&nbsp;</td>
                </tr> 
                <tr>
                    <td colspan="3" style="padding:0 10px;">Signature of Student:_______________________ Signature of Parent / Guardian: ____________________</td>
                </tr>
                <tr><td colspan="3">&nbsp;</td></tr>
                <tr>
                    <td colspan="3" style="padding:0 10px;">Name: __________________________________ Name: ________________________________________</td>
                </tr>
                <tr>
                    <td colspan="3">&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="3" style="padding:0 10px;">Place: ______________ Date:_______________ Place: ________________ Date:____________________</td>
                </tr>
                <tr>
                    <td colspan="3" style="width:700px; border-bottom:2px solid black;">&nbsp;</td>                                   
                </tr>
                <tr>
                    <td colspan="3" class="cattitle">Recommendation of VYSYA organisation </td>
                </tr>
                <tr>
                    <td colspan="3" style="padding:0 10px;">
                            I hearby certify that the above candidate belongs to our Vysya community. <br />
                            I further certiry that he deserves for medal  / scholarship.
                    </td>
                </tr>
                <tr>
                    <td colspan="3">&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="3" style="padding:0 10px;">Name: ____________________________________Signature:___________________________________</td>
                </tr>
                <tr>
                    <td colspan="3">&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="3" style="padding:0 10px;">Designation: _______________________________Place:_________________ Date:_________________</td>
                </tr>
                <tr>
                    <td colspan="3">&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="3" style="padding:0 10px;">organisation: ______________________________(Seal / Stamp)</td>
                </tr>
                <tr>
                    <td colspan="3" style="width:700px; border-bottom:2px solid black;">&nbsp;</td>                                     
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
            <table class="page break-before fundlist" style="width:720px;border:2px solid black; padding:10px;">
                <tr>
                    <td colspan="5" style="font-weight:bold;font-size:24px; text-align:center;">Sponsor for Medals</td>
                </tr>
                    <tr style="font-weight:bold;  padding-left:10px;"><td>S.No.</td><td>Name of the Donor</td><td>Amount(Rs.) </td><td>Class</td><td>	Type</td></tr>
                     <tr><td style="padding-left:10px;" class="snoclass">1</td><td>	CA N.Venkateswara Rao</td><td>	  25,000  </td><td>	SSC</td><td>	Gold Medal</td></tr>
                     <tr> <td style="padding-left:10px;" class="snoclass">2</td><td>	Er  M. Rajeswara Gupta</td><td>	 15,000 </td><td>	SSC</td><td>	Silver Medal</td></tr>
                     <tr><td style="padding-left:10px;" class="snoclass">3</td><td>	CA Chaluvadi Srinivasa Rao</td><td>	 25,000 </td><td>	SSC Maths</td><td>	Gold Medal</td></tr>
                     <tr><td style="padding-left:10px;" class="snoclass">4</td><td>	Dr Balabadruni Kameswara Rao</td><td>	 40,000 </td><td>	Inter (MPC)</td><td>	Gold Medal</td></tr>
                    <tr> <td style="padding-left:10px;" class="snoclass"></td><td>                      </td><td></td><td>Inter (MPC)</td><td>	Silver Medal</td></tr>
                     <tr><td style="padding-left:10px;" class="snoclass">5</td><td>	CA Sathuluri Prakash</td><td> 30,000 </td><td>	Inter (MEC)</td><td>	Gold Medal</td></tr>
                    <tr> <td style="padding-left:10px;" class="snoclass">6</td><td>	CA S Narayana Murthy</td><td> 25,000 </td><td>	Inter Maths</td><td>	Gold Medal</td></tr>
                     <tr><td style="padding-left:10px;" class="snoclass">7</td><td>	Sri J Mahaveer Prasad Singhania	</td><td> 15,000 </td><td>	B. Com</td><td>	Silver Medal</td></tr>
                     <tr><td style="padding-left:10px;" class="snoclass">8</td><td>Er Gajjala Yoganand</td><td>	 15,000 </td><td>	MBA</td><td>	Gold Medal</td></tr>
                     <tr><td style="padding-left:10px;" class="snoclass">9</td><td>Sri Desu Srinivas</td><td>20,000 </td><td>	MBA</td><td>	Silver Medal</td></tr>
                     <tr><td style="padding-left:10px;" class="snoclass">10</td><td>CA  C.V.M. Srinivas</td><td>25,000 </td><td>	MCA</td><td>	Gold Medal</td></tr>
                     <tr><td style="padding-left:10px;" class="snoclass">11</td><td>CA S.Sambasiva Rao</td><td>	 30,000 </td><td>	CA CPT</td><td>	Gold Medal</td></tr>
                     <tr><td style="padding-left:10px;" class="snoclass">12</td><td>CA K V Prasad	</td><td> 25,000 </td><td>	CA IPCC</td><td>	Gold Medal</td></tr>
                     <tr><td style="padding-left:10px;" class="snoclass">13</td><td>CA Gelli Naresh Chandra</td><td>	 40,000 </td><td>	CA IPCC	</td><td>Silver Medal</td></tr>
                     <tr><td style="padding-left:10px;" class="snoclass"></td><td>       </td><td>     </td><td> CA Final Group-II</td><td>	Gold Medal</td></tr>
                     <tr><td style="padding-left:10px;" class="snoclass">14</td><td>CA C V S Balachandra Rao</td><td> 30,000 </td><td>	CA IPCC - Law (60 Marks & Above)</td><td>	Gold Medal</td></tr>
                     <tr><td style="padding-left:10px;" class="snoclass">15</td><td>CA Beldi Sridhar</td><td>	 25,000 </td><td>	CA IPCC Group-I	</td><td>Gold Medal</td></tr>
                     <tr><td style="padding-left:10px;" class="snoclass">16</td><td>Er J.Subbaraya Setty & CA J R P Guptha</td><td>	 25,116</td><td> 	CA IPCC Group-II</td><td>	Gold Medal</td></tr>
                     <tr><td style="padding-left:10px;" class="snoclass">17</td><td>CA Soma Vidya Sagar	</td><td> 35,000 </td><td>	CA Final Group-I</td><td>	Silver Medal</td></tr>
                     <tr><td style="padding-left:10px;" class="snoclass"></td><td>   </td><td>   </td><td>  CA Final Group-II</td><td>	Silver Medal</td></tr>
                     <tr> <td style="padding-left:10px;" class="snoclass">18</td><td>CMA D L S Sresti</td><td>	 45,000</td><td> 	CMA Final</td><td>	Gold Medal</td></tr>
                     <tr><td style="padding-left:10px;" class="snoclass"></td><td>       </td><td>           </td><td>    CMA Final	</td><td>Silver Medal</td></tr>
                     <tr><td style="padding-left:10px;" class="snoclass">19</td><td>Sri K.Koteswara Rao</td><td>15,000 </td><td>	CS Inter</td><td>	Gold Medal</td></tr>
                     <tr><td style="padding-left:10px;" class="snoclass">20</td><td>Sri Manepalli Suryamanikyam</td><td>25,000 </td><td>	Medicine - Doctor</td><td>	Gold Medal</td></tr>
                     <tr><td style="padding-left:10px;" class="snoclass">21</td><td>	Er Rachuri Srinivasa Rao</td><td>40,000 </td><td>	Engineer</td><td>	Gold Medal</td></tr>
                     <tr><td style="padding-left:10px;" class="snoclass"></td><td></td><td></td><td>Engineer	</td><td>Silver Medal</td></tr>
                     <tr><td style="padding-left:10px;" class="snoclass">22</td><td>	Sri. Bolisetty Praveen Kumar <br /> (In the Memory of B Surya Prakash Rao and Sanjeevamma)</td><td>	 25,116 </td><td>	MCA</td><td>	Silver Medal</td></tr>
                     <tr><td style="padding-left:10px;" class="snoclass">23</td><td>CA S V R Visweswara Rao</td><td>60,000 </td><td>CS Final</td><td>Gold Medal</td></tr>
                     <tr> <td style="padding-left:10px;" class="snoclass"></td><td></td><td></td><td>LLB</td><td>Gold Medal</td></tr>
                     <tr> <td style="padding-left:10px;" class="snoclass">24</td><td>Smt. A Surekha</td><td> 30,000 </td><td>CA Final (Both Groups at a time)</td><td>	Gold Medal</td></tr>
                     <tr><td style="padding-left:10px;" class="snoclass">25</td><td>Sri. Jallipally Sekhar Rao</td><td>30,000 </td><td>CMA Inter</td><td>	Gold Medal</td></tr>
                     <tr><td style="padding-left:10px;" class="snoclass">26</td><td>Vadakattu J P Gupta</td><td>20,116</td><td>CA Final (Both Groups at a time)</td><td>	Silver Medal</td></tr>
                     <tr><td style="padding-left:10px;" class="snoclass">27</td><td>CA Sanka Venu Gopal</td><td>30,000</td><td>CA Final Group-I</td><td>	Gold Medal</td></tr>
                    <tr> <td style="padding-left:10px;" class="snoclass">28</td><td>Er. Gollapudi Mahesh Kumar</td><td>20,000</td><td>LLB	</td><td>Silver Medal</td></tr>
                    <tr>
                        <td colspan="5" style="width:700px; border-bottom:2px solid black;">&nbsp;</td>                                     
                    </tr>
                    <tr>
                    <td colspan="5" style="text-align:center;">
                        Project Chairman:  
                        CA Ramesh Babu Kollipara, <br />
                        Flat No. 101, Kolan Laxmi Nivas,
                        Motinagar Extension Road,
                        Opp. Chinnari Kids Play School Road,<br />
                        Motinagar,
                        Hyderabad - 500 018. Phone Number: 970 191 1117
                    </td>                                     
                </tr>
                <tr>
                    <td colspan="5" style="width:700px; border-bottom:2px solid black;">&nbsp;</td>                                     
                </tr>

                <tr>
                    <td colspan="5" style="padding-left:20px; padding-right:20px; ">
                        <div style="text-align:left" class="pull-left">Project Co-Chairmen:<br />
                            CA Leela Krishna Mohan Kota - 905 220 8181,<br />
                            CA Vijay Kalimicherla - 900 000 1253,<br />
                            CA Praneeth Kumar - 939 300 7237,<br />
                            Praveen Kumar Bolisetty, MCA - 998 519 0066
                        </div>
                        <div style="text-align:left;" class="pull-right">
                            Advisors:<br /> CA G V Ramavataram - 040 40269230<br />
                            CA P. Rajeswara Rao - 984 901 0903<br /> 
                            CA S. Surya Prakash - 939 168 6797<br /> 
                            CA S. Narayana Murthy - 984 824 3715<br />
                        </div>
                        <div class="clearfix"></div>
                    </td>
                </tr>
            </table>
        </div>
    </body>
</html>
');
$dompdf->setPaper("A4", "portrait");
$dompdf->render();
//$dompdf->stream("", array("Attachment" => false));
//$dompdf->stream("sample.pdf");
$output = $dompdf->output();
$p = $_SESSION['insertId'];
file_put_contents("pdf/" . $p . ".pdf", $output);
?>