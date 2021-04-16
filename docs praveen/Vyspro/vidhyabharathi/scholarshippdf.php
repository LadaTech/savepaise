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
$dompdf->loadHtml('<head>
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
        <table class="page" style="border:2px solid black; padding:20px; width:680px;">
            <tr>
                <td style="text-align:center;" colspan="3">
                    <img src="images/header.png" style="width:650px;" />
                </td>
            </tr> 
            <tr>
                <td colspan="3" style="width:100%; border-top:2px solid black;">&nbsp;</td>
            </tr>
            <tr>
                <td style="text-align: center;"><span class="names">Ln G Madhu Mohan</span> <br /><span class="deisg">President - Cell: 9848160363</span></td>
                <td style="text-align: center;"><span class="names">Er R. Srinivasa Rao</span> <br /><span class="deisg">General Secretary - Cell: 9849030308</span></td>
                <td style="text-align: center;"><span class="names">CA GURURAJ G</span> <br /><span class="deisg">Treasurer - Cell: 9949901000</span></td>
            </tr> 
            <tr>
                <td colspan="3" style="width:650px; border-bottom:2px solid black;">&nbsp;</td>
            </tr>
            <tr>
                <td style="color:red; padding-left:20px;">' . date('d-M-Y') . '</td>
                <td style="text-decoration: underline; text-align:center; width:280px; font-weight:bold;font-size:16px;">Application for Scholarship</td> 
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
                            <td class="labelvalue">' . $usersdata["email"] . '</td>                       

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
                            <td class="labeltext">Father/Guardian Phone Number</td>
                            <td class="coluntd">:</td>
                            <td class="labelvalue">' . $usersdata["parentphone"] . '</td>
                        </tr>

                        <tr>
                            <td class="labeltext">Mother Name</td>
                            <td class="coluntd">:</td>
                            <td class="labelvalue">' . $usersdata["mothername"] . '</td>
                        </tr>
                        <tr>
                            <td class="labeltext">Mother Occupation</td>
                            <td class="coluntd">:</td>
                            <td class="labelvalue">' . $usersdata["motheroccupation"] . '</td>
                        </tr>
                        <tr>
                            <td class="labeltext">Mother Phone Number</td>
                            <td class="coluntd">:</td>
                            <td class="labelvalue">' . $usersdata["motherphone"] . '</td>
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
                            <td colspan="3" style="width:700px; border-bottom:2px solid black;">&nbsp;</td>                                   
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
                            <td class="labeltext">Month - Year (Year of passing)</td>
                            <td class="coluntd">:</td>
                            <td class="labelvalue">' . $usersdata["latestmonth"] . '</td>
                        </tr>
                        <tr>
                            <td class="labeltext">Marks obtained</td>
                            <td class="coluntd">:</td>
                            <td class="labelvalue">' . $usersdata["marksobtained"] . '</td>
                        </tr>
                        <tr>
                            <td class="labeltext">Percentage of marks</td>
                            <td class="coluntd">:</td>
                            <td class="labelvalue">' . $usersdata["percentagemarks"] . '</td>
                        </tr>

                        <tr>
                            <td class="labeltext">Hall Ticket Number</td>
                            <td class="coluntd">:</td>
                            <td class="labelvalue">' . $usersdata["hallticketnumber"] . '</td>
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
                            <td colspan="3" style="width:700px; border-bottom:2px solid black;">&nbsp;</td>                                    
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <table class="page break-before" style="border:2px solid black; padding:20px; width:680px;">                            
            <tr>
                <td colspan="3" class="cattitle">Income Details</td>
            </tr>
            <tr>
                <td class="labeltext">Annual income</td>
                <td class="coluntd">:</td>
                <td class="labelvalue">' . $usersdata["annualincome"] . '</td>
            </tr>
            <tr>
                <td class="labeltext">Any other scholarships received</td>
                <td class="coluntd">:</td>
                <td class="labelvalue">' . $usersdata["otherscholorships"] . '</td>
            </tr>
            <tr>
                <td class="labeltext">Did you receive scholarship from Vyspro-India</td>
                <td class="coluntd">:</td>
                <td class="labelvalue">' . $usersdata["vysprocholorships"] . '</td>
            </tr>
            <tr>
                <td class="labeltext">Year of latest scholarship received</td>
                <td class="coluntd">:</td>
                <td class="labelvalue">' . $usersdata["vysprocholorshipsyear"] . '</td>
            </tr>
            <tr>
                <td class="labeltext">Are your Parent / Guardian is a member of any Vysya Association</td>
                <td class="coluntd">:</td>
                <td class="labelvalue">' . $usersdata["vysproparent"] . '</td>
            </tr>
            <tr>
                <td class="labeltext">Organisation Name</td>
                <td class="coluntd">:</td>
                <td class="labelvalue">' . $usersdata["organisationname"] . '</td>
            </tr>                            
            <tr>
                <td colspan="3" style="width:700px; border-bottom:2px solid black;">&nbsp;</td>                                  
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
                <td colspan="3" style="width:700px; border-bottom:2px solid black;">&nbsp;</td>                                  
            </tr>

            <tr>
                <td colspan="3" class="cattitle">Bank Details</td>
            </tr>
            <tr>
                <td class="labeltext">Student / Beneficiary Name (as per bank account)</td>
                <td class="coluntd">:</td>
                <td class="labelvalue">' . $usersdata["bankstudentname"] . '</td>
            </tr>
            <tr>
                <td class="labeltext">Bank Name</td>
                <td class="coluntd">:</td>
                <td class="labelvalue">' . $usersdata["bankname"] . '</td>
            </tr>
            <tr>
                <td class="labeltext">Bank A/C number</td>
                <td class="coluntd">:</td>
                <td class="labelvalue">' . $usersdata["banknumber"] . '</td>
            </tr>
            <tr>
                <td class="labeltext">Bank IFSC code</td>
                <td class="coluntd">:</td>
                <td class="labelvalue">' . $usersdata["bankifsc"] . '</td>
            </tr>
            <tr>
                <td class="labeltext">Bank Branch</td>
                <td class="coluntd">:</td>
                <td class="labelvalue">' . $usersdata["bankbranch"] . '</td>
            </tr>
            <tr>
                <td colspan="3" style="width:700px; border-bottom:2px solid black;">&nbsp;</td>                                  
            </tr>
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
                <td colspan="3">
                    <ul>
                        <li>Copy of Marks List Duly Attested by School / College Principal / any office bearer of Vysya Orgn. with stamp</li>
                        <li>Address Proof</li>
                        ' . $enclosureslist . '
                    </ul>
                </td>
            </tr>
        </table>
        <table class="page break-before fundlist" style="border:2px solid black; padding:20px; width:680px;">
            <tr>
                <td colspan="3" style="font-weight:bold;font-size:24px; text-align:center;">Scholarship Fund Donors List</td>
            </tr>
            <tr style="font-weight:bold;"><td style="padding-left:10px;">    S.No.</td><td>	Name of the Donor</td><td>	 Amount         (Rs.) </td></tr>
            <tr><td style="padding-left:10px;">     1</td><td>Er R. Srinivasa Rao	</td><td> 1,52,616 </td></tr>
            <tr><td style="padding-left:10px;">     2</td><td>CA P.Rajeswara Rao</td><td>	 1,20,348 </td></tr>
            <tr><td style="padding-left:10px;">     3</td><td>Sri Nerella Purnanandam	</td><td> 1,00,000 </td></tr>
            <tr><td style="padding-left:10px;">     4</td><td>CA Paluru Madhusudhan Rao Garu</td><td>	 1,00,000 </td></tr>
            <tr><td style="padding-left:10px;">     5</td><td>CA N. Chandrasekharaiah	</td><td> 97,596  </td></tr>                
            <tr><td style="padding-left:10px;">    6</td><td>Er Gajjala Yoganand	</td><td> 50,000</td></tr> 
            <tr><td style="padding-left:10px;">   7</td><td>CA Vandanapu Ratna Prabhakar</td><td>	 50,000</td></tr> 
            <tr><td style="padding-left:10px;">   8</td><td>Smt Gelli Ramani W/o CA G.Naresh</td><td>	 40,000 </td></tr>
            <tr><td style="padding-left:10px;">   9</td><td>Sri. P V K Sharma</td><td>	 40,000 </td></tr>
            <tr><td style="padding-left:10px;">    10</td><td>Sri G. Madhu Mohan</td><td>	 31,500 </td></tr>
            <tr><td style="padding-left:10px;">   11</td><td>Sri K. Venkata Narasaiah</td><td>	 30,116 </td></tr>
            <tr><td style="padding-left:10px;">    12</td><td>CA M. Sivaiah</td><td>	 30,116 </td></tr>
            <tr><td style="padding-left:10px;">    13</td><td>CA.G. Padmakar	</td><td> 30,000 </td></tr>
            <tr><td style="padding-left:10px;">    14</td><td>CA Brahmananda Rao	</td><td> 30,000 </td></tr>
            <tr><td style="padding-left:10px;">    15</td><td>Sri. Bysani Krishna Murty 	</td><td> 30,000 </td></tr>
            <tr><td style="padding-left:10px;">    16</td><td>Sri T. Ramam</td><td>	 25,116 </td></tr>
            <tr><td style="padding-left:10px;">    17</td><td>Smt. K. Swathi</td><td>	 25,000 </td></tr>
            <tr><td style="padding-left:10px;">    18</td><td>CA K. Shiva Kumar</td><td>	 25,000 </td></tr>
            <tr><td style="padding-left:10px;">    19</td><td>Prof. S. Thiruvengalam</td><td>	 25,000 </td></tr>
            <tr><td style="padding-left:10px;">    20</td><td>Sri K. Pradeep Kumar	</td><td> 25,000 </td></tr>
            <tr><td style="padding-left:10px;">    21</td><td>Sri Gandham Veeraiah & Smt Naga Ratna Kumari</td><td>	 25,000</td></tr> 
            <tr><td style="padding-left:10px;">    22</td><td>Sri G. Raghu Babu</td><td>	 25,000 </td></tr>
            <tr><td style="padding-left:10px;">    23</td><td>CA P. Siva Prasad</td><td>	 25,000 </td></tr>
            <tr><td style="padding-left:10px;">    24</td><td>Smt. Gudipati Vasundhara</td><td>	 25,000 </td></tr>
            <tr><td style="padding-left:10px;">   25</td><td>CMA Nethi Mallikarjuna Setti</td><td>	 25,000 </td></tr>
            <tr><td style="padding-left:10px;">    26</td><td>Smt Araveeti Surekha</td><td>	 25,000 </td></tr>
            <tr><td style="padding-left:10px;">    27</td><td>Smt Amrutha Bai Alladi</td><td>	 25,000 </td></tr>
            <tr><td style="padding-left:10px;">    28</td><td>Cherukuri Venu Madhav (In the Memory of Ch. Venkateswarlu and Vijayabhratahi)</td><td>	 25,000</td></tr> 
            <tr><td style="padding-left:10px;">    29</td><td>CA KSV Krishna Rao</td><td>	 25,000</td></tr> 
            <tr><td style="padding-left:10px;">    30</td><td>CA Gelli Dayakar</td><td>	 21,500 </td></tr>
            <tr><td style="padding-left:10px;">    31</td><td>CA. S. Samba Siva Rao</td><td>	 20,232 </td></tr>
            <tr><td style="padding-left:10px;">    32</td><td>CA Sanka Narayana Murthy</td><td>	 20,116 </td></tr>
            <tr><td style="padding-left:10px;">    33</td><td>Sri K.V.Sanjeeva Rao</td><td>	 20,000 </td></tr>
            <tr><td style="padding-left:10px;">    34</td><td>Sri Soma Vidya Sagar</td><td>	 20,000 </td></tr>
            <tr><td style="padding-left:10px;">   35</td><td>Smt. A Surekha	</td><td> 20,000 </td></tr>
            <tr><td style="padding-left:10px;">    36</td><td>CA G V R Arun Kumar	</td><td> 15,116 </td></tr>
            <tr><td style="padding-left:10px;">   37</td><td>Ms Devaki Jhahnavi</td><td>	 15,000 </td></tr>
            <tr><td style="padding-left:10px;">    38</td><td>CA V. Chandrasekhara Rao</td><td>	 15,000 </td></tr>
            <tr><td style="padding-left:10px;">   39</td><td>CA M. Harish Babu</td><td>12,000 </td></tr>
            <tr><td  style="padding-left:10px;">    40</td><td>Sri V. Nirmala	</td><td> 12,000 </td></tr>
            <tr><td  style="padding-left:10px;">    41</td><td>CA L. Prakasham	</td><td> 12,000 </td></tr>
            <tr><td  style="padding-left:10px;">    42</td><td>CA Bachu Srinivas</td><td>	 11,500 </td></tr>
            <tr><td  style="padding-left:10px;">    43</td><td>Sri S. Srinivasa Rao</td><td>	 10,116 </td></tr>
            <tr><td  style="padding-left:10px;">    44</td><td>CA B. Chakrapani</td><td>	 10,116 </td></tr>
            <tr><td  style="padding-left:10px;">   45</td><td>CA Ramesh Babu Kollipara</td><td>	 10,116 </td></tr>
            <tr><td  style="padding-left:10px;">    46</td><td>CA. G. Lalbahadur Sastry</td><td>	 10,116 </td></tr>
            <tr><td  style="padding-left:10px;">    47</td><td>CA G. V. Ramavataram	</td><td> 10,116 </td></tr>
            <tr><td  style="padding-left:10px;">   48</td><td>CA G. V. V Satya Narayana</td><td>	 10,116 </td></tr>
            <tr><td  style="padding-left:10px;">   49</td><td>CA J. R. P Gupta</td><td>	 10,116 </td></tr>
            <tr><td  style="padding-left:10px;">    50</td><td>Sri Aravind Kumar K</td><td>	 10,116 </td></tr>
            <tr><td  style="padding-left:10px;">    51</td><td>Smt. J Bhagya Lakshmi</td><td>20,232 </td></tr>                
            <tr><td  style="padding-left:10px;">   52</td><td>CA S V R Visweawara Rao</td><td>	 10,000 </td></tr>
            <tr><td  style="padding-left:10px;">53</td><td>CA. CH.R.S. Srinivas kumar</td><td>	 10,000 </td></tr>
            <tr><td  style="padding-left:10px;">54</td><td>Sri N. Anil Kumar</td><td>	 10,000 </td></tr>
            <tr><td  style="padding-left:10px;">55</td><td>CA K Vijaya Bhagawan Guptha</td><td>	 10,000 </td></tr>
            <tr><td  style="padding-left:10px;">56</td><td>Sri M. Srinivasa Rao</td><td>	 10,000 </td></tr>
            <tr><td  style="padding-left:10px;">57</td><td>Sri.  G. Ravikanth</td><td>	 10,000 </td></tr>
            <tr><td  style="padding-left:10px;">58</td><td>CS Devatha Sri Hari Narayana</td><td>	 10,000</td></tr> 
            <tr><td  style="padding-left:10px;">58</td><td>Smt G.Madhavi</td><td>	 10,000 </td></tr>
            <tr><td  style="padding-left:10px;">59</td><td>CA K. Krishna Rao</td><td>	 10,000 </td></tr>
            <tr><td  style="padding-left:10px;">60</td><td>CA Talluri Venkata Sivaiah</td><td>	 10,000 </td></tr>
            <tr><td  style="padding-left:10px;">61</td><td>CA D Ranga Rao	</td><td> 10,000 </td></tr>
            <tr><td  style="padding-left:10px;">62</td><td>CA K.Sridhar</td><td>	 5,000 </td></tr>
            <tr><td  style="padding-left:10px;">63</td><td>Sri B.V.Satish	</td><td> 5,000 </td></tr>
            <tr><td  style="padding-left:10px;">64</td><td>Sri Vutukuri Kalyan, U S A</td><td>5,000 </td></tr>
            <tr>
                <td colspan="3" style="text-align:center;">
                    Project Chairman:<br />
                    Flat No. 101, Kolan Laxmi Nivas,
                    Motinagar Extension Road,
                    Opp. Chinnari Kids Play School Road,<br />
                    Motinagar,
                    Hyderabad - 500 018. Phone Number: 970 191 1117
                </td>                                     
            </tr>
            <tr>
                <td colspan="3" style="padding-left:20px; padding-right:20px; ">
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
$dompdf->stream("", array("Attachment" => false));
//$dompdf->stream("sample.pdf");
$output = $dompdf->output();
$p = $_SESSION['insertId'];
file_put_contents("pdf/" . $p . ".pdf", $output);
?>