<!DOCTYPE html>
<?PHP
// if(isset($_SESSION)){
//print_r($_SESSION);}exit;
?>
<!--[if lt IE 9 ]> <html lang="en" dir="ltr" class="no-js ie-old"> <![endif]-->
<!--[if IE 9 ]> <html lang="en" dir="ltr" class="no-js ie9"> <![endif]-->
<!--[if IE 10 ]> <html lang="en" dir="ltr" class="no-js ie10"> <![endif]-->
<!--[if (gt IE 10)|!(IE)]><!-->
<html lang="en" dir="ltr" class="no-js">
    <!--<![endif]-->
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <head>

        <!-- ––––––––––––––––––––––––––––––––––––––––– -->
        <!-- META TAGS                                 -->
        <!-- ––––––––––––––––––––––––––––––––––––––––– -->
        <meta charset="utf-8">
        <!-- Always force latest IE rendering engine -->
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- Mobile specific meta -->
        <meta name="viewport" content="width=device-width, initial-scale=1">    

        <!-- ––––––––––––––––––––––––––––––––––––––––– -->
        <!-- PAGE TITLE                                -->
        <!-- ––––––––––––––––––––––––––––––––––––––––– -->
        <title>Save Paise | Coupons, Deals, Discounts and Promo codes Website</title>

        <!-- ––––––––––––––––––––––––––––––––––––––––– -->
        <!-- SEO METAS                                 -->
        <!-- ––––––––––––––––––––––––––––––––––––––––– -->
        <meta name="description" content="Save Paise is a responsive multipurpose-ecommerce site template allows you to store coupons and promo codes from different brands and create store for deals, discounts, It can be used as coupon website such as groupon.com and also as online store">
        <meta name="	black Save Paise, coupon, coupon codes, coupon theme, coupons, deal news, deals, discounts, ecommerce, Save Paise deals, groupon, promo codes, responsive, shop, store coupons">
        <meta name="robots" content="index, follow">
        <meta name="author" content="CODASTROID">

        <!-- ––––––––––––––––––––––––––––––––––––––––– -->
        <!-- PAGE FAVICON                              -->
        <!-- ––––––––––––––––––––––––––––––––––––––––– -->

        <link rel="icon" href="<?php echo base_url(); ?>assets/images/favicon/fav-icon.png">

        <!-- ––––––––––––––––––––––––––––––––––––––––– -->
        <!-- GOOGLE FONTS                              -->
        <!-- ––––––––––––––––––––––––––––––––––––––––– -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600" rel="stylesheet">

        <!-- ––––––––––––––––––––––––––––––––––––––––– -->
        <!-- Include CSS Filess                        -->
        <!-- ––––––––––––––––––––––––––––––––––––––––– -->

        <!-- Bootstrap -->
        <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">

        <!-- Font Awesome -->
        <link href="<?php echo base_url(); ?>assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">

        <!-- Linearicons -->
        <link href="<?php echo base_url(); ?>assets/vendors/linearicons/css/linearicons.css" rel="stylesheet">

        <!-- Owl Carousel -->
        <link href="<?php echo base_url(); ?>assets/vendors/owl-carousel/owl.carousel.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/vendors/owl-carousel/owl.theme.min.css" rel="stylesheet">

        <!-- Flex Slider -->
        <link href="<?php echo base_url(); ?>assets/vendors/flexslider/flexslider.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="<?php echo base_url(); ?>assets/css/base.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet" />

    </head>

    <body id="body" class="wide-layout preloader-active">



        <!-- ––––––––––––––––––––––––––––––––––––––––– -->
        <!-- PRELOADER                                 -->
        <!-- ––––––––––––––––––––––––––––––––––––––––– -->
        <!-- Preloader -->
        <div id="preloader" class="preloader">
            <div class="loader-cube">
                <div class="loader-cube__item1 loader-cube__item"></div>
                <div class="loader-cube__item2 loader-cube__item"></div>
                <div class="loader-cube__item4 loader-cube__item"></div>
                <div class="loader-cube__item3 loader-cube__item"></div>
            </div>
        </div>
        <!-- End Preloader -->
        <!-- ––––––––––––––––––––––––––––––––––––––––– -->
        <!-- WRAPPER                                   -->
        <!-- ––––––––––––––––––––––––––––––––––––––––– -->
        <div id="pageWrapper" class="page-wrapper">
            <!-- –––––––––––––––[ HEADER ]––––––––––––––– -->
            <header id="mainHeader" class="main-header"> 

                <!-- Header Header -->
                <div class="header-header bg-white">
                    <div class="container">
                        <div class="welcome-msg">Welcome ! <span class="guestName">
                                <?PHP
                                if (isset($_SESSION['firstname']) && $_SESSION['firstname'] != '' || isset($_SESSION['usertype']) && $_SESSION['usertype'] != '') {
                                    echo $_SESSION['firstname'] . ' ' . $_SESSION['lastname'];
                                } else {
                                    ?>                                    
                                    Guest</span></div>
                        <?PHP } ?>    


                        </span>
                        <div class="row row-rl-0 row-tb-20 row-md-cell">  

                            <div class="brand col-md-3 t-xs-center t-md-left valign-middle">
                                <?PHP
                                if ($this->session->flashdata() != NULL) {
                                    echo "<div class ='rgmsg' >" . $this->session->flashdata('msg') . "</div>";
                                }
                                ?>
                                <a href="<?PHP echo base_url() . 'index' ?>" class="logo">
                                    <img src="assets/images/logo.png" alt="" width="250">
                                </a>
                            </div>
                            <div class="header-search col-md-9">
                                <div class="row row-tb-10 ">
                                    <div class="col-sm-5">
                                        <form class="search-form">
                                            <div class="input-group">
                                                <input type="text" class="form-control input-lg search-input" placeholder="Enter Keyword Here ..." required="required">
                                                <div class="input-group-btn">
                                                    <div class="input-group">                                                    
                                                        <div class="input-group-btn">
                                                            <button type="submit" class="btn btn-lg btn-search btn-block">
                                                                <i class="fa fa-search font-16"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-sm-4 t-xs-center t-md-right">
                                        <div class="add-234x60"><p>234x60 add here</p></div>
                                    </div>

                                    <div class="col-sm-3 t-xs-center t-md-right mgn-tp-15">
                                        <?PHP if (isset($_SESSION['usertype']) && $_SESSION['usertype'] != '') { ?>
                                            <a href="<?PHP echo base_url() ?>/index/logout" onclick="return confirm('Are you sure you want to Sign out?')"  class="logout"><i class="icon-signout"></i> Logout </a>                                            
                                            <!--<div class="wishlist"><a title="My Wishlist" target="_blank"  href="<?PHP echo URLINDEXPATH; ?>abp/wishlist"><span class="hidden-xs">Wishlist</span></a></div>-->  
                                        <?PHP } else { ?>
                                            <div class="header-cart">
                                                <a href="#" data-toggle="modal" data-target="#signIn"><i class="fa fa-lock"></i> Sign In</a>
                                            </div>
                                            <div class="header-wishlist ml-20">
                                                <a href="#" data-toggle="modal" data-target="#signUp"><i class="fa fa-user"></i> Sign Up</a> 
                                            </div>
                                        <?PHP } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Header Header -->

                <!-- Header Menu -->
                <div class="header-menu bg-blue">
                    <div class="container">
                        <nav class="nav-bar">
                            <div class="nav-header">
                                <span class="nav-toggle" data-toggle="#header-navbar">
                                    <i></i>
                                    <i></i>
                                    <i></i>
                                </span>
                            </div>
                            <div id="header-navbar" class="nav-collapse">
                                <ul class="nav-menu">
                                    <li class="active">
                                        <a href="<?PHP echo base_url() . 'index' ?>">Home</a>
                                    </li>
                                    <li class="dropdown-mega-menu">
                                        <a href="#">Online Stores</a>

                                        <div class="mega-menu">
                                            <div class="row row-v-10">
                                                <div class="col-md-3">
                                                    <ul>                                                        
                                                        <?PHP foreach ($stores as $store) {
                                                            ?>
                                                            <li><a href=""><?PHP echo $store->store_name; ?></a></li>
                                                        <?PHP }
                                                        ?>

                                                    </ul>
                                                </div>                                         


                                            </div>
                                        </div>
                                    </li>
                                    <li class="dropdown-mega-menu">
                                        <a href="#">Popular Categories</a>
                                        <div class="mega-menu">
                                            <div class="row row-v-10">
                                                <div class="col-md-3">
                                                    <ul>
                                                        <?PHP foreach ($categories as $cat) {
                                                            ?>
                                                            <li><a href=""><?PHP echo $cat->cat_name; ?></a></li>
                                                        <?PHP }
                                                        ?>
                                                    </ul>
                                                </div>                                            

                                                <!--                                                <div class="col-md-3">
                                                                                                    <ul>
                                                                                                        <li><a href="category-deals.php">Fashion</a></li>
                                                                                                        <li><a href="#">Mobile Offers</a></li>
                                                                                                        <li><a href="#">Baby Clothes</a></li>
                                                                                                        <li><a href="#">Hotels</a></li>
                                                                                                    </ul>
                                                                                                </div>-->
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <a href="#">Shop by Brands</a>
                                        <ul>
                                            <?PHP foreach ($brands as $brand) {
                                                ?>
                                                <li><a href=""><?PHP echo $brand->brand_name; ?></a></li>
                                            <?PHP }
                                            ?>

                                        </ul>
                                    </li>

                                    <li><a href="contact-us.php">Contact Us</a> </li>                                 

                                </ul>
                            </div>

                        </nav>
                    </div>
                </div>
                <!-- End Header Menu -->

            </header>
            <!-- –––––––––––––––[ HEADER ]––––––––––––––– -->

            <script>

//$(document).ready(function(){

                //   setTimeout(function() {
                //    $('.rgms').modal('hide');
                //  }, 5000);
//});

            </script>