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
        <meta name="description" content="Save Paise is a responsive multipurpose-ecommerce site allows you to store coupons and promo codes from different brands and create store for deals, discounts" />
        <meta name="keywords" content="Save Paise, coupon, coupon codes, flipkart deals, amazon deals, jabon coupons, Deals of the day, daily coupons, deals, discounts, ecommerce, Save Paise deals, groupon, promo codes, shop, store coupons" />
        <meta name="robots" content="index, follow">
        <meta name="author" content="SavePaise">

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
        <script type="text/javascript">
            (function (i, s, o, g, r, a, m) {
                i['GoogleAnalyticsObject'] = r;
                i[r] = i[r] || function () {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
                a = s.createElement(o),
                        m = s.getElementsByTagName(o)[0];
                a.async = 1;
                a.src = g;
                m.parentNode.insertBefore(a, m)
            })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

            ga('create', 'UA-6498159-5', 'auto');
            ga('send', 'pageview');

        </script>


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


                        <div class="row row-rl-0 row-tb-20 row-md-cell">  

                            <div class="brand col-md-3 t-xs-center t-md-left valign-middle">
                                <?PHP
                                if ($this->session->flashdata() != NULL) {
                                    echo "<div class ='rgmsg' >" . $this->session->flashdata('msg') . "</div>";
                                }
                                ?>
                                <a href="<?PHP echo base_url() ?>" class="logo">
                                    <img src="/assets/images/logo.png" alt="" width="250" />
                                </a>
                            </div>
                            <div class="header-search col-md-9">
                                <div class="row row-tb-10 ">
                                    <div class="col-sm-7">
                                        <form class="search-form">
                                            <div class="input-group">
                                                <input type="text" class="form-control input-lg search-input" id="txtHint" placeholder="Enter Keyword Here ..." required="required" onkeyup="showHint(this.value)">
                                                <div class="input-group-btn">
                                                    <span id="txtHint"></span></br>
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
                                    <div class="col-sm-5 t-xs-center t-md-right">
                                        <div class="add-234x60">
                                            <div data-WRID="WRID-148491855160624029" data-widgetType="staticBanner"  data-class="affiliateAdsByFlipkart" height="60" width="234"></div><script async src="//affiliate.flipkart.com/affiliate/widgets/FKAffiliateWidgets.js"></script>
                                        </div>
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
                                    <li>
                                        <a href="<?PHP echo base_url(); ?>">Home</a>
                                    </li>
                                    <li class="dropdown-mega-menu">
                                        <a href="#">Online Stores</a>

                                        <div class="mega-menu">
                                            <div class="row row-v-10">
                                                <div class="col-md-12">
                                                    <ul>                                                        
                                                        <?PHP
                                                        foreach ($stores as $store) {
//                                                           $this->input->post($store->store_name);
                                                            ?>
                                                            <li><a href="<?PHP echo base_url() ?>index/store/<?PHP echo $store->store_name ?>"><?PHP echo $store->store_name; ?></a></li>
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
                                                <div class="col-md-12">
                                                    <ul>
                                                        <?PHP foreach ($sub_categories as $cat) {
                                                            ?>
                                                            <li><a href="<?PHP echo base_url() ?>index/subcategories/<?PHP echo str_replace(' ', '-', $cat->scat_name); ?>"><?PHP echo $cat->scat_name; ?></a></li>
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
                                    <!--                                    <li>
                                                                            <a href="#">Shop by Brands</a>
                                                                            <ul>
                                    <?PHP // foreach ($brands as $brand) {
                                    ?>
                                                                                    <li><a href=""><?PHP // echo $brand->brand_name;  ?></a></li>
                                    <?PHP // }
                                    ?>
                                    
                                                                            </ul>
                                                                        </li>-->

                                    <li><a href="<?PHP echo base_url() . 'index/contact_us' ?>">Contact Us</a> </li>    

                                    <div class="welcome-msg pull-right">Welcome ! <span class="guestName">

                                            <?PHP
                                            if (isset($_SESSION['firstname']) && $_SESSION['firstname'] != '' || isset($_SESSION['usertype']) && $_SESSION['usertype'] != '') {
                                                echo $_SESSION['firstname'] . ' ' . $_SESSION['lastname'];
                                            } else {
                                                ?>                                    
                                                Guest</span>
                                        <?PHP } ?> 
                                    </div>
                                    <li class="dropdown pull-right active">

                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i></a>
                                        <ul class="dropdown-menu bullet pull-center">       
                                          
                                            <li> 
                                                <?PHP if (isset($_SESSION['usertype']) && $_SESSION['usertype'] != '') { ?>
                                                <li><a href="#" data-toggle="modal" data-target="#edit_profile"><i class="fa fa-user"></i> Profile</a></li>
                                                <li><a href="#" data-toggle="modal" data-target="#changepassword"><i class="fa fa-key"></i> Change Password</a></li>
                                                 <li class="divider"></li>
                                                <li><a href="<?PHP echo base_url() ?>/index/logout" onclick="return confirm('Are you sure you want to Sign out?')"  class="logout"><i class="fa fa-sign-out"></i> Logout </a>     </li>                                       

    <!--<div class="wishlist"><a title="My Wishlist" target="_blank"  href=""abp/wishlist"><span class="hidden-xs">Wishlist</span></a></div>-->  
                                            <?PHP } else { ?>
                                        </li>

                                        <li>                                             
                                            <a href="#" data-toggle="modal" data-target="#signIn"><i class="fa fa-unlock"></i> Sign In</a>                                            
                                        </li>                                            
                                        <li>                                             
                                            <a href="#" data-toggle="modal" data-target="#signUp"><i class="fa fa-lock"></i> Sign Up</a>                                             
                                        </li>

                                    <?PHP } ?>
                                </ul>
                                </li>                                      



                                </ul>
                            </div>

                        </nav>
                    </div>
                </div>
                <!-- End Header Menu -->

            </header>
            <!-- –––––––––––––––[ HEADER ]––––––––––––––– -->

            <script type="text/javascript" >
                function showHint(str) {
                    if (str.length == 0) {
                        document.getElementById("txtHint").innerHTML = "";
                        return;
                    } else {
                        if (window.XMLHttpRequest) {

                            var xmlhttp = new XMLHttpRequest();
                        } else {
                            xmlhttp = new ActivexObject("Microsoft.XMLHTTP");
                        }
                        xmlhttp.onreadystatechange = function () {
                            if (this.readyState == 4 && this.status == 200) {
                                document.getElementById("txtHint").innerHTML = this.responseText;
                            }
//                        else {
//                            console.log(this.readyState, this.status);
//                        }
                        };
                        xmlhttp.open("GET", "<?PHP echo base_url() ?>index/search_suggestion?q=" + str, true);
                        xmlhttp.send();
                    }
                }
            </script>