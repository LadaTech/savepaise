<?PHP
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Home&nbsp;|&nbsp;Vyspro India-Vysya Professionals Association</title>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon" />
        <link rel="apple-touch-icon" href="touch-icon-iphone.png" />
        <link rel="apple-touch-icon" sizes="76x76" href="touch-icon-ipad.png" />
        <link rel="apple-touch-icon" sizes="120x120" href="touch-icon-iphone-retina.png" />
        <link rel="apple-touch-icon" sizes="152x152" href="touch-icon-ipad-retina.png" />
        <meta name="description" content="The VYSPRO is an association of Professionals from 8 professions. These are Chartered Accountants, Company Secretaries, Cost Accountants, Doctors, Advocates, Engineers,MBA’s and MCAs." />
        <meta name="keywords" content="arya vysya sangam, arya vysya, arya vysya Vyspro India, Vyspro, aryavysya, aryavyshya, arya vysya community, online arya vysya, vysya, vaishya, gupta, komati,arya vysya gothralu, arya vysya satralu, arya vysya satram, kanyaka parameshwari,vasavi matha, arya vysya social service, arya vysya donations, arya vysya activities, relationship, arya vysya caste,hindu religion,Free Registration" />
        <meta name="author" content="Vyspro-India" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

        <!-- Facebook and Twitter integration -->
        <meta property="og:title" content=""/>
        <meta property="og:image" content=""/>
        <meta property="og:url" content=""/>
        <meta property="og:site_name" content=""/>
        <meta property="og:description" content=""/>
        <meta name="twitter:title" content="" />
        <meta name="twitter:image" content="" />
        <meta name="twitter:url" content="" />
        <meta name="twitter:card" content="" />

        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:300,400" rel="stylesheet">

        <!-- Animate.css -->
        <link rel="stylesheet" href="/css/animate.css">
        <!-- Icomoon Icon Fonts-->
        <link rel="stylesheet" href="/css/icomoon.css">
        <!-- Bootstrap  -->
        <!--<link rel="stylesheet" href="/css/bootstrap.css">-->

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <!-- Magnific Popup -->
        <link rel="stylesheet" href="/css/magnific-popup.css">

        <!-- Owl Carousel  -->
        <link rel="stylesheet" href="/css/owl.carousel.min.css">
        <link rel="stylesheet" href="/css/owl.theme.default.min.css">

        <!-- Flexslider  -->
        <link rel="stylesheet" href="/css/flexslider.css">

        <!-- Pricing -->
        <link rel="stylesheet" href="/css/pricing.css">

        <!-- Theme style  -->
        <link rel="stylesheet" href="/css/style.css">

        <!-- Modernizr JS -->
        <script src="/js/modernizr-2.6.2.min.js"></script>
        <!-- FOR IE9 below -->
        <!--[if lt IE 9]>
        <script src="js/respond.min.js"></script>
        <![endif]-->
        <?PHP
        if (isset($customCSS)) {
            echo $customCSS;
        }
        ?>

    </head>
    <body>

        <div class="fh5co-loader"></div>


        <div id="page">
            <?PHP
            if (!isset($noHeader)) {
                ?>
                <nav class="fh5co-nav" role="navigation">
                    <div class="top">
                        <div class="container">
                            <div class="row">
                                <div class="col-xl-12 text-right">
                                    <p class="site">
                                        <img src="../images/vyspro-emblem.png" width="75" />                                   
                                    </p>
                                    <p class="logos"><img src="../images/vysproindia-logo.png" height="100" /></p>
                                    <p class="num"><img src="../images/vasavi-devi.png" height="80" /></p>
                                    <ul class="fh5co-social">
                                        <li><a target="_blank" href="https://www.facebook.com/VysproIndiaVysyaProfessionalsAssociation"><i class="icon-facebook2"></i></a></li>
                                        <span>+91 868 882 8969<br />database.vysproindia@gmail.com</span>
                                    </ul>

                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="top-menu">
                        <div class="container">
                            <div class="row">
                                <div class="col-xl-4 col-md-4">
                                    <div id="fh5co-logo">
                                        <a href="index.php">
                                            <i class="icon-study"></i>Vyspro-India

                                        </a>
                                    </div>
                                </div>
                                <div class="col-xl-8 text-right">
                                    <?PHP
//                                    print_r($_SESSION);
                                    if (isset($_SESSION['adminuserid'])) {
                                        ?>
                                        <ul>
                                            <li class="active"><a href="dashboard.php">Dashboard</a></li>
                                            <li><a href="cheyutha2020"><span>Cheyutha</span></a></li>
                                            <?PHP
                                            //if ($_SESSION['adminusertype'] != 'cheyuthavolunteer' && $_SESSION['adminusertype'] == 'vifPST' && $_SESSION['adminusertype'] == 'PST') {
                                                ?>
                                                <li class=""><a href="events.php">Events</a></li>
                                                <li><a href="lifemembers.php"><span>Life Members</span></a></li>
                                                 <li><a href="blogs.php"><span>Blogs</span></a></li>
                                                 <li><a href="testimonials.php"><span>Testimonials</span></a></li>
                                                <?PHP
//                                            } else {
                                                ?>                                              

                                    <!--<li class="btn-cta"><a href="#"><span>Member Login</span></a></li>-->
                                    <!--<li class="btn-cta"><a href="/beamember.php"><span>Become a Member</span></a></li>-->
                                                <?PHP
//                                            }
                                            ?>
                                            <li><a href="logout.php">Logout</a></li>
                                        </ul>
                                        <?PHP
                                    }
                                    ?>
                                </div>
                            </div>

                        </div>
                    </div>
                </nav>
                <?PHP
            }
            ?>
