<?PHP
session_start();
include_once 'common/db.php';
?>
<!doctype html>
<html>
    <head>
        <meta name="viewport" content="width=device-width" />
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Simple Transactional Email</title>
        <style>
            /* -------------------------------------
                GLOBAL RESETS
            ------------------------------------- */

            /*All the styling goes here*/

            img {
                border: none;
                -ms-interpolation-mode: bicubic;
                max-width: 100%; 
            }

            body {
                background-color: #f6f6f6;
                font-family: sans-serif;
                -webkit-font-smoothing: antialiased;
                font-size: 14px;
                line-height: 1.4;
                margin: 0;
                padding: 0;
                -ms-text-size-adjust: 100%;
                -webkit-text-size-adjust: 100%; 
            }

            table {
                border-collapse: separate;
                mso-table-lspace: 0pt;
                mso-table-rspace: 0pt;
                width: 100%; }
            table td {
                font-family: sans-serif;
                font-size: 14px;
                vertical-align: top; 
            }

            /* -------------------------------------
                BODY & CONTAINER
            ------------------------------------- */

            .body {
                background-color: #ECF0F1;
                width: 100%; 
            }

            /* Set a max-width, and make it display as block so it will automatically stretch to that width, but will also shrink down on a phone or something */
            .container {
                display: block;
                margin: 0 auto !important;
                /* makes it centered */
                max-width: 580px;
                padding: 10px;
                width: 580px; 
            }

            /* This should also be a block element, so that it will fill 100% of the .container */
            .content {
                box-sizing: border-box;
                display: block;
                margin: 0 auto;
                max-width: 600px;
                padding: 10px; 
            }

            /* -------------------------------------
                HEADER, FOOTER, MAIN
            ------------------------------------- */
            .main {
                background: #ffffff;
                border-radius: 3px;
                width: 100%; 
            }

            .wrapper {
                box-sizing: border-box;
                padding: 20px; 
            }

            .content-block {
                padding-bottom: 10px;
                padding-top: 10px;
            }

            .footer {
                clear: both;
                margin-top: 10px;
                text-align: center;
                width: 100%; 
            }
            .footer td,
            .footer p,
            .footer span,
            .footer a {
                color: #999999;
                font-size: 12px;
                text-align: center; 
            }

            /* -------------------------------------
                TYPOGRAPHY
            ------------------------------------- */
            h1,
            h2,
            h3,
            h4 {
                color: #000000;
                font-family: sans-serif;
                font-weight: 400;
                line-height: 1.4;
                margin: 0;
                margin-bottom: 30px; 
            }

            h1 {
                font-size: 35px;
                font-weight: 300;
                text-align: center;
                text-transform: capitalize; 
            }

            p,
            ul,
            ol {
                font-family: sans-serif;
                font-size: 14px;
                font-weight: normal;
                margin: 0;
                margin-bottom: 15px; 
            }
            p li,
            ul li,
            ol li {
                list-style-position: inside;
                margin-left: 5px; 
            }

            a {
                color: #3498db;
                text-decoration: underline; 
            }

            /* -------------------------------------
                BUTTONS
            ------------------------------------- */
            .btn {
                box-sizing: border-box;
                width: 100%; }
            .btn > tbody > tr > td {
                padding-bottom: 15px; }
            .btn table {
                width: auto; 
            }
            .btn table td {
                background-color: #ffffff;
                border-radius: 5px;
                text-align: center; 
            }
            .btn a {
                background-color: #ffffff;
                border: solid 1px #3498db;
                border-radius: 5px;
                box-sizing: border-box;
                color: #3498db;
                cursor: pointer;
                display: inline-block;
                font-size: 14px;
                font-weight: bold;
                margin: 0;
                padding: 12px 25px;
                text-decoration: none;
                text-transform: capitalize; 
            }

            .btn-primary table td {
                background-color: #3498db; 
            }

            .btn-primary a {
                background-color: #3498db;
                border-color: #3498db;
                color: #ffffff; 
            }

            /* -------------------------------------
                OTHER STYLES THAT MIGHT BE USEFUL
            ------------------------------------- */
            .last {
                margin-bottom: 0; 
            }

            .first {
                margin-top: 0; 
            }

            .align-center {
                text-align: center; 
            }

            .align-right {
                text-align: right; 
            }

            .align-left {
                text-align: left; 
            }

            .clear {
                clear: both; 
            }

            .mt0 {
                margin-top: 0; 
            }

            .mb0 {
                margin-bottom: 0; 
            }

            .preheader {
                color: transparent;
                display: none;
                height: 0;
                max-height: 0;
                max-width: 0;
                opacity: 0;
                overflow: hidden;
                mso-hide: all;
                visibility: hidden;
                width: 0; 
            }

            .powered-by a {
                text-decoration: none; 
            }

            hr {
                border: 0;
                border-bottom: 1px solid #f6f6f6;
                margin: 20px 0; 
            }
            .names{
                font-weight:bold;
                width: 150px;
            }
            .deisg{
                font-size:12px;
            }

            /* -------------------------------------
                RESPONSIVE AND MOBILE FRIENDLY STYLES
            ------------------------------------- */
            @media only screen and (max-width: 620px) {
                table[class=body] h1 {
                    font-size: 28px !important;
                    margin-bottom: 10px !important; 
                }
                table[class=body] p,
                table[class=body] ul,
                table[class=body] ol,
                table[class=body] td,
                table[class=body] span,
                table[class=body] a {
                    font-size: 16px !important; 
                }
                table[class=body] .wrapper,
                table[class=body] .article {
                    padding: 10px !important; 
                }
                table[class=body] .content {
                    padding: 0 !important; 
                }
                table[class=body] .container {
                    padding: 0 !important;
                    width: 100% !important; 
                }
                table[class=body] .main {
                    border-left-width: 0 !important;
                    border-radius: 0 !important;
                    border-right-width: 0 !important; 
                }
                table[class=body] .btn table {
                    width: 100% !important; 
                }
                table[class=body] .btn a {
                    width: 100% !important; 
                }
                table[class=body] .img-responsive {
                    height: auto !important;
                    max-width: 100% !important;
                    width: auto !important; 
                }
            }

            /* -------------------------------------
                PRESERVE THESE STYLES IN THE HEAD
            ------------------------------------- */
            @media all {
                .ExternalClass {
                    width: 100%; 
                }
                .ExternalClass,
                .ExternalClass p,
                .ExternalClass span,
                .ExternalClass font,
                .ExternalClass td,
                .ExternalClass div {
                    line-height: 100%; 
                }
                .apple-link a {
                    color: inherit !important;
                    font-family: inherit !important;
                    font-size: inherit !important;
                    font-weight: inherit !important;
                    line-height: inherit !important;
                    text-decoration: none !important; 
                }
                #MessageViewBody a {
                    color: inherit;
                    text-decoration: none;
                    font-size: inherit;
                    font-family: inherit;
                    font-weight: inherit;
                    line-height: inherit;
                }
                .btn-primary table td:hover {
                    background-color: #34495e !important; 
                }
                .btn-primary a:hover {
                    background-color: #34495e !important;
                    border-color: #34495e !important; 
                } 
            }

        </style>
    </head>
    <body class="">
        <span class="preheader">This is preheader text. Some clients will show this text as a preview.</span>
        <table role="presentation" border="0" cellpadding="0" cellspacing="0" class="body">
            <tr>
                <td>&nbsp;</td>
                <td>
                    <div class="content">
                        <table style="width: 600px; height:100px;">
                            <tr>
                                <td>
                                    <img src="http://vb.stationeryonline.in/images/vyspro-emblem.png" width="100px" />
                                </td>
                                <td style="text-align: center;">
                                    <img src="http://vb.stationeryonline.in/images/top-header.png" />
                                </td>
                                <td style="text-align: right;"><img src="http://vb.stationeryonline.in/images/vasavi-devi.png" width="80px" /></td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <section class="page">  
                                        <div>
                                            <h3 style="color: #D70000; font-weight: bold;font-style: italic; font-family: monospace;">CONGRATULATIONS..........</h3>
                                            <div class="row formContainer"> 
                                                <p>
                                                    <span style="font-weight:bold">Dear %%%donaorname%%%,</span><br /><br />
                                                    Please refer to your donation in respect of honoring Meritorious Student under <span style="font-weight:bold"> %%%category%%% </span> Category.<br />
                                                    In this respect, as part of Vidya Bharathi 2019, we are pleased to inform you that the said Medal has been awarded to <span style="font-weight:bold">%%%studentName%%% </span>. <br />
                                                    We also cordially invite you & your family to attend the programme on <span style="font-weight:bold">Sunday, the 22nd day of December 2019</span> at our Vyspro – India Premises.,<br /><br />

                                                    <span style="font-weight:bold">Lunch</span>		: 	1.30 p.m.to 2.15 p.m.<br />
                                                    <span style="font-weight:bold">Event</span>		:	2.30 p.m. to 5.30 p.m.<br />
                                                    <span style="font-weight:bold">Venue</span>		: 	Flat No.4, Topaz Plaza, CM Camp Office Exit Road,<br />
                                                    Panjagutta, Hyderabad – 500 082<br /> 
                                                    <span style="font-weight:bold">Location Map</span>: <a target="_blank" href="https://goo.gl/maps/P2ebfAmPyZ8HY8gz7">Link</a>
                                                    <br />
                                                    <br />

                                                    <span style="font-weight:bold">Vyspro-India Committee</span><br />
                                                <table class="table table-condensed">
                                                    <tbody>
                                                        <tr>
                                                            <td>Ln G Madhu Mohan</td>
                                                            <td>President</td>
                                                        </tr>
                                                        <tr >
                                                            <td>Er R. Srinivasa Rao</td>                                                                
                                                            <td>General Secretary</td>

                                                        </tr>
                                                        <tr>
                                                            <td>CA GURURAJ G</td>  
                                                            <td>Treasurer</td>

                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <br /><br />
                                                <span style="font-weight:bold">Vidya Bharathi Project 2019 Team</span>
                                                <br />

                                                <table class="table table-condensed">
                                                    <tbody>
                                                        <tr>
                                                            <td style="font-weight:bold">Project Chairman:</td>
                                                            <td colspan="2" style="font-weight:bold">Advisors:</td>
                                                        </tr>
                                                        <tr >
                                                            <td style="padding-left:30px;">CA Ramesh Babu Kollipara</td>                                                                
                                                            <td style="padding-left:30px;">CA P. Rajeswara Rao</td>

                                                        </tr>
                                                        <tr>
                                                            <td style="font-weight:bold">Project Co-Chairmen:</td>  
                                                            <td style="padding-left:30px;">CA G V Ramavataram </td>

                                                        </tr>
                                                        <tr>
                                                            <td style="padding-left:30px;">CA Leela Krishna Mohan Kota</td>                                                                
                                                            <td style="padding-left:30px;">CA S. Surya Prakash </td>

                                                        </tr>
                                                        <tr>
                                                            <td style="padding-left:30px;">CA Vijay Kalimicherla</td>

                                                            <td style="padding-left:30px;">CA S. Narayana Murthy</td>

                                                        </tr>
                                                        <tr>
                                                            <td style="padding-left:30px;">CA Labhishetty Praneeth Kumar</td>

                                                            <td style="padding-left:30px;"></td>

                                                        </tr>
                                                        <tr>
                                                            <td style="padding-left:30px;">Praveen Kumar Bolisetty, <span style="font-size:10px;">MCA</span> (Technical support)</td>

                                                            <td style="padding-left:30px;"></td>

                                                        </tr>
                                                    </tbody>
                                                </table>
                                                </p>
                                            </div>
                                        </div>
                                    </section>
                                </td>
                            </tr>
                        </table>

                        <!-- END CENTERED WHITE CONTAINER -->
                        <hr style="border-bottom:1px solid #000; margin:0px;" />
                        <!-- START FOOTER -->
                        <div class="footer">
                            <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td class="content-block">
                                        <span class="apple-link">Vyspro-India, Flat No.4, Topaz Plaza, CM Camp Office Exit <br />
                                            Road, Panjagutta, Hyderabad, <br />
                                            Hyderabad,
                                            Telangana, India - 500082</span>
                                    </td>
                                </tr>
                                <tr>

                                </tr>
                            </table>
                        </div>
                        <!-- END FOOTER -->

                    </div>
                </td>
                <td>&nbsp;</td>
            </tr>
        </table>
    </body>
</html>
