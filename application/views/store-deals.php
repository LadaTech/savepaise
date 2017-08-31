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
//                                            print_r($specific_item_deals);
                                            $specific_item = $this->uri->segment(3);
//                                            echo $specific_item;exit;
                                            if ((isset($specific_item)) && (!is_numeric($specific_item))) {
                                                if (isset($specific_item_deals) && is_array($specific_item_deals && count($specific_item_deals) > 0)) {
                                                    $storeVal = $specific_item_deals[0];
                                                    ?>
                                                    <a href="<?PHP echo $storeVal->store_link; ?>" target="_blank" > <img src="<?PHP echo $storeVal->store_image; ?>" />   </a>

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
                                                        <a href="<?PHP echo $storeVal->store_link; ?>" target="_blank">go to store</a>
                                                    </div>
                                                    <?PHP
                                                }
                                            }
                                            ?>
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
                            <h3 class="section-title font-18">Best Deals and Coupons</h3>
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
                        </header>
                        <!-- End Page Control -->
                        <div class="row row-masnory row-tb-10" id='couponsDisplay'>
                            <?PHP
                            $specific_item = $this->uri->segment(3);
                            if ((isset($specific_item)) && (!is_numeric($specific_item))) {
                                get_instance()->load->helper('my');
                                echo displayInnerCoupons($specific_item_deals);
                                echo $links;
                                ?>

                                <?PHP
                            } else {
                                get_instance()->load->helper('my');
                                echo displayInnerCoupons($all_deals);
                                echo $links;
                            }
                            ?>
                        </div>
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
    $("input[type='radio']").click(function () {
        $('#couponsDisplay').html('');
        var radioValue = $("input[name='all']:checked").val();
        var value = '<?PHP echo $storeName; ?>';
        $.ajax({
            type: "POST",
            url: '<?php echo base_url() . "index/getCoupons" ?>',
            data: {
                store_name: value,
                type: radioValue
            },
            success: function (data)
            {
                $('#couponsDisplay').html(data);
            }
        });
    });
</script>