<!DOCTYPE html>
<!-- saved from url=(0033)http://vysproindia.org/signin.php -->
<html class="js flexbox canvas canvastext webgl no-touch geolocation postmessage websqldatabase indexeddb hashchange history draganddrop websockets rgba hsla multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients cssreflections csstransforms csstransforms3d csstransitions fontface generatedcontent video audio localstorage sessionstorage webworkers no-applicationcache svg inlinesvg smil svgclippaths gr__vysproindia_org" style="">
    <!--<![endif]-->
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title><?PHP echo $headerTitle; ?> | Vyspro India-Vysya Professionals Association
        </title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="http://vysproindia.org/favicon.ico" type="image/x-icon">
        <link rel="apple-touch-icon" href="http://vysproindia.org/touch-icon-iphone.png">
        <link rel="apple-touch-icon" sizes="76x76" href="http://vysproindia.org/touch-icon-ipad.png">
        <link rel="apple-touch-icon" sizes="120x120" href="http://vysproindia.org/touch-icon-iphone-retina.png">
        <link rel="apple-touch-icon" sizes="152x152" href="http://vysproindia.org/touch-icon-ipad-retina.png">
        <link rel="stylesheet" type="text/css" href="http://vysproindia.org/css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="http://vysproindia.org/ui-lightness/jquery-ui.min.css">
        <link rel="stylesheet" type="text/css" href="http://vysproindia.org/css/main.css">

        <link rel="stylesheet" href="http://vysproindia.org/css/meanmenu.css" media="all">
        <link rel="stylesheet" href="http://vysproindia.org/css/jquery.bxslider.css">
        <link rel="stylesheet" type="text/css" href="http://vysproindia.org/css/font-awesome.min.css">
        <!--[if IE 7]>
        <link rel="stylesheet" type="text/css" href="css/font-awesome-ie7.min.css">
        <![endif]-->
        <link rel="stylesheet" type="text/css" href="http://vysproindia.org/css/jquery.fancybox.css" media="screen">
        <link rel="stylesheet" type="text/css" href="<?PHP echo $servername; ?>css/vb.css?v=16" />
        <script src="http://vysproindia.org/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
        <style type="text/css">.fancybox-margin{margin-right:0px !important;}
        </style>
        <style type="text/css">
            .error{
                color: red;
            }
            .textleft{
                text-align: left;
            }
            table.dataTable thead .sorting:after,
            table.dataTable thead .sorting:before,
            table.dataTable thead .sorting_asc:after,
            table.dataTable thead .sorting_asc:before,
            table.dataTable thead .sorting_asc_disabled:after,
            table.dataTable thead .sorting_asc_disabled:before,
            table.dataTable thead .sorting_desc:after,
            table.dataTable thead .sorting_desc:before,
            table.dataTable thead .sorting_desc_disabled:after,
            table.dataTable thead .sorting_desc_disabled:before {
                bottom: .5em;
            }

        </style>
    </head>
    <body data-gr-c-s-loaded="true" cz-shortcut-listen="true">
        <!--[if lt IE 8]>
        <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <div id="wrap">
            <header id="header">  
                <div class="clearfix">
                </div>  
                <div class="container">       
                    <div class="row">	  
                        <div class="col-md-3 hidden-sm hidden-xs">
                            <img src="http://vysproindia.org/images/vyspro-emblem.png" class="vasaviEmblem">
                        </div>     
                        <div class="col-md-6">
                            <a href="/index.php" class="logo">
                                <img src="/images/top-header.png" alt="Vyspro India" class="img-responsive"></a>
                        </div>  
                        <div class="col-md-3 hidden-sm hidden-xs">
                            <img src="http://vysproindia.org/images/vasavi-devi.png" class="vasaviLogo">
                        </div>     
                    </div>         
                    <!--navigation-->          
                    <nav id="navwrapper" class="clearfix">      
                        <ul id="nav">                            
                            <?PHP
                            if (isset($_SESSION['adminusername']) && $_SESSION['adminusername'] != '') {
                                ?>                           
                                <li>
                                    <a href="/admin/users.php">Users</a>
                                </li> 
                                <li>
                                    <a href="/admin/dailystatus.php">Status</a>
                                </li> 
                                <li>
                                    <a href="/admin/categories.php">Application Status</a>
                                </li>
                                <li>
                                    <a href="/admin/logout.php">Logout</a>
                                </li> 
                                <li style="text-align:right; float: right;">
                                    <a style="text-align:right; float: right;" href="#">Welcome! <?PHP echo $_SESSION['adminfullName']; ?></a>
                                </li> 
                                <?PHP
                            } else {
                                ?>
                                <li>
                                    <a href="/index.php">Home</a>
                                </li>
                                <li>                               
                                    <a href="/tracking.php" style="margin-left:10px; text-align:right;">Track your filled application</a>
                                </li>
                                <?PHP
                            }
                            ?>
                        </ul>    
                    </nav>  
                </div>
            </header>
            <div class="clearfix">
            </div>


