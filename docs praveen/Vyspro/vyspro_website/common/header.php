<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if (isset($pageTitle)) {
    $pageTitleDisplay = $pageTitle;
} else {
    $pageTitleDisplay = "Home";
}
?>
<!DOCTYPE HTML>
<html>
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <?PHP
        if ($_SERVER['SERVER_NAME'] == 'vysproindia.com') {
            ?>
            <!-- Global site tag (gtag.js) - Google Analytics -->
            <script async src="https://www.googletagmanager.com/gtag/js?id=UA-158286785-1"></script>
            <script>
                window.dataLayer = window.dataLayer || [];
                function gtag() {
                    dataLayer.push(arguments);
                }
                gtag('js', new Date());

                gtag('config', 'UA-158286785-1');
            </script>
            <?PHP
        }
        ?>

        
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?PHP echo $pageTitleDisplay; ?>&nbsp;|&nbsp;Vyspro India-Vysya Professionals Association</title>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
        <link rel="apple-touch-icon" href="touch-icon-iphone.png" />
        <link rel="apple-touch-icon" sizes="76x76" href="touch-icon-ipad.png" />
        <link rel="apple-touch-icon" sizes="120x120" href="touch-icon-iphone-retina.png" />
        <link rel="apple-touch-icon" sizes="152x152" href="touch-icon-ipad-retina.png" />
        <meta name="description" content="The VYSPRO is an association of Professionals from 8 professions. These are Chartered Accountants, Company Secretaries, Cost Accountants, Doctors, Advocates, Engineers,MBA’s and MCAs." />
        <meta name="keywords" content="arya vysya sangam, arya vysya, arya vysya Vyspro India, Vyspro, aryavysya, aryavyshya, arya vysya community, online arya vysya, vysya, vaishya, gupta, komati,arya vysya gothralu, arya vysya satralu, arya vysya satram, kanyaka parameshwari,vasavi matha, arya vysya social service, arya vysya donations, arya vysya activities, relationship, arya vysya caste,hindu religion,Free Registration" />
        <meta name="author" content="Vyspro-India" />


        <!-- 
        //////////////////////////////////////////////////////

        FREE HTML5 TEMPLATE 
        DESIGNED & DEVELOPED by FreeHTML5.co
                
        Website: 		http://freehtml5.co/
        Email: 			info@freehtml5.co
        Twitter: 		http://twitter.com/fh5co
        Facebook: 		https://www.facebook.com/fh5co

        //////////////////////////////////////////////////////
        -->

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
        <link  rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">


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
        <script async src="/js/modernizr-2.6.2.min.js"></script>
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
            <nav class="fh5co-nav" role="navigation">
                <div class="top">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-2 text-right"> 
                                <p class="site">
                                    <img src="../images/vyspro-emblem.png" width="75" />
                                </p>
                            </div>
                            <div class="col-sm-6"><img src="../images/vysproindia-logo.png" height="100" />
                                <?PHP
                                if (isset($showVIFLogo) && $showVIFLogo == 1) {
                                    ?>
                                    <span style="padding-left: 25px;"><img src="../images/viflogo.jpeg" height="100" /></span>
                                    <?PHP
                                }
                                ?>
                            </div>
                            <div class="col-sm-1 d-none d-sm-block"><img src="../images/vasavi-devi.png" height="80" /></div>

                            <div class="col-sm-2 d-none d-sm-block">
                                <ul class="fh5co-social">
                                    <li><a target="_blank" href="https://www.facebook.com/VysproIndiaVysyaProfessionalsAssociation"><i class="icon-facebook2"></i></a></li>
                                    <span>+91 868 882 8969<br />vysproindia@gmail.com</span>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
                <?PHP
                if (isset($_SESSION['eventsDisplay']) && is_array($_SESSION['eventsDisplay'])) {
                    ?>
                    <div class="tcontainer">
                        <div class="ticker-wrap">
                            <div class="ticker-move">
                                <?PHP
//                                echo "<pre>";
//                                print_r($_SESSION);
//                                echo "</pre>";
                                foreach ($_SESSION['eventsDisplay'] as $hearderevents) {
                                    ?>
                                    <div class='ticker-item'><?PHP echo date('d-M-Y', strtotime($hearderevents['event_starttime'])) . " - " . $hearderevents['event_name']; ?></div>
                                    <?PHP
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <?PHP
                }
                ?>
                <div class="top-menu d-none d-sm-block">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-3 ">
                                <div id="fh5co-logo">
                                    <a href="/">
                                        <i class="icon-study"></i>Vyspro-India
                                    </a>
                                </div>
                            </div>
                            <div class="col-sm-9 text-right menu-1">
                                <ul>
                                    <li class="active"><a href="/">Home</a></li>
                                    <li class="has-dropdown">
                                        <a href="#">About us</a>
                                        <ul class="dropdown">
                                            <li><a href="/spirit">Spirit of VysPro-India</a></li>
                                            <li><a href="/about">About Vyspro</a></li>
                                            <li><a href="/committee">Committee Members</a></li>
                                            <li><a href="#">President Message</a></li>
                                            <li><a href="/past-presidents">Past Presidents</a></li>
                                            <li><a href="/office-bearers">Office Bearers</a></li>
                                            <li><a href="/members">Members</a></li>
                                            <li><a href="/advisors">Advisors</a></li>
                                        </ul>
                                    </li>
                                    <li class="has-dropdown">
                                        <a href="#">VIF</a>
                                        <ul class="dropdown">
                                            <li><a href="about-vif">About VIF</a></li>
                                            <li><a href="founder-trustee">Founder Trustees</a></li>
                                            <li><a href="life-truestee">Life Trustees</a></li>
                                        </ul>
                                    </li>
                                    
                                    
                                    <li><a href="/vyspro-in-news">Vyspro in News</a></li>
                                    <li><a href="/events">Events</a></li>
                                    <li><a href="/knowledge">Knowledge Corner</a></li>
                                    <li><a href="/testimonials">Testimonials</a></li>
                                    <!--    <li class="has-dropdown">
                                                <a href="#">Blog</a>
                                                <ul class="dropdown">
                                                    <li><a href="#">Web Design</a></li>
                                                    <li><a href="#">eCommerce</a></li>
                                                    <li><a href="#">Branding</a></li>
                                                    <li><a href="#">API</a></li>
                                                </ul>
                                            </li>-->
                                    <li><a href="/contact">Contact</a></li>
                                    <!--<li class="btn-cta"><a href="#"><span>Member Login</span></a></li>-->
                                    <li class="btn-cta"><a href="/beamember"><span>Become a Member</span></a></li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </nav>
