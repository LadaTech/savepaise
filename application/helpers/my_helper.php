<?php

//defined('BASEPATH') OR exit('No direct script access allowed');

function makeSeo($text, $replace = "-", $limit = 75) {
    // replace non letter or digits by -
    $text = preg_replace('~[^\\pL\d]+~u', $replace, $text);

    // trim
    $text = trim($text, $replace);

    // lowercase
    $text = strtolower($text);

    // remove unwanted characters
    $text = preg_replace('~[^-\w]+~', '', $text);
    if (empty($text)) {
        //return 'n-a';
        return time();
    }
    return $text;
}

function GridDeals($couponArray) {
    if (is_array($couponArray)) {
        $gridHtml = '';
        foreach ($couponArray as $coupon) {
//            echo "<pre>";
//            print_r($coupon);
//            echo "</pre>";
            $gridHtml .= '<div class="col-sm-6 col-lg-3">
                        <div class="deal-single panel">
                         <!-- <div class="ribbon-wrapper is-hidden-xs-down">
                                <div class="ribbon">Featured</div>
                            </div>-->
                            <figure class="deal-thumbnail embed-responsive embed-responsive-16by9" >
                                <div class="label-discount left-90 top-2">-50%</div>
                                <div class="deal-store-logo">
                                    <img src="' . $coupon['store_image'] . '" alt="' . $coupon['store_name'] . '">
                                </div>
                            </figure>
                           
                            <div class="bg-white pt-20 pl-20 pr-15">
                                <div class="pr-md-10">
                                    <div class="rating mb-10">
                                        <span class="rating-stars rate-allow" data-rating="5">
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                        </span>
                                        <span class="rating-reviews">
                                            ( <span class="rating-count">241</span> rates )
                                        </span>
                                    </div>
                                    <h3 class="deal-title mb-10">
                                        <a href="' . $coupon['link'] . '" target="_blank">' . $coupon['title'] . '</a>
                                    </h3>
                                    <ul class="deal-meta list-inline mb-10 color-mid">
                                        <li><i class="ico fa fa-map-marker mr-10"></i>34 uses today</li>
                                        <li><i class="ico fa fa-shopping-basket mr-10"></i>Show all 23 offers</li>
                                    </ul>

                                </div>
                                <p class="mb-15 color-muted mb-20 font-12"><i class="lnr lnr-clock mr-10"></i>Expires On ' . $coupon['expiry_date'] . '</p>';
            if ($coupon['type'] == 'Coupon') {
                $gridHtml .= '<div class="showcode" data-toggle-class="coupon-showen" data-toggle-event="click">
                                <button class="show-code btn btn-sm btn-block" data-toggle="modal" data-target="#'.$coupon['id'].'">Get Coupon Code</button>
                                <div class="coupon-hide">' . $coupon['code'] . '</div></div>
                              <div class="modal fade get-coupon-area" tabindex="-1" role="dialog" id="'.$coupon['id'].'">                                        
                                        <div class="modal-dialog">
                                            <div class="modal-content panel">
                                                <div class="modal-body">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                                                    </button>
                                                    <div class="row row-v-10">
                                                        <div class="col-md-10 col-md-offset-1">
                                                            <img src="'.$coupon['store_image'].'" alt="">
                                                            <h3 class="mb-20">'.$coupon['title'].'</h3>
                                                            <p class="color-mid"> </p>
                                                        </div>
                                                        <div class="col-md-10 col-md-offset-1">
                                                            <a href="'.$coupon['link'].'" class="btn btn-link">Visit Our Store</a>
                                                        </div>

                                                        <div class="col-md-10 col-md-offset-1">
                                                            <h6 class="color-mid t-uppercase">'.$coupon['description'].'</h6>
                                                            <a href="'.$coupon['link'].'" target="_blank" id ="copy_text_'.$coupon['id'].'" class="coupon-code">'.$coupon['code'].'</a><a href="" id="copy_code" class="copy_code" onclick="copy_coupon_code('.$coupon['id'].')">copy</a>
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
                                    </div>';
            } else {
                $gridHtml .='<div class="showcode" data-toggle-class="coupon-showen" data-toggle-event="click">
                                <button class="show-code btn btn-sm btn-block" data-toggle="modal" data-target="#'.$coupon['id'].'">Activate Deal</button>
                                <div class="coupon-hide">' . $coupon['code'] . '</div></div>
                              <div class="modal fade get-coupon-area" tabindex="-1" role="dialog" id="'.$coupon['id'].'">                                        
                                        <div class="modal-dialog">
                                            <div class="modal-content panel">
                                                <div class="modal-body">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                                                    </button>
                                                    <div class="row row-v-10">
                                                        <div class="col-md-10 col-md-offset-1">
                                                            <img src="'.$coupon['store_image'].'" alt="">
                                                            <h3 class="mb-20">'.$coupon['title'].'</h3>
                                                            <p class="color-mid"> </p>
                                                        </div>
                                                        <div class="col-md-10 col-md-offset-1">
                                                            <a href="'.$coupon['link'].'" target = _blank class="btn btn-link">Visit Our Store</a>
                                                        </div>

                                                        <div class="col-md-10 col-md-offset-1">
                                                            <h6 class="color-mid t-uppercase">'.$coupon['description'].'</h6>
                                                            
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
                                    </div>';
                        
//                        '<div class="showcode"><a href="'.$coupon['link'].'" target="_blank" class="btn btn-sm btn-block">Activate Deal</a></div>';
            }
            $gridHtml .= '<!--<div class="deal-price pos-r mb-15">
                                <h3 class="price ptb-5 text-right"><span class="price-sale"><i class="fa fa-inr"></i> 300.00</span><i class="fa fa-inr"></i> 150.00</h3>
                            </div>-->
                        </div>
                    </div>
                </div>';
        }
    }
    return $gridHtml;
}

function GridCoupons($couponArray) {
    if (is_array($couponArray)) {
        $gridHtml = '';
        foreach ($couponArray as $coupon) {
//            echo "<pre>";
//            print_r($coupon);
//            echo "</pre>";
            $gridHtml .= '<div class="coupon-item">
                        <div class="coupon-single panel t-center">
                            <div class="ribbon-wrapper is-hidden-xs-down">
                                <div class="ribbon">Featured</div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="text-center p-20">
                                        <img class="store-logo" src="assets/images/brands/brand_01.jpg" alt="">
                                    </div>
                                    <!-- end media -->
                                </div>
                                <!-- end col -->

                                <div class="col-xs-12">
                                    <div class="panel-body">
                                        <ul class="deal-meta list-inline mb-10">
                                            <li class="color-green"><i class="ico lnr lnr-smile mr-5"></i>Verifed</li>
                                            <li class="color-muted"><i class="ico lnr lnr-users mr-5"></i>125 Used</li>
                                        </ul>
                                        <h4 class="color-green mb-10 t-uppercase">10% OFF</h4>
                                        <h5 class="deal-title mb-10">
                                            <a href="#">10% off select XPS & Alienware laptops</a>
                                        </h5>
                                        <p class="mb-15 color-muted mb-20 font-12"><i class="lnr lnr-clock mr-10"></i>Expires On 01/01/2018</p>
                                        <div class="showcode" data-toggle-class="coupon-showen" data-toggle-event="click">
                                            <button class="show-code btn btn-sm btn-block" data-toggle="modal" data-target="#coupon_01">Get Coupon Code</button>
                                            <div class="coupon-hide">X455-17GT-OL58</div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end col -->
                            </div>
                            <!-- end row -->
                        </div>
                    </div>';
        }
    }
    return $gridHtml;
}
