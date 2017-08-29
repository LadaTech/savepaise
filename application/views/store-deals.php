<?PHP include_once('common/header.php'); ?>
<!-- –––––––––––––––[ PAGE CONTENT ]––––––––––––––– -->
<main id="mainContent" class="main-content">
    <div class="page-container ptb-20">
        <div class="container">
            <div class="row row-rl-10 row-tb-10">
                <div class="page-sidebar col-md-3 col-xs-12">
                    <!-- Blog Sidebar -->
                    <aside class="sidebar blog-sidebar">
                        <div class="row row-tb-10">
                            <div class="col-xs-12">
                                <!-- Latest Deals Widegt -->
                                <div class="widget latest-deals-widget panel prl-20">
                                    <div class="widget-body ptb-20">
                                        <div class="coupon-logo">
                                            <?PHP
//                                            echo "<pre>";
//                                            print_r($specific_item_deals);exit;
                                            $specific_item = $this->uri->segment(3);
//                                            echo $specific_item;exit;
                                            if ((isset($specific_item)) && (!is_numeric($specific_item))) {
                                                foreach ($specific_item_deals as $deals_detail) {
                                                    
                                                }if (isset($deals_detail)) {
                                                    ?>

                                                    <a href="<?PHP echo $deals_detail->store_url; ?>" target="_blank" > <img src="<?PHP echo $deals_detail->store_image; ?>" />   </a>
                                                    <?PHP
                                                }
                                            } else {
                                                ?>
    <!--                                                  <img src="/assets/images/brands/brand_05.jpg" />-->
                                            <?PHP } ?>
                                            <div class="mb-5">
                                                <span class="rating">
                                                    <span class="rating-stars" data-rating="4">
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o star-active"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </span>
                                                </span>
                                            </div>
                                            <div class="visit-site">
                                                <?PHP if (isset($deals_detail)) { ?>
                                                    <a href="<?PHP echo $deals_detail->store_url; ?>" target="_blank">go to store</a>
                                                <?PHP } else { ?>
                                                    <a href="" target="_blank">go to store</a>
                                                <?PHP } ?>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <!-- End Latest Deals Widegt -->
                                <div class="add-250x250"><p>add size will be 250x250 here</p></div>
                            </div>
                            <div class="col-xs-12">
                                <!-- Subscribe Widget -->
                                <div class="widget subscribe-widget panel pt-20 prl-20">
                                    <h3 class="widget-title h-title">Categories</h3>
                                    <div class="widget-content ptb-10" id="style-3">

                                        <form method="post" action="#">
                                            <div class="input-group">
                                                <input type="radio" class="custom-radio" checked> All                                                        
                                            </div>
                                            <div class="input-group">
                                                <input type="radio" class="custom-radio"> Fashion                                                        
                                            </div>
                                            <div class="input-group">
                                                <input type="radio" class="custom-radio"> Hotels                                                        
                                            </div>
                                            <div class="input-group">
                                                <input type="radio" class="custom-radio"> Mobiles                                                        
                                            </div>
                                            <div class="input-group">
                                                <input type="radio" class="custom-radio"> Fashion                                                        
                                            </div>
                                            <div class="input-group">
                                                <input type="radio" class="custom-radio"> Hotels                                                        
                                            </div>
                                            <div class="input-group">
                                                <input type="radio" class="custom-radio"> Mobiles                                                        
                                            </div>
                                            <div class="input-group">
                                                <input type="radio" class="custom-radio"> Fashion                                                        
                                            </div>
                                            <div class="input-group">
                                                <input type="radio" class="custom-radio"> Hotels                                                        
                                            </div>
                                            <div class="input-group">
                                                <input type="radio" class="custom-radio"> Mobiles                                                        
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- End Subscribe Widget -->
                                <div class="add-250x250"><p>add size will be 250x250 here</p></div>
                            </div>
                            <div class="col-xs-12">
                                <!-- Best Rated Deals -->
                                <div class="widget best-rated-deals panel pt-20 prl-20">
                                    <h3 class="widget-title h-title">Best Rated Deals</h3>
                                    <div class="widget-body ptb-30">
                                        <div class="media">
                                            <div class="media-left">
                                                <a href="#">
                                                    <img class="media-object" src="/assets/images/brands/brand_05.jpg" alt="Thumb" width="80">
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="mb-5">
                                                    <a href="#">Aenean ut orci vel massa</a>
                                                </h6>
                                                <div class="mb-5">
                                                    <span class="rating">
                                                        <span class="rating-stars" data-rating="4">
                                                            <i class="fa fa-star-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                        </span>
                                                    </span>
                                                </div>
                                                <h4 class="price font-14">$60.00 <span class="price-sale color-muted">$200.00</span></h4>
                                            </div>
                                        </div>
                                        <div class="media">
                                            <div class="media-left">
                                                <a href="#">
                                                    <img class="media-object" src="/assets/images/brands/brand_02.jpg" alt="Thumb" width="80">
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="mb-5">
                                                    <a href="#">Aenean ut orci vel massa</a>
                                                </h6>
                                                <div class="mb-5">
                                                    <span class="rating">
                                                        <span class="rating-stars" data-rating="4">
                                                            <i class="fa fa-star-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                        </span>
                                                    </span>
                                                </div>
                                                <h4 class="price font-14">$60.00 <span class="price-sale color-muted">$200.00</span></h4>
                                            </div>
                                        </div>
                                        <div class="media">
                                            <div class="media-left">
                                                <a href="#">
                                                    <img class="media-object" src="assets/images/brands/brand_03.jpg" alt="Thumb" width="80">
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="mb-5">
                                                    <a href="#">Aenean ut orci vel massa</a>
                                                </h6>
                                                <div class="mb-5">
                                                    <span class="rating">
                                                        <span class="rating-stars" data-rating="4">
                                                            <i class="fa fa-star-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                        </span>
                                                    </span>
                                                </div>
                                                <h4 class="price font-14">$60.00 <span class="price-sale color-muted">$200.00</span></h4>
                                            </div>
                                        </div>
                                        <div class="media">
                                            <div class="media-left">
                                                <a href="#">
                                                    <img class="media-object" src="assets/images/brands/brand_04.jpg" alt="Thumb" width="80">
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="mb-5">
                                                    <a href="#">Aenean ut orci vel massa</a>
                                                </h6>
                                                <div class="mb-5">
                                                    <span class="rating">
                                                        <span class="rating-stars" data-rating="4">
                                                            <i class="fa fa-star-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                        </span>
                                                    </span>
                                                </div>
                                                <h4 class="price font-14">$60.00 <span class="price-sale color-muted">$200.00</span></h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="add-250x250"><p>add size will be 250x250 here</p></div>
                                <!-- Best Rated Deals -->
                            </div>

                            <div class="col-xs-12">
                                <!-- Trending Stores -->
                                <div class="widget trend-store-widget panel pt-20 prl-20">
                                    <h3 class="widget-title h-title">Trending Stores</h3>
                                    <div class="widget-body ptb-30">
                                        <div class="trend-store-item media">
                                            <div class="post-thumb media-left">
                                                <a href="#">
                                                    <img class="media-object pr-10" width="90" src="assets/images/brands/brand_01.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <h5 class="mb-5">
                                                    <a href="store_single_01.html">Amazon</a>
                                                    <span class="rating">
                                                        <span class="rating-stars" data-rating="4">
                                                            <i class="fa fa-star-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                        </span>
                                                    </span>
                                                </h5>
                                                <p class="color-mid">Upto 70% Rewards.</p>
                                            </div>
                                        </div>
                                        <div class="trend-store-item media">
                                            <div class="post-thumb media-left">
                                                <a href="#">
                                                    <img class="media-object pr-10" width="90" src="assets/images/brands/brand_02.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <h5 class="mb-5">
                                                    <a href="store_single_01.html">Ashford</a>
                                                    <span class="rating">
                                                        <span class="rating-stars" data-rating="4">
                                                            <i class="fa fa-star-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                        </span>
                                                    </span>
                                                </h5>
                                                <p class="color-mid">Upto 70% Rewards.</p>
                                            </div>
                                        </div>
                                        <div class="trend-store-item media">
                                            <div class="post-thumb media-left">
                                                <a href="#">
                                                    <img class="media-object pr-10" width="90" src="assets/images/brands/brand_03.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <h5 class="mb-5">
                                                    <a href="store_single_01.html">DELL</a>
                                                    <span class="rating">
                                                        <span class="rating-stars" data-rating="4">
                                                            <i class="fa fa-star-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                        </span>
                                                    </span>
                                                </h5>
                                                <p class="color-mid">Upto 70% Rewards.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Trending Stores -->
                            </div>



                        </div>
                    </aside>
                    <!-- End Blog Sidebar -->
                </div>
                <div class="page-content col-xs-12 col-md-9">
                    <section class="section coupons-area coupons-area-list">
                        <!-- Page Control -->
                        <header class="page-control panel ptb-15 prl-20 pos-r mb-10">
                            <!-- List Control View -->
                            <h3 class="section-title font-18">Belk Deals and Coupons</h3>
                            <!-- End List Control View -->
                            <div class="right-10 pos-tb-center">
                                <form method="post" id="item_type" name="item_type" action="#">
                                    <div class="deals-filter-radio">
                                        <input type="radio" id="all" name="all" class="custom-radio" value="all" checked="">    All                                                     
                                    </div>
                                    <div class="deals-filter-radio">
                                        <input type="radio" id="deals" name="all"class="custom-radio" value="Promotion">   Deals                                                      
                                    </div>
                                    <div class="deals-filter-radio">
                                        <input type="radio" id="coupons" name="all" class="custom-radio" value="Coupon">  Coupons                                                     
                                    </div>
                                </form>
                            </div>
                            <!--<div class="right-10 pos-tb-center">
                                <select class="form-control input-sm">
                                    <option>SORT BY</option>
                                    <option>Newest items</option>
                                    <option>Best sellers</option>
                                    <option>Best rated</option>
                                    <option>Price: low to high</option>
                                    <option>Price: high to low</option>
                                </select>
                            </div> -->
                        </header>
                        <!-- End Page Control -->
                        <div class="row row-masnory row-tb-10">
                            <?PHP
                            $specific_item = $this->uri->segment(3);

//                            $result = ((is_int($specific_item)));
//                            echo $specific_item;exit;
//                            $specific_store = $this->input->get('store_name');
//                            $data = is_string($specific_store);
//                            exit;
                            if ((isset($specific_item)) && (!is_numeric($specific_item))) {
                                foreach ($specific_item_deals as $deals_detail) {
//                                        echo "<pre>";
//                                        print_r($deals_detail);
                                    ?>
                                    <div class="col-xs-12">
                                        <div class="coupon-single panel t-center t-sm-left">
                                            <div class="row row-sm-cell row-tb-0 row-rl-0">
                                                <!--                                                    <div class="coupon-data col-sm-2 text-center">
                                                                                                        <div class="savings text-center">
                                                                                                            <div>
                                                                                                                <div class="large">45%</div>
                                                                                                                <div class="small">off</div>
                                                                                                                <div class="type"><?PHP echo $deals_detail->type; ?></div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                         end:Savings 
                                                                                                    </div>-->
                                                <!-- end col -->
                                                <div class="col-sm-12">
                                                    <div class="panel-body">
                                                        <ul class="deal-meta list-inline mb-10">
                                                            <li class="color-green"><i class="ico lnr lnr-smile mr-5"></i>Verifed</li>
                                                            <li class="color-muted"><i class="ico lnr lnr-users mr-5"></i>230 Used</li>
                                                        </ul>
                                                        <h5 class="deal-title deal-titled mb-10">
                                                            <a href="<?PHP echo $deals_detail->link; ?>" target="_blank"><?PHP echo $deals_detail->title; ?></a>
                                                        </h5>
        <!--                                                <p class="mb-15 color-muted mb-20 font-12"><i class="lnr lnr-clock mr-10"></i>Expires On <?PHP // echo $deals_detail->expiry_date;            ?></p>-->
                                                        <?PHP
                                                        $date1 = strtotime(date("Y-m-d H:i:s"));
                                                        $date2 = strtotime($deals_detail->expiry_date);
                                                        if ($date1 > $date2) {
                                                            $expiry_days = floor(($date1 - $date2) / (60 * 60 * 24));
                                                            ?>
                                                            <p class="mb-15 color-muted font-12"><i class="lnr lnr-clock mr-10"></i>Expires  in <?PHP echo $expiry_days . "  days"; ?></p>
                                                            <?PHP
                                                        } else {
                                                            $expired_days = floor(($date2 - $date1) / (60 * 60 * 24));
                                                            ?>
                                                            <p class="mb-15 color-muted font-12"><i class="lnr lnr-clock mr-10"></i>Expired <?PHP echo $expired_days . "days"; ?>Back</p>  
                                                        <?PHP }
                                                        ?>   
                                                        <div class="dealBox-logo"><img src="<?PHP echo $deals_detail->store_image; ?>" alt=""></div>
                                                        <?PHP if ($deals_detail->type == 'Promotion') { ?>
                                                            <div class="showcode">
                                                                <button class="show-code btn btn-sm btn-block" data-toggle="modal" data-target="#<?PHP echo $deals_detail->id; ?>">Activate Deal</button>
                                                                <div class="coupon-hide"><?PHP echo $deals_detail->code; ?></div>
                                                            </div>
                                                        <?PHP } else { ?>
                                                            <div class="showcode">
                                                                <button class="show-code btn btn-sm btn-block" data-toggle="modal" data-target="#<?PHP echo $deals_detail->id; ?>">GET COUPON CODE</button>
                                                                <div class="coupon-hide"><?PHP echo $deals_detail->code; ?></div>
                                                            </div>
                                                        <?PHP } ?>
                                                        <ul class="coupon-details list-inline">
                                                            <li class="list-inline-item">
                                                                <div class="btn-group" role="group" aria-label="...">
                                                                    <button type="button" class="btn btn-success btn-xs" data-toggle="tooltip" data-placement="left" title="" data-original-title="It worked"><i class="fa fa-thumbs-o-up"></i> </button>
                                                                    <button typeall_deals="button" class="btn btn-danger btn-xs" data-toggle="tooltip" data-placement="top" title="" data-original-title="It didn't work"><i class="fa fa-thumbs-o-down"></i> </button>
                                                                </div>
                                                                <!-- end:Btn group -->
                                                            </li>
                                                            <li class="list-inline-item">30% of 54 recommend</li>
                                                            <li class="list-inline-item"><a href="#">Share</a> </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <!-- end col -->
                                            </div>
                                            <!-- end row -->
                                        </div>
                                        <div class="modal fade get-coupon-area" tabindex="-1" role="dialog" id="<?PHP echo $deals_detail->id; ?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content panel">
                                                    <div class="modal-body">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                                                        </button>
                                                        <div class="row row-v-10">
                                                            <div class="col-md-10 col-md-offset-1">                                                           
                                                                <img src="<?PHP echo $deals_detail->store_image; ?>" alt="">
                                                                <h3 class="mb-20"><?PHP echo $deals_detail->title; ?></h3>
                                                                <p class="color-mid"> </p>
                                                            </div>
                                                            <div class="col-md-10 col-md-offset-1">
                                                                <a href="<?PHP echo $deals_detail->store_link; ?>" class="btn btn-link">Visit Our Store</a>
                                                            </div>
                                                            <div class="col-md-10 col-md-offset-1">
                                                                <h6 class="color-mid t-uppercase">Click below to get your coupon code</h6>
                                                                <a href="<?PHP echo $deals_detail->link; ?>" target="_blank" class="coupon-code"><?PHP echo $deals_detail->code; ?></a>
                                                            </div>
                                                            <div class="col-md-10 col-md-offset-1">
                                                                <div class="like-report mb-10">
                                                                    <span>Share this coupon :</span>
                                                                    <ul class="list-inline social-icons social-icons--colored mt-10">
                                                                        <li class="social-icons__item">
                                                                            <a href="#"><i class="fa fa-facebook"></i></a>
                                                                        </li>
                                                                        <li class="social-icons__item">
                                                                            <a href="#"><i class="fa fa-twitter"></i></a>
                                                                        </li>
                                                                        <li class="social-icons__item">
                                                                            <a href="#"><i class="fa fa-google-plus"></i></a>
                                                                        </li>
                                                                        <li class="social-icons__item">
                                                                            <a href="#"><i class="fa fa-linkedin"></i></a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer footer-info t-center ptb-40 prl-30">
                                                        <h4 class="mb-15">Subscribe to Mail</h4>
                                                        <p class="color-mid mb-20">Get our Daily email newsletter with Special Services, Updates, Offers and more!</p>
                                                        <form method="post" action="#">
                                                            <div class="input-group">
                                                                <input type="text" class="form-control bg-white" placeholder="Your Email Address" required="required">
                                                                <span class="input-group-btn">
                                                                    <button class="btn" type="submit">Sign Up</button>
                                                                </span>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>   

                                    <?PHP
                                }
                                ?> 
                                <?PHP echo $links; ?>                      


                            </div>

                            <?PHP
                        }

//                            echo "<pre>";
//                            print_r($all_deals);exit;
                        else {
                            foreach ($all_deals as $deals_detail) {
                                ?>
                                <div class="col-xs-12">
                                    <div class="coupon-single panel t-center t-sm-left">
                                        <div class="row row-sm-cell row-tb-0 row-rl-0">
                                            <!--                                                <div class="coupon-data col-sm-2 text-center">
                                                                                                <div class="savings text-center">
                                                                                                    <div>
                                                                                                        <div class="large">45%</div>
                                                                                                        <div class="small">off</div>
                                                                                                        <div class="type"><?PHP // echo $deals_detail->type;        ?></div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                 end:Savings 
                                                                                            </div>-->
                                            <!-- end col -->
                                            <div class="col-sm-12">
                                                <div class="panel-body">
                                                    <ul class="deal-meta list-inline mb-10">
                                                        <li class="color-green"><i class="ico lnr lnr-smile mr-5"></i>Verifed</li>
                                                        <li class="color-muted"><i class="ico lnr lnr-users mr-5"></i>230 Used</li>
                                                    </ul>
                                                    <h5 class="deal-title deal-titled mb-10">
                                                        <a href="<?PHP echo $deals_detail->link; ?>"><?PHP echo $deals_detail->title; ?></a>
                                                    </h5>
        <!--                                                <p class="mb-15 color-muted mb-20 font-12"><i class="lnr lnr-clock mr-10"></i>Expires On <?PHP // echo $deals_detail->expiry_date;             ?></p>-->
                                                    <?PHP
                                                    $date1 = strtotime(date("Y-m-d H:i:s"));
                                                    $date2 = strtotime($deals_detail->expiry_date);
                                                    if ($date1 > $date2) {
                                                        $expiry_days = floor(($date1 - $date2) / (60 * 60 * 24));
                                                        ?>
                                                        <p class="mb-15 color-muted font-12"><i class="lnr lnr-clock mr-10"></i>Expires  in <?PHP echo $expiry_days . "  days"; ?></p>
                                                        <?PHP
                                                    } else {
                                                        $expired_days = floor(($date2 - $date1) / (60 * 60 * 24));
                                                        ?>
                                                        <p class="mb-15 color-muted font-12"><i class="lnr lnr-clock mr-10"></i>Expired <?PHP echo $expired_days . "days"; ?>Back</p>  
                                                    <?PHP }
                                                    ?>   
                                                    <div class="dealBox-logo"><img src="<?PHP echo $deals_detail->store_image; ?>" alt=""></div>
                                                    <div class="showcode">
                                                        <button class="show-code btn btn-sm btn-block" data-toggle="modal" data-target="#<?PHP echo $deals_detail->id; ?>">Activate Deal</button>
                                                        <div class="coupon-hide"><?PHP echo $deals_detail->code; ?></div>
                                                    </div>
                                                    <ul class="coupon-details list-inline">
                                                        <li class="list-inline-item">
                                                            <div class="btn-group" role="group" aria-label="...">
                                                                <button type="button" class="btn btn-success btn-xs" data-toggle="tooltip" data-placement="left" title="" data-original-title="It worked"><i class="fa fa-thumbs-o-up"></i> </button>
                                                                <button type="button" class="btn btn-danger btn-xs" data-toggle="tooltip" data-placement="top" title="" data-original-title="It didn't work"><i class="fa fa-thumbs-o-down"></i> </button>
                                                            </div>
                                                            <!-- end:Btn group -->
                                                        </li>
                                                        <li class="list-inline-item">30% of 54 recommend</li>
                                                        <li class="list-inline-item"><a href="#">Share</a> </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <!-- end col -->
                                        </div>
                                        <!-- end row -->
                                    </div>
                                    <div class="modal fade get-coupon-area" tabindex="-1" role="dialog" id="<?PHP echo $deals_detail->id; ?>">
                                        <div class="modal-dialog">
                                            <div class="modal-content panel">
                                                <div class="modal-body">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                                                    </button>
                                                    <div class="row row-v-10">
                                                        <div class="col-md-10 col-md-offset-1">                                                           
                                                            <img src="<?PHP echo $deals_detail->store_image; ?>" alt="">
                                                            <h3 class="mb-20"><?PHP echo $deals_detail->title; ?></h3>
                                                            <p class="color-mid"> </p>
                                                        </div>
                                                        <div class="col-md-10 col-md-offset-1">
                                                            <a href="<?PHP echo $deals_detail->store_link; ?>" class="btn btn-link">Visit Our Store</a>
                                                        </div>
                                                        <div class="col-md-10 col-md-offset-1">
                                                            <h6 class="color-mid t-uppercase"><?PHP echo $deals_detail->description; ?></h6>
                                                            <a href="<?PHP echo $deals_detail->link; ?>" target="_blank" class="coupon-code"><?PHP echo $deals_detail->code; ?></a>
                                                        </div>
                                                        <div class="col-md-10 col-md-offset-1">
                                                            <div class="like-report mb-10">
                                                                <span>Share this coupon :</span>
                                                                <ul class="list-inline social-icons social-icons--colored mt-10">
                                                                    <li class="social-icons__item">
                                                                        <a href="#"><i class="fa fa-facebook"></i></a>
                                                                    </li>
                                                                    <li class="social-icons__item">
                                                                        <a href="#"><i class="fa fa-twitter"></i></a>
                                                                    </li>
                                                                    <li class="social-icons__item">
                                                                        <a href="#"><i class="fa fa-google-plus"></i></a>
                                                                    </li>
                                                                    <li class="social-icons__item">
                                                                        <a href="#"><i class="fa fa-linkedin"></i></a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer footer-info t-center ptb-40 prl-30">
                                                    <h4 class="mb-15">Subscribe to Mail</h4>
                                                    <p class="color-mid mb-20">Get our Daily email newsletter with Special Services, Updates, Offers and more!</p>
                                                    <form method="post" action="#">
                                                        <div class="input-group">
                                                            <input type="text" class="form-control bg-white" placeholder="Your Email Address" required="required">
                                                            <span class="input-group-btn">
                                                                <button class="btn" type="submit">Sign Up</button>
                                                            </span>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>   

                                <?PHP
                            }
                            echo $links;
                        }
                        ?> 



                </div>

                </section>
            </div>

        </div>
    </div>
</div>
</main>		

<!-- –––––––––––––––[ END PAGE CONTENT ]––––––––––––––– -->
<?php include_once('common/footer.php') ?>
<script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.13.0/jquery.validate.min.js"></script>
<script type='text/javascript' src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.js"></script>
<script type='text/javascript' src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/additional-methods.js"></script>
<script type="text/javascript">
//                                            $(document).ready(function () {
//    var val =   $('input:radio[name=all]:checked').val();
//    alert(val);
////                                                $("#all").click(function () {
//                                                 var var =   $('input:radio[name=sex]:nth(0)').attr('checked',true);
//                                                 alert()
//                                                });


                                                $("input[type='radio']").click(function () {
                                                    var radioValue = $("input[name='all']:checked").val();  
                                                    var value = $(location).attr('href').split("/")[5];
//                                                    var store_name= url.indexOf('ebay.in');
                                                    alert(value);
//                                                    var store_name = url[6];
//                                                    alert(url);
                                                        alert("Your are a - " + radioValue);  
                                                         $.ajax({                                                      
                                                        type: "POST",
//                                                        url:'<?php // echo base_url()."index/store_deals_coupons"  ?>',
                                                        url: '<?php echo base_url()."index/store/"  ?>'+ value,
                                                        data: { 
                                                            store_name:value,
                                                            type:radioValue                                                         
                                                        }                                                       
                                                    });
                                                });

//                                                $('#item_type').on('change', function () {
//                                                    alert($('input[name=all]:checked', '#item_type').val());
//                                                });
//                                            })


</script>