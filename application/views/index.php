
<?PHP
//if ($this->session->flashdata() != NULL) {
//    echo $this->session->flashdata('msg');
//}
//echo "<pre>";
//print_r($records);
//exit;

include_once('common/header.php');
?>

<!-- –––––––––––––––[ PAGE CONTENT ]––––––––––––––– -->
<main id="mainContent" class="main-content">
    <div class="page-container ptb-10">
        <div class="container">
            <div class="section deals-header-area">
                <div class="row row-tb-10">
                    <div class="col-xs-12 col-md-4 col-lg-3">
                        <aside>
                            <ul class="nav-coupon-category panel">
                                <?PHP // foreach ($sub_categories as $sub_cat) {
                                    ?>
    <!--                                <li><a href="<?PHP // echo base_url()  ?>index/get_categories/<?PHP echo str_replace(' ', '_', $cat->cat_name) ?>"><i class="fa fa-cutlery"></i><?PHP echo $sub_cat->cat_name; ?></a></li>-->
                                <!--<li><a href="<?PHP // echo base_url() ?>index/get_categories/<?PHP // echo str_replace(' ', '_', $cat->cat_name) ?>"><i class="fa fa-cutlery"></i><?PHP echo $sub_cat->scat_name; ?></a></li>-->
                                <?PHP // }
                                ?>
                                <?PHP
//                                for($i = 0;$i<=9;$i++){ 
                                $tmp = 0;
                                foreach ($sub_categories as $sub_cat) {
                                    $tmp = $tmp+1;
                                    if($tmp<10){
                                    ?>
    <!--                                <li><a href="<?PHP // echo base_url()  ?>index/get_categories/<?PHP echo str_replace(' ', '_', $cat->cat_name) ?>"><i class="fa fa-cutlery"></i><?PHP echo $sub_cat->cat_name; ?></a></li>-->
                                <li><a href="<?PHP echo base_url() ?>index/subcategories/<?PHP echo str_replace(' ', '-', $sub_cat->scat_name); ?>"><i class="fa fa-cutlery"></i><?PHP echo $sub_cat->scat_name; ?></a></li>
                                <?PHP }
                                }
                                ?>

                                <li class="all-cat">
                                    <a class="font-14" href="#">All Categories</a>
                                </li>
                            </ul>
                        </aside>
                    </div>
                    <div class="col-xs-12 col-md-8 col-lg-9">
                        <div class="header-deals-slider owl-slider" data-loop="true" data-autoplay="true" data-autoplay-timeout="10000" data-smart-speed="1000" data-nav-speed="false" data-nav="true" data-xxs-items="1" data-xxs-nav="true" data-xs-items="1" data-xs-nav="true" data-sm-items="1" data-sm-nav="true" data-md-items="1" data-md-nav="true" data-lg-items="1" data-lg-nav="true">

                            <div class="deal-single panel item">
                                <figure class="deal-thumbnail embed-responsive embed-responsive-16by9" data-bg-img="/assets/images/deals/deal_01.jpg">
                                    <!--<div class="label-discount top-10 right-10">-50%</div>-->

                                    <div class="deal-about p-20 pos-a top-5 left-0">
                                        <div class="rating mb-10">
                                            <span class="rating-stars" data-rating="5">
                                                <i class="fa fa-star-o star-active"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                            </span>
                                            <span class="rating-reviews color-light">
                                                ( <span class="rating-count">241</span> Reviews )
                                            </span>
                                        </div>
                                        <h3 class="deal-title mb-10 ">
                                            <a href="#" class="color-light color-h-lighter">The Crash Bad Instant Folding Twin Bed</a>
                                        </h3>
                                    </div>
                                </figure>
                            </div>
                            <div class="deal-single panel item">
                                <figure class="deal-thumbnail embed-responsive embed-responsive-16by9" data-bg-img="/assets/images/deals/deal_02.jpg">
                                    <!--<div class="label-discount top-10 right-10">-30%</div>-->

                                    <div class="deal-about p-20 pos-a top-5 left-0">
                                        <div class="rating mb-10">
                                            <span class="rating-stars" data-rating="5">
                                                <i class="fa fa-star-o star-active"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                            </span>
                                            <span class="rating-reviews color-light">
                                                ( <span class="rating-count">132</span> Reviews )
                                            </span>
                                        </div>
                                        <h3 class="deal-title mb-10 ">
                                            <a href="#" class="color-light color-h-lighter">Western Digital USB 3.0 Hard Drives</a>
                                        </h3>
                                    </div>
                                </figure>
                            </div>
                            <div class="deal-single panel item">
                                <figure class="deal-thumbnail embed-responsive embed-responsive-16by9" data-bg-img="/assets/images/deals/deal_03.jpg">
                                    <!--<div class="label-discount top-10 right-10">-30%</div>-->

                                    <div class="deal-about p-20 pos-a top-5 left-0">
                                        <div class="rating mb-10">
                                            <span class="rating-stars" data-rating="5">
                                                <i class="fa fa-star-o star-active"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                            </span>
                                            <span class="rating-reviews color-light">
                                                ( <span class="rating-count">160</span> Reviews )
                                            </span>
                                        </div>
                                        <h3 class="deal-title mb-10 ">
                                            <a href="#" class="color-light color-h-lighter">Hampton Bay LED Light Ceiling Exhaust Fan</a>
                                        </h3>
                                    </div>
                                </figure>
                            </div>

                        </div>
                        <!-- save money best price -->
                        <div class="section explain-process-area ptb-10">
                            <div class="row row-rl-10">
                                <div class="col-md-6">
                                    <div class="item panel">
                                        <div class="row row-rl-5 row-xs-cell">                                             
                                            <div class="col-xs-12">
                                                <div style="width:415px; height: 200px; background: #fafafa;"></div>
                                               <!-- <h5 class="mb-10 pt-5">Deals & Coupons</h5>
                                                <p class="color-mid">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iure aspernatur.</p>
                                            -->
                                               </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="item panel">
                                        <div class="row row-rl-5 row-xs-cell">                                             
                                            <div class="col-xs-12">
                                                 <div style="width:415px; height: 200px; background: #fafafa;"></div>
                                               <!-- <h5 class="mb-10 pt-5">Find Best Offers</h5>
                                                <p class="color-mid">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iure aspernatur.</p>
                                            -->
                                               </div>
                                        </div>
                                    </div>
                                </div>
                                 
                            </div>
                        </div>
                        <!-- save money best price -->
                    </div>

                </div>
            </div>


            <section class="section latest-deals-area">
                <header class="panel ptb-10 prl-20 pos-r mb-10">
                    <h3 class="section-title font-18">Latest Deals</h3>
                    <a href="<?PHP base_url() ?>index/store_deals" class="btn btn-o btn-xs pos-a right-10 pos-tb-center">View All</a>
                </header>
                <div class="row row-masnory row-tb-20" id="home-latestDeals">

                </div>                
            </section>
            <div class="col-sm-12">					 
                <div class="add-970x90"><p>add size will be 970x90 here</p></div>					 
            </div>
            <section class="section latest-coupons-area ptb-30">
                <header class="panel ptb-10 prl-20 pos-r mb-10">
                    <h3 class="section-title font-18">Latest Coupons</h3>
                    <a href="<?PHP base_url() ?>index/coupons" class="btn btn-o btn-xs pos-a right-10 pos-tb-center">View All</a>
                </header>
                <div class="row row-masnory row-tb-20" id="home-latestCoupons">

                </div>
            </section>
            <div class="col-sm-12">					 
                <div class="add-970x90"><p>add size will be 970x90 here</p></div>					 
            </div>
            <section class="section stores-area stores-area-v1">
                <header class="panel ptb-10 prl-20 pos-r mb-10">
                    <h3 class="section-title font-18">Popular Stores</h3>
                    <a href="<?PHP base_url() ?>index/stores" class="btn btn-o btn-xs pos-a right-10 pos-tb-center">All Stores</a>
                </header>
                <div class="popular-stores-slider" data-loop="true" data-autoplay="true" data-smart-speed="1000" data-autoplay-timeout="10000" data-margin="20" data-items="2" data-xxs-items="2" data-xs-items="2" data-sm-items="3" data-md-items="5" data-lg-items="6">
                    <?PHP
                    foreach ($stores as $popularStore) {
                        ?>
                        <div class="store-item t-center">
                            <a href="#" class="is-block">
                                <div class="embed-responsive embed-responsive-4by3">
                                    <div class="store-logo view view-fifth">
                                        <img src="<?PHP echo $popularStore->store_image; ?>" alt="<?PHP echo $popularStore->store_name; ?>" />
                                        <div class="mask">
                                            <h6><?PHP echo $popularStore->store_name ?></h6> 												 
                                            <a href="<?PHP echo $popularStore->store_link; ?>" target="_blank" class="info">73 Offers</a>
                                        </div>
                                    </div>
                                </div>
                                <h6 class="store-name ptb-10"><a href="<?PHP echo $popularStore->store_link; ?>" target="_blank"><?PHP echo $popularStore->store_name; ?></a></h6>
                            </a>
                        </div> 
                        <?PHP
                    }
                    ?>
                </div>
            </section>

        </div>
    </div>


</main>
<?PHP
$extraSript = '
<script type="text/javascript">
    getDeals("","","","Promotion","12","home-latestDeals");
    getDeals("","","","Coupon","12","home-latestCoupons");
</script>';
?>

<!-- –––––––––––––––[ END PAGE CONTENT ]––––––––––––––– -->
<?php include_once('common/footer.php'); ?>

