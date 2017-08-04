<?PHP include_once('common/header.php'); ?>
<!-- –––––––––––––––[ PAGE CONTENT ]––––––––––––––– -->
<main id="mainContent" class="main-content">
    <!-- Page Container -->
    <div class="page-container ptb-20">
        <div class="container">
            <section class="stores-area stores-area-v2">
                <h3 class="mb-40 t-uppercase">View deals by stores</h3>
                <div class="letters-toolbar p-10 panel mb-40">
                    <span class="all-stores"><a href="#">All stores</a></span>
                    <span><a href="#">A</a></span>
                    <span><a href="#">B</a></span>
                    <span><a href="#">C</a></span>
                    <span><a href="#">D</a></span>
                    <span><a href="#">E</a></span>
                    <span><a href="#">F</a></span>
                    <span><a href="#">G</a></span>
                    <span><a href="#">H</a></span>
                    <span><a href="#">I</a></span>
                    <span><a href="#">J</a></span>
                    <span><a href="#">K</a></span>
                    <span><a href="#">L</a></span>
                    <span><a href="#">M</a></span>
                    <span><a href="#">N</a></span>
                    <span><a href="#">O</a></span>
                    <span><a href="#">P</a></span>
                    <span><a href="#">Q</a></span>
                    <span><a href="#">R</a></span>
                    <span><a href="#">S</a></span>
                    <span><a href="#">T</a></span>
                    <span><a href="#">U</a></span>
                    <span><a href="#">V</a></span>
                    <span><a href="#">W</a></span>
                    <span><a href="#">X</a></span>
                    <span><a href="#">Y</a></span>
                    <span><a href="#">Z</a></span>
                </div>
                <div class="row row-rl-15 row-tb-15 stores-cat">
                    <?PHP
//                    echo "<pre>";
//                    print_r($all_stores);
//                    exit;
                    foreach ($all_stores as $store_details) { ?>
                       <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
                        <a href="<?PHP echo $store_details->store_link ;?>" class="is-block">
                            <div class="embed-responsive embed-responsive-4by3">
                                <div class="store-logo view view-fifth view view-fifth">
                                    <img src="<?PHP echo $store_details->store_image ;?>" alt="">
                                    <div class="mask">
                                        <h6><?PHP echo $store_details->store_name ;?></h6> 												 
                                        <a href="#" class="info">73 Offers</a>
                                    </div>
                                </div>
                            </div>
                            <h6 class="store-name ptb-10 t-center"><a href="<?PHP echo $store_details->store_link ;?>"><?PHP echo $store_details->store_name ;?></a></h6>
                        </a>
                    </div>
                    
                   <?PHP }
                   
                    ?>                 
                    
                </div>                
            </section>
            <?PHP echo $links ;?>
        </div>
    </div>
    <!-- End Page Container -->


</main>

<!-- –––––––––––––––[ END PAGE CONTENT ]––––––––––––––– -->
<?php include_once('common/footer.php') ?>